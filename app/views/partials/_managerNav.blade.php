<nav class="manager">
	<div class="nav-wrapper">
		<div class="container">
			<a href="{{URL::route('manager.dashboard')}}" class="brand-logo">Manager Panel <span class="department">{{$currentUser->manages()->name}}</span></a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="{{ URL::route('manager.users.index') }}">Users</a></li>
				<li><a href="{{URL::route('manager.results.show')}}">Results</a></li>
				<li><a href=" {{ URL::route('logout') }}">Log out</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="{{ URL::route('manager.users.index') }}">Users</a></li>
				<li><a href="{{URL::route('manager.results.show')}}">Results</a></li>
				<li><a href=" {{ URL::route('logout') }}">Log out</a></li>
			</ul>
		</div>
	</div>
</nav>