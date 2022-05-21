<footer class="footer footer-black">
	<div class="container">
		<div class="row">
			<nav class="footer-nav">
				<ul>
					<li><a href=""><?php echo e(env('AUTHORS_NAME')); ?></a></li>
					<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
					<li><a href="<?php echo e(route('admin.events.index')); ?>">Events Manager</a></li>
					<li><a href="<?php echo e(route('user.about.index')); ?>">About Us</a></li>
				</ul>
			</nav>
			<div class="credits ml-auto">
				<span class="copyright">
					© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <?php echo e(env('AUTHORS_NAME')); ?>

				</span>
			</div>
		</div>
	</div>
</footer>
<?php /**PATH C:\xampp\htdocs\campus-event\resources\views/layouts/admin/footer.blade.php ENDPATH**/ ?>