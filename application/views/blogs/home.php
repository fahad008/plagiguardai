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
							<img alt="Logo" src="assets/media/logos/logo-demo3-default" class="logo-default h-25px h-lg-30px">
							<img alt="Logo" src="assets/media/logos/logo-demo3-default" class="logo-sticky h-20px h-lg-25px">
						</a>
						<!--end::Logo image-->
					</div>
					<!--end::Logo-->
					<!--begin::Menu wrapper-->
					<div class="d-lg-block" id="kt_header_nav_wrapper">
						<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
							<!--begin::Menu-->
							<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
								<?php if (isset($header_links) && !empty($header_links)) { ?>
									<?php foreach ($header_links as $key => $link) {?>
								<!--begin::Menu item-->
								<div class="menu-item">
									<!--begin::Menu link-->
									<a href="<?php echo $link['link']; ?>" class="menu-link nav-link py-3 px-4 px-xxl-6"><?php echo $link['title']; ?></a>
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
						<!--begin::Home card-->
						<div class="card">
							<!--begin::List Widget 2-->
							<div class="card card-xl-stretch">
								<!--begin::Header-->
								<div class="card-header border-0">
									<h3 class="card-title fw-bolder text-dark">Latest Articles - <?php echo ucfirst($category_title); ?></h3>
									<div class="card-toolbar">
										<!--begin::Menu-->
										<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
											<span class="svg-icon svg-icon-2x">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black"/>
												<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</button>
										<!--begin::Menu 2-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-300px" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Categories</div>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator mb-3 opacity-75"></div>
											<!--end::Menu separator-->
											<?php if (isset($categories_info) && !empty($categories_info)) { 
												foreach ($categories_info as $key => $value) { ?>
													<?php if ($value['post_count'] >= 1) {
														$menu_links = base_url().'blogs/'.$value['slug'];
													}else{
														$menu_links = 'Javascript: void(0)';
													} ?>
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="<?php echo $menu_links; ?>" class="menu-link px-3"><?php echo ucfirst($value['name']); ?>
														<span class="menu-badge">
															<?php $badge_color = 'danger'; 
															  if ($value['post_count'] >= 1) { $badge_color = 'success'; }else{$badge_color = 'danger';
															  } ?>
															<span class="badge badge-light-<?php echo $badge_color; ?> badge-circle fw-bolder fs-7"><?php echo $value['post_count']; ?></span>
														</span>
													</a>
												</div>
												<!--end::Menu item-->
											<?php } } ?>
											<!--begin::Menu separator-->
											<div class="separator mt-3 opacity-75"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-3 text-end">
												<div class="menu-content px-3 py-3">
													<a class="btn btn-primary btn-sm px-4" href="<?php echo base_url().'blogs/'; ?>">All Articles</a>
												</div>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu 2-->
										<!--end::Menu-->
									</div>
								</div>
								<!--end::Header-->
							</div>
							<!--end::List Widget 2-->
							<!--begin::Body-->
							<div class="card-body p-lg-5">
								<!--begin::Section-->
								<div class="mb-17">
									<!--begin::Separator-->
									<div class="separator separator-dashed mb-9"></div>
									<!--end::Separator-->
									<!--begin::Row-->
									<div class="row">
										<?php if (isset($post_list_first) && !empty($post_list_first)) { ?>
										<!--begin::Col-->
										<div class="col-md-6 d-flex flex-column">
											<?php foreach ($post_list_first as $key => $value) { ?>
												<?php $thumbnail = ''; $thumbnail = get_post_thumbnail($value['id'], $value['thumbnail']); ?>
											<!--begin::Post-->
											<div class="ps-lg-6 mb-16 mt-md-0 mt-17">
												<!--begin::Body-->
												<div class="mb-6">
													<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px mb-3" style="background-image:url(<?php echo $thumbnail; ?>)"></div>
													<!--begin::Title-->
													<a href="<?php echo base_url().'blogs/post/'.$value['slug']; ?>" class="fw-bolder text-dark mb-4 fs-2 lh-base text-hover-primary"><?php echo $value['title']; ?></a></br>
													<a href="<?php echo base_url().'blogs/'.$value['category_slug']; ?>" class="fw-bolder text-gray-600 mb-4 fs-2 lh-base text-hover-primary"><?php echo $value['category_name']; ?></a>
													<!--end::Title-->
													<!--begin::Text-->
													<div class="fw-bold fs-5 mt-4 text-gray-500 text-dark"><?php echo $value['excerpt']; ?></div>
													<!--end::Text-->
												</div>
												<!--end::Body-->
												<!--begin::Footer-->
												<div class="d-flex flex-stack flex-wrap">
													<!--begin::Item-->
													<div class="d-flex align-items-center pe-2">
														<?php $author_avatar = ''; $author_avatar = get_author_image($value['author_avatar']); ?>
														<?php if ($author_avatar != '') { ?>
														<!--begin::Avatar-->
														<div class="symbol symbol-35px symbol-circle me-3">
															<img src="<?php echo $author_avatar; ?>" alt="<?php echo $value['author_name']; ?>" />
														</div>
														<!--end::Avatar-->
														<?php }else{ ?>
															<!--begin::Avatar-->
														<div class="symbol symbol-70px symbol-circle mb-2">
															<span class="symbol-label bg-light-danger text-danger fw-bolder"><?php echo strtoupper(substr($value['author_name'], 0, 1)); ?></span>
														</div>
														<!--end::Avatar-->
														<?php } ?>
														<!--begin::Text-->
														<div class="fs-5 fw-bolder">
															<a href="Javascript: void(0)" class="text-gray-700 text-hover-primary"><?php echo ucfirst($value['author_name']); ?></a>
															<span class="text-muted">on <?php echo date('d M Y', strtotime($value['published_at'])); ?></span>
														</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Label-->
													<span class="badge badge-light-<?php if($value['status'] == 'published'){ echo 'success'; }elseif($value['status'] == 'draft'){ echo 'warning'; }elseif($value['status'] == 'completed'){ echo 'info'; }else{ echo 'danger'; } ?> fw-bolder my-2"><?php echo ucfirst($value['status']); ?></span>
													<!--end::Label-->
												</div>
												<!--end::Footer-->
											</div>
											<!--end::Post-->
											<?php } ?>
										</div>
										<!--end::Col-->
										<?php } ?>
										<!--begin::Col-->
										<?php if (isset($post_list_first) && !empty($post_list_first)) { ?>
										<div class="col-md-6 d-flex flex-column">
											<?php foreach ($post_list_second as $key => $value) { ?>
												<?php $thumbnail = ''; $thumbnail = get_post_thumbnail($value['id'], $value['thumbnail']); ?>
											<!--begin::Post-->
											<div class="ps-lg-6 mb-16 mt-md-0 mt-17">
												<!--begin::Body-->
												<div class="mb-6">
													<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px mb-3" style="background-image:url(<?php echo $thumbnail; ?>)"></div>
													<!--begin::Title-->
													<a href="<?php echo base_url().'blogs/post/'.$value['slug']; ?>" class="fw-bolder text-dark mb-4 fs-2 lh-base text-hover-primary"><?php echo $value['title']; ?></a>
													<!--end::Title-->
													</br>
													<a href="<?php echo base_url().'blogs/'.$value['category_slug']; ?>" class="fw-bolder text-gray-600 mb-4 fs-2 lh-base text-hover-primary"><?php echo $value['category_name']; ?></a>
													<!--begin::Text-->
													<div class="fw-bold fs-5 mt-4 text-gray-600 text-dark"><?php echo $value['excerpt']; ?></div>
													<!--end::Text-->
												</div>
												<!--end::Body-->
												<!--begin::Footer-->
												<div class="d-flex flex-stack flex-wrap">
													<!--begin::Item-->
													<div class="d-flex align-items-center pe-2">
														<?php $author_avatar = ''; $author_avatar = get_author_image($value['author_avatar']); ?>
														<?php if ($author_avatar != '') { ?>
														<!--begin::Avatar-->
														<div class="symbol symbol-35px symbol-circle me-3">
															<img src="<?php echo $author_avatar; ?>" alt="<?php echo $value['author_name']; ?>" />
														</div>
														<!--end::Avatar-->
														<?php }else{ ?>
															<!--begin::Avatar-->
														<div class="symbol symbol-70px symbol-circle mb-2">
															<span class="symbol-label bg-light-danger text-danger fw-bolder"><?php echo strtoupper(substr($value['author_name'], 0, 1)); ?></span>
														</div>
														<!--end::Avatar-->
														<?php } ?>
														<!--begin::Text-->
														<div class="fs-5 fw-bolder">
															<a href="Javascript: void(0)" class="text-gray-700 text-hover-primary"><?php echo ucfirst($value['author_name']); ?></a>
															<span class="text-muted">on <?php echo date('d M Y', strtotime($value['published_at'])); ?></span>
														</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Label-->
													<span class="badge badge-light-<?php if($value['status'] == 'published'){ echo 'success'; }elseif($value['status'] == 'draft'){ echo 'warning'; }elseif($value['status'] == 'completed'){ echo 'info'; }else{ echo 'danger'; } ?> fw-bolder my-2"><?php echo ucfirst($value['status']); ?></span>
													<!--end::Label-->
												</div>
												<!--end::Footer-->
											</div>
											<!--end::Post-->
											<?php } ?>
										</div>
										<!--end::Col-->
										<?php } ?>
									</div>
									<!--begin::Row-->
								</div>
								<!--end::Section-->
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
															<h1 class="mb-5 fw-boldest text-<?php echo $value['color']; ?>"><?php echo ucfirst($value['title']); ?></h1>
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
															<h1 class="mb-5 fw-boldest text-<?php echo $value['color']; ?>"><?php echo ucfirst($value['title']); ?></h1>
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
						<!--end::Home card-->
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