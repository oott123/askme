<?php
  require_once 'bootstrap.php';

  $offset = empty($_GET['offset']) ? 2147483646 : intval($_GET['offset']);
  $partial = !empty($_GET['partial']);

  $view_layout = 'list.php';
  $footer_js = '<script src="scripts/loadmore.js"></script>';
  $view_all = true;
  $question_list = AskMeDB::$instance->recent(AskMeConfig::$list_answers, $offset);

  if ($partial) {
    include 'views/partials/answer-list.php';
  } else {
    include 'views/layout.php';
  }
