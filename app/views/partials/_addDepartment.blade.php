<div class="row">
	{{ Form::open(array('route' => 'admin.departments.store')) }}

		<div class="row">

			<div class="input-field col s12 m4 l4">

				{{ Form::label('First Name') }}
				{{ Form::text('first_name', null, array('class' => 'validate')) }}

			</div>

			<div class="input-field col s12 m4 l4">

				{{ Form::label('Last Name') }}
				{{ Form::text('last_name', null, array('class' => 'validate')) }}

			</div>

			<div class="input-field col s12 m4 l4">

				{{ Form::label('email') }}
				{{ Form::email('email', null, array('class' => 'validate')) }}

			</div>

		</div>

		<div class="row">

			<div class="input-field col s12 m4 l4">

				{{ Form::label('Department Name') }}
				{{ Form::text('department_name', null, array('class' => 'validate')) }}

			</div>

			<div class="input-field col s12 m8 l8">

				{{ Form::label('Info') }}
				{{ Form::text('info', null, array('class' => 'validate')) }}

			</div>

		</div>

		<div class="row">

			
			<div class="input-field col s12 m12 l12">

				{{ Form::submit('Create Department', array('class' => 'btn')) }}

			</div>


		</div>

	{{ Form::close() }}
</div>