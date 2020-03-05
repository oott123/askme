<?php
  define('ASK_BASEDIR', dirname(__FILE__));
  require_once ASK_BASEDIR . '/config.php';
  require_once ASK_BASEDIR . '/classes/AskMeDB.php';

  defined('IS_ASK') || die('Direct access not allowed.');

  AskMeDB::$instance = new AskMeDB();
