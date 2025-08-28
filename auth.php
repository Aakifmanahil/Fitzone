<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function require_login() {
  if (empty($_SESSION['user_id'])) {
    header("Location: login.php?msg=".urlencode("Please login first")); exit;
  }
}

function require_role($roles = []) {
  require_login();
  $role = $_SESSION['user_role'] ?? 'customer';
  if (!in_array($role, (array)$roles, true)) {
    header("Location: index.php?msg=".urlencode("Access denied")); exit;
  }
}

function flash_msg() {
  if (!empty($_GET['msg'])) {
    $ok = !empty($_GET['ok']);
    echo '<div class="alert '.($ok?'ok':'err').'">'.htmlspecialchars($_GET['msg']).'</div>';
  }
}
