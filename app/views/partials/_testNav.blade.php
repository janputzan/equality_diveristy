<nav class="test">
	<div class="nav-wrapper">
		<div class="container">
			<a href="#!" class="brand-logo">Test</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="#">Quit</a></li>
				<li><a href=" {{ URL::route('logout') }}">Log out</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="#">Quit</a></li>
				<li><a href=" {{ URL::route('logout') }}">Log out</a></li>
			</ul>
		</div>
	</div>
</nav>