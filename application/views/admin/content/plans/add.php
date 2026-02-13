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
			<!--begin::List Widget 6-->
			<div class="card card-xl-stretch mb-5 mb-xl-8">
				<!--begin::Header-->
				<div class="card-header border-0">
					<h3 class="card-title fw-bolder text-dark">Colors and Badges</h3>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-0">
					<div class="row g-6 g-xl-9">
						<?php if (isset($plans_text) && !empty($plans_text)) { 
							foreach ($plans_text as $key => $value) { ?>
						<!--begin::Item-->
						<div class="col-md-6 col-xl-4">
							<div class="d-flex align-items-center bg-light-<?php echo $value; ?> rounded p-5 mb-3">
								<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
								<span class="svg-icon svg-icon-3x svg-icon-<?php echo $value; ?>">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M14 18V16H10V18L9 20H15L14 18Z" fill="black"/>
									<path opacity="0.3" d="M20 4H17V3C17 2.4 16.6 2 16 2H8C7.4 2 7 2.4 7 3V4H4C3.4 4 3 4.4 3 5V9C3 11.2 4.8 13 7 13C8.2 14.2 8.8 14.8 10 16H14C15.2 14.8 15.8 14.2 17 13C19.2 13 21 11.2 21 9V5C21 4.4 20.6 4 20 4ZM5 9V6H7V11C5.9 11 5 10.1 5 9ZM19 9C19 10.1 18.1 11 17 11V6H19V9ZM17 21V22H7V21C7 20.4 7.4 20 8 20H16C16.6 20 17 20.4 17 21ZM10 9C9.4 9 9 8.6 9 8V5C9 4.4 9.4 4 10 4C10.6 4 11 4.4 11 5V8C11 8.6 10.6 9 10 9ZM10 13C9.4 13 9 12.6 9 12V11C9 10.4 9.4 10 10 10C10.6 10 11 10.4 11 11V12C11 12.6 10.6 13 10 13Z" fill="black"/>
									</svg>
								</span>
								<!--end::Svg Icon-->
								<!--end::Icon-->
								<!--begin::Title-->
								<div class="flex-grow-1 me-2">
									<a href="Javascript: void(0)" class="fw-bolder text-gray-800 text-hover-primary fs-6"><?php echo $value; ?></a>
								</div>
								<!--end::Title-->
								<!--begin::Lable-->
								<span class="fw-bolder text-<?php echo $value; ?> py-1">color</span>
								<!--end::Lable-->
							</div>
						</div>
						<!--end::Item-->
						<?php }	} ?>
					</div>
				</div>
				<!--end::Body-->
			</div>
			<!--end::List Widget 6-->
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card body-->
				<div class="card-body p-0">
					<!--begin::Basic info-->
					<div class="card mb-5 mb-xl-10">
						<!--begin::Card header-->
						<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_add_plan_area" aria-expanded="true" aria-controls="kt_add_plan_area">
							<!--begin::Card title-->
							<div class="card-title m-0">
								<h3 class="fw-bolder m-0">Add Plan</h3>
							</div>
							<!--end::Card title-->
						</div>
						<!--begin::Card header-->
						<!--begin::Content-->
						<div id="kt_add_plan_area" class="collapse show">
							<!--begin::Form-->
							<form id="kt_plan_form" class="form" action="<?php echo base_url().'admin/plans/add_plan/'; ?>">
								<!--begin::Card body-->
								<div class="card-body border-top p-9">
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Title</span>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
												<input type="text" name="title" class="form-control form-control-lg form-control-solid" placeholder="Title" value=""/>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Description</span>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<textarea class="form-control form-control-lg form-control-solid" rows="3" name="description" placeholder="Type Plan Description"></textarea>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Credits</span>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<input type="number" name="credits" class="form-control form-control-lg form-control-solid" min="1" placeholder="Credits" value="" onkeydown="return event.key !== '-' && event.key !== 'e' && event.key !== 'E' && event.key !== '.'" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.startsWith('0')) this.value = this.value.replace(/^0+/, '')"/>
										</div>
										<!--end::Col-->
									</div>
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Price</span>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<input type="number" name="price" class="form-control form-control-lg form-control-solid" min="1" placeholder="price" value="" onkeydown="return event.key !== '-' && event.key !== 'e' && event.key !== 'E' && event.key !== '.'" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.startsWith('0')) this.value = this.value.replace(/^0+/, '')"/>
										</div>
										<!--end::Col-->
									</div>
									<div class="row mb-6">
										<label class="col-lg-4 col-form-label fw-bold fs-6"><span class="required">Duration</span></label>
										<div class="col-lg-8 fv-row">
											<select name="duration" data-control="select2" data-hide-search="true" data-placeholder="Select a Duration..." class="form-select form-select-solid">
												<option selected value="30">Monthly</option>
												<option value="365">Yearly</option>
											</select>
										</div>
									</div>
									<div class="row mb-6">
										<label class="col-lg-4 col-form-label fw-bold fs-6"><span class="required">Color</span></label>
										<div class="col-lg-8 fv-row">
											<select name="color" data-control="select2" data-hide-search="true" data-placeholder="Select a Color..." class="form-select form-select-solid">
												<option value="">Select a Color...</option>
												<?php if (isset($plans_text) && !empty($plans_text)) {
													foreach ($plans_text as $key => $value) { ?>
													<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
												<?php } } ?>
											</select>
										</div>
									</div>
								</div>
								<!--end::Card body-->
								<!--begin::Actions-->
								<div class="card-footer d-flex justify-content-end py-6 px-9">
									<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
									<button type="submit" class="btn btn-primary" id="kt_plan_submit">Save Changes</button>
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Basic info-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Card-->
			<!--begin::Modals-->
			<!--end::Modals-->
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