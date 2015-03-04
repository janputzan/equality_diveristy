@extends('layouts.master')

@section('header')

	@include('partials._adminNav')

@stop

@section('content')

	
			
	<h5>Departments</h5> 

	<a class="btn right" href="{{ URL::route('admin.departments.add') }}">Add New<i class="mdi-content-add"></i></a>
		
	<div class="divider"></div>

	<table class="striped bordered responsive-table">
	    <thead>
			<tr>
				<th data-field="id">ID</th>
				<th data-field="first_name">Name</th>
				<th data-field="last_name">Manager</th>
				<th data-field="info">Info</th>
				<th>Actions</th>
			</tr>
	    </thead>

	    <tbody>
	    	
			@foreach($departments as $department) 

				<tr>

					<td> {{ $department->id }} </td>
					<td> {{ $department->name }} </td>
					<td> {{ User::find($department->manager_id)->first_name }} {{ User::find($department->manager_id)->last_name }} </td>
					<td> {{ $department->info }} </td>
					
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

	<div class="navigation"> {{ $departments->links() }} </div>


	

@stop