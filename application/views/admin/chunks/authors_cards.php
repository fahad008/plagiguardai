<?php if (isset($authors_info) && !empty($authors_info)) {
	foreach ($authors_info as $key => $autor) { ?>
<div class="col-md-6 col-xxl-4">
	<!--begin::Card-->
	<div class="card">
		<!--begin::Card body-->
		<div class="card-body d-flex flex-center flex-column p-9">
			<?php if ($autor->avatar != '') { ?>
			<!--begin::Avatar-->
			<div class="symbol symbol-65px symbol-circle mb-5">
				<img src="<?php echo $autor->avatar; ?>" alt="<?php echo $autor->name; ?>" />
			</div>
			<!--end::Avatar-->
			<?php }else{ ?>
			<!--begin::Avatar-->
			<div class="symbol symbol-65px symbol-circle mb-5">
				<span class="symbol-label fs-2x fw-bold <?php if ($autor->status == '1') { echo  'text-success bg-light-success'; }else{ echo 'text-danger bg-light-danger'; } ?>" ><?php echo strtoupper(substr($autor->name, 0, 1)); ?></span>
			</div>
			<!--end::Avatar-->			
			<?php } ?>
			<!--begin::Name-->
			<a href="javscript: void(0)" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0"><?php echo ucfirst($autor->name); ?></a>
			<a href="javscript: void(0)" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0"><?php echo ucfirst($autor->email); ?></a>
			<!--end::Name-->
			<!--begin::Position-->
			<div class="fw-bold text-gray-400 mb-6"><?php echo ucfirst($autor->bio); ?></div>
			<!--end::Position-->
			<!--begin::Info-->
			<div class="d-flex flex-center flex-wrap mb-5">
				<!--begin::Stats-->
				<div class="border border-dashed rounded min-w-125px py-3 px-4 mx-3 mb-3 text-center">
					<div class="fs-6 fw-bolder text-gray-700"><?php echo $autor->post_count; ?></div>
					<div class="fw-bold text-gray-400">Post Count</div>
				</div>
				<!--end::Stats-->
			</div>
			<!--end::Info-->
			<?php if ($autor->status == '1') { ?>
				<!--begin::Follow-->
				<a href="javscript: void(0)" onclick="change_author_status(this)" data-id="<?php echo $autor->id; ?>" data-status="0" class="btn btn-sm btn-light-danger">
				<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg arr011.svg-->
				<span class="svg-icon svg-icon-3">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path opacity="0.3" d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z" fill="black"/>
						<path d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z" fill="black"/>
					</svg>
				</span>
				<!--end::Svg Icon-->Deactivate Author</a>
				<!--end::Follow-->
			<?php }else{ ?>
				<!--begin::Follow-->
				<a href="javscript: void(0)" onclick="change_author_status(this)" data-id="<?php echo $autor->id; ?>" data-status="1" class="btn btn-sm btn-light-success">
				<!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
				<span class="svg-icon svg-icon-3">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black" />
						<path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black" />
					</svg>
				</span>
				<!--end::Svg Icon-->Activate Author</a>
				<!--end::Follow-->
			<?php } ?>
		</div>
		<!--begin::Card body-->
	</div>
	<!--begin::Card-->
</div>

<?php } }else{ ?>
	<div class="card">
		<!--begin::Card body-->
		<div class="card-body p-0">
			<!--begin::Wrapper-->
			<div class="card-px text-center py-20 my-10">
				<!--begin::Title-->
				<h2 class="fs-2x fw-bolder mb-10">Looks like there is no Authors here.</h2>
				<!--end::Title-->
				<!--begin::Description-->
				<p class="text-gray-400 fs-4 fw-bold mb-10">Let’s get started.
				<br>Add authors to begin with!</p>
				<!--end::Description-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Illustration-->
			<div class="text-center px-4">
				<img class="mw-100 mh-300px" alt="" src="<?php echo base_url(); ?>assets/media/illustrations/dozzy-1/2.png">
			</div>
			<!--end::Illustration-->
		</div>
		<!--end::Card body-->
	</div>
<?php } ?>