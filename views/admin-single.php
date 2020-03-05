<?php defined('IS_ASK') || die('Direct access not allowed.'); ?>
<h2>回答问题</h2>
<form class="ui form" method="post" action="answerme.php">
  <div class="field">
    <textarea name="question"><?=htmlspecialchars($question['question']);?></textarea>
  </div>
  <div class="field">
    <textarea name="answer" placeholder="回答"></textarea>
  </div>
  
  <div class="field">
    <div class="ui checkbox">
      <input type="checkbox" id="delete" value="yes" name="delete">
      <label for="delete">不回答而是直接删除这个问题</label>
    </div>
  </div>
  <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($_COOKIE[ASK_CSRF_TOKEN])?>">
  <input type="hidden" name="asked_at" value="<?=htmlspecialchars($question['asked_at']);?>">
  <input type="hidden" name="id" value="<?=htmlspecialchars($question['id']);?>">
  <button name="submit" type="submit" class="ui fluid black submit button">提交</button>
</form>
