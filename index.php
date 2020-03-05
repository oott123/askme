<?php
  require_once 'bootstrap.php';

  // AskMeDB::$instance->ask('你好');
  // AskMeDB::$instance->answer(1, '好的');
  // var_dump();

  $view_layout = 'home.php';
  $view_all = false;
  $question_list = AskMeDB::$instance->recent(AskMeConfig::$recent_answers);
  include 'views/layout.php';
