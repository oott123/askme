<?php defined('IS_ASK') || die('Direct access not allowed.'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=AskMeConfig::$site_title;?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.css" integrity="sha256-bsldvM021p5UCjvLS1wzZRXoL0B0bR5TpK1PxjWQpJY=" crossorigin="anonymous">
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
      <?=__('查看所有问题');?>
      </a>
    </div>
    <?php include 'views/' . $view_layout; ?>
    <div class="ui horizontal divider">
      <i class="pink heart icon"></i>
    </div>
    <p class="copyright">
      <span>Powered by <a href="https://github.com/oott123/askme" target="_blank">AskMe!</a></span>
     |
     <?php if(is_admin()):?>
      <a href="answerme.php">Answer</a>
     <?php else:?>
      <a href="login.php">Login</a>
     <?php endif;?>
     </p>
    <div class="ask-padding"></div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.js"></script>
  <script src="scripts/site.js"></script>
<?php if(is_admin()):?>
  <script src="https://cdn.jsdelivr.net/npm/dom-to-image@2.6.0/src/dom-to-image.js" integrity="sha256-Tw0/gX6aFDMese6GHQJFL/ZjF+f7edyF9okFVY/B9oU=" crossorigin="anonymous"></script>
  <script src="scripts/admin.js"></script>
<?php endif;?>
</body>
</html>
