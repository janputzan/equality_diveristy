<nav>
	<div class="nav-wrapper">
		<div class="container">
			<a href="#!" class="brand-logo">Admin Panel</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="{{ URL::route('admin.users.index') }}">Users</a></li>
				<li><a href="{{ URL::route('admin.departments.index') }}">Departments</a></li>
				<li><a href="#">Results</a></li>
				<li><a href="{{ URL::route('admin.questions.index') }}">Questions</a></li>
				<li><a href="#">Settings</a></li>
				<li><a href=" {{ URL::route('logout') }}">Log out</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="{{ URL::route('admin.users.index') }}">Users</a></li>
				<li><a href="{{ URL::route('admin.departments.index') }}">Departments</a></li>
				<li><a href="#">Results</a></li>
				<li><a href="{{ URL::route('admin.questions.index') }}">Questions</a></li>
				<li><a href="#">Settings</a></li>
				<li><a href=" {{ URL::route('logout') }}">Log out</a></li>
			</ul>
		</div>
	</div>
</nav>