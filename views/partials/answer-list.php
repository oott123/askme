<?php foreach($question_list as $question): ?>
  <div class="item" data-id="<?=$question['id'];?>">
    <div class="right floated content action">
      <a class="small ui button" href="view.php?id=<?=intval($question['id']);?>">查看回答</a>
    </div>
    <div class="content">
      <div class="answer-item-content"><?=nl2br(htmlspecialchars($question['question']));?></div>
      <div class="meta"><span class="ui grey text">回答于 <?=date('Y-m-d H:i', $question['answered_at']);?></span></div>
    </div>
  </div>
<?php endforeach; ?>
