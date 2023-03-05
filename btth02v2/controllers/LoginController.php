<?php
require_once '../services/LoginService.php';

class UserController {
  function login() {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($username, $password);

    if ($user->authenticate()) {
      $_SESSION['username'] = $username;
      // Điều hướng đến trang chính sau khi đăng nhập thành công
    } else {
      // Hiển thị thông báo lỗi
      echo'Đăng nhập thất bại';
    }
  }

  function logout() {
    session_destroy();
    // Điều hướng đến trang đăng nhập sau khi đăng xuất thành công
  }
}
?>
