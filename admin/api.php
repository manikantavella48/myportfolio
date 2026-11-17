<?php
session_start();
header('Content-Type: application/json');

$jsonPath = __DIR__ . '/../data/portfolio.json';
$credentialsPath = __DIR__ . '/../data/admin_creds.json';

// Ensure admin creds exist
if (!file_exists($credentialsPath)) {
    $defaultCreds = [
        'username' => 'admin',
        'password_hash' => password_hash('Neha@2021', PASSWORD_DEFAULT)
    ];
    file_put_contents($credentialsPath, json_encode($defaultCreds, JSON_PRETTY_PRINT));
}

function getPortfolioData($path) {
    if (!file_exists($path)) {
        return [];
    }
    return json_decode(file_get_contents($path), true) ?: [];
}

function savePortfolioData($path, $data) {
    return file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
}

$action = $_GET['action'] ?? $_POST['action'] ?? '';

// Public contact form submission
if ($action === 'submit_contact') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
        exit;
    }

    $data = getPortfolioData($jsonPath);
    if (!isset($data['messages'])) {
        $data['messages'] = [];
    }

    $newMessage = [
        'id' => 'msg_' . time() . '_' . rand(100, 999),
        'name' => htmlspecialchars($name),
        'email' => htmlspecialchars($email),
        'subject' => htmlspecialchars($subject),
        'message' => htmlspecialchars($message),
        'timestamp' => date('d M Y, h:i A'),
        'read' => false
    ];

    array_unshift($data['messages'], $newMessage);
    savePortfolioData($jsonPath, $data);

    echo json_encode(['status' => 'success', 'message' => 'Thank you! Your message has been sent successfully.']);
    exit;
}

// Login verification
if ($action === 'login') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $creds = json_decode(file_get_contents($credentialsPath), true);
    if ($username === $creds['username'] && password_verify($password, $creds['password_hash'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $username;
        echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid username or password.']);
    }
    exit;
}

// Require Authentication for all admin actions below
if (empty($_SESSION['admin_logged_in'])) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access. Please log in.']);
    exit;
}

// Logout
if ($action === 'logout') {
    unset($_SESSION['admin_logged_in']);
    unset($_SESSION['admin_user']);
    echo json_encode(['status' => 'success']);
    exit;
}

// Get portfolio data for admin
if ($action === 'get_data') {
    echo json_encode(['status' => 'success', 'data' => getPortfolioData($jsonPath)]);
    exit;
}

// Save complete or sectional portfolio update
if ($action === 'save_section') {
    $section = $_POST['section'] ?? '';
    $sectionDataRaw = $_POST['data'] ?? '';

    if (empty($section) || empty($sectionDataRaw)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid parameters.']);
        exit;
    }

    $sectionData = json_decode($sectionDataRaw, true);
    $data = getPortfolioData($jsonPath);
    $data[$section] = $sectionData;

    if (savePortfolioData($jsonPath, $data)) {
        echo json_encode(['status' => 'success', 'message' => ucfirst($section) . ' updated successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to write data to file.']);
    }
    exit;
}

// Upload Certificate or Asset File
if ($action === 'upload_file') {
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => 'error', 'message' => 'No file uploaded or upload error occurred.']);
        exit;
    }

    $targetDir = __DIR__ . '/../assets/certificates/';
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $filename = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', basename($_FILES['file']['name']));
    $targetFilePath = $targetDir . $filename;
    $relativePath = 'assets/certificates/' . $filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $fileType = ($ext === 'pdf') ? 'pdf' : 'image';
        echo json_encode([
            'status' => 'success',
            'file_path' => $relativePath,
            'file_type' => $fileType,
            'message' => 'File uploaded successfully!'
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save uploaded file.']);
    }
    exit;
}

// Change Admin Password
if ($action === 'change_password') {
    $currentPass = trim($_POST['current_password'] ?? '');
    $newPass = trim($_POST['new_password'] ?? '');

    $creds = json_decode(file_get_contents($credentialsPath), true);
    if (!password_verify($currentPass, $creds['password_hash'])) {
        echo json_encode(['status' => 'error', 'message' => 'Current password is incorrect.']);
        exit;
    }

    if (strlen($newPass) < 4) {
        echo json_encode(['status' => 'error', 'message' => 'New password must be at least 4 characters long.']);
        exit;
    }

    $creds['password_hash'] = password_hash($newPass, PASSWORD_DEFAULT);
    file_put_contents($credentialsPath, json_encode($creds, JSON_PRETTY_PRINT));

    echo json_encode(['status' => 'success', 'message' => 'Password updated successfully!']);
    exit;
}

// Delete Contact Message
if ($action === 'delete_message') {
    $msgId = $_POST['msg_id'] ?? '';
    $data = getPortfolioData($jsonPath);

    if (isset($data['messages'])) {
        $data['messages'] = array_values(array_filter($data['messages'], function($m) use ($msgId) {
            return $m['id'] !== $msgId;
        }));
        savePortfolioData($jsonPath, $data);
    }

    echo json_encode(['status' => 'success', 'message' => 'Message deleted.']);
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
