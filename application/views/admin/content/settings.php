<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Settings</h1>
				<!--end::Heading-->
			</div>
			<!--end::Page title=-->
			<!--begin::Wrapper-->
			<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
				<!--begin::Logo-->
				<a href="<?php echo base_url().'admin/dashboard/'; ?>" class="d-flex align-items-center">
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
				<!--begin::Card body-->
				<div class="card-body p-0">
					<!--begin::Basic info-->
					<div class="card mb-5 mb-xl-10">
						<!--begin::Card header-->
						<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
							<!--begin::Card title-->
							<div class="card-title m-0">
								<h3 class="fw-bolder m-0">PLAGIGUARDAI Settings</h3>
							</div>
							<!--end::Card title-->
						</div>
						<!--begin::Card header-->
						<!--begin::Content-->
						<div id="kt_account_profile_details" class="collapse show">
							<!--begin::Form-->
							<form id="kt_plagi_settings_form" class="form" action="<?php echo base_url().'admin/dashboard/update_settings/' ?>">
								<!--begin::Card body-->
								<div class="card-body border-top p-9">
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Minimum Words</span>
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Word count must be at least 100."></i>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
												<input type="number" name="min_words" class="form-control form-control-lg form-control-solid" min="100" max="6000" placeholder="Minimum Words" value="<?php echo $settings['min_words']; ?>" onkeydown="return event.key !== '-' && event.key !== 'e' && event.key !== 'E' && event.key !== '.'" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.startsWith('0')) this.value = this.value.replace(/^0+/, '')"/>
											</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Maximum Words</span>
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Word count must be between 100 and 6000."></i>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<input type="number" name="max_words" class="form-control form-control-lg form-control-solid" min="100" max="6000" placeholder="Maximum Words" value="<?php echo $settings['max_words']; ?>" onkeydown="return event.key !== '-' && event.key !== 'e' && event.key !== 'E' && event.key !== '.'" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.startsWith('0')) this.value = this.value.replace(/^0+/, '')"/>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Block Length</span>
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="This value helps to estimate credit usage based on the expected word count"></i>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<input type="number" name="block_length" class="form-control form-control-lg form-control-solid" min="1" placeholder="Block Length" value="<?php echo $settings['block_length']; ?>" onkeydown="return event.key !== '-' && event.key !== 'e' && event.key !== 'E' && event.key !== '.'" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.startsWith('0')) this.value = this.value.replace(/^0+/, '')"/>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Credits Per Block</span>
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Credits are calculated based on the number of 100-word blocks."></i>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<input type="number" name="credits_per_block" class="form-control form-control-lg form-control-solid" min="1" max="10" placeholder="Credits Per Block" value="<?php echo $settings['credits_per_block']; ?>" onkeydown="return event.key !== '-' && event.key !== 'e' && event.key !== 'E' && event.key !== '.'" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.startsWith('0')) this.value = this.value.replace(/^0+/, '')"/>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Scans Expiry</span>
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Speicfy number of days for customer scans expirration dates"></i>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<input type="number" name="scans_expiry" class="form-control form-control-lg form-control-solid" min="1" max="30" placeholder="Number of days" value="<?php echo $settings['scans_expiry']; ?>" onkeydown="return event.key !== '-' && event.key !== 'e' && event.key !== 'E' && event.key !== '.'" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.startsWith('0')) this.value = this.value.replace(/^0+/, '')"/>
										</div>
										<!--end::Col-->
									</div>
								</div>
								<!--end::Input group-->
								<!--end::Card body-->
								<!--begin::Actions-->
								<div class="card-footer d-flex justify-content-end py-6 px-9">
									<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
									<button type="submit" class="btn btn-primary" id="kt_plagi_settings_submit">Save Changes</button>
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