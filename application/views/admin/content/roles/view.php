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
			<!--begin::Layout-->
			<div class="d-flex flex-column flex-xl-row">
				<!--begin::Sidebar-->
				<div class="flex-column flex-lg-row-auto w-100 w-lg-300px mb-10">
					<!--begin::Card-->
					<div class="card card-flush">
						<!--begin::Card header-->
						<div class="card-header">
							<!--begin::Card title-->
							<div class="card-title">
								<h2 class="mb-0"><?php if ($view_role_info['name'] == 'super_admin') { echo 'Super Admin'; }else if($view_role_info['name'] == 'admin'){ echo 'Admin'; }else{ echo 'Reseller'; } ?></h2>
							</div>
							<!--end::Card title-->
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0">
							<?php if ($view_role_info['name'] == 'super_admin') { ?>
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
								<?php }else if($view_role_info['name'] == 'admin'){ ?>
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
										<span class="bullet bg-primary me-3"></span>View Plans</div>
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>View Subscriptions</div>
									</div>
									<!--end::Permissions-->
								<?php } ?>
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Sidebar-->
				<!--begin::Content-->
				<div class="flex-lg-row-fluid ms-lg-10">
					<!--begin::Card-->
					<div class="card card-flush mb-6 mb-xl-9">
						<!--begin::Card header-->
						<div class="card-header pt-5">
							<!--begin::Card title-->
							<div class="card-title">
								<h2 class="d-flex align-items-center">Users Assigned
								<span class="text-gray-600 fs-6 ms-1">(<?php echo $admin_count; ?>)</span></h2>
							</div>
							<!--end::Card title-->
							<!--begin::Card toolbar-->
							<div class="card-toolbar">
								<!--begin::Search-->
								<div class="d-flex align-items-center position-relative my-1" data-kt-view-roles-table-toolbar="base">
									<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
									<span class="svg-icon svg-icon-1 position-absolute ms-6">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
											<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<input type="text" data-kt-roles-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Users" />
								</div>
								<!--end::Search-->
							</div>
							<!--end::Card toolbar-->
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0">
							<!--begin::Table-->
							<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_roles_view_table">
								<!--begin::Table head-->
								<thead>
									<!--begin::Table row-->
									<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
										<th class="min-w-200px">User</th>
										<th class="min-w-125px">Joined Date</th>
										<th class="text-end min-w-100px">Actions</th>
									</tr>
									<!--end::Table row-->
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<tbody class="fw-bold text-gray-600" data-action="<?php echo base_url().'admin/roles/ajax_admins/'; ?>" data-role_id="<?php echo $view_role_info['id']; ?>">
								</tbody>
								<!--end::Table body-->
							</table>
							<!--end::Table-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Layout-->
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
<script>
	setTimeout(function () {
	    if (typeof KTMenu !== 'undefined') {
	        KTMenu.createInstances();
	    }
	}, 500);

</script>