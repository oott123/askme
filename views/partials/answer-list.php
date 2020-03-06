<?php foreach($question_list as $question): ?>
<?php $classes = $question['deleted_at'] ? ' deleted' : '' ;?>
  <div class="item<?=$classes;?>" data-id="<?=$question['id'];?>">
    <div class="right floated content action">
      <a class="small ui button" href="view.php?id=<?=intval($question['id']);?>"><?=_('查看回答');?></a>
    </div>
    <div class="content">
      <div class="answer-item-content"><?=nl2br(htmlspecialchars($question['question']));?></div>
      <div class="meta">
        <span class="ui grey text"><?=_('回答于');?> <?=date('Y-m-d H:i', $question['answered_at']);?></span>
        <?php if($question['deleted_at']):?>
        <span class="ui grey text"><?=_(', 删除于');?> <?=date('Y-m-d H:i', $question['deleted_at']);?></span>
        <?php endif;?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
