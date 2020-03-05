<?php defined('IS_ASK') || die('Direct access not allowed.'); ?>

<h2 class="ui header">新的问题</h2>
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
