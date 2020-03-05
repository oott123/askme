<?php
  require_once 'bootstrap.php';

  if (is_admin()) {
    header('Location: answerme.php');
    die();
  }

  if (check_submit()) {
    login($_POST['password']);
    header('Location: answerme.php');
    die();
  }

  $view_layout = 'admin-login.php';
  include 'views/layout.php';

  function check_submit() {
    if (!isset($_POST['submit'])) {
      return false;
    }
    if (empty($_COOKIE[ASK_CSRF_TOKEN])) {
      return false;
    }
    if ($_POST['csrf_token'] !== $_COOKIE[ASK_CSRF_TOKEN]) {
      return false;
    }

    return true;
  }

