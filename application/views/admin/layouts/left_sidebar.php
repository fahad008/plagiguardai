<div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
	<!--begin::Brand-->
	<div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
		<!--begin::Logo-->
		<a href="<?php echo base_url().'admin/dashboard'; ?>">
			<img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/text-logo.svg" class="custom-h-20px logo" />
		</a>
		<!--end::Logo-->
	</div>
	<!--end::Brand-->
	<!--begin::Aside menu-->
	<div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
		<!--begin::Aside Menu-->
		<div class="w-100 hover-scroll-overlay-y d-flex pe-2" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
			<!--begin::Menu-->
			<div class="menu menu-column menu-rounded fw-bold my-auto" id="#kt_aside_menu" data-kt-menu="true">
				<div class="menu-item">
					<a class="menu-link <?php if($active == 'dashboard'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/dashboard'; ?>">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Dashboard</span>
					</a>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if($active == 'customerList' or $active == 'AddCustomer'){ echo 'show'; } ?>" href="javascript: void(0)">
					<span class="menu-link">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Customers</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link <?php if($active == 'customerList'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/customers/'; ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">List</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link <?php if($active == 'AddCustomer'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/customers/add/'; ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Add</span>
							</a>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if($active == 'resellerList' or $active == 'AddReseller'){ echo 'show'; } ?>" href="javascript: void(0)">
					<span class="menu-link">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Resellers</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link <?php if($active == 'resellerList'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/resellers/'; ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">List</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link <?php if($active == 'AddReseller'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/resellers/add/'; ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Add</span>
							</a>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if($active == 'plansList' or $active == 'AddPlans'){ echo 'show'; } ?>" href="javascript: void(0)">
					<span class="menu-link">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Plans</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link <?php if($active == 'plansList'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/plans/'; ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">List</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link <?php if($active == 'AddPlans'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/plans/add/'; ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Add</span>
							</a>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if($active == 'blogs_list' or $active == 'blogs_category' or $active == 'blogs_author'){ echo 'show'; } ?>" href="javascript: void(0)">
					<span class="menu-link">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Blogs</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link <?php if($active == 'blogs_list'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/blogs/'; ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Blogs List</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link <?php if($active == 'blogs_category'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/blogs/category'; ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Blogs Categories</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link <?php if($active == 'blogs_author'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/blogs/authors/'; ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Blogs Author</span>
							</a>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if($active == 'contact_us' or $active == 'about_us'){ echo 'show'; } ?>" href="javascript: void(0)">
					<span class="menu-link">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Pages</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link <?php if($active == 'contact_us'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/pages/contact_us/'; ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Contact Us</span>
							</a>
						</div>
					</div>
				</div>
				<div class="menu-item">
					<a class="menu-link <?php if($active == 'roles'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/roles'; ?>">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Manage Roles</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link <?php if($active == 'management'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/management'; ?>">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Manage Admins</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link <?php if($active == 'api_key'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/apikey_manager/'; ?>">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Manage API Keys</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link <?php if($active == 'profile'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/dashboard/profile/'; ?>">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">My Profile</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link <?php if($active == 'settings'){ echo 'active'; } ?>" href="<?php echo base_url().'admin/dashboard/settings/'; ?>">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
							<span class="svg-icon svg-icon-5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
									<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Settings</span>
					</a>
				</div>
			</div>
			<!--end::Menu-->
		</div>
		<!--end::Aside Menu-->
	</div>
	<!--end::Aside menu-->
	<!--begin::Footer-->
	<div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">
		<!--begin::User panel-->
		<div class="d-flex flex-stack">
			<!--begin::Wrapper-->
			<div class="d-flex align-items-center">
				<!--begin::Avatar-->
				<div class="symbol symbol-circle symbol-40px">
					<img src="<?php echo $admin_info['avatar']; ?>" alt="photo" />
				</div>
				<!--end::Avatar-->
				<!--begin::User info-->
				<div class="ms-2">
					<!--begin::Name-->
					<a href="javascript: void(0)" class="text-gray-800 text-hover-primary fs-6 fw-bolder lh-1"><?php echo $admin_info['first_name'].' '.$admin_info['last_name']; ?></a>
					<!--end::Name-->
					<!--begin::Major-->
					<span class="text-muted fw-bold d-block fs-7 lh-1"><?php echo $role_info['text']; ?></span>
					<!--end::Major-->
				</div>
				<!--end::User info-->
			</div>
			<!--end::Wrapper-->
			<!--begin::User menu-->
			<div class="ms-1">
				<div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-end">
					<!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
					<span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black" />
							<path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</div>
				<!--begin::Menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
					<!--begin::Menu item-->
					<div class="menu-item px-3">
						<div class="menu-content d-flex align-items-center px-3">
							<!--begin::Username-->
							<div class="d-flex flex-column">
								<div class="fw-bolder d-flex align-items-center fs-5"><?php echo $admin_info['first_name'].' '.$admin_info['last_name']; ?>
								<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2"><?php echo $role_info['text']; ?></span></div>

								<a href="#" class="fw-bold text-muted text-hover-primary fs-7"><?php echo $admin_info['email']; ?></a>
							</div>
							<!--end::Username-->
						</div>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu separator-->
					<div class="separator my-2"></div>
					<!--end::Menu separator-->
					<!--begin::Menu item-->
					<div class="menu-item px-5">
						<a href="<?php echo base_url().'admin/dashboard/profile/'; ?>" class="menu-link px-5">My Profile</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-5 my-1">
						<a href="<?php echo base_url().'admin/dashboard/settings/'; ?>" class="menu-link px-5">PLAGI Settings</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu separator-->
					<div class="separator my-2"></div>
					<!--end::Menu separator-->
					<!--begin::Menu item-->
					<div class="menu-item px-5">
						<a href="<?php echo base_url().'admin/logout/'; ?>" class="menu-link px-5">Sign Out</a>
					</div>
					<!--end::Menu item-->
				</div>
				<!--end::Menu-->
			</div>
			<!--end::User menu-->
		</div>
		<!--end::User panel-->
	</div>
	<!--end::Footer-->
</div>