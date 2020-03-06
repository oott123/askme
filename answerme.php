<?php
  require_once 'bootstrap.php';

  if (!is_admin()) {
    header('Location: login.php');
    die();
  }

  if (check_submit()) {
    if ($_POST['action'] === 'delete') {
      $id = intval($_POST['id']);
      AskMeDB::$instance->delete($id);
      header('Location: view.php?id=' . $id);
      die();
    } else if ($_POST['action'] === 'recover') {
      $id = intval($_POST['id']);
      AskMeDB::$instance->delete($id, 0);
      header('Location: view.php?id=' . $id);
      die();
    } else if ($_POST['action'] === 'answer') {
      $question = $_POST['question'];
      $answer = $_POST['answer'];
      $asked_at = $_POST['asked_at'];
      $answered_at = time();
      $id = intval($_POST['id']);
  
      if ($_POST['delete'] === 'yes') {
        AskMeDB::$instance->answer($id);
      } else if (!empty($answer)) {
        AskMeDB::$instance->insert($question, $answer, $asked_at, $answered_at);
        AskMeDB::$instance->answer($id);
      }
    } else if ($_POST['action'] === 'logout') {
      logout();
      header('Location: login.php');
      die();
    }
  }

  if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $view_layout = 'admin-single.php';
    $question = AskMeDB::$instance->get_inbox($id);
  } else {
    $view_layout = 'admin-list.php';
    $view_all = false;
    $question_list = AskMeDB::$instance->inbox(10);
  }
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

