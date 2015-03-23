<div class="row">
	{{ Form::open(array('route' => 'setPassword')) }}

		<div class="input-field col s12 m12 l12">

			{{ Form::label('password') }}
			{{ Form::password('password', array('class' => 'validate')) }}
			{{ $errors->first('password', '<span class="errors">:message</span>') }}
				<p id="password_message" class="errors"></p>

		</div>

		<div class="input-field col s12 m12 l12">

			{{ Form::label('confirm_password') }}
			{{ Form::password('password_confirmation', array('class' => 'validate')) }}
			{{ $errors->first('password_confirmation', '<span class="errors">:message</span>') }}
				<p id="password_confirmation_message" class="errors"></p>

		</div>

		<div class="input-field col s12 m12 l12">

			{{ Form::submit('Set Password', array('class' => 'btn')) }}

		</div>

		{{ Form::hidden('activation_code', $code) }}

	{{ Form::close() }}
</div>