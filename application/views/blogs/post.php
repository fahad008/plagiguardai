<?php $this->load->view('header'); ?>
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Wrapper-->
				<div class="d-flex align-items-center justify-content-between">
					<!--begin::Logo-->
					<div class="d-flex align-items-center flex-equal">
						<!--begin::Mobile menu toggle-->
						<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
							<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
							<span class="svg-icon svg-icon-2hx">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black"></path>
									<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--end::Mobile menu toggle-->
						<!--begin::Logo image-->
						<a href="<?php echo base_url(); ?>">
							<img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" class="logo-default h-25px h-lg-30px">
							<img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" class="logo-sticky h-20px h-lg-25px">
						</a>
						<!--end::Logo image-->
					</div>
					<!--end::Logo-->
					<!--begin::Menu wrapper-->
					<div class="d-lg-block" id="kt_header_nav_wrapper">
						<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
							<!--begin::Menu-->
							<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
								<!--begin::Menu item-->
								<div class="menu-item">
									<!--begin::Menu link-->
									<a href="<?php echo base_url().'blogs'; ?>" class="menu-link nav-link py-3 px-4 px-xxl-6 active">Blogs</a>
									<!--end::Menu link-->
								</div>
								<!--end::Menu item-->
								<?php if (isset($header_links) && !empty($header_links)) { ?>
									<?php foreach ($header_links as $key => $link) {?>
								<!--begin::Menu item-->
								<div class="menu-item">
									<!--begin::Menu link-->
									<a href="<?php echo $link['link']; ?>" class="menu-link nav-link py-3 px-4 px-xxl-6"></a>
									<!--end::Menu link-->
								</div>
								<!--end::Menu item-->
								<?php } } ?>
							</div>
							<!--end::Menu-->
						</div>
					</div>
					<!--end::Menu wrapper-->
					<?php if (isset($primary_link) && !empty($primary_link)) {?>
					<!--begin::Toolbar-->
					<div class="flex-equal text-end ms-1">
						<a href="<?php echo $primary_link['link']; ?>" class="btn btn-primary"><?php echo $primary_link['title']; ?></a>
					</div>
					<!--end::Toolbar-->
					<?php } ?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Container-->
		</div>
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Container-->
					<div class="container-xxl" id="kt_content_container">
						<!--begin::Post card-->
						<div class="card">
							<!--begin::Body-->
							<div class="card-body p-lg-20 pb-lg-0">
								<!--begin::Layout-->
								<div class="d-flex flex-column flex-xl-row">
									<!--begin::Content-->
									<div class="flex-lg-row-fluid me-xl-15">
										<!--begin::Post content-->
										<div class="mb-17">
											<!--begin::Wrapper-->
											<div class="mb-8">
												<!--begin::Info-->
												<div class="d-flex flex-wrap mb-6">
													<!--begin::Item-->
													<div class="me-1 my-1">
														<!--begin::Icon-->
														<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
														<span class="svg-icon svg-icon-<?php if (isset($post_info) && !empty($post_info)) { if($post_info['status'] == 'published'){ echo 'success'; }elseif($post_info['status'] == 'draft'){ echo 'warning'; }elseif($post_info['status'] == 'completed'){ echo 'info'; }else{ echo 'danger'; } } ?> svg-icon-2">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black"/>
															<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black"/>
															<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black"/>
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Icon-->
														<!--begin::Label-->
														<span class="fw-bolder text-gray-400"><?php if (isset($post_info) && !empty($post_info)) { if ($post_info['status'] != 'published') {
															echo $created = date('d M Y', strtotime($post_info['created_at']));
														}else{
															echo $published = date('d M Y', strtotime($post_info['published_at']));
														} } ?></span>
														<!--end::Label-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="my-1">
														<!--begin::Icon-->
														<!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
														<span class="svg-icon svg-icon-<?php if (isset($post_info) && !empty($post_info)) { if($post_info['status'] == 'published'){ echo 'success'; }elseif($post_info['status'] == 'draft'){ echo 'warning'; }elseif($post_info['status'] == 'completed'){ echo 'info'; }else{ echo 'danger'; } } ?> svg-icon-2">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="black"/>
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Icon-->
														<!--begin::Label-->
														<span class="fw-bolder text-gray-400"><?php if (isset($post_info) && !empty($post_info)) { echo ucfirst($post_info['status']); } ?></span>
														<!--end::Label-->
													</div>
													<!--end::Item-->
												</div>
												<!--end::Info-->
												<!--begin::Title-->

												<?php $slug = ''; if (isset($post_info) && !empty($post_info)) { $slug = $post_info['slug']; } ?>
												<?php $featured_image_url = ''; if (isset($post_info) && !empty($post_info)) { $featured_image_url = get_post_image($post_info['id'], $post_info['featured_image']); } ?>

												<a href="<?php echo base_url().'blogs/post/'.$slug; ?>" class="text-dark text-hover-primary fs-2 fw-bolder">
													<h1><?php if (isset($post_info) && !empty($post_info)) { echo $post_info['title']; } ?></h1>
												</a>
												<!--end::Title-->
												<!--begin::Container-->
												<div class="overlay mt-8">
													<?php if ($featured_image_url != '') { ?>
													<!--begin::Image-->
													<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px mb-3" style="background-image:url(<?php echo $featured_image_url; ?>)"></div>
													<!--end::Image-->
													<?php } ?>
													<!--begin::Links-->
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<?php if ($this->session->userdata('admin_logged_in')) { ?>
														<a href="<?php echo base_url().'admin/blogs'; ?>" class="btn btn-light-primary ms-3">Go to Blogs</a>
													<?php }elseif ($this->session->userdata('logged_in_customer')) { ?>
														<a href="<?php echo base_url().'dashboard'; ?>" class="btn btn-light-primary ms-3">Go to Dashboard</a>
													<?php }else{ ?>
														<a href="<?php echo base_url(); ?>" class="btn btn-light-primary ms-3">Join Us</a>
													<?php } ?>
													</div>
													<!--end::Links-->
												</div>
												<!--end::Container-->
											</div>
											<!--end::Wrapper-->
											<!--begin::Description-->
											<div class="fs-5 fw-bold text-gray-600 mb-5">
												<?php if (isset($post_info) && !empty($post_info)) { echo $post_info['content']; } ?>
											</div>
											<!--end::Description-->
											<?php if (isset($author_info) && !empty($author_info)) { ?>
											<!--begin::Block-->
											<div class="d-flex align-items-center border-dashed card-rounded p-5 p-lg-10 mb-14">
												<!--begin::Section-->
												<div class="text-center flex-shrink-0 me-7 me-lg-13">
													<?php if ($author_info['image_url']) { ?>
													<!--begin::Avatar-->
													<div class="symbol symbol-70px symbol-circle mb-2">
														<img src="<?php echo $author_info['image_url']; ?>" class="" alt="<?php echo $author_info['name']; ?>" />
													</div>
													<!--end::Avatar-->
													<?php }else{ ?>
														<!--begin::Avatar-->
														<div class="symbol symbol-70px symbol-circle mb-2">
															<span class="symbol-label bg-light-danger text-danger fw-bolder"><?php echo strtoupper(substr($author_info['name'], 0, 1)); ?></span>
														</div>
														<!--end::Avatar-->
													<?php } ?>
													<!--begin::Info-->
													<div class="mb-0">
														<a href="../../demo3/dist/pages/profile/overview.html" class="text-gray-700 fw-bolder text-hover-primary"><?php echo $author_info['name']; ?></a>
														<span class="text-gray-400 fs-7 fw-bold d-block mt-1"><?php echo $author_info['designation']; ?></span>
													</div>
													<!--end::Info-->
												</div>
												<!--end::Section-->
												<!--begin::Text-->
												<div class="mb-0 fs-6">
													<div class="text-muted fw-bold lh-lg mb-2"><?php echo $author_info['bio']; ?></div>
													<?php if ($this->session->userdata('admin_logged_in')) { ?>
														<a href="<?php echo base_url().'admin/blogs/authors/'; ?>" class="fw-bold link-primary">Author’s Profile</a>
													<?php }elseif ($this->session->userdata('logged_in_customer')) { ?>
														<a href="Javascript: void(0)" class="fw-bold link-primary">Author’s Profile</a>
													<?php }else{ ?>
														<a href="Javascript: void(0)" class="fw-bold link-primary">Author’s Profile</a>
													<?php } ?>
												</div>
												<!--end::Text-->
											</div>
											<!--end::Block-->
											<?php } ?>
										</div>
										<!--end::Post content-->
									</div>
									<!--end::Content-->
									<!--begin::Sidebar-->
									<div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
										<?php if (isset($categories_info) && !empty($categories_info)) { ?>
										<!--begin::Catigories-->
										<div class="mb-16">
											<h4 class="text-black mb-7">Categories</h4>
											<?php foreach ($categories_info as $key => $value) { ?>
											<!--begin::Item-->
											<div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
												<?php if ($value['post_count'] >= 1) {
													$menu_links = base_url().'blogs/'.$value['slug'];
												}else{
													$menu_links = 'Javascript: void(0)';
												} ?>
												<!--begin::Text-->
												<a href="<?php echo $menu_links; ?>" class="text-muted text-hover-primary pe-2"><?php echo $value['name']; ?></a>
												<!--end::Text-->
												<!--begin::Number-->
												<span class="menu-badge m-0">
												<?php $badge_color = 'danger'; 
												  if ($value['post_count'] >= 1) { $badge_color = 'success'; }else{$badge_color = 'danger';
												  } ?>
												<span class="badge badge-light-<?php echo $badge_color; ?> badge-circle fw-bolder fs-7"><?php echo $value['post_count']; ?></span>
											</span>
												<!--end::Number-->
											</div>
											<!--end::Item-->
											<?php } ?>
										</div>
										<!--end::Catigories-->
										<?php } ?>
										<?php if (isset($recent_posts) && !empty($recent_posts)) { ?>
										<!--begin::Recent posts-->
										<div class="m-0">
											<h4 class="text-black mb-7">Recent Posts</h4>
											<?php foreach ($recent_posts as $key => $value) { ?>
											<!--begin::Item-->
											<div class="d-flex flex-stack mb-7">
												<?php $thumb_url = ''; $thumb_url = get_post_thumbnail($value['id'], $value['thumbnail']); ?>
												<!--begin::Symbol-->
												<div class="symbol symbol-60px symbol-2by3 me-4">
													<div class="symbol-label" style="background-image: url(<?php echo $thumb_url; ?>)"></div>
												</div>
												<!--end::Symbol-->
												<!--begin::Title-->
												<div class="m-0">
													<a href="<?php echo base_url().'blogs/post/'.$value['slug']; ?>" class="text-dark fw-bolder text-hover-primary fs-6"><?php echo $value['title']; ?></a>
												</div>
												<!--end::Title-->
											</div>
											<!--end::Item-->
											<?php } ?>
										</div>
										<!--end::Recent posts-->
										<?php } ?>
									</div>
									<!--end::Sidebar-->
								</div>
								<!--end::Layout-->
								<!--begin::Section-->
								<div class="mb-17" id="kt_pricing">
									<!--begin::Content-->
									<div class="d-flex flex-stack mb-5">
										<!--begin::Title-->
										<h3 class="text-black">Choose Your Plan</h3>
										<!--end::Title-->
										<!--begin::Link-->
										<a href="<?php echo base_url().'home/pricing'; ?>" class="fs-6 fw-bold link-primary">View All Offers</a>
										<!--end::Link-->
									</div>
									<!--end::Content-->
									<!--begin::Separator-->
									<div class="separator separator-dashed mb-9"></div>
									<!--end::Separator-->
									<!--begin::Plans-->
									<div class="d-flex flex-column">
										<!--begin::Nav group-->
										<div class="nav-group nav-group-outline mx-auto mb-15" data-kt-buttons="true">
											<?php if (isset($monthly_plans) && !empty($monthly_plans)) { ?>
											<a href="Javascript: void(0)" class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3 me-2 active" data-kt-plan="month">Monthly</a>
											<?php } ?>
											<?php if (isset($yearly_plans) && !empty($yearly_plans)) { ?>
											<a href="Javascript: void(0)" class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3" data-kt-plan="annual">Annual</a>
											<?php } ?>
										</div>
										<!--end::Nav group-->
										<?php if (isset($monthly_plans) && !empty($monthly_plans)) { ?>
										<!--begin::Row-->
										<div class="row g-10" id="monthly-plans">
											<?php foreach (array_reverse($monthly_plans) as $key => $value) { ?>
											<!--begin::Col-->
											<div class="col-xl-4">
												<div class="d-flex h-100 align-items-center">
													<!--begin::Option-->
													<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
														<!--begin::Heading-->
														<div class="mb-7 text-center">
															<!--begin::Title-->
															<h2 class="mb-5 fw-boldest text-<?php echo $value['color']; ?>"><?php echo ucfirst($value['title']); ?></h2>
															<!--end::Title-->
															<!--begin::Description-->
															<div class="text-gray-400 fw-bold mb-5"><?php echo $value['description']; ?></div>
															<!--end::Description-->
															<!--begin::Price-->
															<div class="text-center">
																<span class="mb-2 text-<?php echo $value['color']; ?>">Rs</span>
																<span class="fs-3x fw-bolder text-<?php echo $value['color']; ?>" data-kt-plan-price-month="<?php echo intval($value['price']); ?>" data-kt-plan-price-annual="<?php echo intval($value['price']); ?>"><?php echo intval($value['price']); ?></span>
																<span class="fs-7 fw-bold opacity-50 text-<?php echo $value['color']; ?>">/
																<span data-kt-element="period">Mon</span></span>
															</div>
															<!--end::Price-->
														</div>
														<!--end::Heading-->
														<!--begin::Features-->
														<div class="w-100 mb-10">
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">
																<span class="text-<?php echo $value['color']; ?>"><b><?php echo intval($value['credits']); ?></b></span> credits per month</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Detect both plagiarism and AI-generated text</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Instant detailed scan reports</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">Highlighted plagiarized & AI-detected sections</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>" >
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">Percentage-based similarity score</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">AI probability score (Human vs AI content)</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">Upload files or paste text directly</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">Monthly credit reset</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">Fast processing with real-time results</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Features-->
														<?php if (!$this->session->userdata('logged_in_customer')) { ?>
														<!--begin::Select-->
														<a href="<?php echo base_url(); ?>" class="btn btn-sm btn-primary">Join Us</a>
														<!--end::Select-->
														<?php } ?>
													</div>
													<!--end::Option-->
												</div>
											</div>
											<!--end::Col-->
											<?php } ?>
										</div>
										<!--end::Row-->
										<?php } ?>
										<?php if (isset($yearly_plans) && !empty($yearly_plans)) { ?>
										<!--begin::Row-->
										<div class="row g-10 d-none" id="yearly-plans">
											<?php foreach (array_reverse($yearly_plans) as $key => $value) { ?>
											<!--begin::Col-->
											<div class="col-xl-4">
												<div class="d-flex h-100 align-items-center">
													<!--begin::Option-->
													<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-20 px-10">
														<!--begin::Heading-->
														<div class="mb-7 text-center">
															<!--begin::Title-->
															<h2 class="mb-5 fw-boldest text-<?php echo $value['color']; ?>"><?php echo ucfirst($value['title']); ?></h2>
															<!--end::Title-->
															<!--begin::Description-->
															<div class="text-gray-400 fw-bold mb-5"><?php echo $value['description']; ?></div>
															<!--end::Description-->
															<!--begin::Price-->
															<div class="text-center">
																<span class="mb-2 text-<?php echo $value['color']; ?>">Rs</span>
																<span class="fs-3x fw-bolder text-<?php echo $value['color']; ?>" data-kt-plan-price-month="<?php echo intval($value['price']); ?>" data-kt-plan-price-annual="<?php echo intval($value['price']); ?>"><?php echo intval($value['price']); ?></span>
																<span class="fs-7 fw-bold opacity-50 text-<?php echo $value['color']; ?>">/
																<span data-kt-element="period">Year</span></span>
															</div>
															<!--end::Price-->
														</div>
														<!--end::Heading-->
														<!--begin::Features-->
														<div class="w-100 mb-10">
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span><span class="text-<?php echo $value['color']; ?>">
																	<b><?php echo intval($value['credits']); ?></b>
																</span>  credits per year</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Detect both plagiarism and AI-generated text</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Instant detailed scan reports</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">Highlighted plagiarized & AI-detected sections</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>" >
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">Percentage-based similarity score</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">AI probability score (Human vs AI content)</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">Upload files or paste text directly</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">Monthly credit reset</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1">Fast processing with real-time results</span>
																<!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-<?php echo $value['color']; ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																		<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Features-->
														<?php if (!$this->session->userdata('logged_in_customer')) { ?>
														<!--begin::Select-->
														<a href="<?php echo base_url(); ?>" class="btn btn-sm btn-primary">Join Us</a>
														<!--end::Select-->
														<?php } ?>
													</div>
													<!--end::Option-->
												</div>
											</div>
											<!--end::Col-->
											<?php } ?>
										</div>
										<!--end::Row-->
										<?php } ?>
									</div>
									<!--end::Plans-->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Post card-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<?php $this->load->view('footer'); ?>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->
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
	<script src="assets/js/custom/pages/company/pricing.js"></script>
</body>
<!--end::Body-->
</html>