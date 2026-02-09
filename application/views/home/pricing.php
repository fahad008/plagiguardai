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
							<!--begin::Body-->
							<div class="card-body p-lg-5">
								<!--begin::Section-->
								<div class="mb-17" id="kt_pricing">
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
														<?php if ($this->session->userdata('logged_in_customer')) { ?>
														<!--begin::Select-->
														<a href="Javascript: void(0)" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users" class="btn btn-sm btn-primary">Buy Credits</a>
														<!--end::Select-->
														<?php }else{ ?>
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
														<?php if ($this->session->userdata('logged_in_customer')) { ?>
														<!--begin::Select-->
														<a href="Javascript: void(0)" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users" class="btn btn-sm btn-primary">Buy Credits</a>
														<!--end::Select-->
														<?php }else{ ?>
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
						<!--begin::Modal - View Users-->
							<div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog mw-650px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Modal header-->
										<div class="modal-header pb-0 border-0 justify-content-end">
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
										<!--begin::Modal header-->
										<!--begin::Modal body-->
										<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
											<!--begin::Heading-->
											<div class="text-center mb-13">
												<!--begin::Title-->
												<h2 class="mb-3">Need More Credits?</h2>
												<!--end::Title-->
												<!--begin::Description-->
												<div class="text-muted fw-bold fs-5">Get in touch with our team to quickly recharge your account.</div>
												<!--end::Description-->
											</div>
											<!--end::Heading-->
											<!--begin::Users-->
											<div class="mb-15">
												<!--begin::List-->
												<div class="mh-375px scroll-y me-n7 pe-7">
													<?php if (isset($reseller_list) && !empty($reseller_list)) {
														foreach ($reseller_list as $key => $reseller) { ?>
													<!--begin::User-->
													<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
														<!--begin::Details-->
														<div class="d-flex align-items-center">
															<?php $avatar = ''; if ($reseller['profile_picture'] != '') {
													            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$reseller['profile_picture'];
													            if (file_exists($avatar_path)) {
													                $avatar = base_url() . 'uploads/avatar/admin/'.$reseller['profile_picture'];
													            }
													        } ?>
													        <?php if ($avatar != '') { ?>
															<!--begin::Avatar-->
															<div class="symbol symbol-50px symbol-circle">
																<img alt="<?php echo $reseller['full_name']; ?>" src="<?php echo $avatar; ?>" />
															</div>
															<!--end::Avatar-->
															<?php }else{ ?>
															<!--begin::Avatar-->
															<div class="symbol symbol-50px symbol-circle">
																<span class="symbol-label bg-light-success text-success fw-bold"><?php echo $first = strtoupper(substr($reseller['first_name'], 0, 1)); ?></span>
															</div>
															<!--end::Avatar-->
															<?php } ?>
															<!--begin::Details-->
															<div class="ms-6">
																<!--begin::Name-->
																<a href="Javascript: void(0)" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary"><?php echo $reseller['full_name']; ?><span class="badge badge-light fs-8 fw-bold ms-2">Corporate Finance</span></a>
																<!--end::Name-->
																<!--begin::Email-->
																<div class="fw-bold text-muted">
																	<?php echo $reseller['email']; ?>
																	
																</div>
																<?php if ($reseller['contact_number'] != '') { ?>
																<div class="fw-bold text-muted">
																	<?php echo $reseller['contact_number']; ?>
																		
																</div>
																<?php } ?>
																<!--end::Email-->
															</div>
															<!--end::Details-->
														</div>
														<!--end::Details-->
														<!--begin::Stats-->
														<div class="d-flex">
															<!--begin::Sales-->
															<div class="text-end d-grid">
																<button type="button" onclick="copy_email(this)" data-email="<?php echo $reseller['email']; ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm m-1">
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.5" d="M18 2H9C7.34315 2 6 3.34315 6 5H8C8 4.44772 8.44772 4 9 4H18C18.5523 4 19 4.44772 19 5V16C19 16.5523 18.5523 17 18 17V19C19.6569 19 21 17.6569 21 16V5C21 3.34315 19.6569 2 18 2Z" fill="black"></path>
																			<path fill-rule="evenodd" clip-rule="evenodd" d="M14.7857 7.125H6.21429C5.62255 7.125 5.14286 7.6007 5.14286 8.1875V18.8125C5.14286 19.3993 5.62255 19.875 6.21429 19.875H14.7857C15.3774 19.875 15.8571 19.3993 15.8571 18.8125V8.1875C15.8571 7.6007 15.3774 7.125 14.7857 7.125ZM6.21429 5C4.43908 5 3 6.42709 3 8.1875V18.8125C3 20.5729 4.43909 22 6.21429 22H14.7857C16.5609 22 18 20.5729 18 18.8125V8.1875C18 6.42709 16.5609 5 14.7857 5H6.21429Z" fill="black"></path>
																			</svg>
																		</span>
																	</button>
																	<a href="javascript: void(0)" onclick="copy_phone(this)" data-phone="<?php echo $reseller['contact_number']; ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm ms-1">
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.5" d="M18 2H9C7.34315 2 6 3.34315 6 5H8C8 4.44772 8.44772 4 9 4H18C18.5523 4 19 4.44772 19 5V16C19 16.5523 18.5523 17 18 17V19C19.6569 19 21 17.6569 21 16V5C21 3.34315 19.6569 2 18 2Z" fill="black"></path>
																			<path fill-rule="evenodd" clip-rule="evenodd" d="M14.7857 7.125H6.21429C5.62255 7.125 5.14286 7.6007 5.14286 8.1875V18.8125C5.14286 19.3993 5.62255 19.875 6.21429 19.875H14.7857C15.3774 19.875 15.8571 19.3993 15.8571 18.8125V8.1875C15.8571 7.6007 15.3774 7.125 14.7857 7.125ZM6.21429 5C4.43908 5 3 6.42709 3 8.1875V18.8125C3 20.5729 4.43909 22 6.21429 22H14.7857C16.5609 22 18 20.5729 18 18.8125V8.1875C18 6.42709 16.5609 5 14.7857 5H6.21429Z" fill="black"></path>
																			</svg>
																		</span>
																	</a>
															</div>
															<!--end::Sales-->
														</div>
														<!--end::Stats-->
													</div>
													<!--end::User-->
													<?php } } ?>
												</div>
												<!--end::List-->
											</div>
											<!--end::Users-->
										</div>
										<!--end::Modal body-->
									</div>
									<!--end::Modal content-->
								</div>
								<!--end::Modal dialog-->
							</div>
							<!--end::Modal - View Users-->
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
	<script>

		function copy_email(el) {
		    const email = el.dataset.email;

		    if (!email) return;

		    // Modern browsers
		    if (navigator.clipboard && window.isSecureContext) {
		        navigator.clipboard.writeText(email).then(() => {
		            // alert('Password copied!');
		        }).catch(err => {
		            console.error('Copy failed:', err);
		        });
		    } 
		    // Fallback for older browsers
		    else {
		        const tempInput = document.createElement("input");
		        tempInput.value = email;
		        document.body.appendChild(tempInput);
		        tempInput.select();
		        tempInput.setSelectionRange(0, 99999);
		        document.execCommand("copy");
		        document.body.removeChild(tempInput);
		        // alert('Password copied!');
		    }
		}


		function copy_phone(el) {
		    const phone = el.dataset.phone;

		    if (!phone) return;

		    // Modern browsers
		    if (navigator.clipboard && window.isSecureContext) {
		        navigator.clipboard.writeText(phone).then(() => {
		            // alert('Password copied!');
		        }).catch(err => {
		            console.error('Copy failed:', err);
		        });
		    } 
		    // Fallback for older browsers
		    else {
		        const tempInput = document.createElement("input");
		        tempInput.value = phone;
		        document.body.appendChild(tempInput);
		        tempInput.select();
		        tempInput.setSelectionRange(0, 99999);
		        document.execCommand("copy");
		        document.body.removeChild(tempInput);
		        // alert('Password copied!');
		    }
		}
	</script>
</body>
<!--end::Body-->
</html>