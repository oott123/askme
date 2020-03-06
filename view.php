<?php
  require_once 'bootstrap.php';

  $id = intval($_GET['id']);

  $view_layout = 'single.php';
  $view_all = false;
  $question = AskMeDB::$instance->get($id);

  if (empty($question) || $question['deleted_at'] > 0) {
    $question = null;
    $view_layout = 'message.php';
    $message_title = '找不到回答';
    $message_body = '回答不存在，或者问题已经被删除了 :(';
    header('HTTP/1.1 404 Not Found');
  } else {
    $question_list = AskMeDB::$instance->recent(AskMeConfig::$recent_answers, $id);
  }

  include 'views/layout.php';
