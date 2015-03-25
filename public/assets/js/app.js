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
      $('.progress').show();
      $(this).find('input[type=submit]').prop('disabled', true);
      e.preventDefault();
      $('.errors').text('');
      $.ajax({
        url: $(this).action,
        type: 'POST',
        data: $(this).serialize(),
        success: function(data) {

          $('.progress').hide();
          $('.ajaxForm').find('input[type=submit]').prop('disabled', false);
          if (data['errors']) {

            $.each( data['errors'], function( key, val ) {
              $('[name="' + key + '"]').addClass('invalid');
              $('#' + key + '_message').text(val);
            });
          }
          if (data['success']) {

            toast(data['success'], 5000);
            $('.errors').text('');
            $('.ajaxForm').trigger('reset');

            if (data['question_id']) {

              $('#question-body').find('span').text(data['question_body']);
              $('#characteristic').find('span').text(data['characteristic']);
              $('#main_area').find('span').text(data['main_area']);
              $('#question_id').val(data['question_id']);

              $('#add-answers').openModal({
                dismissible: false, // Modal can be dismissed by clicking outside of the modal
                opacity: .5, // Opacity of modal background
                in_duration: 300, // Transition in duration
                out_duration: 200 // Transition out duration
              });

              // this prevents reloading

              window.onbeforeunload = function() {

                      return "Please add all answers first. If you reload now, all answers will be lost.";
                  }
            }
          }
        }
      });
    });

    $('.ajaxForm-answers').submit(function(e) {
      $('#add-answers .progress').show();
      $(this).find('input[type=submit]').prop('disabled', true);
      e.preventDefault();
      $('.errors').text('');
      $.ajax({
        url: 'http://' + window.location.host + '/admin/questions/add/answers',
        type: 'POST',
        data: $(this).serialize(),
        success: function(data) {

          $('#add-answers .progress').hide();
          $('.ajaxForm-answers').find('input[type=submit]').prop('disabled', false);
          if (data['errors']) {

            $.each( data['errors'], function( key, val ) {
              $('[name="' + key + '"]').addClass('invalid');
              $('#' + key + '_message').text(val);
            });
          }
          if (data['success']) {

            toast(data['success'], 5000);
            $('#add-answers').closeModal();
            
            window.onbeforeunload = null;
        }
      }});
    });

    $('form').find('input, textarea').focus(function() {
      $(this).removeClass('invalid');
      $(this).next().text('');
    });
    
    $('form').find('span').each(function() {
        if ($(this).text() != '') {
          $(this).siblings().filter('input, textarea').addClass('invalid');
        }
    });

 
    // context menu for questions

    $('.question').find('i').parent().mousedown(function(e){ 
        if( e.button == 2 ) { 
          $(this).on('contextmenu', function(e) {
              e.preventDefault();
          }); 
          $(this).next().show();
          return false; 
        } 
        return true; 
      });

    // set clicking on body to hide actions
    $('body').click(function() {
      $('.actions').hide();
    });
    // this will be action for clicking on options
    $('.actions li').click(function(e) {
      e.preventDefault();
      console.log($(this));
    })

});

