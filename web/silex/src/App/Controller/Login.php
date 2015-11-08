<?php
namespace App\Controller;
class Login
{
  public function page()
  {
    if (!empty($_POST)) {
      $u = 'admin';
      $p = 'password';
      $username = $_POST['username'];
      $password = $_POST['password'];
      $hash = password_hash($p, PASSWORD_DEFAULT);
      if ($username === $u && password_verify($password, $hash)) {
        $_SESSION['user'] = true;
        $_SESSION['username'] = 'admin';
        header('Location: http://localhost/duck_store929/web/index.php');
      }
    }
    $this->render();
  }
  protected function render()
  {
    include_once __DIR__ . '/../../views/head.php';
    include_once __DIR__ . '/../../views/header.php';
    include_once __DIR__ . '/../../views/login/page.php';
    include_once __DIR__ . '/../../views/footer.php';
  }
}
