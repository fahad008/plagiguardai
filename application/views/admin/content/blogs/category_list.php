<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Blogs Categories</h1>
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
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card header-->
				<div class="card-header border-0 pt-6">
					<!--begin::Card title-->
					<div class="card-title">
						<!--begin::Search-->
						<div class="d-flex align-items-center position-relative my-1">
							<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
							<span class="svg-icon svg-icon-1 position-absolute ms-6">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
									<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
							<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Category" />
						</div>
						<!--end::Search-->
					</div>
					<!--begin::Card title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<!--begin::Add user-->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_category">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
									<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->Add Category</button>
							<!--end::Add user-->
						<!--begin::Modal - Add task-->
						<div class="modal fade" id="kt_modal_add_category" tabindex="-1" aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered mw-650px">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Modal header-->
									<div class="modal-header" id="kt_modal_add_category_header">
										<!--begin::Modal title-->
										<h2 class="fw-bolder">Add Category</h2>
										<!--end::Modal title-->
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
											<span class="svg-icon svg-icon-1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
													<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
										<!--end::Close-->
									</div>
									<!--end::Modal header-->
									<!--begin::Modal body-->
									<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
										<!--begin::Form-->
										<form id="kt_modal_add_category_form" class="form" action="<?php echo base_url().'admin/blogs/add_category/'; ?>">
											<!--begin::Scroll-->
											<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_category_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_category_header" data-kt-scroll-wrappers="#kt_modal_add_category_scroll" data-kt-scroll-offset="300px">
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="required fw-bold fs-6 mb-2">Title</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="title" value="" />
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Slug</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="text" name="slug" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Slug" value="" />
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="required fw-bold fs-6 mb-2">Status</label>
													<!--end::Label-->
													<!--begin::Input-->
													<select name="status" class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-hide-search="true">
														<option value="1">Active</option>
														<option value="0">Inactive</option>
													</select>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Description</label>
													<!--end::Label-->
													<!--begin::Input-->
													<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Description" name="description"></textarea>
													<!--end::Input-->
												</div>
												<!--end::Input group-->

											</div>
											<!--end::Scroll-->
											<!--begin::Actions-->
											<div class="text-center pt-15">
												<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
												<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
													<span class="indicator-label">Submit</span>
													<span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
											</div>
											<!--end::Actions-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Modal body-->
								</div>
								<!--end::Modal content-->
							</div>
							<!--end::Modal dialog-->
						</div>
						<!--end::Modal - Add task-->
						<!--begin::Modal - Add task-->
						<div class="modal fade" id="kt_modal_edit_category" tabindex="-1" aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered mw-650px">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Modal header-->
									<div class="modal-header" id="kt_modal_edit_category_header">
										<!--begin::Modal title-->
										<h2 class="fw-bolder">Edit Category</h2>
										<!--end::Modal title-->
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
											<span class="svg-icon svg-icon-1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
													<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
										<!--end::Close-->
									</div>
									<!--end::Modal header-->
									<!--begin::Modal body-->
									<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
										<!--begin::Form-->
										<form id="kt_modal_edit_category_form" class="form" action="<?php echo base_url().'admin/blogs/add_category/'; ?>">
											<!--begin::Scroll-->
											<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_category_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_category_header" data-kt-scroll-wrappers="#kt_modal_add_category_scroll" data-kt-scroll-offset="300px">
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="required fw-bold fs-6 mb-2">Title</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="title" value="" id="category_name" />
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="required fw-bold fs-6 mb-2">Slug</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="text" name="slug" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Slug" value="" id="category_title" />
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="required fw-bold fs-6 mb-2">Status</label>
													<!--end::Label-->
													<!--begin::Input-->
													<select name="status" class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-hide-search="true" id="category_status">
														<option value="1">Active</option>
														<option value="0">Inactive</option>
													</select>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Description</label>
													<!--end::Label-->
													<!--begin::Input-->
													<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Description" name="description" id="category_description"></textarea>
													<!--end::Input-->
												</div>
												<!--end::Input group-->

											</div>
											<!--end::Scroll-->
											<!--begin::Actions-->
											<div class="text-center pt-15">
												<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
												<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
													<span class="indicator-label">Submit</span>
													<span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
											</div>
											<!--end::Actions-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Modal body-->
								</div>
								<!--end::Modal content-->
							</div>
							<!--end::Modal dialog-->
						</div>
						<!--end::Modal - Add task-->
						<!--begin::Modal - Add task-->
						<div class="modal fade" id="kt_modal_view_category" tabindex="-1" aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered mw-650px">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Modal header-->
									<div class="modal-header" id="kt_modal_veiw_category_header">
										<!--begin::Modal title-->
										<h2 class="fw-bolder">View Category</h2>
										<!--end::Modal title-->
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
											<span class="svg-icon svg-icon-1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
													<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
										<!--end::Close-->
									</div>
									<!--end::Modal header-->
									<!--begin::Modal body-->
									<div class="modal-body scroll-y mx-1 mx-xl-3 my-1">
										<div class="pb-5 fs-6">
											<!--begin::Details item-->
											<div class="fw-bolder mt-2">Title</div>
											<div class="text-gray-600" id="cat-modal-name">---------</div>
											<!--begin::Details item-->
											<div class="fw-bolder mt-2">Slug</div>
											<div class="text-gray-600" id="cat-modal-slug">---------</div>
											<div class="fw-bolder mt-2">status</div>
											<div class="text-gray-600" id="cat-modal-status">
												<span class="badge badge-danger">---------</span>
											</div>
											<!--begin::Details item-->
											<div class="fw-bolder mt-2">Description</div>
											<div class="text-gray-600" id="cat-modal-description">---------</div>
											<!--begin::Details item-->
										</div>
									</div>
									<!--end::Modal body-->
								</div>
								<!--end::Modal content-->
							</div>
							<!--end::Modal dialog-->
						</div>
						<!--end::Modal - Add task-->
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body pt-0">
					<!--begin::Table-->
					<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_category">
						<!--begin::Table head-->
						<thead>
							<!--begin::Table row-->
							<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
								<th class="min-w-125px">Name</th>
								<th class="min-w-125px">Slug</th>
								<th class="min-w-125px">Status</th>
								<th class="min-w-125px">Created By</th>
								<th class="min-w-125px">Created Date</th>
								<th class="text-end min-w-100px">Actions</th>
							</tr>
							<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="text-gray-600 fw-bold" data-action="<?php echo base_url().'admin/blogs/ajax_category'; ?>">
						</tbody>
						<!--end::Table body-->
					</table>
					<!--end::Table-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Card-->
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

	function view_category(el) {
	    const category_id = el.getAttribute('data-id');
	    const action = "<?php echo base_url().'admin/blogs/get_category/'; ?>";
	    $.ajax({
            url: action,
            type: 'POST',
            dataType: 'json',
            data: {
                category_id: category_id
            },
            success: function(response) {

                if (response.status == 'success') {
                    $("#cat-modal-name").text(response.category_info.name);
                    $("#cat-modal-slug").text(response.category_info.slug);
                    if (response.category_info.status == '1') {
                    	$("#cat-modal-status").html('<span class="badge badge-success">Active</span>');
                    }else{
                    	$("#cat-modal-status").html('<span class="badge badge-danger">Inactive</span>');
                    }
                    $("#cat-modal-description").text(response.category_info.description);
                    $("#kt_modal_view_category").modal('show');
                }else{
                	Swal.fire({
                        text: response.message,
                        icon: "danger",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                } 
            }
        });
		}

		function change_status(el) {
	    const category_id = el.getAttribute('data-id');
	    const category_status = el.getAttribute('data-status');
	    if (category_status == '1') {
	    	var warning = 'Are you sure you want to enable this auhtor?';
	    	var warningBtn = 'Yes, enable!';
	    }else{
	    	var warning = 'Are you sure you want to disable this auhtor?';
	    	var warningBtn = 'Yes, disable!';
	    }
	    const action = "<?php echo base_url().'admin/blogs/change_category_status/'; ?>";
	    Swal.fire({
                html: warning,
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: warningBtn,
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: action,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            category_id: category_id,
                            category_status: category_status,
                        },
                        success: function(response) {

                            if (response.status == 'success') {
                                Swal.fire({
                                    text: "You have disabled blogs category.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {
                                	location.reload();
                                });
                            } 
                        }
                    });
                    
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Category was not disabled.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
		}
</script>