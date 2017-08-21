jQuery(document).ready(function () {
  // Make Foundation foundate
  $(document).foundation();

  // Formatting help for definition lists
  jQuery('.detail-list dt').each(function () {
    jQuery(this).next('dd').css('min-height', jQuery(this).height());
  });
});
