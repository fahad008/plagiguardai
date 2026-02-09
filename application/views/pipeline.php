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
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Scan Queue</h1>
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
					<div class="card mb-5 mb-xl-10 p-2">
						<!--begin::Card header-->
						<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_bulk_uploads">
							<div class="card-title m-0">
								<h3 class="fw-bolder m-0">Bulk Uploads</h3>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Content-->
						<div id="kt_bulk_uploads" class="collapse show">
							<!--begin::Card body-->
							<div class="card-body border-top align-items-center p-3">
							<!--Path::Svg Icon | path: icons/duotune/general/gen048.svg-->
							<div id="bulk-dropzone-error"></div>
								<form method="post" enctype="multipart/form-data" class="form" action="<?php echo base_url().'file_manager/bulk_upload/'; ?>" id="kt_bulk_upload_form">
									<!--begin::Input group-->
									<div class="fv-row mb-0">
										<?php if (isset($customer_credits) && $customer_credits <= 1) {  ?>
										<!--begin::Dropzone-->
										<div class="dropzone dropzone-disabled" id="kt_modal_bulk_attachments">
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
													<span class="text-800 fw-bold">To continue using the service, please click <a href="<?php echo base_url().'home/pricing/'; ?>">here</a> to contact our team and recharge your account.</span>
												</div>
												<!--end::Info-->
											</div>
										</div>
										<!--end::Dropzone-->
										<?php }else if(isset($cron_exhausted) && $cron_exhausted >= 1){ ?>
										<!--begin::Dropzone-->
										<div class="dropzone dropzone-disabled" id="kt_modal_bulk_attachments">
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
													<h3 class="fs-5 fw-bolder text-danger mb-2">Your upload queue is full.</h3>
													<span class="text-800 fw-bold">You can add more files once your current uploads have finished scanning.</span>
												</div>
												<!--end::Info-->
											</div>
										</div>
										<!--end::Dropzone-->
											
									<?php }else{ ?>
										<!--begin::Dropzone-->
										<div class="dropzone" id="kt_modal_bulk_attachments">
											<!--begin::Message-->
											<div class="dz-message needsclick align-items-center">
												<!--begin::Icon-->
												<!--begin::Svg Icon | path: icons/duotune/files/fil010.svg-->
												<span class="svg-icon svg-icon-3hx svg-icon-primary">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M5 16C3.3 16 2 14.7 2 13C2 11.3 3.3 10 5 10H5.1C5 9.7 5 9.3 5 9C5 6.2 7.2 4 10 4C11.9 4 13.5 5 14.3 6.5C14.8 6.2 15.4 6 16 6C17.7 6 19 7.3 19 9C19 9.4 18.9 9.7 18.8 10C18.9 10 18.9 10 19 10C20.7 10 22 11.3 22 13C22 14.7 20.7 16 19 16H5ZM8 13.6H16L12.7 10.3C12.3 9.89999 11.7 9.89999 11.3 10.3L8 13.6Z" fill="black"/>
													<path d="M11 13.6V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19V13.6H11Z" fill="black"/>
													</svg>
												</span>
												<!--end::Svg Icon-->
												<!--end::Icon-->
												<!--begin::Info-->
												<div class="ms-4">
													<h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
													<span class="fw-bold fs-7 text-gray-400"><b class="text-dark">Accepted:</b> .TXT, .DOCX</span><br>
													<span class="fw-bold fs-7 text-gray-400"><b class="text-dark">Max file size:</b> 5MB</span>
												</div>
												<!--end::Info-->
											</div>
										</div>
										<!--end::Dropzone-->
									<?php } ?>
									</div>
									<!--end::Input group-->
								</form>
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Content-->
						<div class="separator separator-dashed my-3"></div>

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
											<!--begin::Input group-->
											<div class="mb-10">
												<!--begin::Label-->
												<label class="form-label fs-5 fw-bold mb-3">Status:</label>
												<!--end::Label-->
												<!--begin::Options-->
												<div class="d-flex flex-column flex-wrap fw-bold" data-kt-customer-table-filter="status">
													<!--begin::Option-->
													<label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
														<input class="form-check-input" type="radio" name="status" value="" checked="checked" />
														<span class="form-check-label text-gray-600">All</span>
													</label>
													<!--end::Option-->
													<!--begin::Option-->
													<label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
														<input class="form-check-input" type="radio" name="status" value="pending" />
														<span class="form-check-label text-gray-600">Pending</span>
													</label>
													<label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
														<input class="form-check-input" type="radio" name="status" value="completed" />
														<span class="form-check-label text-gray-600">Completed</span>
													</label>
													<label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
														<input class="form-check-input" type="radio" name="status" value="failed" />
														<span class="form-check-label text-gray-600">Failed</span>
													</label>
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
										<th class="min-w-150px">Title</th>
										<th class="min-w-100px">Est. Credits</th>
										<th class="min-w-100px">Words</th>
										<th class="min-w-100px">Status</th>
										<th class="min-w-100px">File</th>
										<th class="text-end min-w-70px">Actions</th>
									</tr>
									<!--end::Table row-->
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<tbody class="fw-bold text-gray-600" data-action="<?php echo base_url().'scan/ajax_bulk_scans/'; ?>">
								</tbody>
								<!--end::Table body-->
							</table>
							<!--end::Table-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Sign-in Method-->

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
<input type="hidden" value="<?php if(isset($scan_id) && $scan_id != ''){ echo $scan_id; } ?>" id="scan_id">
<!-- <?php //$this->load->view('modals/create_app'); ?> -->
<!--begin::Modal - New Address-->
<div class="modal fade" id="kt_modal_scan_detail" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-1000px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header">
				<!--begin::Modal title-->
				<h2>Scan Insights</h2>
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
			<div class="modal-body py-10 px-lg-17" id="scan-detail-html">
				
			</div>
			<!--end::Modal body-->
		</div>
	</div>
