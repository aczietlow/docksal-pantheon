(function ($, Drupal, window, document, undefined) {
  Drupal.behaviors.team_member_saturate = {
    attach: function (context, settings) {
      $(".field-name-field-picture").mouseover(function() {
        $(".field-name-field-picture").removeClass('active');
        $(this).addClass('active');
      });

      $(".field-name-field-picture").mouseout(function() {
        $(".field-name-field-picture").removeClass('active');
      });
    }
  }
})(jQuery, Drupal, this, this.document);
