<?php defined('IS_ASK') || die('Direct access not allowed.'); ?>
<?php if (!empty($_POST['text'])): ?>
<div class="ui negative message">
  <p><?=_('提交失败，请重试一次；如果持续失败，请换个浏览器试试。');?></p>
</div>
<?php endif; ?>
<a name="ask"></a>
<h2 class="ui header"><?=_('向我提问！');?></h2>
<form class="ui form" id="ask-form" method="post" action=".">
  <div class="field">
    <textarea name="text" placeholder="<?=_('任何问题都可以！提问是完全匿名的。');?>"><?=htmlspecialchars(isset($_POST['text']) ? $_POST['text'] : '');?></textarea>
  </div>
  <div class="login">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="text" id="domain" name="domain" value="oott123.com">
    <input type="text" id="js_challenge" name="js_challenge">
  </div>
  <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($_COOKIE[ASK_CSRF_TOKEN])?>">
  <button name="submit" type="submit" class="ui fluid black submit button"><?=_('提交问题');?></button>
</form>
