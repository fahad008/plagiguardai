<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
	<!--begin::Container-->
	<div class="container d-flex flex-column flex-md-row flex-stack">
		<!--begin::Copyright-->
		<div class="text-dark order-2 order-md-1">
			<span class="text-gray-400 fw-bold me-1">Created by</span>
			<a href="<?php base_url().'dashboard/'; ?>" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">PlagiGuardAI</a>
		</div>
		<!--end::Copyright-->
		<?php if (isset($footer_links) && !empty($footer_links)) { ?>
		<!--begin::Menu-->
		<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
			<?php foreach ($footer_links as $key => $value) {?>
			<li class="menu-item">
				<a href="<?php echo $value['link']; ?>" class="menu-link px-2"><?php echo $value['title']; ?></a>
			</li>
			<?php } ?>
		</ul>
		<!--end::Menu-->
		<?php } ?>
	</div>
	<!--end::Container-->
</div>