<?php
session_start();

require_once __DIR__ . '/controllers/ContactController.php';
require_once __DIR__ . '/controllers/AuthController.php';

$contactController = new ContactController();
$authController    = new AuthController();

$action = $_GET['action'] ?? 'index';

$contactActions = ['index', 'create', 'store', 'edit', 'update', 'delete'];
$authActions    = ['loginForm', 'login', 'logout'];

if (in_array($action, $contactActions)) {
    $contactController->$action();
} elseif (in_array($action, $authActions)) {
    $authController->$action();
} else {
    http_response_code(404);
    echo "Page not found";
}
