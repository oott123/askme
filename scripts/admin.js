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
      $('.img-view').append($('<img>').attr('src', dataUrl));
    })
    .finally(function () {
      $btn.removeClass('loading');
      $dom.removeClass('screenshot');
    });
  });
})();
