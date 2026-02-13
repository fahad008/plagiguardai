<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Plans</h1>
				<!--end::Heading-->
			</div>
			<!--end::Page title=-->
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
				<a href="<?php echo base_url().'admin/dashboard'; ?>" class="d-flex align-items-center">
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
			<?php if (isset($plan_info) && !empty($plan_info)) {?>
			<div class="row g-6 g-xl-9">
				<?php foreach ($plan_info as $key => $value) { ?>
				<!--begin::Col-->
				<div class="col-md-6 col-xl-4">
					<!--begin::Card-->
					<a href="<?php echo base_url().'admin/plans/edit/'.$value['id']; ?>" class="card border border-2 border-gray-300 border-hover">
						<!--begin::Card header-->
						<div class="card-header border-0 pt-9">
							<!--begin::Card Title-->
							<div class="card-title m-0">
								<!--begin::Avatar-->
								<div class="symbol symbol-50px me-2">
									<span class="symbol-label bg-light-<?php echo $value['color']; ?>">
										<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
										<span class="svg-icon svg-icon-3x svg-icon-<?php echo $value['color']; ?>">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M14 18V16H10V18L9 20H15L14 18Z" fill="black"/>
											<path opacity="0.3" d="M20 4H17V3C17 2.4 16.6 2 16 2H8C7.4 2 7 2.4 7 3V4H4C3.4 4 3 4.4 3 5V9C3 11.2 4.8 13 7 13C8.2 14.2 8.8 14.8 10 16H14C15.2 14.8 15.8 14.2 17 13C19.2 13 21 11.2 21 9V5C21 4.4 20.6 4 20 4ZM5 9V6H7V11C5.9 11 5 10.1 5 9ZM19 9C19 10.1 18.1 11 17 11V6H19V9ZM17 21V22H7V21C7 20.4 7.4 20 8 20H16C16.6 20 17 20.4 17 21ZM10 9C9.4 9 9 8.6 9 8V5C9 4.4 9.4 4 10 4C10.6 4 11 4.4 11 5V8C11 8.6 10.6 9 10 9ZM10 13C9.4 13 9 12.6 9 12V11C9 10.4 9.4 10 10 10C10.6 10 11 10.4 11 11V12C11 12.6 10.6 13 10 13Z" fill="black"/>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<!--end::Avatar-->
							</div>
							<!--end::Car Title-->
							<!--begin::Card toolbar-->
							<div class="card-toolbar">
								<span class="badge badge-light-<?php echo $value['color']; ?> fw-bolder me-auto px-4 py-3"> <?php echo $value['color']; ?></span>
							</div>
							<!--end::Card toolbar-->
						</div>
						<!--end:: Card header-->
						<!--begin:: Card body-->
						<div class="card-body p-9">
							<!--begin::Name-->
							<div class="fs-3 fw-bolder text-dark"><?php echo $value['title']; ?></div>
							<!--end::Name-->
							<!--begin::Description-->
							<p class="text-gray-400 fw-bold fs-5 mt-1 mb-7"><?php echo $value['description']; ?></p>
							<!--end::Description-->
							<!--begin::Info-->
							<div class="d-flex flex-wrap mb-5">
								<!--begin::Due-->
								<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
									<div class="fs-6 text-gray-800 fw-bolder"><?php echo $value['credits']; ?></div>
									<div class="fw-bold text-gray-400">Credits</div>
								</div>
								<!--end::Due-->
								<!--begin::Budget-->
								<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
									<div class="fs-6 text-gray-800 fw-bolder"><?php echo $value['price'].' PKR'; ?></div>
									<div class="fw-bold text-gray-400">Price</div>
								</div>
								<!--end::Budget-->
							</div>
							<!--end::Info-->
							<!--begin::Progress-->
							<div class="h-4px w-100 bg-light mb-5">
								<div class="bg-<?php echo $value['color']; ?> rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<!--end::Progress-->
						</div>
						<!--end:: Card body-->
					</a>
					<!--end::Card-->
				</div>
				<!--end::Col-->
				<?php } ?>
			</div>
			<!--end::Row-->
			<?php }else{ ?>
			<!--begin::Content-->
			<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				<!--begin::Container-->
				<div class="container-xxl" id="kt_content_container">
					<!--begin::Card-->
					<div class="card">
						<!--begin::Card body-->
						<div class="card-body p-0">
							<!--begin::Wrapper-->
							<div class="card-px text-center py-10 my-5">
								<!--begin::Title-->
								<h2 class="fs-2x fw-bolder mb-10">Welcome!</h2>
								<!--end::Title-->
								<!--begin::Description-->
								<p class="text-gray-400 fs-4 fw-bold mb-10">Looks like there is no plans added yet.
								<br />Click here to add plans</p>
								<!--end::Description-->
								<!--begin::Action-->
								<a href="<?php echo base_url().'admin/plans/add/'; ?>" class="btn btn-primary">Add Plan</a>
								<!--end::Action-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Illustration-->
							<div class="text-center px-4">
								<img class="mw-100 mh-300px" alt="" src="<?php echo base_url(); ?>assets/media/illustrations/unitedpalms-1/5.png" />
							</div>
							<!--end::Illustration-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Content-->
			<?php } ?>
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