<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Resellers</h1>
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
				<?php if (isset($total_customers) && $total_customers >= 1) { ?>
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
								<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Resellers" />
							</div>
							<!--end::Search-->
						</div>
						<!--begin::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::Toolbar-->
							<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
								<!--begin::Filter-->
								<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
								<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
								<span class="svg-icon svg-icon-2">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->Filter</button>
								<!--begin::Menu 1-->
								<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
									<!--begin::Header-->
									<div class="px-7 py-5">
										<div class="fs-4 text-dark fw-bolder">Filter Options</div>
									</div>
									<!--end::Header-->
									<!--begin::Separator-->
									<div class="separator border-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Content-->
									<div class="px-7 py-5">
										<!--begin::Input group-->
										<div class="mb-10">
											<!--begin::Label-->
											<label class="form-label fs-5 fw-bold mb-3">Month:</label>
											<!--end::Label-->
											<!--begin::Input-->
											<select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-customer-table-filter="month" data-dropdown-parent="#kt-toolbar-filter">
												<option></option>
												<?php $months = getMonthsTillCurrent(); ?>
												<?php if (isset($months) && !empty($months)) {
												foreach ($months as $key => $value) { ?>
													<option value="<?php echo $value['number']; ?>"><?php echo $value['name']; ?></option>
												<?php } ?>
												<?php } ?>
											</select>
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Actions-->
										<div class="d-flex justify-content-end">
											<button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
											<button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">Apply</button>
										</div>
										<!--end::Actions-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Menu 1-->
								<!--end::Filter-->
								<!--begin::Add customer-->
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_reseller">Add Reseller</button>
								<!--end::Add customer-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Group actions-->
							<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
								<div class="fw-bolder me-5">
								<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
								<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected" data-kt-batch-delete-action="<?php echo base_url().'admin/resellers/batch_delete'; ?>">Delete Selected</button>
							</div>
							<!--end::Group actions-->
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
							<!--begin::Table head-->
							<thead>
								<!--begin::Table row-->
								<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
									<th class="w-10px pe-2 sorting_disabled" aria-label="Select all">
										<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
											<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
										</div>
									</th>
									<th class="min-w-125px">Members</th>
									<th class="min-w-125px">Password</th>
									<th class="min-w-125px">Email Status</th>
									<th class="min-w-125px">Created Date</th>
									<th class="text-end min-w-70px">Actions</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="fw-bold text-gray-600" data-action="<?php echo base_url().'admin/resellers/ajax_resellers/'; ?>">
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
					<!--end::Card body-->
				<?php }else{ ?>
				<!--begin::Card body-->
				<div class="card-body p-0">
					<!--begin::Wrapper-->
					<div class="card-px text-center py-20 my-10">
						<!--begin::Title-->
						<h2 class="fs-2x fw-bolder mb-10">Welcome!</h2>
						<!--end::Title-->
						<!--begin::Description-->
						<p class="text-gray-400 fs-4 fw-bold mb-10">There are no members added yet.
						<br />Kickstart your CRM by adding your first member</p>
						<!--end::Description-->
						<!--begin::Action-->
						<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_reseller">Add Reseller</a>
						<!--end::Action-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Illustration-->
					<div class="text-center px-4">
						<img class="mw-100 mh-300px" alt="" src="<?php echo base_url(); ?>assets/media/illustrations/dozzy-1/2.png" />
					</div>
					<!--end::Illustration-->
				</div>
				<!--end::Card body-->
				<?php } ?>
			</div>
			<!--end::Card-->
			<!--begin::Modals-->
			<!--begin::Modal - Customers - Add-->
			<div class="modal fade" id="kt_modal_add_reseller" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Form-->
						<form class="form" action="<?php echo base_url().'admin/resellers/add_reseller/'; ?>" id="kt_modal_add_reseller_form">
							<!--begin::Modal header-->
							<div class="modal-header" id="kt_modal_add_reseller_header">
								<!--begin::Modal title-->
								<h2 class="fw-bolder">Add a Reseller</h2>
								<!--end::Modal title-->
								<!--begin::Close-->
								<div id="kt_modal_add_reseller_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
							<div class="modal-body py-10 px-lg-17">
								<!--begin::Scroll-->
								<div class="scroll-y me-n7 pe-7" id="kt_modal_add_reseller_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_reseller_header" data-kt-scroll-wrappers="#kt_modal_add_reseller_scroll" data-kt-scroll-offset="300px">
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="required fs-6 fw-bold mb-2">First Name</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" class="form-control form-control-solid" placeholder="" name="first_name" value="" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="required fs-6 fw-bold mb-2">Last Name</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" class="form-control form-control-solid" placeholder="" name="last_name" value="" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-bold mb-2">
											<span class="required">Email</span>
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="email" class="form-control form-control-solid" placeholder="" name="email" value="" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-bold mb-2">
											<span class="required">Password</span>
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Click to auto generate password"></i>
										</label>
										<!--end::Label-->
										<div class="position-relative">
											<!--begin::Input-->
											<input type="text" class="form-control form-control-solid" placeholder="Enter Password" name="password" id="auto-generate-input">
											<!--end::Input-->
											<!--begin::CVV icon-->
											<div class="position-absolute translate-middle-y top-50 end-0 me-3">
												<!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
												<a href="javascript:void(0)" id="auto-generate" class="svg-icon svg-icon-2hx">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M19.4 13.9411L10.7 5.24112C10.4 4.94112 10 4.84104 9.60001 5.04104C9.20001 5.24104 9 5.54107 9 5.94107V18.2411C9 18.6411 9.20001 18.941 9.60001 19.141C9.70001 19.241 9.9 19.2411 10 19.2411C10.2 19.2411 10.4 19.141 10.6 19.041C11.4 18.441 12.1 17.941 12.9 17.541L14.4 21.041C14.6 21.641 15.2 21.9411 15.8 21.9411C16 21.9411 16.2 21.9411 16.4 21.8411C17.2 21.5411 17.5 20.6411 17.2 19.8411L15.7 16.2411C16.7 15.9411 17.7 15.741 18.8 15.541C19.2 15.541 19.5 15.2411 19.6 14.8411C19.8 14.6411 19.7 14.2411 19.4 13.9411Z" fill="black"/>
													<path opacity="0.3" d="M15 6.941C14.8 6.941 14.7 6.94102 14.6 6.84102C14.1 6.64102 13.9 6.04097 14.2 5.54097L15.2 3.54097C15.4 3.04097 16 2.84095 16.5 3.14095C17 3.34095 17.2 3.941 16.9 4.441L15.9 6.441C15.7 6.741 15.4 6.941 15 6.941ZM18.4 9.84102L20.4 8.84102C20.9 8.64102 21.1 8.04097 20.8 7.54097C20.6 7.04097 20 6.84095 19.5 7.14095L17.5 8.14095C17 8.34095 16.8 8.941 17.1 9.441C17.3 9.841 17.6 10.041 18 10.041C18.2 9.94097 18.3 9.94102 18.4 9.84102ZM7.10001 10.941C7.10001 10.341 6.70001 9.941 6.10001 9.941H4C3.4 9.941 3 10.341 3 10.941C3 11.541 3.4 11.941 4 11.941H6.10001C6.70001 11.941 7.10001 11.541 7.10001 10.941ZM4.89999 17.1409L6.89999 16.1409C7.39999 15.9409 7.59999 15.341 7.29999 14.841C7.09999 14.341 6.5 14.141 6 14.441L4 15.441C3.5 15.641 3.30001 16.241 3.60001 16.741C3.80001 17.141 4.1 17.341 4.5 17.341C4.6 17.241 4.79999 17.2409 4.89999 17.1409Z" fill="black"/>
													</svg>
												</a>
												<!--end::Svg Icon-->
											</div>
											<!--end::CVV icon-->
										</div>
									</div>
									<!--end::Input group-->
								</div>
								<!--end::Scroll-->
							</div>
							<!--end::Modal body-->
							<!--begin::Modal footer-->
							<div class="modal-footer flex-center">
								<!--begin::Button-->
								<button type="reset" id="kt_modal_add_reseller_cancel" class="btn btn-light me-3">Discard</button>
								<!--end::Button-->
								<!--begin::Button-->
								<button type="submit" id="kt_modal_add_reseller_submit" class="btn btn-primary">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Button-->
							</div>
							<!--end::Modal footer-->
						</form>
						<!--end::Form-->
					</div>
				</div>
			</div>
			<!--end::Modal - resellers - Add-->
			<!--end::Modals-->
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
	<script>
		// Password generator function
		function generatePassword(length = 12) {
		    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*()_+|}?=";
		    let password = "";
		    for (let i = 0; i < length; i++) {
		        const randomIndex = Math.floor(Math.random() * charset.length);
		        password += charset[randomIndex];
		    }
		    return password;
		}

		// Event listener for your link
		document.getElementById('auto-generate').addEventListener('click', function() {
		    const password = generatePassword(12);
		    document.getElementById('auto-generate-input').value = password;
		});



		function copy_pass(el) {
		    let password = el.getAttribute('data-password');

		    if (!password) return;

		    // Modern browsers
		    if (navigator.clipboard && window.isSecureContext) {
		        navigator.clipboard.writeText(password).then(() => {
		            // alert('Password copied!');
		        }).catch(err => {
		            console.error('Copy failed:', err);
		        });
		    } 
		    // Fallback for older browsers
		    else {
		        const tempInput = document.createElement("input");
		        tempInput.value = password;
		        document.body.appendChild(tempInput);
		        tempInput.select();
		        tempInput.setSelectionRange(0, 99999);
		        document.execCommand("copy");
		        document.body.removeChild(tempInput);
		        // alert('Password copied!');
		    }
		}
	</script>
	<!--begin::Footer-->
	<?php $this->load->view('admin/layouts/footer'); ?>
	<!--end::Footer-->
</div>
<!--end::Wrapper