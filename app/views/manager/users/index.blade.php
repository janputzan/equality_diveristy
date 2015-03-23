@extends('layouts.master')

@section('header')

	@include('partials._managerNav')

@stop

@section('content')

	
			
	<h5>Users</h5> 

	<a class="btn right" href="{{ URL::route('manager.users.add') }}">Add New<i class="mdi-content-add"></i></a>
		
	<div class="divider"></div>

	@if ($users->count() > 0)

	<table class="striped bordered responsive-table">
	    <thead>
			<tr>
				<th data-field="id">ID</th>
				<th data-field="first_name">First Name</th>
				<th data-field="last_name">Last Name</th>
				<th data-field="email">Email</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
	    </thead>

	    <tbody>
	    	
			@foreach($users as $user) 

				<tr>

					<td> {{ $user->id }} </td>
					<td> {{ $user->first_name }} </td>
					<td> {{ $user->last_name }} </td>
					<td> {{ $user->email }} </td>
					<td>{{ ($user->active) ? 'active' : 'invited' }}</td>
					<td>
						<a class="dropdown-button" href="#" data-activates="dropdown1">Actions</a>

						<ul id="dropdown1" class="dropdown-content">
							<li><a href="#!">Edit</a></li>
							<li class="divider"></li>
							<li><a href="#!">Delete</a></li>
						</ul>
					</td>
				</tr>

			@endforeach

	    </tbody>

	</table>

	<div class="navigation"> {{ $users->links() }} </div>

	@else

		<p>Please invite New Users.</p>

	@endif

@stop