<div id="test-finished">

		<h5>Your result is <span id="total-right"></span> out of 27 right.</h5>

		<div class="divider"></div>

		<div class="start-test-container row">

			<!-- <ul class="collection" id="results-list"></ul> -->

				<div class="col s2 m3 l3">

					<ul class="collection with-header">

						@foreach ($characteristics as $characteristic)

							<li class="collection-item characteristic ch-res" data-category="{{ $characteristic->id }}"><a href="#">{{ $characteristic->name }}</a></li>

						@endforeach
					</ul>

				</div>

				<div class="col s10 m9 l9">

					<ul class="collapsible border-bottom collection" id="results-list" data-collapsible="accordion">

							<!-- <li class="question collection-item">
								<div class="collapsible-header">???</div>
								<div class="collapsible-body">
									<ul class="collection answers">
										<li class="collection-item answer">???<i class="mdi-action-done right"></i></li>
									</ul>
								</div>
							</li> -->
					</ul>

				</div>

			</div>

			<a class="waves-effect waves-light btn-large controls" id="go-back" href="{{URL::route('user.dashboard')}}">back to dashboard</a>

		</div>

	</div>

	<script>
	var total_right = 0;
	var result_list = '';
	var _len = results.length;
	for (var i = 0; i<_len; i++) {

		var icon;
		var question 		= results[i].question;
		var answer 			= results[i].answer;
		var category_id = results[i].category_id;
		
		if (results[i].result != 0) {
			icon = '<i class="mdi-action-done right"></i>';
			total_right++;
		} else {
			icon = '<i class="mdi-alert-error right"></i>';
		}
		if (_category_id == category_id) {

		result_list +=  '<li class="collection-item"><div class="collapsible-header">' 
										+ question 
										+ icon 
										+ '</div><div class="collapsible-body"><ul class="collection"><li class="collection-item">' 
										+ answer 
										+ '</li></ul></div></li>';
		}
	}

	console.log(result_list);
	$('#results-list').append(result_list);
	showStaggeredList('#results-list');
	$('#after-start').slideUp(500);
	$('#total-right').text(total_right);
	$('#test-finished').fadeIn(500);
	</script>