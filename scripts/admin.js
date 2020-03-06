(function () {
  var $btn = $('#get-screenshot');
  $btn.click(function () {
    var $dom = $('.answer-view');
    $dom.addClass('screenshot');
    $btn.addClass('loading');
    $('.img-view').html('');

    requestAnimationFrame(function () {
      var scale = 3;
      var height = $dom[0].offsetHeight;
      var width = $dom[0].offsetWidth;

      domtoimage.toJpeg($dom[0], {
        quality: 0.95,
        height: height * scale,
        width: width * scale,
        style: {
          transform: 'scale(' + scale + ')',
          transformOrigin: 'top left',
          width: width + 'px',
          height: height + 'px'
        }
      })
      .then(function (dataUrl) {
        var link = document.createElement('a');
        link.download = Date.now() + '.jpg';
        link.href = dataUrl;
        link.click();
        $('.img-view').append($('<img style="max-width: 100%; border: 1px solid #ccc;">').attr('src', dataUrl));
      })
      .finally(function () {
        $btn.removeClass('loading');
        $dom.removeClass('screenshot');
      });
    });
  });
})();
