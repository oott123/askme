<?php
  define('IS_ASK', true);
  date_default_timezone_set('Asia/Shanghai');
  ini_set('display_errors', 'no');

  class AskMeConfig {
    public static $site_title = '我的提问箱'; // 提问箱标题
    public static $site_advertise = '访问 example.com 即可向我匿名提问！'; // 生成图片上显示的宣传文字
    public static $site_avatar = 'https://avatars3.githubusercontent.com/in/15368?s=64&v=4';  // 站点头像
    public static $site_locale = 'zh_CN'; // 站点语言
    public static $site_links = array(
      array('title' => '微博', 'href' => 'https://weibo.com/zaza'),
    ); // 导航栏额外链接。添加太多会导致手机超出屏幕，请自行测试。

    public static $submit_success = '你的问题我已经收到了，回复之后我会在微博或者推特上发布！<br>你也可以常来看看我的提问箱，看看有没有被回复~';  // 提交成功后显示的文字，支持 HTML

    public static $recent_answers = 6;  // 最近回答的列表显示的数量
    public static $list_answers = 10; // 列表显示所有问题时一页的数量

    public static $database = 'sqlite:../private/data.sqlite3'; // sqlite 路径，不要放到站点目录下！

    public static $admin_password = ''; // 管理员密码
    public static $site_secret = '';  // 站点 secret，随便生成，越长越好
  }
