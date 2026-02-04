<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Blogs</h1>
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
			<div class="card-toolbar">
				<a href="Javascript:void(0)" class="btn btn-sm btn-primary" onclick="blog_add_wizard(this)">
				<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
				<span class="svg-icon svg-icon-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
						<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
					</svg>
				</span>
				<!--end::Svg Icon-->Create Blog</a>
			</div>
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
				<!--begin::Tables Widget 5-->
				<div class="card card-xl-stretch mb-xl-8">
					<!--begin::Header-->
					<div class="card-header border-0 pt-5">
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bolder fs-3 mb-1">Blogs Overview</span>
						</h3>
						<div class="card-toolbar">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">Published</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">Upcoming</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4" data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">Draft</a>
								</li>
							</ul>
						</div>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body py-3">
						<div class="tab-content">
							<!--begin::Tap pane-->
							<div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
								<?php if (isset($published_posts_count) && $published_posts_count >= 1) { ?>
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
										<!--begin::Table head-->
										<thead>
											<tr class="border-0">
												<th class="p-0 w-50px"></th>
												<th class="p-0 min-w-150px"></th>
												<th class="p-0 min-w-140px"></th>
												<th class="p-0 min-w-110px"></th>
												<th class="p-0 min-w-50px"></th>
											</tr>
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody>
											<?php if (isset($published_posts) && !empty($published_posts)) {
											 	foreach ($published_posts as $key => $value) { ?>
											<tr>
												<td>
													<div class="symbol symbol-45px me-2">
														<?php 
														$author_avatar = '';
														$author_avatar = get_author_image($value['author_avatar']);
														if ($author_avatar) { ?>
															<div class="symbol symbol-45px me-5">
																<img alt="<?php echo $value['author_name']; ?>" src="<?php echo $author_avatar; ?>" class="h-50 align-self-center">
															</div>
														<?php }else{ ?>
															<span class="symbol-label bg-light-danger text-danger fw-bolder"><?php echo strtoupper(substr($value['author_name'], 0, 1)); ?></span>
														<?php } ?>
													</div>
												</td>
												<td>
													<a href="Javascript: void(0)" class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?php echo ucfirst($value['author_name']); ?></a>
													<span class="text-muted fw-bold d-block"><?php echo $value['author_designation']; ?></span>
												</td>
												<td class="text-end text-muted fw-bold"><?php echo $value['title']; ?></td>
												<td class="text-end">
													<a href="Javascript: void(0)" class="btn btn-primary er fs-7 px-3 py-2"data-postId="<?php echo $value['id'] ?>" onclick="archive(this)">Archive Blog</a>
												</td>
												<td class="text-end">
													<a href="Javascript: void(0)" data-postId="<?php echo $value['id'] ?>" onclick="blog_edit_wizard(this)" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
															<path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
															<path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</a>
													<a target="_blank" href="<?php echo base_url().'blogs/post/'.$value['slug']; ?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
																<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</a>
												</td>
											</tr>
											<?php } } ?>
										</tbody>
										<!--end::Table body-->
									</table>
								</div>
								<!--end::Table-->
								<?php }else{ ?>
									<div class="card">
										<!--begin::Card body-->
										<div class="card-body pb-0">
											<!--begin::Heading-->
											<div class="card-px text-center pt-20 pb-5">
												<!--begin::Title-->
												<h2 class="fs-2x fw-bolder mb-0">Currently, 0 blogs are published. Time to share your insights!</h2>
												<!--end::Title-->
											</div>
											<!--end::Heading-->
											<!--begin::Illustration-->
											<div class="text-center px-5">
												<img src="assets/media/illustrations/unitedpalms-1/5.png" alt="" class="mw-100 h-200px h-sm-325px">
											</div>
											<!--end::Illustration-->
										</div>
										<!--end::Card body-->
									</div>
								<?php } ?>
							</div>
							<!--end::Tap pane-->
							<!--begin::Tap pane-->
							<div class="tab-pane fade" id="kt_table_widget_5_tab_2">
								<?php if (isset($completed_posts_count) && $completed_posts_count >= 1) { ?>
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
										<!--begin::Table head-->
										<thead>
											<tr class="border-0">
												<th class="p-0 w-50px"></th>
												<th class="p-0 min-w-150px"></th>
												<th class="p-0 min-w-140px"></th>
												<th class="p-0 min-w-110px"></th>
												<th class="p-0 min-w-50px"></th>
											</tr>
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody>
											<?php if (isset($completed_posts) && !empty($completed_posts)) {
											 	foreach ($completed_posts as $key => $value) { ?>
											<tr>
												<td>
													<div class="symbol symbol-45px me-2">
														<?php 
														$author_avatar = '';
														$author_avatar = get_author_image($value['author_avatar']);
														if ($author_avatar) { ?>
															<div class="symbol symbol-45px me-5">
																<img alt="<?php echo $value['author_name']; ?>" src="<?php echo $author_avatar; ?>" class="h-50 align-self-center">
															</div>
														<?php }else{ ?>
															<span class="symbol-label bg-light-danger text-danger fw-bolder"><?php echo strtoupper(substr($value['author_name'], 0, 1)); ?></span>
														<?php } ?>
													</div>
												</td>
												<td>
													<a href="Javascript: void(0)" class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?php echo ucfirst($value['author_name']); ?></a>
													<span class="text-muted fw-bold d-block"><?php echo $value['author_designation']; ?></span>
												</td>
												<td class="text-end text-muted fw-bold"><?php echo $value['title']; ?></td>
												<td class="text-end">
													<a href="Javascript: void(0)" class="btn btn-primary er fs-7 px-3 py-2"data-postId="<?php echo $value['id'] ?>" onclick="publish(this)">Publish Blog</a>
												</td>
												<td class="text-end">
													<a href="Javascript: void(0)" data-postId="<?php echo $value['id'] ?>" onclick="blog_edit_wizard(this)" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
															<path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
															<path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</a>
													<a target="_blank" href="<?php echo base_url().'blogs/post/'.$value['slug']; ?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
																<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</a>
												</td>
											</tr>
											<?php } } ?>
										</tbody>
										<!--end::Table body-->
									</table>
								</div>
								<!--end::Table-->
								<?php }else{ ?>
									<div class="card">
										<!--begin::Card body-->
										<div class="card-body pb-0">
											<!--begin::Heading-->
											<div class="card-px text-center pt-20 pb-5">
												<!--begin::Title-->
												<h2 class="fs-2x fw-bolder mb-0">Currently, 0 blogs are completed. Time to share your insights!</h2>
												<!--end::Title-->
											</div>
											<!--end::Heading-->
											<!--begin::Illustration-->
											<div class="text-center px-5">
												<img src="assets/media/illustrations/unitedpalms-1/5.png" alt="" class="mw-100 h-200px h-sm-325px">
											</div>
											<!--end::Illustration-->
										</div>
										<!--end::Card body-->
									</div>
								<?php } ?>
							</div>
							<!--end::Tap pane-->
							<!--begin::Tap pane-->
							<div class="tab-pane fade" id="kt_table_widget_5_tab_3">
								<?php if (isset($draft_posts_count) && $draft_posts_count >= 1) { ?>
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
										<!--begin::Table head-->
										<thead>
											<tr class="border-0">
												<th class="p-0 w-50px"></th>
												<th class="p-0 min-w-150px"></th>
												<th class="p-0 min-w-140px"></th>
												<th class="p-0 min-w-110px"></th>
												<th class="p-0 min-w-50px"></th>
											</tr>
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody>
											<?php if (isset($draft_posts) && !empty($draft_posts)) {
											 	foreach ($draft_posts as $key => $value) { ?>
											<tr>
												<td>
													<div class="symbol symbol-45px me-2">
														<?php 
														$author_avatar = '';
														$author_avatar = get_author_image($value['author_avatar']);
														if ($author_avatar) { ?>
															<div class="symbol symbol-45px me-5">
																<img alt="<?php echo $value['author_name']; ?>" src="<?php echo $author_avatar; ?>" class="h-50 align-self-center">
															</div>
														<?php }else{ ?>
															<span class="symbol-label bg-light-danger text-danger fw-bolder"><?php if ($value['author_name'] != '') {
																echo strtoupper(substr($value['author_name'], 0, 1));
															}else{
																echo '?';
															} ?>
															</span>
														<?php } ?>
													</div>
												</td>
												<td>
													<a href="Javascript: void(0)" class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?php if ($value['author_name'] != '') {
																echo ucfirst($value['author_name']);
															}else{
																echo '-----';
															} ?></a>
													<span class="text-muted fw-bold d-block"><?php if ($value['author_designation'] != '') {
																echo ucfirst($value['author_designation']);
															}else{
																echo '-----';
															} ?></span>
												</td>
												<td class="text-end text-muted fw-bold"><?php if ($value['title'] != '') {
																echo $value['title'];
															}else{
																echo '-----';
															} ?></td>
												<td class="text-end">
													<a href="Javascript: void(0)" class="btn btn-primary er fs-7 px-3 py-2"data-postId="<?php echo $value['id'] ?>" onclick="blog_update_wizard(this)">Complete Blog</a>
												</td>
												<td class="text-end">
													<a target="_blank" href="<?php echo base_url().'blogs/post/'.$value['slug']; ?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
																<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</a>
												</td>
											</tr>
											<?php } } ?>
										</tbody>
										<!--end::Table body-->
									</table>
								</div>
								<!--end::Table-->
								<?php }else{ ?>
									<div class="card">
										<!--begin::Card body-->
										<div class="card-body pb-0">
											<!--begin::Heading-->
											<div class="card-px text-center pt-20 pb-5">
												<!--begin::Title-->
												<h2 class="fs-2x fw-bolder mb-0">Currently, 0 blogs are in drafts. Time to share your insights!</h2>
												<!--end::Title-->
											</div>
											<!--end::Heading-->
											<!--begin::Illustration-->
											<div class="text-center px-5">
												<img src="assets/media/illustrations/unitedpalms-1/5.png" alt="" class="mw-100 h-200px h-sm-325px">
											</div>
											<!--end::Illustration-->
										</div>
										<!--end::Card body-->
									</div>
								<?php } ?>
							</div>
							<!--end::Tap pane-->
						</div>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Tables Widget 5-->
			</div>
			<!--end::Card-->
			<!--begin::Modals-->
			<!--begin::Modal - Create Blog-->
			<div class="modal fade" id="kt_modal_create_blog" tabindex="-1" aria-hidden="true">
			</div>
			<!--end::Modal - Create Blog-->
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
<script>
	function blog_update_wizard(el) {
	    const post_id = el.getAttribute('data-postid');
	    $.ajax({
            url: "<?php echo base_url().'admin/blogs/blog_update_wizard/'; ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                post_id: post_id
            },
            success: function(response) {

                if (response.status == 'success') {
                	$("#kt_modal_create_blog").html(response.html);
                	setTimeout(function() {

                		KTApp.init();

                		KTModalCreateProject.init(response.start);
			            KTModalCreateProjectType.init();
			            KTModalCreateProjectSettings.init();
			            KTModalCreateProjectTargets.init();
			            KTModalCreateProjectFiles.init();
			            KTModalCreateProjectComplete.init();

						$("#kt_modal_create_blog").modal('show');
					}, 500);
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

	function blog_edit_wizard(el) {
	    const post_id = el.getAttribute('data-postid');
	    $.ajax({
            url: "<?php echo base_url().'admin/blogs/blog_update_wizard/'; ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                post_id: post_id
            },
            success: function(response) {

                if (response.status == 'success') {
                	$("#kt_modal_create_blog").html(response.html);
                	setTimeout(function() {

                		KTApp.init();

                		KTModalCreateProject.init(1);
			            KTModalCreateProjectType.init();
			            KTModalCreateProjectSettings.init();
			            KTModalCreateProjectTargets.init();
			            KTModalCreateProjectFiles.init();
			            KTModalCreateProjectComplete.init();

						$("#kt_modal_create_blog").modal('show');
					}, 500);
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

	function blog_add_wizard(el) {
	    const action = 'add';
	    $.ajax({
            url: "<?php echo base_url().'admin/blogs/blog_add_wizard/'; ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                action: action
            },
            success: function(response) {

                if (response.status == 'success') {
                	$("#kt_modal_create_blog").html(response.html);
                	setTimeout(function() {

                		KTApp.init();

                		KTModalCreateProject.init(1);
			            KTModalCreateProjectType.init();
			            KTModalCreateProjectSettings.init();
			            KTModalCreateProjectTargets.init();
			            KTModalCreateProjectFiles.init();
			            KTModalCreateProjectComplete.init();

						$("#kt_modal_create_blog").modal('show');

					}, 500);
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

	function publish(el) {
	    const blog_id = el.getAttribute('data-postid');
	    $.ajax({
            url: "<?php echo base_url().'admin/blogs/publish/'; ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                blog_id: blog_id
            },
            success: function(response) {

                if (response.status == 'success') {
                	Swal.fire({
						text: response.message,
						icon: "success",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					}).then(function (result) {
						if (result.isConfirmed) {
							location.reload();
						}
					});		
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

	function archive(el) {
	    const blog_id = el.getAttribute('data-postid');
	    Swal.fire({
				text: "Are you sure you want to archive this blog post?",
				icon: "warning",
				buttonsStyling: false,
				showCancelButton: true,
				confirmButtonText: "Yes, archive!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
			}).then(function (result) {
				if (result.isConfirmed) {
					$.ajax({
			            url: "<?php echo base_url().'admin/blogs/archive/'; ?>",
			            type: 'POST',
			            dataType: 'json',
			            data: {
			                blog_id: blog_id
			            },
			            success: function(response) {

			                if (response.status == 'success') {
			                	Swal.fire({
									text: response.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.isConfirmed) {
										location.reload();
									}
								});		
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
				}else{
					Swal.fire({
                            text: "Blog post was not archived.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
				}
			});
	    
	}
</script>