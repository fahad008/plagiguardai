<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<?php if (isset($post_info) && !empty($post_info)) {
			if ($post_info['status'] == 'published') {
				if (isset($page_seo) && !empty($page_seo)) { 
					$featured_image = get_post_image($post_info['id'], $post_info['featured_image']); 
				 	$favicon = base_url().'assets/media/logos/favicon.ico'; 
				 	$published_iso = date('c', strtotime($post_info['published_at']));
					$modified_iso  = date('c', strtotime($post_info['updated_at']));
					$blog_url  = base_url().'blogs/post/'.$post_info['slug'];
					$articleSection = '';
					if(isset($category_name) && $category_name != ''){ 
						$articleSection = $category_name; 
					}
		?>
		<script type="application/ld+json">
	    {
	        "@context": "https://schema.org",
	        "@type": "BlogPosting",
	        "headline": "<?php echo $page_seo['meta_title']; ?>",
	        "description": "<?php echo $page_seo['meta_description']; ?>",
	        "image": {
			    "@type": "ImageObject",
			    "url": "<?php echo $featured_image; ?>",
			    "caption": "<?php echo $page_seo['meta_title']; ?>"
			},
	        "author": {
	            "@type": "Organization",
	            "name": "PlagiGuardAI"
	        },
	        "publisher": {
	            "@type": "Organization",
	            "name": "PlagiGuardAI",
	            "logo": {
	                "@type": "ImageObject",
	                "url": "<?php echo $favicon; ?>"
	            }
	        },
	        "datePublished": "<?php echo $published_iso; ?>",
	        "dateModified": "<?php echo $modified_iso; ?>",
	        "mainEntityOfPage": {
	            "@type": "WebPage",
	            "@id": "<?php echo $blog_url; ?>"
	        },
	        "articleSection": "<?php echo $articleSection; ?>",
	        "keywords": "<?php echo strtolower($page_seo['meta_keywords']); ?>"
	    }
	    </script>
		<?php } } } ?>
		<base href="<?php echo base_url(); ?>">
		<title><?php if (isset($page_seo) && !empty($page_seo)) { echo $page_seo['meta_title']; }else{ echo "PlagiGuardAI - AI & Plagiarism Detection Tool"; } ?></title>
		<meta name="description" content="<?php if (isset($page_seo) && !empty($page_seo)) { echo $page_seo['meta_description']; }else{ echo "PlagiGuardAI is an advanced AI and plagiarism detection tool that helps you identify AI-generated content and ensure originality."; } ?>" />
		<meta name="keywords" content="<?php if (isset($page_seo) && !empty($page_seo)) { echo strtolower($page_seo['meta_keywords']); }else{ echo "AI content detection, plagiarism checker, AI writing detection, original content verification, content authenticity, PlagiGuardAI"; } ?>" />
		<meta name="author" content="PlagiGuardAI">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<?php if(isset($post_info) && !empty($post_info)){ if($post_info['status'] == 'published'){ ?>
		<meta name="robots" content="index, follow">
		<?php }else{ ?>
		<meta name="robots" content="noindex, nofollow">
		<?php } } ?>

		<!-- Open Graph / Facebook -->
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="PlagiGuardAI" />
		<meta property="og:title" content="<?php if (isset($page_seo) && !empty($page_seo)) { echo $page_seo['meta_title']; }else{ echo "PlagiGuardAI - AI & Plagiarism Detection Tool"; } ?>">
		<meta property="og:description" content="<?php if (isset($page_seo) && !empty($page_seo)) { echo $page_seo['meta_description']; }else{ echo "PlagiGuardAI is an advanced AI and plagiarism detection tool that helps you identify AI-generated content and ensure originality."; } ?>">
		<meta property="og:image" content="<?php if(isset($post_info) && !empty($post_info)){ echo $featured_image = get_post_image($post_info['id'], $post_info['featured_image']); }else{ echo 'https://plagiguardai.com/assets/media/webscreen.png'; } ?>">
		<meta property="og:image:alt" content="<?php if (isset($page_seo) && !empty($page_seo)) { echo $page_seo['meta_title']; }else{ echo "PlagiGuardAI - AI & Plagiarism Detection Tool"; } ?>">
		<meta property="og:url" content="<?php echo base_url(); ?>">
		<meta property="og:type" content="<?php if(isset($active) && $active != 'blogs'){ echo 'website'; }else{ echo 'article'; } ?>">

		<?php if(isset($active) && $active == 'blogs'){ ?>

		<meta property="article:published_time" content="<?php if(isset($post_info) && !empty($post_info)){ if($post_info['status'] == 'published'){ echo date('c', strtotime($post_info['published_at'])); } } ?>">
		<meta property="article:modified_time" content="<?php if(isset($post_info) && !empty($post_info)){ if($post_info['status'] == 'published'){ echo date('c', strtotime($post_info['updated_at'])); } } ?>">
		<meta property="article:author" content="PlagiGuardAI">
		<meta property="article:section" content="<?php if(isset($category_name) && $category_name != ''){ echo $category_name; } ?>">
		<?php if (isset($page_seo) && !empty($page_seo)) { 
			foreach ($page_seo['tags'] as $key => $tag) { ?>
<meta property="article:tag" content="<?php echo strtolower($tag); ?>">
		<?php } } ?>
		<?php } ?>


		<link rel="canonical" href="<?php if(isset($canonical_url) && !empty($canonical_url)){ echo $canonical_url; } ?>" />
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/media/logos/favicon.ico" />
		<!-- Twitter -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:url" content="<?php if(isset($post_info) && !empty($post_info)){ echo base_url().'blogs/post/'.$post_info['slug']; } ?>">
		<meta name="twitter:title" content="<?php if (isset($page_seo) && !empty($page_seo)) { echo $page_seo['meta_title']; }else{ echo "PlagiGuardAI - AI & Plagiarism Detection Tool"; } ?>">
		<meta name="twitter:description" content="<?php if (isset($page_seo) && !empty($page_seo)) { echo $page_seo['meta_description']; }else{ echo "PlagiGuardAI is an advanced AI and plagiarism detection tool that helps you identify AI-generated content and ensure originality."; } ?>">
		<meta name="twitter:image" content="<?php if(isset($post_info) && !empty($post_info)){ echo $featured_image = get_post_image($post_info['id'], $post_info['featured_image']); }else{ echo 'https://plagiguardai.com/assets/media/webscreen.png'; } ?>">



		<!-- Favicon -->
		<link rel="icon" href="assets/media/logos/favicon.ico" type="image/png">
		<!--begin::Fonts-->

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/dashboard.css" rel="stylesheet" type="text/css" />
		<?php if ($active == 'blogs' or $active == 'pricing' or $active == 'contact_us') { ?>
			<link href="assets/css/external-pages.css" rel="stylesheet" type="text/css" />
		<?php } ?>
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="sidebar-enabled">
		<div id="kt_app_page_loader" class="app-page-loader-transparent">
		    <div class="custom-spinner">
		        <span class="svg-icon svg-icon-custom">
				    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				        <path opacity="0.3" d="M2.10001 10C3.00001 5.6 6.69998 2.3 11.2 2L8.79999 4.39999L11.1 7C9.60001 7.3 8.30001 8.19999 7.60001 9.59999L4.5 12.4L2.10001 10ZM19.3 11.5L16.4 14C15.7 15.5 14.4 16.6 12.7 16.9L15 19.5L12.6 21.9C17.1 21.6 20.8 18.2 21.7 13.9L19.3 11.5Z" fill="currentColor"/>
				        <path d="M13.8 2.09998C18.2 2.99998 21.5 6.69998 21.8 11.2L19.4 8.79997L16.8 11C16.5 9.39998 15.5 8.09998 14 7.39998L11.4 4.39998L13.8 2.09998ZM12.3 19.4L9.69998 16.4C8.29998 15.7 7.3 14.4 7 12.8L4.39999 15.1L2 12.7C2.3 17.2 5.7 20.9 10 21.8L12.3 19.4Z" fill="currentColor"/>
				    </svg>
				</span>
		    </div>
		</div>

