<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">API Keys</h1>
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
				<a href="<?php echo base_url().'admin/'; ?>" class="d-flex align-items-center">
					<img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo-demo3-default.svg" class="h-20px" />
				</a>
				<!--end::Logo-->
			</div>
			<!--end::Wrapper-->
			<div class="card-toolbar">
					<a href="Javascript:void(0)" class="btn btn-sm btn-primary" data-id="" onclick="get_api_form(this)">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
							<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
						</svg>
					</span>
					<!--end::Svg Icon-->Create API Key</a>
				</div>
		</div>
		<!--end::Container-->
	</div>
	<!--end::Header-->
	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Container-->
		<div class="container-xxl" id="kt_content_container">
			<?php if (isset($api_keys_info) && !empty($api_keys_info)) { ?>
			<div class="row g-5 g-xl-8">
				<?php foreach ($api_keys_info as $key => $value) { ?>
					<div class="col-xl-4">
						<!--begin::Card-->
						<div class="card">
							<!--begin::Card body-->
							<div class="card-body p-5">
								<!--begin::Item-->
								<div class="d-flex align-items-center mb-3">
									<!--begin::Symbol-->
									<div class="symbol symbol-50px me-5">
										<?php if ($value['status'] == 'active') {?>
										<span class="symbol-label bg-light-success">
											<!--begin::Svg Icon | path: icons/duotune/coding/cod008.svg-->
											<span class="svg-icon svg-icon-2x svg-icon-success">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"></path>
													<path d="M12.0006 11.1542C13.1434 11.1542 14.0777 10.22 14.0777 9.0771C14.0777 7.93424 13.1434 7 12.0006 7C10.8577 7 9.92348 7.93424 9.92348 9.0771C9.92348 10.22 10.8577 11.1542 12.0006 11.1542Z" fill="black"></path>
													<path d="M15.5652 13.814C15.5108 13.6779 15.4382 13.551 15.3566 13.4331C14.9393 12.8163 14.2954 12.4081 13.5697 12.3083C13.479 12.2993 13.3793 12.3174 13.3067 12.3718C12.9257 12.653 12.4722 12.7981 12.0006 12.7981C11.5289 12.7981 11.0754 12.653 10.6944 12.3718C10.6219 12.3174 10.5221 12.2902 10.4314 12.3083C9.70578 12.4081 9.05272 12.8163 8.64456 13.4331C8.56293 13.551 8.49036 13.687 8.43595 13.814C8.40875 13.8684 8.41781 13.9319 8.44502 13.9864C8.51759 14.1133 8.60828 14.2403 8.68991 14.3492C8.81689 14.5215 8.95295 14.6757 9.10715 14.8208C9.23413 14.9478 9.37925 15.0657 9.52439 15.1836C10.2409 15.7188 11.1026 15.9999 11.9915 15.9999C12.8804 15.9999 13.7421 15.7188 14.4586 15.1836C14.6038 15.0748 14.7489 14.9478 14.8759 14.8208C15.021 14.6757 15.1661 14.5215 15.2931 14.3492C15.3838 14.2312 15.4655 14.1133 15.538 13.9864C15.5833 13.9319 15.5924 13.8684 15.5652 13.814Z" fill="black"></path>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<?php }else if($value['status'] == 'disabled'){ ?>
										<span class="symbol-label bg-light-danger">
											<!--begin::Svg Icon | path: icons/duotune/coding/cod008.svg-->
											<span class="svg-icon svg-icon-2x svg-icon-danger">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z" fill="black" />
													<path opacity="0.3" d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<?php }else{ ?>
										<span class="symbol-label bg-light-warning">
											<!--begin::Svg Icon | path: icons/duotune/coding/cod008.svg-->
											<span class="svg-icon svg-icon-2x svg-icon-warning">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black"/>
												<path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<?php } ?>
									</div>
									<!--end::Symbol-->
									<!--begin::Text-->
									<div class="d-flex flex-column me-2">
										<a href="javscript: void(0)" class="text-dark text-hover-primary fs-6 fw-bolder"><?php echo $value['name']; ?></a>
										<span class="text-muted fw-bold"><?php echo $value['description']; ?></span>
									</div>
									<!--end::Text-->
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="d-flex align-items-center">
									<a href="Javascript:void(0)" class="btn btn-sm btn-primary me-2" data-id="<?php echo $value['id']; ?>" onclick="get_api_form(this)">Update</a>
									<?php if ($value['status'] == 'active') { ?>
									<a href="javscript: void(0)" onclick="change_api_status(this)" data-id="<?php echo $value['id']; ?>" data-status="disabled" class="btn btn-sm btn-light-danger me-2">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg arr011.svg-->
									<span class="svg-icon svg-icon-3">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z" fill="black"></path>
											<path d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z" fill="black"></path>
										</svg>
									</span>
									<!--end::Svg Icon-->Deactivate</a>
									<?php } ?>
									<?php if ($value['status'] == 'disabled') { ?>
									<a href="javscript: void(0)" onclick="change_api_status(this)" data-id="<?php echo $value['id']; ?>" data-status="active" class="btn btn-sm btn-light-success me-2">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
									<span class="svg-icon svg-icon-3">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black"></path>
											<path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black"></path>
										</svg>
									</span>
									<!--end::Svg Icon-->Activate</a>
									<?php } ?>
									<?php if ($value['status'] == 'exhausted') { ?>
									<a href="javscript: void(0)" onclick="change_api_status(this)" data-id="<?php echo $value['id']; ?>" data-status="active" class="btn btn-sm btn-light-success me-2">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
									<span class="svg-icon svg-icon-3">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black"></path>
											<path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black"></path>
										</svg>
									</span>
									<!--end::Svg Icon-->Activate</a>
									<a href="javscript: void(0)" onclick="change_api_status(this)" data-id="<?php echo $value['id']; ?>" data-status="disabled" class="btn btn-sm btn-light-danger me-2">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
									<span class="svg-icon svg-icon-3">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z" fill="black"></path>
											<path d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z" fill="black"></path>
										</svg>
									</span>
									<!--end::Svg Icon-->Deactivate</a>
									<?php } ?>
								</div>
								<!--end::Item-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
				<?php } ?>
			</div>
			<?php }else{ ?>
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card body-->
				<div class="card-body pb-0">
					<!--begin::Heading-->
					<div class="card-px text-center pt-20 pb-5">
						<!--begin::Title-->
						<h2 class="fs-2x fw-bolder mb-0">Create API Key</h2>
						<!--end::Title-->
						<!--begin::Description-->
						<p class="text-gray-400 fs-4 fw-bold py-7">Click on the below buttons to launch
						<br />a new API Key creation.</p>
						<!--end::Description-->
						<!--begin::Action-->
						<a href="Javascript: void(0)" data-id="" onclick="get_api_form(this)" class="btn btn-primary er fs-6 px-8 py-4">Create API Key</a>
						<!--end::Action-->
					</div>
					<!--end::Heading-->
					<!--begin::Illustration-->
					<div class="text-center px-5">
						<img src="<?php echo base_url(); ?>assets/media/illustrations/unitedpalms-1/5.png" alt="" class="mw-100 h-200px h-sm-325px" />
					</div>
					<!--end::Illustration-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Card-->
			<?php } ?>
			<!--begin::Modal - Create Api Key-->
			<div class="modal fade" id="kt_modal_create_api_key" tabindex="-1" aria-hidden="true">
				
			</div>
			<!--end::Modal - Create Api Key-->
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
	function get_api_form(el) {
	    const api_id = el.getAttribute('data-id');
	    $.ajax({
            url: "<?php echo base_url().'admin/apikey_manager/get_api_form/'; ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                api_id: api_id
            },
            success: function(response) {

                if (response.status == 'success') {
                	$("#kt_modal_create_api_key").html(response.html);
                	setTimeout(function() {

                		KTApp.init();
                		KTModalCreateApiKey.init();
						$("#kt_modal_create_api_key").modal('show');

					}, 100);
                } else {
                	Swal.fire({
					    html: response.message,
					    icon: "error",
					    buttonsStyling: false,
					    confirmButtonText: "ok!",
					    customClass: {
					        confirmButton: "btn btn-danger"
					    }
					});
                }
            }
        });
	}

	function change_api_status(el) {
	    const api_key_id = el.getAttribute('data-id');
	    const key_status = el.getAttribute('data-status');
	    if (key_status == 'active') {
	    	var warning = 'Are you sure you want to deactivate this key?';
	    	var warningBtn = 'Yes, activate!';
	    }else{
	    	var warning = 'Are you sure you want to activate this key?';
	    	var warningBtn = 'Yes, activate!';
	    }
	    const action = "<?php echo base_url().'admin/apikey_manager/change_api_status/'; ?>";
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
                            api_key_id: api_key_id,
                            key_status: key_status,
                        },
                        success: function(response) {

                            if (response.status == 'success') {
                                Swal.fire({
                                    text: response.message,
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
                    
                }
            });
		}
</script>