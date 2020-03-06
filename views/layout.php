<?php defined('IS_ASK') || die('Direct access not allowed.'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=AskMeConfig::$site_title;?></title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="styles/site.css">
</head>
<body>
  <div class="ui text container ask">
    <div class="ui text menu">
      <div class="item">
        <img src="<?=htmlspecialchars(AskMeConfig::$site_avatar);?>" style="height: 2.5em;">
      </div>
      <a class="browse item" href=".">
      <?=AskMeConfig::$site_title;?>
      </a>
      <a class="browse item" href="all.php">
        查看所有问题
      </a>
    </div>
    <?php include 'views/' . $view_layout; ?>
    <div class="ui horizontal divider">
      <i class="pink heart icon"></i>
    </div>
    <p class="copyright">Powered by <a href="https://github.com/oott123/askme" target="_blank">AskMe!</a> | <a href="login.php">Login</a></p>
  </div>
  <div class="ask-padding"></div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.js"></script>
  <script src="scripts/site.js"></script>
</body>
</html>
