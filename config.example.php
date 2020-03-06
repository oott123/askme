<?php
  define('IS_ASK', true);
  date_default_timezone_set('Asia/Shanghai');
  ini_set('display_errors', 'no');

  class AskMeConfig {
    public static $site_title = '我的提问箱';
    public static $site_advertise = '访问 example.com 即可向我匿名提问！';
    public static $site_avatar = 'https://http.cat/404';

    public static $submit_success = '你的问题我已经收到了，回复之后我会在微博或者推特上发布！<br>你也可以常来看看我的提问箱，看看有没有被回复~';

    public static $recent_answers = 6;
    public static $list_answers = 10;

    public static $database = 'sqlite:../private/data.sqlite3';

    public static $admin_password = '';
    public static $site_secret = '';
  }
