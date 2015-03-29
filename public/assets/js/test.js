var question_id, answer_id;

$(document).ready(function() {

		/* Getting Questions Ajax */
		$('#get-next-question').click(function(e) {

			e.preventDefault();

			$('.progress').show();
			$('#preloader-spin').show();
			getNextQuestion($(this));
			
		});

		$('#answers-list').find('li').click(function(e) {
			e.preventDefault();
			$('#answers-list').find('li').removeClass('active');
			$(this).addClass('active');
			answer_id = $(this).data('answer');

			$('#get-next-question').attr('disabled', false);
		})
		
		

		showStaggeredList('#answers-list');

});

function getNextQuestion(trigger) {

	$(trigger).attr('disabled', true);

	question_id = $('#test-question-body').data('question');

	$('#answers-list').find('li').css('opacity', 0);

	$.ajax({
		url: 'http://' + window.location.host + '/test/next',
		type: 'POST',
		data: {
			'test_id': Equality.test_id,
			'question_id': question_id,
			'answer_id': answer_id
		},
		success: function(data) {

			if (data['finished']) {

				$('#test-result').text(data['result']);

				$('#after-start').hide();

				$('#test-finished').openModal({
					dismissible: false, // Modal can be dismissed by clicking outside of the modal
					opacity: .5, // Opacity of modal background
					in_duration: 300, // Transition in duration
					out_duration: 200 // Transition out duration
				});

			} else {

				var answers = data['answers'];

				answers.randomize();

				$('#questions-count').text(data['count']);
				$('#category-name').text(data['category'])
				$('#test-question-body').text(data['question_body']).data('question', data['question_id']);
				$('#answers-list').find('li').each(function(i) {
					$(this).text(answers[i]['answer_body']).data('answer', answers[i]['answer_id']);
				});
				$('#preloader-spin').hide();
				$('#answers-list').find('li').removeClass('active');
				showStaggeredList('#answers-list');
				$('.progress').hide();
			}

		}
	});
}
