<?php
  define('ASK_BASEDIR', dirname(__FILE__));
  define('ASK_CSRF_TOKEN', 'askme_csrf_token');
  require_once ASK_BASEDIR . '/config.php';
  require_once ASK_BASEDIR . '/classes/AskMeDB.php';

  defined('IS_ASK') || die('Direct access not allowed.');

  if (empty(AskMeConfig::$admin_password) || empty(AskMeConfig::$site_secret)) {
    die('No admin password or site secret given! Edit your config.php.');
  }

  if (!isset($_COOKIE[ASK_CSRF_TOKEN])) {
    setcookie(ASK_CSRF_TOKEN, uniqid(true));
  }

  AskMeDB::$instance = new AskMeDB();

  function is_admin() {
    if (!isset($_COOKIE['askme_token']) || !isset($_COOKIE['askme_token_expire'])) {
      return false;
    }

    $token = $_COOKIE['askme_token'];
    $expire_at = $_COOKIE['askme_token_expire'];
    if ($expire_at - time() < 0) {
      return false;
    }

    $ok = get_token($expire_at);

    return hash_equals($ok, $token);
  }

  function login($password) {
    if (hash_equals(AskMeConfig::$admin_password, $password)) {
      $expire_at = time() + 30 * 24 * 60 * 60;
      setcookie('askme_token', get_token($expire_at), $expire_at);
      setcookie('askme_token_expire', $expire_at, $expire_at);
    }
  }

  function logout() {
    setcookie('askme_token', '', 0);
    setcookie('askme_token_expire', '', 0);
  }

  function get_token($expire_at) {
    return sha1(AskMeConfig::$site_secret . $expire_at . AskMeConfig::$admin_password);
  }

  if (!function_exists('_')) {
    function _($message) {
      return $message;
    }
  }
