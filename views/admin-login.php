<?php defined('IS_ASK') || die('Direct access not allowed.'); ?>
<form class="ui form" method="post" action="login.php">
  <div class="field">
    <input type="password" name="password" placeholder="密码">
  </div>
  <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($_COOKIE[ASK_CSRF_TOKEN])?>">
  <button name="submit" type="submit" class="ui fluid black submit button">登录</button>
</form>
