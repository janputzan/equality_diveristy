<div class="row">
	{{ Form::open(array('route' => 'admin.users.store')) }}

		<div class="row">

			<div class="input-field col s4 m4 l4">

				{{ Form::label('First Name') }}
				{{ Form::text('first_name', null, array('class' => 'validate')) }}

			</div>

			<div class="input-field col s4 m4 l4">

				{{ Form::label('Last Name') }}
				{{ Form::text('last_name', null, array('class' => 'validate')) }}

			</div>

			<div class="input-field col s4 m4 l4">

				{{ Form::select('department', $departments, null) }}

			</div>

		</div>

		<div class="row">

			<div class="input-field col s12 m12 l12">

				{{ Form::label('email') }}
				{{ Form::email('email', null, array('class' => 'validate')) }}

			</div>

			

			<div class="input-field col s12 m12 l12">

				{{ Form::submit('Invite User', array('class' => 'btn')) }}

			</div>

		</div>

	{{ Form::close() }}
</div>