<div class="row">

	{{ Form::open(array('route' => 'admin.questions.store', 'class' => 'ajaxForm')) }}

		<div class="row">

			<div class="input-field col s6 m6 l6">

				{{ Form::select('characteristic', $characteristics, null) }}

			</div>

			<div class="input-field col s6 m6 l6">

				{{ Form::select('main_area', $mainAreas, null) }}

			</div>

		</div>

		<div class="row">

			<div class="input-field col s12 m12 l12">

				{{ Form::label('Body') }}
				{{ Form::textarea('body', null, array('class' => 'validate materialize-textarea')) }}

				{{ $errors->first('body', '<span class="help-block">:message</span>') }}
				<span id="body_message" class="errors"></span>

			</div>

		</div>

		

		<div class="input-field col s6 m6 l6">

			{{ Form::submit('Add Question', array('name' => 'add-question', 'class' => 'btn')) }}

		</div>

		<div class="input-field col s6 m6 l6">

			<a href=" {{ URL::route('admin.questions.index') }}" class="btn right">Cancel</a>

		</div>

	{{ Form::close() }}

</div>