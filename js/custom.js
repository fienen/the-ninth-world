$(document).ready(function () {
  // Make Foundation foundate
  $(document).foundation();

  // Formatting help for definition lists
  $('.detail-list dt').each(function () {
    $(this).next('dd').css('min-height', $(this).height());
  });
});