</div>
<!--end::Modal - New Address-->
<!-- <?php //$this->load->view('modals/upgrade_plan'); ?> -->
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
<script src="assets/js/custom/scans/all.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/detection-charts.js"></script>
<!--end::Page Custom Javascript-->
<script src="assets/js/custom/modals/new-title.js"></script>
<!--end::Javascript-->
<script>

	$(document).ready(function() {

		showPageLoader();

		Dropzone.autoDiscover = false;
		var que_limit = false;
		var bulkDropzone = new Dropzone("#kt_modal_bulk_attachments", {
		    url: "<?php echo base_url().'file_manager/bulk_uploads'; ?>",
		    
		    autoProcessQueue: true,  // upload automatically
		    uploadMultiple: false,   // one file per request
		    parallelUploads: 1,      // sequential uploads
		    paramName: "file",
		    
		    maxFiles: 10,
		    maxFilesize: 5, // MB
		    addRemoveLinks: true,
		    acceptedFiles: ".txt,.doc,.docx",
		    
		    dictInvalidFileType: "File type not allowed",
		    dictFileTooBig: "File must be less than 5MB",
		    
		    init: function () {
		        var dz = this;
		        
		        dz.on("success", function(file, response) {
		            if (typeof response === "string") {
		                response = JSON.parse(response);
		            }

		            // Remove the uploaded file from Dropzone
		            dz.removeFile(file);

		            if (response.status === "success") {
		              
						toastr.success(response.message, response.file_name, successOptions);

		            } else if(response.status === "que_limit"){
		             	que_limit = true;
		            }else{
		            	toastr.error(response.message, response.file_name, errorOptions);
		            }
		        });

		        dz.on("queuecomplete", function() {
		            hidePageLoader();
		            if (que_limit) {
		            	Swal.fire({
						    text: 'Your upload queue is full. You can add more files once your current uploads have finished scanning.',
						    icon: "error",
						    confirmButtonText: "OK",
						    customClass: {
						        confirmButton: "btn btn-danger"
						    }
						}).then((result) => {
						    if (result.isConfirmed) {
						        // Reload the page
						        location.reload();
						    }
						});

		            }
		            var datatable = KTscansList.getDatatable();
		            if (datatable) {
		                datatable.ajax.reload(null, false); // refresh without resetting page
		            }
		        });
		    },
		    
		    accept: function(file, done) {
		        const allowedExtensions = /(\.txt|\.doc|\.docx)$/i;
		        const maxSize = 5 * 1024 * 1024; // 5MB

		        if (!allowedExtensions.test(file.name)) {
		            done("File type not allowed");
		        } else if (file.size > maxSize) {
		            done("File must be less than 5MB");
		        } else {
		            showPageLoader();
		            done(); // valid
		        }
		    }
		});

		// showPageLoader();
		var customerCredits = '<?php echo (int)$customer_credits; ?>';
		var cron_exhausted = '<?php echo (int)$cron_exhausted; ?>';
		if (customerCredits <= 1) {
			bulkDropzone.disable();
		}
		if (cron_exhausted >= 1) {
			bulkDropzone.disable();
		}

		var my_scan = $("#scan_id").val();

		setTimeout(() => {
			loadAIResults(my_scan);
	    }, 1000);

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



toastr.options = {
    showMethod: 'slideDown',
    hideMethod: 'slideUp',
    positionClass: 'toast-custom-position',
    newestOnTop: false,  // stack instead of replacing
    preventDuplicates: false,
    tapToDismiss: false
};

var successOptions = {
    showDuration: 250,   // fade in speed
    hideDuration: 400,   // fade out speed
    timeOut: 2000,       // success auto hide
    extendedTimeOut: 300,
    closeButton: false,
    progressBar: true,
    newestOnTop: false,  // stack instead of replacing
    preventDuplicates: false,
    tapToDismiss: false
};

var errorOptions = {
    showDuration: 250,   // fade in speed
    hideDuration: 400,   // fade out speed
    timeOut: 3000,       // success auto hide
    extendedTimeOut: 1000,
    closeButton: true,
    progressBar: true,
    newestOnTop: false,  // stack instead of replacing
    preventDuplicates: false,
    tapToDismiss: true
};

	});

	function show_title_poppup(el){
		const id = el.dataset.id;
		const title = el.dataset.title;
		$("#scan-id-input").val(id);
		$("#scan-title-modal-input").val(title);
		$("#kt_modal_new_title").modal('show');
	}


function scan_details(el) {
    const scan_id = el.getAttribute('data-id');
    $.ajax({
        url: "<?php echo base_url().'scan/detail/'; ?>",
        type: 'POST',
        dataType: 'json',
        data: {
            scan_id: scan_id
        },
        success: function(response) {

            if (response.status == 'success') {
            	console.log(response);
            	$("#scan-detail-html").html(response.html);
            	$("#kt_modal_scan_detail").modal('show');
            } else {
            	Swal.fire({
				    text: response.message,
				    icon: "error",
				    confirmButtonText: "OK",
				    customClass: {
				        confirmButton: "btn btn-danger"
				    }
				});
            }
        }
    });
}
</script>
</body>
<!--end::Body-->
</html>