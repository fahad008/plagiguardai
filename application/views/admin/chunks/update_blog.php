<!--begin::Modal dialog-->
<div class="modal-dialog modal-fullscreen p-9">
	<!--begin::Modal content-->
	<div class="modal-content rounded">
		<!--begin::Modal header-->
		<div class="modal-header">
			<!--begin::Modal title-->
			<h2>Update Blog</h2>
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
		<!--begin::Modal body-->
		<div class="modal-body scroll-y m-5">
			<!--begin::Stepper-->
			<div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_project_stepper">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Nav-->
					<div class="stepper-nav justify-content-center py-2">
						<!--begin::Step 1-->
						<div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
							<h3 class="stepper-title">Pick an Author</h3>
						</div>
						<!--end::Step 1-->
						<!--begin::Step 2-->
						<div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
							<h3 class="stepper-title">Blog Details</h3>
						</div>
						<!--end::Step 2-->
						<!--begin::Step 5-->
						<div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
							<h3 class="stepper-title">Save SEO</h3>
						</div>
						<!--end::Step 5-->
						<!--begin::Step 6-->
						<div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
							<h3 class="stepper-title">Upload Featured image</h3>
						</div>
						<!--end::Step 6-->
						<!--begin::Step 7-->
						<div class="stepper-item" data-kt-stepper-element="nav">
							<h3 class="stepper-title">Completed</h3>
						</div>
						<!--end::Step 7-->
					</div>
					<!--end::Nav-->
					<!--begin::Form-->
					<form class="mx-auto w-100 mw-600px pt-15 pb-10" enctype="multipart/form-data" novalidate="novalidate" id="kt_modal_create_project_form" method="post">
						<!--begin::Type-->
						<div class="current" data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-7 pb-lg-12">
									<!--begin::Title-->
									<h1 class="fw-bolder text-dark">Pick an Author</h1>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<input type="hidden" name="post_id" value="<?php if(isset($post_info) && !empty($post_info)){ echo $post_info['id']; } ?>" id="post_id">
								<input type="hidden" name="pick_an_author" value="<?php echo base_url().'admin/blogs/pick_an_author'; ?>" id="pick_an_author">
								<input type="hidden" name="blog_details" value="<?php echo base_url().'admin/blogs/blog_details'; ?>" id="blog_details">
								<input type="hidden" name="save_seo" value="<?php echo base_url().'admin/blogs/save_seo'; ?>" id="save_seo">
								<input type="hidden" name="featured_image" value="<?php echo base_url().'admin/blogs/featured_image'; ?>" id="featured_image">
								<input type="hidden" name="complete_blog" value="<?php echo base_url().'admin/blogs/complete_blog'; ?>" id="complete_blog">
								<input type="hidden" name="upload_thumbnail" value="<?php echo base_url().'admin/blogs/upload_thumbnail'; ?>" id="upload_thumbnail">
								<input type="hidden" name="remove_thumbnail" value="<?php echo base_url().'admin/blogs/remove_thumbnail'; ?>" id="remove_thumbnail">
								<input type="hidden" name="upload_featured_image" value="<?php echo base_url().'admin/blogs/upload_featured_image'; ?>" id="upload_featured_image">
								<input type="hidden" name="remove_featured_image" value="<?php echo base_url().'admin/blogs/remove_featured_image'; ?>" id="remove_featured_image">
								<!--begin::Input group-->
								<div class="fv-row mb-10 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="d-flex align-items-center fs-5 fw-bold mb-2">
										<span class="required">Blog Title</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify your unique blog title" aria-label="Specify your unique blog title"></i>
									</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-lg form-control-solid" name="title"value="<?php if(isset($post_info) && !empty($post_info)){ echo $post_info['title']; } ?>">
									<!--end::Input-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Input group-->
								<div class="fv-row">
									<!--begin::Label-->
									<label class="d-flex align-items-center fs-5 fw-bold mb-4">
										<span class="required">Authors</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Choose an author for blog" aria-label="Choose an author for blog"></i>
									</label>
									<!--end::Label-->
									<!--begin:Options-->
									<div class="fv-row fv-plugins-icon-container">
										<?php if (isset($author_list) && !empty($author_list)) { 
											foreach ($author_list as $key => $author) { ?>
											<!--begin:Option-->
											<label class="d-flex flex-stack mb-5 cursor-pointer">
												<!--begin:Label-->
												<span class="d-flex align-items-center me-2">
													<!--begin:Icon-->
													<span class="symbol symbol-50px me-6">
														<?php if ($author['avatar'] != '') { ?>
														<div class="symbol symbol-45px me-5">
															<img alt="<?php echo $author['name']; ?>" src="<?php echo $author['avatar']; ?>">
														</div>
														<?php }else{ ?>
														<span class="symbol-label bg-light-danger text-danger fw-bolder"><?php echo strtoupper(substr($author['name'], 0, 1)); ?></span>
														<?php } ?>
													</span>
													<!--end:Icon-->
													<!--begin:Info-->
													<span class="d-flex flex-column">
														<span class="fw-bolder fs-6"><?php echo ucfirst($author['name']); ?></span>
														<span class="fs-7 text-muted"><?php echo ucfirst($author['designation']); ?></span>
													</span>
													<!--end:Info-->
												</span>
												<!--end:Label-->
												<!--begin:Input-->
												<span class="form-check form-check-custom form-check-solid">
													<input <?php if(isset($post_info) && !empty($post_info)){ if ($post_info['author_id'] == $author['id']) { echo 'checked'; } } ?> class="form-check-input" type="radio" name="author_id" value="<?php echo $author['id']; ?>">
												</span>
												<!--end:Input-->
											</label>
											<!--end::Option-->
										<?php } } ?>
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end:Options-->
								</div>
								<!--begin::Actions-->
								<div class="d-flex justify-content-end">
									<button type="button" class="btn btn-lg btn-primary" data-kt-element="type-next">
										<span class="indicator-label">Blog Details</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Type-->
						<!--begin::Settings-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-12">
									<!--begin::Title-->
									<h1 class="fw-bolder text-dark">Blog Details</h1>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<input type="hidden" name="thumbnail_image" value="<?php if(isset($post_info) && !empty($post_info)){ if ($post_info['thumbnail'] != '') { echo $filename = basename($post_info['thumbnail']); } } ?>" id="thumbnail_image_input">
								<!--begin::Input group-->
								<div class="fv-row mb-8">
									<label class="required fs-6 fw-bold mb-2">Thumbnail</label>
									<!--begin::Dropzone-->
									<div class="dropzone" id="kt_modal_create_project_settings_logo">
										<!--begin::Message-->
										<div class="dz-message needsclick">
											<!--begin::Icon-->
											<!--begin::Svg Icon | path: icons/duotune/files/fil010.svg-->
											<span class="svg-icon svg-icon-3hx svg-icon-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 12.6L12.7 9.3C12.3 8.9 11.7 8.9 11.3 9.3L8 12.6H11V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18V12.6H16Z" fill="black" />
													<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<!--end::Icon-->
											<!--begin::Info-->
											<div class="ms-4">
												<h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop file here or click to upload.</h3>
												<span class="fw-bold fs-7 text-gray-400"><b class="text-dark">Accepted:</b> .JPG, .PNG</span><br>
												<span class="fw-bold fs-7 text-gray-400"><b class="text-dark">Max file size:</b> 5MB</span>
											</div>
											<!--end::Info-->
										</div>
									</div>
									<!--end::Dropzone-->
									<div class="fv-plugins-message-container invalid-feedback" id="thumbnail-error"></div>
									<div id="uploaded-image-view">
									<?php if(isset($post_info) && !empty($post_info)){ if ($post_info['thumbnail'] != '') { ?>
									<div class="mb-8">
										<!--begin::Label-->
										<label class="fs-6 fw-bold mb-2">Uploaded File</label>
										<!--End::Label-->
										<!--begin::Files-->
										<div class="mh-300px scroll-y me-n7 pe-7">
											<!--begin::File-->
											<div class="d-flex flex-stack py-4 border border-top-0 border-left-0 border-right-0 border-dashed">
												<div class="d-flex align-items-center">
													<!--begin::Avatar-->
													<div class="symbol symbol-35px">
														<img src="<?php echo $post_info['thumbnail']; ?>" alt="icon">
													</div>
													<!--end::Avatar-->
													<!--begin::Details-->
													<div class="ms-6">
														<a href="javascript: void(0)" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Uploaded thumbnail</a>
													</div>
													<!--end::Details-->
												</div>
												<!--begin::Menu-->
												<div class="min-w-100px text-end">
													<?php $filename = basename($post_info['thumbnail']); ?>
													<a href="javascript: void(0)" onclick="remove_thumbnail(this)" data-id="<?php if(isset($post_info) && !empty($post_info)){ echo $post_info['id']; } ?>" data-image="<?php if(isset($filename) && $filename != ''){ echo $filename; } ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
														<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
																<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
																<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</a>
												</div>
												<!--end::Menu-->
											</div>
											<!--end::File-->
										</div>
										<!--end::Files-->
									</div>
									<?php } } ?>
									</div>
								</div>
								<!--end::Input group-->
								<?php if (isset($categories_list) && !empty($categories_list)) {?>
								<!--begin::Input group-->
								<div class="fv-row mb-8">
									<!--begin::Label-->
									<label class="required fs-6 fw-bold mb-2">Category</label>
									<!--end::Label-->
									<!--begin::Input-->
									<select class="form-select form-select-solid"data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" name="categories[]">
										<?php foreach ($categories_list as $key => $category) { ?>
										<option <?php if (isset($post_categories) && !empty($post_categories)) { if (in_array($category['id'], $post_categories)) { echo "selected"; } } ?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
										<?php } ?>
									</select>
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<?php } ?>
								<!--begin::Input group-->
								<div class="fv-row mb-8">
									<!--begin::Label-->
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Slug</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify Blog Slug"></i>
									</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Enter Blog Slug" value="<?php if(isset($post_info) && !empty($post_info)){ if ($post_info['slug'] != '') { echo $post_info['slug']; } } ?>" name="slug" id="post_slug" />
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-8">
									<!--begin::Label-->
									<label class="required fs-6 fw-bold mb-2">Featured Description</label>
									<!--end::Label-->
									<!--begin::Input-->
									<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Featured Description" name="excerpt"><?php if(isset($post_info) && !empty($post_info)){ if ($post_info['slug'] != '') { echo $post_info['excerpt']; } } ?></textarea>
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="d-flex flex-stack">
									<button type="button" class="btn btn-lg btn-light me-3" data-kt-element="settings-previous">Pick an Author</button>
									<button type="button" class="btn btn-lg btn-primary" data-kt-element="settings-next">
										<span class="indicator-label">Save SEO</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Settings-->
						<!--begin::Targets-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-12">
									<!--begin::Title-->
									<h1 class="fw-bolder text-dark">Save SEO</h1>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="fv-row mb-8">
									<label class="fs-6 fw-bold mb-2">Meta Title</label>
									<input type="text" class="form-control form-control-solid" placeholder="Enter Meta Title" name="meta_title" value="<?php if(isset($seo_info) && !empty($seo_info)){ if ($seo_info['meta_title'] != '') { echo $seo_info['meta_title']; } } ?>" />
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-8">
									<!--begin::Label-->
									<label class="required fs-6 fw-bold mb-2">Meta Description</label>
									<!--end::Label-->
									<!--begin::Input-->
									<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Meta Description" name="meta_description"><?php if(isset($seo_info) && !empty($seo_info)){ if ($seo_info['meta_description'] != '') { echo $seo_info['meta_description']; } } ?></textarea>
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-8">
									<label class="required fs-6 fw-bold mb-2"><span>Meta Keywords</span><i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Recommended: 1–3 words per Keyword" aria-label="Recommended: 1–3 words per Keyword"></i></label>
									<input class="form-control form-control-solid" value="<?php if(isset($seo_info) && !empty($seo_info)){ if ($seo_info['meta_keywords'] != '') { echo $seo_info['meta_keywords']; } } ?>" name="meta_keywords" />
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-8">
									<label class="required fs-6 fw-bold mb-2"><span>Tags</span><i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Recommended: 1–3 words per tag" aria-label="Recommended: 1–3 words per tag"></i></label>

									<input class="form-control form-control-solid" value="<?php if(isset($seo_info) && !empty($seo_info)){ if ($seo_info['tags'] != '') { echo $seo_info['tags']; } } ?>" name="target_tags" />
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="d-flex flex-stack">
									<button type="button" class="btn btn-lg btn-light me-3" data-kt-element="targets-previous">Blog Details</button>
									<button type="button" class="btn btn-lg btn-primary" data-kt-element="targets-next">
										<span class="indicator-label">Upload Featured image</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Targets-->
						<!--begin::Files-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-10 pb-lg-12">
									<!--begin::Title-->
									<h1 class="fw-bolder text-dark">Upload Featured image</h1>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<input type="hidden" name="featured_image" value="<?php if(isset($post_info) && !empty($post_info)){ echo $featured_basename = basename($post_info['featured_image']); } ?>" id="featured_image_input">
								<!--begin::Input group-->
								<div class="fv-row mb-8">
									<!--begin::Dropzone-->
									<div class="dropzone" id="kt_modal_create_project_files_upload">
										<!--begin::Message-->
										<div class="dz-message needsclick">
											<!--begin::Icon-->
											<!--begin::Svg Icon | path: icons/duotune/files/fil010.svg-->
											<span class="svg-icon svg-icon-3hx svg-icon-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 12.6L12.7 9.3C12.3 8.9 11.7 8.9 11.3 9.3L8 12.6H11V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18V12.6H16Z" fill="black" />
													<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<!--end::Icon-->
											<!--begin::Info-->
											<div class="ms-4">
												<h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop file here or click to upload.</h3>
												<span class="fw-bold fs-7 text-gray-400"><b class="text-dark">Accepted:</b> .JPG, .PNG</span><br>
												<span class="fw-bold fs-7 text-gray-400"><b class="text-dark">Max file size:</b> 5MB</span>
											</div>
											<!--end::Info-->
										</div>
									</div>
									<!--end::Dropzone-->
									
								</div>
								<div id="uploaded-featured-view">
									<?php if(isset($post_info) && !empty($post_info)){ if ($post_info['featured_image'] != '') { ?>
									<div class="mb-8">
										<!--begin::Label-->
										<label class="fs-6 fw-bold mb-2">Uploaded File</label>
										<!--End::Label-->
										<!--begin::Files-->
										<div class="mh-300px scroll-y me-n7 pe-7">
											<!--begin::File-->
											<div class="d-flex flex-stack py-4 border border-top-0 border-left-0 border-right-0 border-dashed">
												<div class="d-flex align-items-center">
													<!--begin::Avatar-->
													<div class="symbol symbol-35px">
														<img src="<?php echo $post_info['featured_image']; ?>" alt="icon">
													</div>
													<!--end::Avatar-->
													<!--begin::Details-->
													<div class="ms-6">
														<a href="javascript: void(0)" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Uploaded Featured Image</a>
													</div>
													<!--end::Details-->
												</div>
												<!--begin::Menu-->
												<div class="min-w-100px text-end">
													<?php $featuredname = basename($post_info['featured_image']); ?>
													<a href="javascript: void(0)" onclick="remove_featured_image(this)" data-id="<?php if(isset($post_info) && !empty($post_info)){ echo $post_info['id']; } ?>" data-image="<?php if(isset($featuredname) && $featuredname != ''){ echo $featuredname; } ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
														<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
																<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
																<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</a>
												</div>
												<!--end::Menu-->
											</div>
											<!--end::File-->
										</div>
										<!--end::Files-->
									</div>
									<?php } } ?>
									</div>
								<!--end::Input group-->
								<div class="fv-row mb-8">
									<!--begin::Label-->
									<label class="required fs-6 fw-bold mb-2">Blog Content</label>
									<!--end::Label-->
									<!--begin::Input-->
									<textarea class="form-control form-control-solid" rows="5" placeholder="Enter Blog Content" name="content"><?php if(isset($post_info) && !empty($post_info)){ echo $post_info['content']; } ?></textarea>
									<!--end::Input-->
								</div>
								<!--begin::Actions-->
								<div class="d-flex flex-stack">
									<button type="button" class="btn btn-lg btn-light me-3" data-kt-element="files-previous">Save SEO</button>
									<button type="button" class="btn btn-lg btn-primary" data-kt-element="files-next">
										<span class="indicator-label">Complete</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Files-->
						<!--begin::Complete-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-12 text-center">
									<!--begin::Title-->
									<h1 class="fw-bolder text-dark">Blog Created!</h1>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<!--begin::Actions-->
								<div class="d-flex flex-center pb-20">
									<button type="button" class="btn btn-lg btn-light me-3" data-kt-element="complete-start">OK</button>
									<a href="" class="btn btn-lg btn-primary" data-bs-toggle="tooltip" title="View Blog Post" id="view_blog_btn">View Blog Post</a>
								</div>
								<!--end::Actions-->
								<!--begin::Illustration-->
								<div class="text-center px-4">
									<img src="<?php echo base_url(); ?>assets/media/illustrations/unitedpalms-1/17.png" alt="" class="w-100 mh-350px" />
								</div>
								<!--end::Illustration-->
							</div>
						</div>
						<!--end::Complete-->
					</form>
					<!--end::Form-->
				</div>
				<!--begin::Container-->
			</div>
			<!--end::Stepper-->
		</div>
		<!--end::Modal body-->
	</div>
	<!--end::Modal content-->
