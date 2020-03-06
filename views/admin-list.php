<?php defined('IS_ASK') || die('Direct access not allowed.'); ?>

<h2 class="ui header">新的问题</h2>
<?php if(!empty($question_list)):?>
<div class="ui middle aligned divided list recent-list">
<?php foreach($question_list as $question): ?>
  <div class="item" data-id="<?=$question['id'];?>">
    <div class="right floated content action">
      <a class="small ui button" href="answerme.php?id=<?=intval($question['id']);?>">回答</a>
    </div>
    <div class="content">
      <div class="answer-item-content"><?=nl2br(htmlspecialchars($question['question']));?></div>
      <div class="meta"><span class="ui grey text">提问于 <?=date('Y-m-d H:i', $question['asked_at']);?></span></div>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?php else: ?>
  <div class="ui positive message">
    <p>没有新问题。</p>
  </div>
<?php endif; ?>

<p></p>
<form class="ui form" method="post" action="answerme.php">
  <input type="hidden" name="action" value="logout">
  <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($_COOKIE[ASK_CSRF_TOKEN])?>">
  <button name="submit" type="submit" class="ui fluid submit button">登出</button>
</form>
