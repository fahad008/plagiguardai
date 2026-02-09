<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Customers</h1>
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
				<a href="../../demo3/dist/index.html" class="d-flex align-items-center">
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
									<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers" />
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
											<!--begin::Input group-->
											<div class="mb-10">
												<!--begin::Label-->
												<label class="form-label fs-5 fw-bold mb-3">Subscription Type:</label>
												<!--end::Label-->
												<!--begin::Options-->
												<div class="d-flex flex-column flex-wrap fw-bold" data-kt-customer-table-filter="plan_id">
													<!--begin::Option-->
													<label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
														<input class="form-check-input" type="radio" name="plan_id" value="" checked="checked" />
														<span class="form-check-label text-gray-600">All</span>
													</label>
													<!--end::Option-->
													<!--begin::Option-->
													<?php if (isset($plans_info) && !empty($plans_info)) { ?>
														<?php foreach ($plans_info as $key => $value) { ?>
													<label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
														<input class="form-check-input" type="radio" name="plan_id" value="<?php echo $value['id']; ?>" />
														<span class="form-check-label text-gray-600"><?php echo $value['title']; ?></span>
													</label>
													<?php } } ?>
													<!--end::Option-->
												</div>
												<!--end::Options-->
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
									<?php if (has_access(['super_admin', 'reseller'])) {?>
										<!--begin::Add customer-->
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Customer</button>
										<!--end::Add customer-->
									<?php }else{ ?>
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_access_denied">Add Customer</button>
									<?php } ?>
									
								</div>
								<!--end::Toolbar-->
								<?php if (has_access(['super_admin'])) {?>
								<!--begin::Group actions-->
								<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
									<div class="fw-bolder me-5">
									<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
									<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected" data-kt-batch-delete-action="<?php echo base_url().'admin/customers/batch_delete'; ?>">Delete Selected</button>
								</div>
								<!--end::Group actions-->
								<?php }else{ ?>
									<!--begin::Group actions-->
								<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
									<div class="fw-bolder me-5">
									<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#kt_modal_access_denied">Delete Selected</button>
								</div>
								<!--end::Group actions-->
								<?php } ?>
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
										<th class="min-w-125px">Subscritption</th>
										<th class="min-w-125px">Password</th>
										<th class="min-w-125px">Created By</th>
										<th class="min-w-125px">Created Date</th>
										<th class="text-end min-w-70px">Actions</th>
									</tr>
									<!--end::Table row-->
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<tbody class="fw-bold text-gray-600" data-action="<?php echo base_url().'admin/customers/ajax_customers/'; ?>">
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
						<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Member</a>
						<!--end::Action-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Illustration-->
					<div class="text-center px-4">
						<img class="mw-100 mh-300px" alt="" src="assets/media/illustrations/dozzy-1/2.png" />
					</div>
					<!--end::Illustration-->
				</div>
				<!--end::Card body-->
				<?php } ?>
			</div>
			<!--end::Card-->
			<!--begin::Modals-->
			<!--begin::Modal - Customers - Add-->
			<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Form-->
						<form class="form" action="<?php echo base_url().'admin/customers/add_customer/'; ?>" id="kt_modal_add_customer_form">
							<!--begin::Modal header-->
							<div class="modal-header" id="kt_modal_add_customer_header">
								<!--begin::Modal title-->
								<h2 class="fw-bolder">Add a Customer</h2>
								<!--end::Modal title-->
								<!--begin::Close-->
								<div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
								<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
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
								<button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
								<!--end::Button-->
								<!--begin::Button-->
								<button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
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
			<!--end::Modal - Customers - Add-->
			<!--begin::Modal - Offer A Deal-->
			<div class="modal fade" id="kt_modal_offer_a_deal" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered mw-1000px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header py-7 d-flex justify-content-between">
							<!--begin::Modal title-->
							<h2>Add Subscription</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
						<!--begin::Modal header-->
						<!--begin::Modal body-->
						<div class="modal-body scroll-y m-5">
							<!--begin::Stepper-->
							<div class="stepper stepper-links d-flex flex-column" id="kt_modal_offer_a_deal_stepper">
								<!--begin::Nav-->
								<div class="stepper-nav justify-content-center py-2">
									<!--begin::Step 1-->
									<div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
										<h3 class="stepper-title">Pick a Plan</h3>
									</div>
									<!--end::Step 1-->
									<!--begin::Step 2-->
									<div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
										<h3 class="stepper-title">Deal Details</h3>
									</div>
									<!--end::Step 2-->
									<!--begin::Step 4-->
									<div class="stepper-item" data-kt-stepper-element="nav">
										<h3 class="stepper-title">Completed</h3>
									</div>
									<!--end::Step 4-->
								</div>
								<!--end::Nav-->
								<!--begin::Form-->
								<form class="mx-auto mw-500px w-100 pt-15 pb-10" novalidate="novalidate" id="kt_modal_offer_a_deal_form">
									<!--begin::Type-->
									<div class="current" data-kt-stepper-element="content">
										<!--begin::Wrapper-->
										<div class="w-100">
											<!--begin::Heading-->
											<div class="mb-13">
												<!--begin::Title-->
												<h2 class="mb-3">Plan for <span class="text-logo2" id="title-one"></span></h2>
												<!--end::Title-->
											</div>
											<!--end::Heading-->
											<!--begin::Input group-->
											<div class="fv-row mb-15" data-kt-buttons="true">
												<?php if (isset($plans_info) && !empty($plans_info)) { ?>
													<?php foreach ($plans_info as $key => $value) { ?>
												<!--begin::Option-->
												<label class="btn btn-outline btn-outline-dashed btn-outline-<?php echo $value['color']; ?> d-flex text-start p-6 mb-6 <?php if($key == 0){ echo 'active'; } ?>">
													<!--begin::Input-->
													<input class="btn-check" type="radio" <?php if($key == 0){ echo 'checked'; } ?> name="plan_id" value="<?php echo $value['id']; ?>" />
													<!--end::Input-->
													<!--begin::Label-->
													<span class="d-flex">
														<!--begin::Icon-->
														<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
														<span class="svg-icon svg-icon-3hx svg-icon-<?php echo $value['color']; ?>">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M14 18V16H10V18L9 20H15L14 18Z" fill="black"></path>
															<path opacity="0.3" d="M20 4H17V3C17 2.4 16.6 2 16 2H8C7.4 2 7 2.4 7 3V4H4C3.4 4 3 4.4 3 5V9C3 11.2 4.8 13 7 13C8.2 14.2 8.8 14.8 10 16H14C15.2 14.8 15.8 14.2 17 13C19.2 13 21 11.2 21 9V5C21 4.4 20.6 4 20 4ZM5 9V6H7V11C5.9 11 5 10.1 5 9ZM19 9C19 10.1 18.1 11 17 11V6H19V9ZM17 21V22H7V21C7 20.4 7.4 20 8 20H16C16.6 20 17 20.4 17 21ZM10 9C9.4 9 9 8.6 9 8V5C9 4.4 9.4 4 10 4C10.6 4 11 4.4 11 5V8C11 8.6 10.6 9 10 9ZM10 13C9.4 13 9 12.6 9 12V11C9 10.4 9.4 10 10 10C10.6 10 11 10.4 11 11V12C11 12.6 10.6 13 10 13Z" fill="black"></path>
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Icon-->
														<!--begin::Info-->
														<span class="ms-4">
															<span class="fs-3 fw-bolder text-gray-900 mb-2 d-block"><?php echo $value['title']; ?></span>
															<span class="fw-bold fs-4 text-muted">
																<?php echo $desc = formatPlanPromo($value['credits'],$value['duration'],$value['price']); ?>
															</span>
														</span>
														<!--end::Info-->
													</span>
													<!--end::Label-->
												</label>
												<!--end::Option-->
												<?php } } ?>
											</div>
											<!--end::Input group-->
											<!--begin::Actions-->
											<div class="d-flex justify-content-end">
												<button type="button" class="btn btn-lg btn-primary" data-kt-element="type-next">
													<span class="indicator-label">Plan Details</span>
													<span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
											</div>
											<!--end::Actions-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Type-->
									<!--begin::Details-->
									<div data-kt-stepper-element="content">
										<!--begin::Wrapper-->
										<div class="w-100">
											<!--begin::Heading-->
											<div class="mb-13">
												<!--begin::Title-->
												<h2 class="mb-3">Plan Details</h2>
												<!--end::Title-->
											</div>
											<!--end::Heading-->
											<!--begin::Input group-->
											<div class="fv-row mb-4">
												<!--begin::Label-->
												<label class="fs-6 fw-bold mb-2">Reseller</label>
												<!--end::Label-->
												<!--begin::Input-->
												<!--begin::Search-->
												<div id="kt_modal_customer_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
													<!--begin::Form-->
													<!-- <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off"> -->
														<!--begin::Hidden input(Added to disable form autocomplete)-->
														<input type="hidden" />
														<!--end::Hidden input-->
														<!--begin::Icon-->
														<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
														<div class="position-relative">
														<span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-25 ms-5">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
																<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Icon-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-lg form-control-solid px-15" name="search" value="" placeholder="Search by Name or email..." data-kt-search-element="input" autocomplete="new-password" />
														<!--end::Input-->
														<!--begin::Spinner-->
														<span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
															<span class="spinner-border h-20px w-20px align-middle text-gray-400"></span>
														</span>
														<!--end::Spinner-->
														<!--begin::Reset-->
														<span class="btn btn-flush btn-active-color-primary position-absolute translate-middle-y top-50 end-0 lh-0 me-5 d-none" data-kt-search-element="clear">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
															<span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
																	<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span>
														<!--end::Reset-->
														</div>
													<!-- </form> -->
													<!--end::Form-->
													<!--begin::Wrapper-->
													<div class="py-5">
														<!--begin::Suggestions-->
														<div data-kt-search-element="suggestions">
														</div>
														<!--end::Suggestions-->
														<!--begin::Results-->
														<div data-kt-search-element="results" class="d-none" id="suggestions-view">
														</div>
														<!--end::Results-->
														<!--begin::Empty-->
														<div data-kt-search-element="empty" class="text-center d-none">
															<!--begin::Message-->
															<div class="fw-bold py-0 mb-10">
																<div class="text-gray-600 fs-3 mb-2">No users found</div>
																<div class="text-gray-400 fs-6">Try to search by Name or email...</div>
															</div>
															<!--end::Message-->
														</div>
														<!--end::Empty-->
														<!--begin::Selected-->
														<div data-kt-search-element="selected" class="text-center d-none">
															<!--begin::Message-->
															<div class="fw-bold py-0 mb-10">
																<div class="text-gray-600 fs-3 mb-2">Your selected Reseller</div>
																<div class="text-logo2 fs-6" id="reseller_name"></div>
															</div>
															<!--end::Message-->
														</div>
														<!--end::Selected-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Search-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="fv-row mb-8">
												<!--begin::Label-->
												<label class="fs-6 fw-bold mb-2">Reseller Note</label>
												<!--end::Label-->
												<!--begin::Label-->
												<textarea id="reseller_note" class="form-control form-control-solid" rows="3" placeholder="Enter Reseller Note" name="details_description">Your customer has been subscribed.</textarea>
												<!--end::Label-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="fv-row mb-8">
												<label class="required fs-6 fw-bold mb-2">Activation Date</label>
												<div class="position-relative d-flex align-items-center">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
													<span class="svg-icon svg-icon-2 position-absolute mx-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
															<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
															<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Datepicker-->
													<input id="activation_date" class="form-control form-control-solid ps-12" placeholder="Pick date range" name="details_activation_date" />
													<!--end::Datepicker-->
												</div>
											</div>
											<!--end::Input group-->
											<!--begin::Actions-->
											<div class="d-flex flex-stack">
												<button type="button" class="btn btn-lg btn-light me-3" data-kt-element="details-previous">Plan Details</button>
												<button type="button" class="btn btn-lg btn-primary" data-kt-element="details-next">
													<span class="indicator-label">Complete</span>
													<span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
											</div>
											<!--end::Actions-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Details-->
									<!--begin::Complete-->
									<div data-kt-stepper-element="content">
										<!--begin::Wrapper-->
										<div class="w-100">
											<!--begin::Heading-->
											<div class="mb-13 text-center">
												<!--begin::Title-->
												<h2 class="mb-3">Hit Subscribe to proceed!</h2>
												<!--end::Title-->
											</div>
											<!--end::Heading-->
											<!--begin::Illustration-->
											<div class="text-center px-4">
												<img src="assets/media/illustrations/dozzy-1/20.png" alt="" class="w-100 mh-300px" />
											</div>
											<div class="text-center">
												<a href="javascript: void(0)" id="subscribe-customer" class="btn btn-lg btn-primary">Subscribe</a>
											</div>
											<!--end::Illustration-->
										</div>
									</div>
									<!--end::Complete-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Stepper-->
						</div>
						<!--begin::Modal body-->
					</div>
				</div>
			</div>
			<!--end::Modal - Offer A Deal-->
			<!--begin::Modal - View Users-->
			<div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header pb-0 border-0 justify-content-end">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
						<!--begin::Modal header-->
						<!--begin::Modal body-->
						<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
							<!--begin::Heading-->
							<div class="text-center mb-13">
								<!--begin::Title-->
								<h1 class="mb-3">Reseller Detail</h1>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Users-->
							<div class="mb-15">
								<!--begin::List-->
								<div class="mh-375px scroll-y me-n7 pe-7" id="reseller-modal-content">
									
								</div>
								<!--end::List-->
							</div>
							<!--end::Users-->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - View Users-->
			<!--end::Modals-->
		</div>
		<!--end::Container-->
	</div>
	<input type="hidden" id="form_two_action" value="<?php echo base_url().'admin/resellers/search_reseller/'; ?>">
	<input type="hidden" id="customer_id" value="">
	<input type="hidden" id="reseller_id" value="">
	<input type="hidden" id="plan_id" value="">
	<!--end::Content-->
	<script>var hostUrl = "assets/";</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
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

		// Using Bootstrap 5 modal event
		var myModal = document.getElementById('kt_modal_offer_a_deal');

		myModal.addEventListener('show.bs.modal', function (event) {
		    // Button that triggered the modal
		    var button = event.relatedTarget;

		    // Extract customer ID from data attribute
		    var customerId = button.getAttribute('data-bs-customerid');
		    var customerName = button.getAttribute('data-bs-customerName');
		    $("#customer_id").val(customerId);
		    $("#title-one").text(customerName);

		    // Optional: put the customerId into an input field inside modal
		    // myModal.querySelector('input[name="customer_id"]').value = customerId;
		});

		const resetButton = document.querySelector('[data-kt-customer-table-filter="reset"]');
		var btnpress = true;

		$(document).on('click', '#subscribe-customer', function () {
			
			if (btnpress) {
				btnpress = false;
				var customer_id = $('#customer_id').val();
				var reseller_id = $('#reseller_id').val();
				var reseller_note = $('#reseller_note').val();
				var activation_date = $('#activation_date').val();
				var plan_id = $('#plan_id').val();

			    $.ajax({
		            url: "<?php echo base_url().'admin/subscription/'; ?>",
		            type: 'POST',
		            dataType: 'json',
		            data: {
		                customer_id: customer_id, reseller_id:reseller_id, reseller_note:reseller_note, activation_date:activation_date, plan_id:plan_id
		            },
		            success: function(response) {

		                if (response.status == 'success') {
		                	btnpress = true;
		                	var myModalEl = document.getElementById('kt_modal_offer_a_deal');
							var myModal = bootstrap.Modal.getInstance(myModalEl); // Get existing instance
							if (myModal) {
								setPopupDefault();
								setTimeout(function() {
									myModal.hide();
									location.reload();
								}, 100); 
							}

		                } else {
		                	Swal.fire({
								text: 'Looks like something unexpected happened, Please try again!',
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then(function (result) {
								if (result.isConfirmed) {
									var myModalEl = document.getElementById('kt_modal_offer_a_deal');
									var myModal = bootstrap.Modal.getInstance(myModalEl);
									if (myModal) {
										setPopupDefault();
										setTimeout(function() {
											myModal.hide();
											location.reload();
										}, 100); 
									}
								}
							});
		                }
		            }
		        });
			}
		});

		function setPopupDefault(){
			stepper = KTModalOfferADeal.getStepperObj();
			$('#customer_id').val('');
			$('#reseller_id').val('');
			$('#reseller_note').val('Your customer has been subscribed.');
			$('#plan_id').val('');

			const clearBtn = document.querySelector('[data-kt-search-element="clear"]');
		    if (clearBtn) {
		        clearBtn.click(); 
		    }
			
			var firstPlanInput = $('#kt_modal_offer_a_deal input[name="plan_id"]').first();

			if (firstPlanInput.length) {
			    // Check the input
			    firstPlanInput.prop('checked', true).trigger('change');

			    // Remove active class from all labels first
			    $('#kt_modal_offer_a_deal label.btn').removeClass('active');

			    // Add active class to the parent label of the first input
			    firstPlanInput.closest('label.btn').addClass('active');
			}
			
			// Get the Flatpickr instance and clear it
			var fp = document.getElementById('activation_date')._flatpickr;
			if (fp) {
			    fp.clear(); // resets the calendar
			} else {
			    // fallback in case Flatpickr is not initialized yet
			    $('#activation_date').val('');
			}
			stepper.goTo(1);
		}

		function fetch_reseller(el) {
		    const customer_id = el.getAttribute('data-id');
		    console.log(customer_id); 
		    $.ajax({
	            url: "<?php echo base_url().'admin/resellers/get_info/'; ?>",
	            type: 'POST',
	            dataType: 'json',
	            data: {
	                customer_id: customer_id
	            },
	            success: function(response) {

	                if (response.status == 'success') {
	                	console.log(response);
	                	$("#reseller-modal-content").html(response.html);
	                	$("#kt_modal_view_users").modal('show');
	                } else {
	                }
	            }
	        });
		}

		function activate_subscription(el) {
		    const customer_id = el.getAttribute('data-customerId');
		    console.log(customer_id); 
		    $.ajax({
	            url: "<?php echo base_url().'admin/subscription/activate_now/'; ?>",
	            type: 'POST',
	            dataType: 'json',
	            data: {
	                customer_id: customer_id
	            },
	            success: function(response) {

	                if (response.status == 'success') {
	                	Swal.fire({
							text: response.message,
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-success"
							}
						}).then(function (result) {
								if (result.isConfirmed) {
									location.reload();
								}
							});
	                } else {
	                	Swal.fire({
							text: response.message,
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-danger"
							}
						});
	                }
	            }
	        });
		}

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