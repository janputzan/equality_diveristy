<div class="row">

	{{ Form::open(array('route' => 'admin.departments.store', 'class' => 'ajaxForm')) }}

		<div class="progress">

			<div class="indeterminate"></div>

		</div>
		
		<div class="row">

			<div class="input-field col s12 m6 l6">

				{{ Form::label('First Name') }}
				{{ Form::text('first_name', null, array('class' => 'validate')) }}

				{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
				<span id="first_name_message" class="errors"></span>

			</div>

			<div class="input-field col s12 m6 l6">

				{{ Form::label('Last Name') }}
				{{ Form::text('last_name', null, array('class' => 'validate')) }}

				{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
				<span id="last_name_message" class="errors"></span>

			</div>

		</div>

		<div class="row">

			<div class="input-field col s12 m6 l6">

				{{ Form::label('email') }}
				{{ Form::email('email', null, array('class' => 'validate')) }}

				{{ $errors->first('email', '<span class="help-block">:message</span>') }}
				<span id="email_message" class="errors"></span>

			</div>
			<div class="input-field col s12 m6 l6">

				{{ Form::label('Department Name') }}
				{{ Form::text('name', null, array('class' => 'validate')) }}

				{{ $errors->first('name', '<span class="help-block">:message</span>') }}
				<span id="name_message" class="errors"></span>

			</div>

		</div>

		<div class="row">

			<div class="input-field col s12 m12 l12">

				{{ Form::label('Info') }}
				{{ Form::textarea('info', null, array('class' => 'validate materialize-textarea')) }}

				{{ $errors->first('info', '<span class="help-block">:message</span>') }}
				<span id="info_message" class="errors"></span>

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