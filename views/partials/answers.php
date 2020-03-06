<?php defined('IS_ASK') || die('Direct access not allowed.'); ?>
<a name="answers"></a>
<h2 class="ui header"><?=__('以前回答过的问题');?></h2>
<?php if(empty($question_list)):?>
  <div class="ui positive message">
<?php if(isset($question)):?>
    <p><?=__('没有更早的问题了。');?></p>
<?php else:?>
    <p><?=__('还没有回答过问题。');?></p>
<?php endif;?>
  </div>
<?php else:?>
<div class="ui middle aligned divided list recent-list">
<?php include 'views/partials/answer-list.php'; ?>
</div>
<?php endif;?>

<?php if($view_all): ?>
  <div class="ui container">
    <a class="ui fluid black button" href="javascript:;" id="load-more" data-text-no-more="<?=__('没有更多了');?>" data-text-error="<?=__('加载失败，点击重试');?>"><?=__('查看更多');?></a>
  </div>
  <p></p>
  <div class="ui container">
    <a class="ui fluid button" href=".#ask"><?=__('向我提问！');?></a>
  </div>
<?php else:?>
<div class="ui grid">
  <div class="eight wide column">
    <a class="ui fluid black button" href=".#ask"><?=__('向我提问！');?></a>
  </div>
  <div class="eight wide column">
    <a class="ui fluid button" href="all.php"><?=__('查看所有问题');?></a>
  </div>
</div>
<?php endif; ?>
