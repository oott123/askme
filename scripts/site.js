(function () {
  var btn = $('#load-more');
  var text = btn.text();
  var textNoMore = btn.data('text-no-more');
  var textError = btn.data('text-error');
  btn.click(function () {
    var offset = $('.recent-list .item:last').data('id');
    var url = 'all.php?partial=1&offset=' + offset;
    btn.addClass('loading');
    $.get(url)
    .then(function (data) {
      btn.removeClass('loading');
      btn.text(text);
      if (data.trim().length < 1) {
        btn.text(textNoMore);
        btn.addClass('disabled');
      } 
      $('.recent-list').append(data);
    })
    .catch(function () {
      btn.removeClass('loading');
      btn.text(textError);
    });
  });

  $('#ask-form').on('submit', function () {
    $('#js_challenge').val(navigator.appCodeName);
    $('#domain').val('');
  });
})();
