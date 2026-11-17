<?php
session_start();
if (!empty($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>> VM.DEV // Super Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-dark: #0a0f1d;
            --card-bg: #111a2e;
            --accent-cyan: #00f0ff;
            --accent-green: #00ff66;
            --text-main: #e2e8f0;
            --text-muted: #94a3b8;
            --border-color: #1e293b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Subtle matrix grid background effect */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                linear-gradient(rgba(0, 240, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 240, 255, 0.03) 1px, transparent 1px);
            background-size: 30px 30px;
            z-index: 0;
        }

        .login-box {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.6), 0 0 25px rgba(0, 240, 255, 0.15);
        }

        .logo-head {
            font-family: 'Fira Code', monospace;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--accent-cyan);
            text-align: center;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
        }

        .subtitle {
            text-align: center;
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 2rem;
            font-family: 'Fira Code', monospace;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-family: 'Fira Code', monospace;
            font-size: 0.85rem;
            color: var(--text-main);
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        input {
            width: 100%;
            background: #0a0f1d;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.85rem 1rem 0.85rem 2.8rem;
            color: #fff;
            font-family: 'Fira Code', monospace;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--accent-cyan);
            box-shadow: 0 0 12px rgba(0, 240, 255, 0.3);
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, rgba(0, 240, 255, 0.2), rgba(0, 255, 102, 0.2));
            border: 1px solid var(--accent-cyan);
            color: var(--accent-cyan);
            padding: 0.9rem;
            border-radius: 8px;
            font-family: 'Fira Code', monospace;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            margin-top: 2rem;
        }

        .btn-login:hover {
            background: var(--accent-cyan);
            color: var(--bg-dark);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.5);
            transform: translateY(-2px);
        }

        .alert-box {
            display: none;
            padding: 0.8rem 1rem;
            border-radius: 6px;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
            font-family: 'Fira Code', monospace;
        }

        .alert-error {
            background: rgba(255, 0, 85, 0.15);
            border: 1px solid #ff0055;
            color: #ff4d8d;
        }

        .alert-success {
            background: rgba(0, 255, 102, 0.15);
            border: 1px solid var(--accent-green);
            color: var(--accent-green);
        }

        .default-hint {
            margin-top: 1.5rem;
            padding: 0.75rem;
            background: rgba(0, 240, 255, 0.05);
            border: 1px dashed rgba(0, 240, 255, 0.3);
            border-radius: 6px;
            font-size: 0.78rem;
            color: var(--text-muted);
            font-family: 'Fira Code', monospace;
            text-align: center;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-family: 'Fira Code', monospace;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: var(--accent-cyan);
        }
    </style>
</head>
<body>

    <div class="login-box">
        <div class="logo-head">
            <i class="fa-solid fa-shield-halved"></i> > VM.DEV
        </div>
        <div class="subtitle">Super Admin Access Control</div>

        <div id="alertBox" class="alert-box"></div>

        <form id="loginForm">
            <div class="form-group">
                <label for="username"><i class="fa-solid fa-user-secret"></i> USERNAME</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-terminal"></i>
                    <input type="text" id="username" name="username" placeholder="Enter admin username" required autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label for="password"><i class="fa-solid fa-key"></i> PASSWORD</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Enter admin password" required autocomplete="current-password">
                </div>
            </div>

            <button type="submit" class="btn-login">
                <i class="fa-solid fa-right-to-bracket"></i> AUTHENTICATE
            </button>
        </form>

        <a href="../" class="back-link"><i class="fa-solid fa-arrow-left"></i> Return to Main Website</a>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const alertBox = document.getElementById('alertBox');
            alertBox.style.display = 'none';

            const formData = new FormData(this);
            formData.append('action', 'login');

            try {
                const res = await fetch('api.php', { method: 'POST', body: formData });
                const result = await res.json();

                if (result.status === 'success') {
                    alertBox.className = 'alert-box alert-success';
                    alertBox.textContent = 'Authentication successful! Redirecting...';
                    alertBox.style.display = 'block';
                    setTimeout(() => {
                        window.location.href = './';
                    }, 800);
                } else {
                    alertBox.className = 'alert-box alert-error';
                    alertBox.textContent = result.message || 'Authentication failed.';
                    alertBox.style.display = 'block';
                }
            } catch (err) {
                alertBox.className = 'alert-box alert-error';
                alertBox.textContent = 'Server connection error.';
                alertBox.style.display = 'block';
            }
        });
    </script>
</body>
</html>
