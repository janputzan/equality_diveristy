@extends('layouts.master')

@section('header')

	@include('partials._adminNav')

@stop

@section('content')

	
			
	<h5>Users</h5> 

	<a class="btn right" href="{{ URL::route('admin.users.add') }}">Add New<i class="mdi-content-add"></i></a>
		
	<div class="divider"></div>

	<table class="striped bordered responsive-table">
	    <thead>
			<tr>
				<th data-field="id">ID</th>
				<th data-field="first_name">First Name</th>
				<th data-field="last_name">Last Name</th>
				<th data-field="email">Email</th>
				<th data-field="last_name">Department</th>
				<th data-field="last_name">Manager</th>
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
					<td> 
						@if ($user->department())
							{{ $user->department()->name }}
						@elseif ($user->manages())
							{{ $user->manages()->name }}
						@else
							none
						@endif
					</td>
					<td> 
						@if ($user->manager())
							{{ $user->manager()->first_name }} {{ $user->manager()->last_name }}
						@else
							none
						@endif
					</td>
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

	

@stop