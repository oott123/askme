(function () {
  var $btn = $('#get-screenshot');
  $btn.click(function () {
    var $dom = $('.answer-view');
    $dom.addClass('screenshot');
    $btn.addClass('loading');
    $('.img-view').html('');

    domtoimage.toJpeg($dom[0], { quality: 0.95 })
    .then(function (dataUrl) {
      var link = document.createElement('a');
      link.download = Date.now() + '.jpg';
      link.href = dataUrl;
      link.click();
      link.innerText = '下载图片';
      $('.img-view').append(link);
    })
    .finally(function () {
      $btn.removeClass('loading');
      $dom.removeClass('screenshot');
    });
  });
})();
