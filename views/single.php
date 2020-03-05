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
</div>

<?php if(is_admin()): ?>
<p></p>
<form class="ui form" method="post" action="answerme.php">
  <input type="hidden" name="id" value="<?=htmlspecialchars($question['id'])?>">
  <input type="hidden" name="action" value="delete">
  <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($_COOKIE[ASK_CSRF_TOKEN])?>">
  <button name="submit" type="submit" class="ui fluid negative submit button">删除</button>
</form>
<?php endif;?>

<?php include 'views/partials/ask.php'; ?>
<?php include 'views/partials/answers.php'; ?>
