<?php
  require_once 'bootstrap.php';

  $id = intval($_GET['id']);

  $view_layout = 'single.php';
  $view_all = false;
  $question = AskMeDB::$instance->get($id);
  $question_list = AskMeDB::$instance->recent(AskMeConfig::$recent_answers, $id);
  include 'views/layout.php';
