<a name="answers"></a>
<h2 class="ui header">以前回答过的问题</h2>
<div class="ui middle aligned divided list recent-list">
  <div class="item">
    <div class="right floated content action">
      <a class="small ui button" href="view.php?id=1">查看回答</a>
    </div>
    <div class="content">
      <div class="answer-item-content">咦？原来三三还有不回答的问题吗</div>
      <div class="meta"><span class="ui grey text">回答于 2020-03-04 18:40:14</span></div>
    </div>
  </div>
  <div class="item">
    <div class="right floated content action">
      <div class="small ui button">查看回答</div>
    </div>
    <div class="content">
      <div class="answer-item-content">最近有吃到什么好吃的吗？</div>
      <div class="meta"><span class="ui grey text">回答于 2020-03-01 22:46:22</span></div>
    </div>
  </div>
  <div class="item">
    <div class="right floated content action">
      <div class="small ui button">查看回答</div>
    </div>
    <div class="content">
      <div class="answer-item-content">啊哈！快问快答十五问<br>喜欢苹果还是香蕉<br>甜粽子还是咸的<br>吃饺子蘸醋还是酱油<br>怕冷还是怕热<br>出门要认真打扮还是随便穿啥<br>睡得早还是常熬夜<br>睡觉讨厌吵还是更怕光<br>喜欢热闹还是独自待着<br>看电影看欢乐的还是沉重的<br>看书还是玩游戏<br>跟爸爸亲还是跟妈妈亲<br>有兄弟姐妹还是独生子女<br>不考虑现实去一个国家旅游的话去哪<br>英语和古文哪个更好<br>爱情和亲情哪个重要<br>财富和名声哪个重要<br>有没有注意到已经超过十五问题了</div>
      <div class="meta"><span class="ui grey text">回答于 2020-03-01 12:27:23</span></div>
    </div>
  </div>
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