</div>
<!--end::Modal dialog-->
<script>
	
	function remove_thumbnail(el){
		const post_id = el.getAttribute('data-id');
		const file_name = el.getAttribute('data-image');
	    Swal.fire({
			text: "Are you sure you want to remove thumbnail?",
			icon: "warning",
			buttonsStyling: false,
			showCancelButton: true,
			confirmButtonText: "Yes, remove!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
		}).then(function (result) {
			if (result.isConfirmed) {
				$.ajax({
		            url: "<?php echo base_url().'admin/blogs/remove_thumbnail'; ?>",
		            type: 'POST',
		            dataType: 'json',
		            data: {
		                post_id: post_id, file_name: file_name
		            },
		            success: function(response) {

		                if (response.status == 'success') {
		                	$("#uploaded-image-view").html('');
		                	Swal.fire({
								text: response.message,
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
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
		});
	}

	function remove_featured_image(el){
		const post_id = el.getAttribute('data-id');
		const file_name = el.getAttribute('data-image');
	    Swal.fire({
			text: "Are you sure you want to remove featured image?",
			icon: "warning",
			buttonsStyling: false,
			showCancelButton: true,
			confirmButtonText: "Yes, remove!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
		}).then(function (result) {
			if (result.isConfirmed) {
				$.ajax({
		            url: "<?php echo base_url().'admin/blogs/remove_featured_image'; ?>",
		            type: 'POST',
		            dataType: 'json',
		            data: {
		                post_id: post_id, file_name: file_name
		            },
		            success: function(response) {

		                if (response.status == 'success') {
		                	$("#uploaded-featured-view").html('');
		                	Swal.fire({
								text: response.message,
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
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
		});
	}
</script>