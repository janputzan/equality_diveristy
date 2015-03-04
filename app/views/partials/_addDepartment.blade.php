<div class="row">
	{{ Form::open(array('route' => 'admin.departments.store')) }}

		<div class="row">

			<div class="input-field col s12 m4 l4">

				{{ Form::label('First Name') }}
				{{ Form::text('first_name', null, array('class' => 'validate')) }}

				{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}

			</div>

			<div class="input-field col s12 m4 l4">

				{{ Form::label('Last Name') }}
				{{ Form::text('last_name', null, array('class' => 'validate')) }}

				{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}

			</div>

			<div class="input-field col s12 m4 l4">

				{{ Form::label('email') }}
				{{ Form::email('email', null, array('class' => 'validate')) }}

				{{ $errors->first('email', '<span class="help-block">:message</span>') }}

			</div>

		</div>

		<div class="row">

			<div class="input-field col s12 m4 l4">

				{{ Form::label('Department Name') }}
				{{ Form::text('department_name', null, array('class' => 'validate')) }}

				{{ $errors->first('department_name', '<span class="help-block">:message</span>') }}

			</div>

			<div class="input-field col s12 m8 l8">

				{{ Form::label('Info') }}
				{{ Form::text('info', null, array('class' => 'validate')) }}

				{{ $errors->first('info', '<span class="help-block">:message</span>') }}

			</div>

		</div>

		<div class="row">

			
			<div class="input-field col s6 m6 l6">

				{{ Form::submit('Create Department', array('class' => 'btn')) }}

			</div>

			<div class="input-field col s6 m6 l6">

				<a href=" {{ URL::route('admin.departments.index') }}" class="btn right">Cancel</a>

			</div>


		</div>

	{{ Form::close() }}
</div>