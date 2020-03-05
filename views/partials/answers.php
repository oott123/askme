<?php defined('IS_ASK') || die('Direct access not allowed.'); ?>
<a name="answers"></a>
<h2 class="ui header">以前回答过的问题</h2>
<div class="ui middle aligned divided list recent-list">
<?php foreach($question_list as $question): ?>
  <div class="item">
    <div class="right floated content action">
      <a class="small ui button" href="view.php?id=<?=intval($question['id']);?>">查看回答</a>
    </div>
    <div class="content">
      <div class="answer-item-content"><?=nl2br(htmlspecialchars($question['question']));?></div>
      <div class="meta"><span class="ui grey text">回答于 <?=date('Y-m-d H:i', $question['answered_at']);?></span></div>
    </div>
  </div>
<?php endforeach; ?>
</div>

<?php if($view_all): ?>
  <div class="ui center aligned container">
    <div class="ui buttons">
      <button class="ui labeled icon button">
        <i class="left chevron icon"></i>
        上一页
      </button>
      <button class="ui right labeled icon button">
        下一页
        <i class="right chevron icon"></i>
      </button>
    </div>
  </div>
  <p></p>
  <div class="ui container">
    <a class="ui fluid black button" href=".#ask">向我提问！</a>
  </div>
<?php else:?>
<div class="ui grid">
  <div class="eight wide column">
    <a class="ui fluid black button" href=".#ask">向我提问！</a>
  </div>
  <div class="eight wide column">
    <a class="ui fluid button" href="all.php">查看所有问题</a>
  </div>
</div>
<?php endif; ?>
