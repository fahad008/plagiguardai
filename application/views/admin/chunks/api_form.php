<!--begin::Modal dialog-->
<div class="modal-dialog modal-dialog-centered mw-650px">
	<!--begin::Modal content-->
	<div class="modal-content">
		<!--begin::Modal header-->
		<div class="modal-header" id="kt_modal_create_api_key_header">
			<!--begin::Modal title-->
			<h2><?php if (isset($modal_title) && $modal_title != '') { echo $modal_title; } ?></h2>
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
		<!--begin::Form-->
		<form id="kt_modal_create_api_key_form" class="form" action="<?php echo $form_action; ?>">
			<!--begin::Modal body-->
			<div class="modal-body py-10 px-lg-17">
				<!--begin::Scroll-->
				<div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">
					<input type="hidden" name="api_key_id" value="<?php if(isset($api_key_info) && !empty($api_key_info)){ echo $api_key_info['id']; } ?>">
					<!--begin::Input group-->
					<div class="mb-5 fv-row">
						<!--begin::Label-->
						<label class="required fs-5 fw-bold mb-2">API Name</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input type="text" class="form-control form-control-solid" value="<?php if(isset($api_key_info) && !empty($api_key_info)){ echo $api_key_info['name']; } ?>" placeholder="Your API Name" name="name" />
						<!--end::Input-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="mb-5 fv-row">
						<!--begin::Label-->
						<label class="required fs-5 fw-bold mb-2">API Key</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input type="text" class="form-control form-control-solid" value="<?php if(isset($api_key_info) && !empty($api_key_info)){ echo $api_key_info['api_key']; } ?>" placeholder="Your API Key" name="api_key" />
						<!--end::Input-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="d-flex flex-column mb-5 fv-row">
						<!--begin::Label-->
						<label class="fs-5 fw-bold mb-2">Short Description</label>
						<!--end::Label-->
						<!--begin::Input-->
						<textarea class="form-control form-control-solid" rows="3" name="description" placeholder="Describe your API"><?php if(isset($api_key_info) && !empty($api_key_info)){ echo $api_key_info['description']; } ?></textarea>
						<!--end::Input-->
					</div>
					<!--begin::Input group-->
					<div class="mb-10">
						<!--begin::Heading-->
						<div class="mb-3">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-5 fw-bold">
								<span class="required">Specify Your API Status</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify Your API Status"></i>
							</label>
							<!--end::Label-->
						</div>
						<!--end::Heading-->
						<!--begin::Row-->
						<div class="fv-row">
							<!--begin::Radio group-->
							<div class="btn-group w-100" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
								<!--begin::Radio-->
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success <?php if (isset($api_key_info) && !empty($api_key_info)) { if ($api_key_info['status'] == 'active'){ echo 'active'; } }else { echo 'active'; } ?>" data-kt-button="true">
								<!--begin::Input-->
								<input class="btn-check" <?php if (isset($api_key_info) && !empty($api_key_info)) { if ($api_key_info['status'] == 'active'){ echo 'checked'; } }else { echo 'checked'; } ?> type="radio" name="status" value="active" />
								<!--end::Input-->
								Active</label>
								<!--end::Radio-->
								<?php if(isset($api_key_info) && !empty($api_key_info)){
									if ($api_key_info['status'] == 'exhausted') { ?>
								<!--begin::Radio-->
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-warning <?php if (isset($api_key_info) && !empty($api_key_info)) { if ($api_key_info['status'] == 'exhausted'){ echo 'active'; } } ?>" data-kt-button="true">
								<!--begin::Input-->
								<input class="btn-check" <?php if ($api_key_info['status'] == 'exhausted'){ echo 'checked'; } ?> type="radio" name="status" value="exhausted" />
								<!--end::Input-->
								Exhausted</label>
								<!--end::Radio-->
								<?php } } ?>
								<!--begin::Radio-->
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-danger <?php if (isset($api_key_info) && !empty($api_key_info)) { if ($api_key_info['status'] == 'disabled'){ echo 'active'; } } ?>" data-kt-button="true">
								<!--begin::Input-->
								<input class="btn-check" <?php if (isset($api_key_info) && !empty($api_key_info)) { if ($api_key_info['status'] == 'disabled'){ echo 'checked'; } } ?> type="radio" name="status" value="disabled" />
								<!--end::Input-->
								Disable</label>
								<!--end::Radio-->
							</div>
							<!--end::Radio group-->
						</div>
						<!--end::Row-->
					</div>
				</div>
				<!--end::Scroll-->
			</div>
			<!--end::Modal body-->
			<!--begin::Modal footer-->
			<div class="modal-footer flex-center">
				<!--begin::Button-->
				<button type="reset" id="kt_modal_create_api_key_cancel" class="btn btn-light me-3">Discard</button>
				<!--end::Button-->
				<!--begin::Button-->
				<button type="submit" id="kt_modal_create_api_key_submit" class="btn btn-primary">
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
	<!--end::Modal content-->
</div>
<!--end::Modal dialog-->