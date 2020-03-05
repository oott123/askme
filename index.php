<?php
  require_once 'bootstrap.php';

  if (check_submit()) {
    $view_layout = 'message.php';
    $message_title = '提交成功';
    $message_body = '你的问题我已经收到了，回复之后我会在微博或者推特上发布！<br>你也可以常来看看我的提问箱，看看有没有被回复~';
    include 'views/layout.php';
  } else {
    $view_layout = 'home.php';
    $view_all = false;
    $question_list = AskMeDB::$instance->recent(AskMeConfig::$recent_answers);
    include 'views/layout.php';
  }

  function check_submit() {
    if (!isset($_POST['submit'])) {
      return false;
    }
    if (empty($_POST['text'])) {
      return false;
    }
    if (empty($_COOKIE[ASK_CSRF_TOKEN])) {
      return false;
    }
    if ($_POST['csrf_token'] !== $_COOKIE[ASK_CSRF_TOKEN]) {
      return false;
    }
    if (!empty($_POST['username'])) {
      return false;
    }
    if (!empty($_POST['password'])) {
      return false;
    }
    if ($_POST['js_challenge'] !== 'Mozilla') {
      return false;
    }
    if (!empty($_POST['domain'])) {
      return false;
    }

    return true;
  }

