<?php defined('IS_ASK') || die('Direct access not allowed.'); ?>

<div class="answer-view">
  <div class="question">
    <div class="ui fluid card">
      <div class="content">
        <div class="description">
          <p><?=nl2br(htmlspecialchars($question['question']));?></p>
        </div>
        <div class="meta"><?=date('Y-m-d H:i', $question['asked_at']);?></div>
      </div>
    </div>
  </div>
  <p></p>
  <div class="answer">
    <div class="ui fluid card">
      <div class="content">
        <div class="description">
          <p><?=nl2br(htmlspecialchars($question['answer']));?></p>
        </div>
        <div class="meta"><?=date('Y-m-d H:i', $question['answered_at']);?></div>
      </div>
    </div>
  </div>
  <p></p>
  <p class="img-message">
    <?=__('问题来自');?> <a href="."><?=AskMeConfig::$site_title;?></a><br>
    <span><?=AskMeConfig::$site_advertise;?></span>
  </p>
</div>
<div class="img-view"></div>

<?php if(is_admin()): ?>
<p></p>
<form class="ui form" method="post" action="answerme.php">
  <input type="hidden" name="id" value="<?=htmlspecialchars($question['id'])?>">
  <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($_COOKIE[ASK_CSRF_TOKEN])?>">
  <div class="ui grid">
    <div class="eight wide column">
      <button id="get-screenshot" type="button" class="ui fluid button"><?=__('生成图片');?></a>
    </div>
    <div class="eight wide column">
<?php if($question['deleted_at']): ?>
  <input type="hidden" name="action" value="recover">
  <button name="submit" type="submit" class="ui fluid positive submit button"><?=__('恢复');?></button>
<?php else: ?>
  <input type="hidden" name="action" value="delete">
  <button name="submit" type="submit" class="ui fluid negative submit button"><?=__('删除');?></button>
<?php endif; ?>
    </div>
  </div>
</form>
<?php endif;?>

<?php include 'views/partials/ask.php'; ?>
<?php include 'views/partials/answers.php'; ?>
