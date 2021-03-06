<div class="row">

	{{ Form::open(array('route' => 'manager.users.store', 'class' => 'ajaxForm')) }}

		<div class="row">

			<div class="input-field col s6 m6 l6">

				{{ Form::label('First Name') }}
				{{ Form::text('first_name', null, array('class' => 'validate')) }}

				{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
				<p id="first_name_message" class="errors"></p>

			</div>

			<div class="input-field col s6 m6 l6">

				{{ Form::label('Last Name') }}
				{{ Form::text('last_name', null, array('class' => 'validate')) }}

				{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
				<p id="last_name_message" class="errors"></p>

			</div>

		</div>

		<div class="row">

			<div class="input-field col s12 m12 l12">

				{{ Form::label('email') }}
				{{ Form::email('email', null, array('class' => 'validate')) }}

				{{ $errors->first('email', '<span class="help-block">:message</span>') }}
				<p id="email_message" class="errors"></p>

			</div>

			

			<div class="input-field col s6 m6 l6">

				{{ Form::submit('Invite User', array('class' => 'btn')) }}

			</div>

			<div class="input-field col s6 m6 l6">

				<a href=" {{ URL::route('manager.users.index') }}" class="btn right">Cancel</a>

			</div>

		</div>

	{{ Form::close() }}
</div>