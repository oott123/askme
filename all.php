<?php
  require_once 'bootstrap.php';

  $offset = empty($_GET['offset']) ? 2147483646 : intval($_GET['offset']);
  $partial = !empty($_GET['partial']);

  $view_layout = 'list.php';
  $view_all = true;
  $deleted_after = is_admin() ? time() : 0;
  $question_list = AskMeDB::$instance->recent(AskMeConfig::$list_answers, $offset, $deleted_after);

  if ($partial) {
    include 'views/partials/answer-list.php';
  } else {
    include 'views/layout.php';
  }
