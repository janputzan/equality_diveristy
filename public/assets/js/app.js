$(document).ready(function() {

	$(".button-collapse").sideNav();

	// Dropdown

	$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on click
      alignment: 'left', // Aligns dropdown to left or right edge (works with constrain_width)
      gutter: 0, // Spacing from edge
      belowOrigin: false // Displays dropdown below the button
    });

    $('select').material_select();

    $('.ajaxForm').submit(function(e) {
      e.preventDefault();
      $('.errors').text('');
      $.ajax({
        url: $(this).action,
        type: 'POST',
        data: $(this).serialize(),
        success: function(data) {
          if (data['errors']) {

            $.each( data['errors'], function( key, val ) {
              $('input[name="' + key + '"]').addClass('invalid');
              $('#' + key + '_message').text(val);
            });
          }
          if (data['success']) {

            toast(data['success'], 5000);
            $('.errors').text('');
            $('.ajaxForm').trigger('reset');
          }
        }
      });
    });

    $('form').find('input').focus(function() {
      $(this).removeClass('invalid');
      $(this).next().text('');
    });
    
    $('form').find('span').each(function() {
        if ($(this).text() != '') {
          $(this).siblings().filter('input').addClass('invalid');
        }
    });
});