<?php
  define('ASK_BASEDIR', dirname(__FILE__));
  define('ASK_CSRF_TOKEN', 'askme_csrf_token');
  require_once ASK_BASEDIR . '/config.php';
  require_once ASK_BASEDIR . '/classes/AskMeDB.php';

  defined('IS_ASK') || die('Direct access not allowed.');

  if (!isset($_COOKIE[ASK_CSRF_TOKEN])) {
    setcookie(ASK_CSRF_TOKEN, uniqid(true));
  }

  AskMeDB::$instance = new AskMeDB();
