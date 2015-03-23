<div id="add-answers" class="modal">


	<div class="modal-content">

		

		<h4>Add Answers</h4>

		<div id="question-details">

			<p id="question-body">Question: <span></span></p>
			<p id="characteristic">Characteristic: <span></span></p>
			<p id="main_area">Main Area: <span></span></p>

		</div>

		{{ Form::open(array('route' => 'admin.answers.store', 'class' => 'ajaxForm-answers')) }}

		<input id ="question_id" name="_question_id" value="" type="hidden" />


		<div class="row">


			<div class="input-field col s10 m10 l10">

				{{ Form::label('answer_1', 'Answer 1') }}
				{{ $errors->first('answer_1', '<span class="help-block">:message</span>') }}
				<p id="answer_1_message" class="errors"></p>
				{{ Form::textarea('answer_1', null, array('class' => 'validate materialize-textarea')) }}

			</div>
			<p>
				<input name="right_answer" class="with-gap" type="radio" id="right_answer_1" value="1"/>
				{{ Form::label('right_answer_1', 'Right')}}


			</p>

		</div>
		<div class="row">

			<div class="input-field col s10 m10 l10">

				{{ Form::label('answer_2', 'Answer 2') }}
				{{ Form::textarea('answer_2', null, array('class' => 'validate materialize-textarea')) }}
				{{ $errors->first('answer_2', '<span class="help-block">:message</span>') }}
				<p id="answer_2_message" class="errors"></p>

			</div>
			<p>

				<input name="right_answer" class="with-gap" type="radio" id="right_answer_2" value="2"/>
				{{ Form::label('right_answer_2', 'Right')}}


			</p>
		</div>
		<div class="row">

			<div class="input-field col s10 m10 l10">

				{{ Form::label('answer_3', 'Answer 3') }}
				{{ Form::textarea('answer_3', null, array('class' => 'validate materialize-textarea')) }}
				{{ $errors->first('answer_3', '<span class="help-block">:message</span>') }}
				<p id="answer_3_message" class="errors"></p>

			</div>
			<p>

				<input name="right_answer" class="with-gap" type="radio" id="right_answer_3" value="3"/>
				{{ Form::label('right_answer_3', 'Right')}}


			</p>
		</div>
		<div class="row">

			<div class="input-field col s10 m10 l10">

				{{ Form::label('answer_4', 'Answer 4') }}
				{{ Form::textarea('answer_4', null, array('class' => 'validate materialize-textarea')) }}
				{{ $errors->first('answer_4', '<span class="help-block">:message</span>') }}
				<p id="answer_4_message" class="errors"></p>

			</div>
			<p>

				<input name="right_answer" class="with-gap" type="radio" id="right_answer_4" value="4"/>
				{{ Form::label('right_answer_4', 'Right')}}


			</p>

		</div>

		
		<div class="input-field col s6 m6 l6">

			{{ Form::submit('Add Answers', array('name' => 'add-answers', 'class' => 'btn')) }}

			<p id="right_answer_message" class="errors"></p>

		</div>

	</div>

	<div class="modal-footer">

		<div class="progress">

			<div class="indeterminate"></div>

		</div>
		
	</div>

	{{ Form::close() }}

</div>