<?php
chdir(__DIR__ . '/..');
ob_start();
include 'index.php';
$html = ob_get_clean();
file_put_contents('index.html', $html);
echo "Successfully generated static index.html! Bytes: " . strlen($html) . "\n";
