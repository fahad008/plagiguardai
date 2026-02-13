<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Wrapper-->
			<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
				<!--begin::Aside mobile toggle-->
				<div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
					<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
					<span class="svg-icon svg-icon-1 mt-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
							<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Aside mobile toggle-->
				<!--begin::Logo-->
				<a href="<?php echo base_url().'admin/dashboard/'; ?>" class="d-flex align-items-center">
					<img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo-demo3-default.svg" class="h-20px" />
				</a>
				<!--end::Logo-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Header-->
	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Container-->
		<div class="container-xxl" id="kt_content_container">
			<div class="d-flex flex-column flex-column-fluid text-center">
				<!--begin::Wrapper-->
				<div class="pt-lg-10 mb-10">
					<!--begin::Logo-->
					<h1 class="fw-bolder fs-2qx text-gray-800 mb-10">HTTP ERROR 403</h1>
					<!--end::Logo-->
					<!--begin::Message-->
					<div class="fw-bold fs-3 text-muted mb-15">Access to plagiguardai was denied </br> You don't have authorization to view this page.</div>
					<!--end::Message-->
					<!--begin::Action-->
					<div class="text-center">
						<a href="<?php echo base_url().'admin/dashboard/'; ?>" class="btn btn-lg btn-primary fw-bolder">Go to Dashboard</a>
					</div>
					<!--end::Action-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Illustration-->
				<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(<?php echo base_url(); ?>assets/media/illustrations/unitedpalms-1/9.png"></div>
				<!--end::Illustration-->
			</div>
		</div>
		<!--end::Container-->
	</div>
	<!--end::Content-->
	<script>var hostUrl = "assets/";</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Footer-->
	<?php $this->load->view('admin/layouts/footer'); ?>
	<!--end::Footer-->
</div>
<!--end::Wrapper-->