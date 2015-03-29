<nav class="user">
	<div class="nav-wrapper">
		<div class="container">
			<a href="{{URL::route('user.dashboard')}}" class="brand-logo">User Panel <span class="department">{{$currentUser->department()->name}}</span></a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href=" {{ URL::route('logout') }}">Log out</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href=" {{ URL::route('logout') }}">Log out</a></li>
			</ul>
		</div>
	</div>
</nav>