<footer class="footer footer-black ">
	<div class="container">
		<div class="row">
			<nav class="footer-nav">
				<ul>
					<li><a href="">{{ env('AUTHORS_NAME') }}</a></li>
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('user.events.index') }}">Event List</a></li>
					<li><a href="{{ route('user.about.index') }}">About Us</a></li>
				</ul>
			</nav>
			<div class="credits ml-auto">
				<span class="copyright">
					© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by {{ env('AUTHORS_NAME') }}
				</span>
			</div>
		</div>
	</div>
</footer>
