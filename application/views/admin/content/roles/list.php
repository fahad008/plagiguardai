<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Role Management</h1>
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
					<img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" class="h-20px" />
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
			<!--begin::Row-->
			<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
				<?php if (isset($admin_roles) && !empty($admin_roles)) { 
					foreach ($admin_roles as $key => $role) { ?>
					<!--begin::Col-->
					<div class="col-md-4">
						<!--begin::Card-->
						<div class="card card-flush h-md-100">
							<!--begin::Card header-->
							<div class="card-header">
								<!--begin::Card title-->
								<div class="card-title">
									<h2><?php if ($role['name'] == 'super_admin') { echo 'Super Admin'; }else if($role['name'] == 'admin'){ echo 'Admin'; }else{ echo 'Reseller'; } ?></h2>
								</div>
								<!--end::Card title-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-1">
								<!--begin::Users-->
								<div class="fw-bolder text-gray-600 mb-5">Total users with this role: <?php echo $role['count']; ?></div>
								<!--end::Users-->
								<?php if ($role['name'] == 'super_admin') { ?>
									<!--begin::Permissions-->
									<div class="d-flex flex-column text-gray-600">
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>All Admin Controls</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View, Edit and Delete Admins</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View, Edit and Delete Customers</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View, Edit and Delete Resellers</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View, Edit and Delete Plans</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View, Edit and Delete Blogs</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View, Add and Edit Subscriptions</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View and Edit Settings</div>
									</div>
									<!--end::Permissions-->
								<?php }else if($role['name'] == 'admin'){ ?>
									<!--begin::Permissions-->
									<div class="d-flex flex-column text-gray-600">
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>Few Admin Controls</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View, Edit and Delete Blogs</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View Customers</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View Resellers</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View Plans</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View Subscriptions</div>
									</div>
									<!--end::Permissions-->
								<?php }else{ ?>
									<!--begin::Permissions-->
									<div class="d-flex flex-column text-gray-600">
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>Few Admin Controls</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View, Edit and Delete Customers</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View Customers</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View Blogs</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View Plans</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View Subscriptions</div>
									</div>
									<!--end::Permissions-->
								<?php } ?>
							</div>
							<!--end::Card body-->
							<!--begin::Card footer-->
							<div class="card-footer flex-wrap pt-0">
								<a href="<?php echo base_url().'admin/roles/view/'.$role['id']; ?>" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
							</div>
							<!--end::Card footer-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
				<?php } } ?>
			</div>
			<!--end::Row-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Content-->
	<script>var hostUrl = "assets/";</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Footer-->
	<?php $this->load->view('admin/layouts/footer'); ?>
	<!--end::Footer-->
</div>
<!--end::Wrapper-->