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
				url: 'http://' + window.location.host + '/index.php/admin/questions/add/answers',
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
		});


		//start test
		$('#start-test').click(function(e) {
			e.preventDefault();
				startTest();
		});
		/* Getting Questions Ajax */
		$('#get-next-question').click(function(e) {

			e.preventDefault();

			$('.progress').show();
			getNextQuestion();
			
		});
		$('#finish-test').click(function(e) {
			e.preventDefault();
			testFinished(1);
		});

		$('.ch-res').click(function(e) {
			e.preventDefault();
			$('.ch-res').removeClass('active');
			testFinished($(this).data('category'));
			$(this).addClass('active');
		})

		// show flas messages 
		if ($('.message').text() != '') {

			toast($('.message').text(), 3000);
		}


});



var question_id, answer_id, results;

function getNextQuestion() {

	window.onbeforeunload = function() {
				return "You might experience a glitch or two if you refresh. Proceed with caution.";
			}

	$('.question-container').fadeOut(500, function() {
		
		$('#get-next-question').attr('disabled', true);
		$('#get-prev-question').attr('disabled', true);


console.log(question_id + ' ------ ' + answer_id);

		$.ajax({
			type: 'GET',
			data: {'question_id': question_id,
							'answer_id': answer_id},
			url: $('#get-next-question').data('action'),
			success: function(data) {

				if (data['status']) {

					if (data['status'] == 2) {

						results = data['results'];

						testFinished(1);

						console.log(data['results']);

						return false;
					}

					// update question count
					$('#questions-count').text(data['count']);
					// update question body
					$('#test-question-body').text(data['question_body']).data('question_id', data['question_id']);
					// remove all answers
					$('.answers-container').find('li').remove();
					// randomize answers
					data['answers'].randomize();
					// update answers
					$(data['answers']).each(function(i) {
						$('.answers-container').find('ul')
							.append('<li class="collection-item" data-answer_id="' 
								+ data['answers'][i]['id'] 
								+ '">' 
								+ data['answers'][i]['body'] 
								+ '</li>');
					});
					// set on click action
					$('#answers-list').find('li').click(function(e)  {
						$(this).siblings().removeClass('active');
						$(this).addClass('active');
						$('#get-next-question').attr('disabled', false);
						question_id = $('#test-question-body').data('question_id');
						answer_id = $(this).data('answer_id');
					});
					// show question container
					showStaggeredList('#answers-list');
					$('.question-container').fadeIn(100, function() {
						$('.progress').hide();
					});

				} else {

					console.log('status: 0');
				}
			}
		});
		
	})

	return false;
}

function testFinished(_category_id) {

	window.onbeforeunload = null;

	console.log(results.length);

	
	
}

function checkIfStarted() {

	console.log('hi');

	if (Equality.test_started == 1) {

			// $('#before-start').fadeOut(500, function() {

			// 	$('#after-start').slideDown(500);
				
			// });

			getNextQuestion();
		} 
	// else {

	// 	$('#before-start').show();
	// }

	return false;
}

function startTest() {

	
			

			$('#before-start').fadeOut(500, function() {

				$('#after-start').slideDown(500);
				
			});

			$('.progress').show();

			$.ajax({
				type: 'POST',
				url: $(this).data('action'),
				success: function (data) {
					if (data['status']) {

						getNextQuestion();


						console.log('test started');
					
					}
				}
			});
}

Array.prototype.randomize = function (){
		this.sort(
				function(a,b) {
						return Math.round( Math.random() * 2 ) - 1;
				}
		);
};