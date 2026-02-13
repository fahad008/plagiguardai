<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Authors</h1>
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
				<a href="<?php echo base_url().'admin/dashboard/'; ?>" class="d-flex align-items-center">
					<img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo-demo3-default.svg" class="h-20px" />
				</a>
				<!--end::Logo-->
			</div>
			<!--end::Wrapper-->
			<div class="card-toolbar">
				<a href="Javascript:void(0)" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_author">
				<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
				<span class="svg-icon svg-icon-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
						<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
					</svg>
				</span>
				<!--end::Svg Icon-->New Author</a>
			</div>
		</div>
		<!--end::Container-->
	</div>
	<!--end::Header-->
	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Container-->
		<div class="container-xxl" id="kt_content_container">
			<!--begin::Row-->
			<div class="row g-6 mb-6 g-xl-9 mb-xl-9" id="kt_authors_show_more_cards">
			</div>
			<!--end::Row-->
			<!--begin::Show more-->
			<div class="d-flex flex-center">
				<button class="btn btn-primary d-none" id="kt_authors_show_more_button">
					<span class="indicator-label">Show more</span>
					<span class="indicator-progress">Loading...
					<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
				</button>
			</div>
			<!--end::Show more-->
			<!--begin::Modal - Add task-->
			<div class="modal fade" id="kt_modal_add_author" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_add_author_header">
							<!--begin::Modal title-->
							<h2 class="fw-bolder">Add Author</h2>
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
							<form id="kt_modal_add_author_form" action="<?php echo base_url(); ?>admin/blogs/add_author/" method="post" enctype="multipart/form-data" novalidate="novalidate" class="form">
								<!--begin::Scroll-->
								<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_author_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_author_header" data-kt-scroll-wrappers="#kt_modal_add_author_scroll" data-kt-scroll-offset="300px">
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="d-block fw-bold fs-6 mb-5">Avatar</label>
										<!--end::Label-->
										<!--begin::Image input-->
										<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url(); ?>assets/media/avatars/blank.png)">
											<!--begin::Preview existing avatar-->
											<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo base_url(); ?>assets/media/avatars/blank.png)"></div>
											<!--end::Preview existing avatar-->
											<!--begin::Label-->
											<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
												<i class="bi bi-pencil-fill fs-7"></i>
												<!--begin::Inputs-->
												<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
												<input type="hidden" name="avatar_remove" />
												<!--end::Inputs-->
											</label>
											<!--end::Label-->
											<!--begin::Cancel-->
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
												<i class="bi bi-x fs-2"></i>
											</span>
											<!--end::Cancel-->
											<!--begin::Remove-->
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
												<i class="bi bi-x fs-2"></i>
											</span>
											<!--end::Remove-->
										</div>
										<!--end::Image input-->
										<!--begin::Hint-->
										<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
										<!--end::Hint-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="required fw-bold fs-6 mb-2">Full Name</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="required fw-bold fs-6 mb-2">Email</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="" />
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
										<label class="required fw-bold fs-6 mb-2">Bio</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea class="form-control form-control-solid mb-3" rows="3" placeholder="Enter Bio" name="bio"></textarea>
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
		</div>
		<!--end::Container-->
	</div>
	<input type="hidden" value="<?php echo base_url().'admin/blogs/get_authors/'; ?>" id="ajax-action">
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
	function change_author_status(el) {
	    const author_id = el.getAttribute('data-id');
	    const author_status = el.getAttribute('data-status');
	    if (author_status == '1') {
	    	var warning = 'Are you sure you want to activate this auhtor?';
	    	var warningBtn = 'Yes, activate!';
	    }else{
	    	var warning = 'Are you sure you want to deactivate this auhtor?';
	    	var warningBtn = 'Yes, deactivate!';
	    }
	    const action = "<?php echo base_url().'admin/blogs/change_author_status/'; ?>";
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
                            author_id: author_id,
                            author_status: author_status,
                        },
                        success: function(response) {

                            if (response.status == 'success') {
                                Swal.fire({
                                    text: "You have deactivated author.",
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
                        text: "Author was not deactivated.",
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