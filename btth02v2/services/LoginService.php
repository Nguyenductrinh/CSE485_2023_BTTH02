<?php
 include'../configs/DBConnection.php';

class User {
    private $username;
    private $password;
  
    function __construct($username, $password) {
      $this->username = $username;
      $this->password = $password;
    }
  
    function getUsername() {
      return $this->username;
    }
  
    function getPassword() {
      return $this->password;
    }
  
    function authenticate() {
      $conn = new PDO('mysql:host=localhost;dbname=btth02_cse485.sql;port=3306', 'root','');
      $stmt = $conn->prepare('SELECT * FROM accounts WHERE username = ? AND password = ?');
      $stmt->execute([$this->username, $this->password]);
      $user = $stmt->fetch();
  
      if ($user) {
        return true;
      } else {
        return false;
      }
    }
  }
  
?>