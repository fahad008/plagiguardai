<?php $this->load->view('header'); ?>
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Aside-->
			<?php $this->load->view('left_sidebar'); ?>
			<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Header-->
				<div id="kt_header" class="header">
					<!--begin::Container-->
					<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
						<!--begin::Page title-->
						<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
							<!--begin::Heading-->
							<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Dashboard</h1>
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
							<a href="<?php echo base_url(); ?>" class="d-flex align-items-center">
								<img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" class="h-20px" />
							</a>
							<!--end::Logo-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Topbar-->
						<div class="d-flex align-items-center flex-shrink-0">
							<!--begin::Search-->
							<!--end::Search-->
							<!--begin::Activities-->
							<!--end::Activities-->
							<!--begin::Chat-->
							<!--end::Chat-->
							<!--begin::Sidebar Toggler-->
							<button class="btn btn-icon btn-active-icon-primary d-xxl-none ms-2 me-n2" id="kt_sidebar_toggler">
									<!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
									<span class="svg-icon svg-icon-2x">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black" />
											<path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</button>
							<!--end::Sidebar Toggler-->
						</div>
						<!--end::Topbar-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Container-->
					<div class="container-xxl" id="kt_content_container">
						<!--begin::Sign-in Method-->
						<div class="card mb-5 mb-xl-10">
							<!--begin::Card header-->
							<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
								<div class="card-title m-0">
									<h3 class="fw-bolder m-0">Instant Scan</h3>
								</div>
							</div>
							<!--end::Card header-->
							<!--begin::Content-->
							<div id="kt_account_signin_method" class="collapse show">
								<!--begin::Card body-->
								<div class="card-body border-top align-items-center p-3">
								<!--Path::Svg Icon | path: icons/duotune/general/gen048.svg-->
								<div id="dropzone-error"></div>
								<?php if (isset($customer_credits) && $customer_credits <= 1) {  ?>
								<!--begin::Dropzone-->
								<div class="dropzone dropzone-disabled" id="kt_modal_create_ticket_attachments">
									<!--begin::Message-->
									<div class="dz-message needsclick align-items-center">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/files/fil010.svg-->
										<span class="svg-icon svg-icon-3hx svg-icon-danger">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M19 18C20.7 18 22 16.7 22 15C22 13.3 20.7 12 19 12C18.9 12 18.9 12 18.8 12C18.9 11.7 19 11.3 19 11C19 9.3 17.7 8 16 8C15.4 8 14.8 8.2 14.3 8.5C13.4 7 11.8 6 10 6C7.2 6 5 8.2 5 11C5 11.3 5.00001 11.7 5.10001 12H5C3.3 12 2 13.3 2 15C2 16.7 3.3 18 5 18H19Z" fill="black"/>
											</svg>
										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Info-->
										<div class="ms-4 text-danger">
											<h3 class="fs-5 fw-bolder text-danger mb-2">Your credit balance is 0.</h3>
											<span class="text-800 fw-bold">To continue using the service, please click <a href="<?php echo base_url().'home/pricing/'; ?>">here</a> to contact your reseller and recharge your account.</span>
										</div>
										<!--end::Info-->
									</div>
								</div>
								<!--end::Dropzone-->
								<?php }else{ ?>
								<!--begin::Input group-->
								<div class="fv-row mb-0">
									<!--begin::Dropzone-->
									<div class="dropzone" id="kt_modal_create_ticket_attachments">
										<!--begin::Message-->
										<div class="dz-message needsclick align-items-center">
											<!--begin::Icon-->
											<!--begin::Svg Icon | path: icons/duotune/files/fil010.svg-->
											<span class="svg-icon svg-icon-3hx svg-icon-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 12.6L12.7 9.3C12.3 8.9 11.7 8.9 11.3 9.3L8 12.6H11V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18V12.6H16Z" fill="black" />
													<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<!--end::Icon-->
											<!--begin::Info-->
											<div class="ms-4">
												<h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop file here or click to upload.</h3>
												<span class="fw-bold fs-7 text-gray-400"><b class="text-dark">Accepted:</b> .TXT, .DOCX</span><br>
												<span class="fw-bold fs-7 text-gray-400"><b class="text-dark">Max file size:</b> 5MB</span>
											</div>
											<!--end::Info-->
										</div>
									</div>
									<!--end::Dropzone-->
								</div>
								<!--end::Input group-->
								<?php } ?>
								<!--begin::Separator-->
								<div class="separator separator-dashed my-3"></div>
								<!--end::Separator-->
								<div id="textarea-error"></div>
								<div class="mb-5">
									<label class="fs-6 form-label fw-bolder text-dark">Title</label>
									<input id="scan-title-input" type="text" class="form-control form-control form-control-solid" name="title" value="<?php if(isset($title) && $title != ''){ echo $title; }else{ echo 'Untitled Draft'; } ?>">
								</div>
								<textarea id="textarea-input" placeholder="Enter text here..." rows=10 class="form-control form-control form-control-solid" data-kt-autosize="true"><?php echo $text_area; ?></textarea>

									<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
									<div id="word-vs-credit">
										<div class="table-responsive">
											<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
												<tbody class="border-bottom border-dashed">
													<tr class="text-center">
														<td class="text-start ps-6">
															<div class="fw-bold fs-4 text-danger" id="word-text">Word count: 0</div>
														</td>
														<td id="word-icon">
															<span class="svg-icon svg-icon-2x svg-icon-danger">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
																	<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
																</svg>
															</span>
														</td>
													</tr>
													<tr class="text-center">
														<td class="text-start ps-6">
															<div class="fw-bold fs-4 text-danger" id="credit-text">Estimated credits: 0</div>
														</td>
														<td id="credit-icon">
															<span class="svg-icon svg-icon-2x svg-icon-danger">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
																	<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
																</svg>
															</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>

									<div class="d-flex my-4 float-end w-100">
										<button id="scan-btn" type="button" class="btn btn-primary w-100">Scan</button>
									</div>

								</div>
								<!--end::Card body-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Sign-in Method-->
						<!--begin::Tables Widget 13-->
						<div id="scan-overview" class="card mb-5 mb-xl-8">
							
						</div>
						<div id="pagination"></div>
						<!--end::Tables Widget 13-->
						<div class="card mb-5 mb-xl-8">
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
									<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Scans" />
								</div>
								<!--end::Search-->
							</div>
							<!--begin::Card title-->
							<!--begin::Card toolbar-->
							<div class="card-toolbar">
								<!--begin::Toolbar-->
								<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
									<!--begin::Filter-->
									<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="top">
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
								</div>
								<!--end::Toolbar-->
								<!--begin::Group actions-->
								<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
									<div class="fw-bolder me-5">
									<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
									<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected" data-kt-batch-delete-action="<?php echo base_url().'scan/batch_delete'; ?>">Delete Selected</button>
								</div>
								<!--end::Group actions-->
							</div>
							<!--end::Card toolbar-->
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0">
							<!--begin::Table-->
							<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_scans_table">
								<!--begin::Table head-->
								<thead>
									<!--begin::Table row-->
									<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
										<th class="w-10px pe-2 sorting_disabled" aria-label="Select all">
											<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
												<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_scans_table .form-check-input" value="1" />
											</div>
										</th>
										<th class="min-w-80px">Title</th>
										<th class="min-w-150px">Plagiarism Score</th>
										<th class="min-w-150px">AI Confidence</th>
										<th class="min-w-150px">AI Classification</th>
										<th class="min-w-50px">File</th>
										<th class="min-w-50px">Expiry</th>
										<th class="text-end min-w-50px">Actions</th>
									</tr>
									<!--end::Table row-->
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<tbody class="fw-bold text-gray-600" data-action="<?php echo base_url().'scan/ajax_completed_scans/'; ?>">
								</tbody>
								<!--end::Table body-->
							</table>
							<!--end::Table-->
						</div>
						<!--end::Card body-->
						</div>
						<!--begin::Modal - New Address-->
						<div class="modal fade" id="kt_modal_new_title" tabindex="-1" aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered mw-650px">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Form-->
									<form class="form" action="<?php echo base_url().'scan/update_title'; ?>" id="kt_modal_new_title_form">
										<!--begin::Modal header-->
										<div class="modal-header">
											<!--begin::Modal title-->
											<h2>Add New Title</h2>
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
										<!--end::Modal header-->
										<!--begin::Modal body-->
										<div class="modal-body py-10 px-lg-17">
											<!--begin::Input group-->
											<div class="d-flex flex-column mb-5 fv-row">
												<!--begin::Label-->
												<label class="fs-5 fw-bold mb-2">New Title</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="hidden" name="scan_id" id="scan-id-input" />
												<input class="form-control form-control-solid" placeholder="" name="title" id="scan-title-modal-input" />
												<!--end::Input-->
											</div>
											<!--end::Input group-->
										</div>
										<!--end::Modal body-->
										<!--begin::Modal footer-->
										<div class="modal-footer flex-center">
											<!--begin::Button-->
											<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
											<!--end::Button-->
											<!--begin::Button-->
											<button type="submit" id="kt_modal_new_title_submit" class="btn btn-primary">
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
						<!--end::Modal - New Address-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<?php $this->load->view('footer'); ?>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Sidebar-->
			<?php $this->load->view('right_sidebar'); ?>
			<!--end::Sidebar-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->
	<input type="hidden" name="customer_uploads_id" value="" id="customer_uploads_id">
	<input type="hidden" value="<?php if(isset($scan_id) && $scan_id != ''){ echo $scan_id; } ?>" id="scan_id">

	<?php $this->load->view('modals/create_app'); ?>
	<!--end::Modal - Create App-->
	<!--begin::Modal - Upgrade plan-->
	<?php $this->load->view('modals/upgrade_plan'); ?>
	<!--end::Modal - Upgrade plan-->
	<!--end::Modals-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
				<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
			</svg>
		</span>
		<!--end::Svg Icon-->
	</div>
	<!--end::Scrolltop-->

	<!--end::Main-->
	<script>var hostUrl = "assets/";</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<script src="assets/js/custom/scans/completed.js"></script>

	<script src="assets/js/custom/widgets.js"></script>
	<script src="assets/js/custom/detection-charts.js"></script>
	<script src="assets/js/custom/modals/new-title.js"></script>
	<!--end::Javascript-->
	<script>

		$(document).ready(function() {
			showPageLoader();
			var my_scan = $("#scan_id").val();

			setTimeout(() => {
				loadAIResults(my_scan);
		        textChangEvent();
		        $('#scan-overview-table').DataTable({
			        pageLength: 10,
			        ordering: true,
			        responsive: true
			    });
		    }, 1000);
			
			// $('#pagination').on('click','a',function(e){
		 //       e.preventDefault(); 
		 //       var pageno = $(this).attr('data-ci-pagination-page');
		 //       loadScanOverview(pageno);
		 //     });

			var btnStatus = 'paused';
			var requiredCredits = 0;
			var wordCount = 0;
			$('#scan-btn').on('click',function(event){
				// console.log(btnStatus);
				if (btnStatus == 'paused') {
			        $('#scan-btn').prop('disabled', true);
			        return;
			    }
				showPageLoader();
				
		      	const text = $('#textarea-input').val().trim();
		      	const title = $('#scan-title-input').val().trim();
		      	const customer_uploads_id = $('#customer_uploads_id').val();
		      	const word_count = wordCount;
	      		$.ajax({
		        	url : "<?php echo base_url().'scan/'; ?>",
			        method : 'POST' ,
			        dataType : 'json',
			        data: { text: text, title: title, estimated_credits: requiredCredits, word_count: word_count, customer_uploads_id:customer_uploads_id }
		      	}).then(function(response){
		      		console.log(response);
			      	if (response.status == 'success') {
			      		loadAIResults(response.scan_id);
			   //    		Swal.fire({
						//     html: response.message,
						//     icon: "success",
						//     buttonsStyling: false,
						//     confirmButtonText: "ok",
						//     customClass: {
						//         confirmButton: "btn btn-success"
						//     }
						// });

			      	}else{
			      		Swal.fire({
						    html: response.message,
						    icon: "error",
						    buttonsStyling: false,
						    confirmButtonText: "Continue",
						    customClass: {
						        confirmButton: "btn btn-danger"
						    }
						});

			      	}
			      	hidePageLoader();
			      	btnStatus = 'start';
		      		$('#scan-btn').prop('disabled', false);
		      	});
		    });

		    function loadAIResults(scan_id = '') {

	      		$.ajax({
		        	url : "<?php echo base_url().'scan/get_scan_report/'; ?>",
			        method : 'POST' ,
			        dataType : 'json',
			        data: { scan_id: scan_id }
		      	}).then(function(response){
		      		if (response.status == 'success') {
			      		$("#kt_sidebar_content").html(response.right_sidebar);

			      		setTimeout(function () {

			               	var chart_one = [response.scan_info.one_ai, response.scan_info.one_or];
						    var label_one = ['AI Detection', 'Authenticity'];
						    var color_one = [response.scan_info.one_ai_color, response.scan_info.one_or_color];

						    AIdoughnut.init('chart-1', chart_one, label_one, color_one);

						    var chart_two = [response.scan_info.two_ai, response.scan_info.two_or];
						    var label_two = ['AI Detection', 'Authenticity'];
						    var color_two = [response.scan_info.two_ai_color, response.scan_info.two_or_color];

						    AIdoughnut.init('chart-2', chart_two, label_two, color_two);

						    var chart_three = [response.scan_info.three_pl, response.scan_info.three_or];
						    var label_three = ['Plagiarized', 'Uniqueness'];
						    var color_three = [response.scan_info.three_pl_color, response.scan_info.three_or_color];

						    AIdoughnut.init('chart-3', chart_three, label_three, color_three);

							KTScroll.createInstances();
						    KTApp.init();

			            }, 50);

		      		}else{

		      			setTimeout(function () {

			               	var chart_one = ['50', '50'];
						    var label_one = ['AI Detection', 'Authenticity'];
						    var color_one = ['#f1f3f5', '#f1f3f5'];

						    AIdoughnut.init('chart-1', chart_one, label_one, color_one);

						    var chart_two = ['50', '50'];
						    var label_two = ['AI Detection', 'Authenticity'];
						    var color_two = ['#f1f3f5', '#f1f3f5'];

						    AIdoughnut.init('chart-2', chart_two, label_two, color_two);

						    var chart_three = ['50', '50'];
						    var label_three = ['Plagiarized', 'Uniqueness'];
						    var color_three = ['#f1f3f5', '#f1f3f5'];

						    AIdoughnut.init('chart-3', chart_three, label_three, color_three);

							KTScroll.createInstances();
						    KTApp.init();

			            }, 50);
		      		}

		      		hidePageLoader();
		      		
		      	});
		    }

		    // function loadScanOverview(pagno=0) {
		    // 	showPageLoader();
	     //  		$.ajax({
		    //     	url : "<?php //echo base_url(); ?>scan/get_scan_overview/"+pagno,
			   //      method : 'get' ,
			   //      dataType : 'json',
		    //   	}).then(function(response){
		    //   		if (response.status == 'success') {
			   //    		$("#scan-overview").html(response.scan_overview);
			   //    		$('#pagination').html(response.page_links.pagination);
		    //   		}else{

		    //   		}

		    //   		hidePageLoader();
		      		
		    //   	});
		    // }

		   	$(document).on('click', '#get-scan-results', function(event) {
		   		var scan_id   = $(this).data('scan-id');
		   		loadAIResults(scan_id);
		    });


			$('#scan-btn').prop('disabled', true);
			const USER_CREDITS = <?= $customer_credits ?? 4 ?>;
			const BLOCK_LENGTH = <?= $settings['block_length'] ?? 100 ?>;
			const CREDITS_PER_BLOCK = <?= $settings['credits_per_block'] ?? 4 ?>;
			const MIN_WORDS = <?= $settings['min_words'] ?? 100 ?>;
			const MAX_WORDS = <?= $settings['max_words'] ?? 6000 ?>;

			// console.log(USER_CREDITS);
		    $('#textarea-input').on('input', function() {
		        textChangEvent();
		    });

		    function textChangEvent(){
		    	var text = $("#textarea-input").val();
		        const words = countWords(text);
		        wordCount = words;
		        requiredCredits = calculateCredits(words);

				const $word_icon = $('#word-icon');
    			const $credit_icon = $('#credit-icon'); 
    			const $word_text = $('#word-text'); 
    			const $credit_text = $('#credit-text'); 

		        if (words < MIN_WORDS) {
		        	let min_text = 'Word count: '+words+' , Minimum scan is '+MIN_WORDS+' words';
			        $word_text.text(min_text).removeClass('text-gray-800').addClass('text-danger');
			        $word_icon.html(getCrossIcon());
			        $('#scan-btn').prop('disabled', true);
			        btnStatus = 'paused';

			        if (requiredCredits <= 0) {
			            
			            $credit_text.text('Estimated credits: '+requiredCredits).removeClass('text-gray-800').addClass('text-danger');;
			            $credit_icon.html(getCrossIcon());
			            $('#scan-btn').prop('disabled', true);
			            btnStatus = 'paused';
			        } else {

			            $credit_text.text('Estimated credits: '+requiredCredits).removeClass('text-danger').addClass('text-gray-800');
			            $credit_icon.html(getTickIcon());
			            $('#scan-btn').prop('disabled', false);
			            btnStatus = 'start';
			        }

			    } else if (words > MAX_WORDS) {
			    	let max_text = 'Word count: '+words+' , Maximum scan is '+MAX_WORDS+' words';
			        $word_text.text(max_text).removeClass('text-gray-800').addClass('text-danger');
			        $word_icon.html(getCrossIcon());

			        $credit_text.text('Estimated credits: 0').removeClass('text-gray-800').addClass('text-danger');
	            	$credit_icon.html(getCrossIcon());
		            $('#scan-btn').prop('disabled', true);
		            btnStatus = 'paused';

			    } else {
			    	let green_text = 'Word count: '+words;
			    	$word_text.text(green_text).removeClass('text-danger').addClass('text-gray-800');
			    	$word_icon.html(getTickIcon());
			    	$('#scan-btn').prop('disabled', false);
			    	btnStatus = 'start';

			    	if (requiredCredits <= 0) {
			            
			            $credit_text.text('Estimated credits: '+requiredCredits).removeClass('text-gray-800').addClass('text-danger');;
			            $credit_icon.html(getCrossIcon());
			            $('#scan-btn').prop('disabled', true);
			            btnStatus = 'paused';
			        } else {

			            $credit_text.text('Estimated credits: '+requiredCredits).removeClass('text-danger').addClass('text-gray-800');
			            $credit_icon.html(getTickIcon());
			            $('#scan-btn').prop('disabled', false);
			            btnStatus = 'start';
			        }
			    }
		    }

		    function countWordsOldOLd(text) {
			    if (!text || !text.trim()) return 0;
			    const matches = text.match(/\b[\w'-]+\b/g);
			    return matches ? matches.length : 0;
			}

			function countWordsold(text) {
			    if (!text || !text.trim()) return 0;

			    // Normalize whitespace
			    text = text.trim().replace(/\s+/g, ' ');

			    // Remove URLs
			    text = text.replace(/\b(?:https?:\/\/|www\.)\S+\b/gi, '');

			    // Match words including hyphens and apostrophes
			    // Also match last word even if it ends with dots
			    const matches = text.match(/\b[^\d\W][\w'-]*[^\W\d]?\.*/g);

			    return matches ? matches.length : 0;
			}

			// Gemini profitable

			function countWords(text) {
			    if (!text || !text.trim()) return 0;

			    // 1. Remove URLs
			    text = text.replace(/\b(?:https?:\/\/|www\.)\S+\b/gi, '');

			    // 2. Extract significant tokens
			    // Pattern explanation:
			    // [a-zA-Z0-9']+ : Matches standard words
			    // \.{2,}        : Matches 2 or more consecutive dots as a separate token
			    const tokens = text.match(/[a-zA-Z0-9']+|\.{2,}/g) || [];

			    // 3. Filter out standalone dots if they aren't connected to anything (optional)
			    // and return the length
			    return tokens.length;
			}


			function calculateCredits(words) {
			    if (words < BLOCK_LENGTH) return 0;         // Less than 100 words → 0 credits
			    if (words === BLOCK_LENGTH) return 2;       // Exactly 100 words → 2 credits

			    // For 101+ words: every 100 words block after 100 adds 2 credits
			    // 101–200 → 4, 201–300 → 6, 301–400 → 8
			    return 2 + Math.floor((words - 1) / BLOCK_LENGTH) * 2;
			}

			function calculateCreditsold(words) {
			    if (words <= 0) return 0;
			    if (words === BLOCK_LENGTH) return 2;
			    // Each block costs 2 credits
			    let blocks = Math.ceil(words / BLOCK_LENGTH);
			    return blocks * 2;
			}


			function getCrossIcon() {
			    return `
			    <span class="svg-icon svg-icon-2x svg-icon-danger">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
						<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
					</svg>
				</span>
			    `;
			}

			function getTickIcon() {
			    return `
			    <span class="svg-icon svg-icon-2x svg-icon-success">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black"></path>
						<path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black"></path>
					</svg>
				</span>
			    `;
			}
		});

		

		var myDropzone = new Dropzone("#kt_modal_create_ticket_attachments", {
		    url: "<?php echo base_url().'File_manager/'; ?>",
		    paramName: "file",
		    maxFiles: 1,
		    maxFilesize: 5, // MB
		    addRemoveLinks: false,
		    acceptedFiles: ".txt,.docx",
		    dictInvalidFileType: "File type not allowed.",
		    init: function() {
		    	var dz = this;
		        dz.on("addedfile", function(file) {
		            // If there is already a file, remove it
		            if (dz.files.length > 1) {
		                dz.removeFile(dz.files[0]); // remove the first/old file
		            }
		        });

		        dz.on("success", function(file, response) {
		        	console.log(response);
		            // Ensure JSON object
		            if (typeof response === "string") {
		                response = JSON.parse(response);
		            }

		            // If server returned an error, trigger Dropzone error event
		            if (response.status === "success") {
		            	dz.removeFile(file);
		            	setTextareaValue('#textarea-input', response.text);
		            	$("#scan-title-input").val(response.title);
		            	$("#customer_uploads_id").val(response.customer_uploads_id);
		                showInfo('#textarea-error',response.message);
						scrollToTextarea('#textarea-error', 100);
		            }else{
		            	$("#scan-title-input").val('Untitled Draft');
		            	dz.emit("error", file, response.message);
		            	dz.removeFile(file);
		            	showError('#dropzone-error',response.message);
		            	Swal.fire({
						    text: response.message,
						    icon: "error",
						    buttonsStyling: false,
						    confirmButtonText: "Continue",
						    customClass: {
						        confirmButton: "btn btn-danger"
						    }
						});
		            }
		        });
		    },
		    accept: function(file, done) {
		        // Optional custom validation
		        const allowedExtensions = /(\.txt|\.doc|\.docx)$/i;
		        if (!allowedExtensions.exec(file.name)) {
		            done("error");
		        } else {
		            done();
		        }
		    }
		});

		var customerCredits = '<?php echo (int)$customer_credits; ?>';
		if (customerCredits <= 1) {
			myDropzone.disable();
		}


		function setTextareaValue(selector, text) {
		    const textarea = document.querySelector(selector);
		    if (!textarea) return;

		    textarea.value = text;

		    // Force autosize recalculation
		    textarea.dispatchEvent(new Event('input', { bubbles: true }));
		}


		function scrollToElement(selector, offset = 0) {
		    const $el = $(selector);
		    if (!$el.length) return;

		    $('html, body').animate({
		        scrollTop: $el.offset().top - offset
		    }, 600);
		}

		function scrollToTextarea(selector, offset = 50) {
		    const $el = $(selector);
		    if (!$el.length) return;

		    $('html, body').animate({
		        scrollTop: $el.offset().top - offset
		    }, 600);
		}


		function showError(element_id, message, timeout = 3000) {
		    const html = `
		        <div class="alert alert-danger d-flex align-items-center p-5" id="dropzone-error-alert">
		            <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
		                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"/>
		                    <rect x="9" y="13.0283" width="7.3536" height="1.2256" rx="0.6128" transform="rotate(-45 9 13.0283)" fill="black"/>
		                    <rect x="9.86664" y="7.93359" width="7.3536" height="1.2256" rx="0.6128" transform="rotate(45 9.86664 7.93359)" fill="black"/>
		                </svg>
		            </span>

		            <div class="d-flex flex-column">
		                <h4 class="mb-1">Attention</h4>
		                <span>${message}</span>
		            </div>
		        </div>
		    `;

		    // Replace any existing alert
		    $(element_id).html(html);

		    // Auto remove after timeout
		    setTimeout(() => {
		        $("#dropzone-error-alert").fadeOut('slow', function () {
		            $(this).remove();
		        });
		    }, timeout);
		}

		function showInfo(element_id, message, timeout = 3000) {
		    const html = `
		        <div class="alert alert-primary d-flex align-items-center p-5" id="dropzone-error-alert">
		            <span class="svg-icon svg-icon-2hx svg-icon-primary me-4">
		                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"/>
		                    <rect x="9" y="13.0283" width="7.3536" height="1.2256" rx="0.6128" transform="rotate(-45 9 13.0283)" fill="black"/>
		                    <rect x="9.86664" y="7.93359" width="7.3536" height="1.2256" rx="0.6128" transform="rotate(45 9.86664 7.93359)" fill="black"/>
		                </svg>
		            </span>

		            <div class="d-flex flex-column">
		                <h4 class="mb-1">Attention</h4>
		                <span>${message}</span>
		            </div>
		        </div>
		    `;

		    // Replace any existing alert
		    $(element_id).html(html);

		    // Auto remove after timeout
		    setTimeout(() => {
		        $("#dropzone-error-alert").fadeOut('slow', function () {
		            $(this).remove();
		        });
		    }, timeout);
		}

		// document.addEventListener('click', function () {
		//     hidePageLoader();
		// });

		function showPageLoader() {
		    const el = document.getElementById('kt_app_page_loader');
		    el.style.display = 'flex';
		    requestAnimationFrame(() => el.classList.add('show'));
		}

		function hidePageLoader() {
		    const el = document.getElementById('kt_app_page_loader');
		    el.classList.remove('show');
		    setTimeout(() => el.style.display = 'none', 250);
		}

		function show_popup(el){
			const status = el.dataset.status;
			const message = el.dataset.message;
			Swal.fire({
			    html: message,
			    icon: 'error',
			    buttonsStyling: false,
			    confirmButtonText: "ok",
			    customClass: {
			        confirmButton: "btn btn-success"
			    }
			});
		}

		// function delete_scan(el){
		// 	// showPageLoader();
		// 	const scan_id = el.dataset.id;
		// 	$.ajax({
		//         	url : "<?php echo base_url().'scan/delete_scan/'; ?>",
		// 	        method : 'POST' ,
		// 	        dataType : 'json',
		// 	        data: { scan_id: scan_id }
		//       	}).then(function(response){
		//       		console.log(response);
		// 	      	if (response.status == 'success') {
		// 	      		// loadScanOverview(0);
		// 	      		Swal.fire({
		// 				    html: response.message,
		// 				    icon: "success",
		// 				    buttonsStyling: false,
		// 				    confirmButtonText: "ok",
		// 				    customClass: {
		// 				        confirmButton: "btn btn-success"
		// 				    }
		// 				});

		// 	      	}else{
		// 	      		Swal.fire({
		// 				    html: response.message,
		// 				    icon: "error",
		// 				    buttonsStyling: false,
		// 				    confirmButtonText: "Continue",
		// 				    customClass: {
		// 				        confirmButton: "btn btn-danger"
		// 				    }
		// 				});

		// 	      	}
		// 	      	hidePageLoader();
		//       	});
		// }

		function show_title_poppup(el){
			const id = el.dataset.id;
			const title = el.dataset.title;
			$("#scan-id-input").val(id);
			$("#scan-title-modal-input").val(title);
			$("#kt_modal_new_title").modal('show');
		}


	</script>
</body>
<!--end::Body-->
</html>