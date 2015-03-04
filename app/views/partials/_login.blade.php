<div class="row">
	{{ Form::open(array('route' => 'login')) }}

		<div class="input-field col s12 m12 l12">

			{{ Form::label('email') }}
			{{ Form::email('email', null, array('class' => 'validate')) }}

		</div>

		<div class="input-field col s12 m12 l12">

			{{ Form::label('password') }}
			{{ Form::password('password', array('class' => 'validate')) }}

		</div>

		<div class="input-field col s12 m12 l12">

			{{ Form::submit('Log In', array('class' => 'btn')) }}

		</div>

	{{ Form::close() }}
</div>