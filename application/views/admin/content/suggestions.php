<?php if (isset($resellers) && !empty($resellers)) { ?>
<?php foreach ($resellers as $key => $value) { ?>
	<!--begin::Users-->
<div class="mh-300px scroll-y me-n5 pe-5">
	<!--begin::User-->
	<div class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1" data-kt-search-element="customer" data-reseller-id="<?php echo $value->id; ?>" data-reseller-name="<?php echo $value->full_name; ?>">
		<?php $avtar_path = getAdminAvatar($value->profile_picture);
			if ($avtar_path != '') {
	 	?>
			<!--begin::Avatar-->
			<div class="symbol symbol-35px symbol-circle me-5">
				<img alt="<?php echo $value->full_name; ?>" src="<?php echo $avtar_path; ?>" />
			</div>
			<!--end::Avatar-->

		<?php }else{ ?>

			<div class="symbol symbol-35px symbol-circle me-5">
				<span class="symbol-label bg-light-danger text-danger fw-bold"><?php echo strtoupper(substr(trim($value->full_name), 0, 1)); ?></span>
			</div>

		<?php } ?>
		<!--begin::Info-->
		<div class="fw-bold">
			<span class="fs-6 text-gray-800 me-2"><?php echo $value->full_name; ?></span>
			<span class="badge badge-light">Reseller</span>
		</div>
		<!--end::Info-->
	</div>
	<!--end::User-->
</div>
<!--end::Users-->
<?php }} ?>