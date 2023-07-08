<?php

add_action( 'admin_menu', 'tour_traveler_gettingstarted' );
function tour_traveler_gettingstarted() {
	add_theme_page( esc_html__('About Theme', 'tour-traveler'), esc_html__('About Theme', 'tour-traveler'), 'edit_theme_options', 'tour-traveler-guide-page', 'tour_traveler_guide');   
}

function tour_traveler_admin_theme_style() {
   wp_enqueue_style('tour-traveler-custom-admin-style', esc_url(get_theme_file_uri()) . '/inc/dashboard/get_started_info.css');
   wp_enqueue_script('tabs', esc_url(get_theme_file_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'tour_traveler_admin_theme_style');

function tour_traveler_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Tour Traveler Theme', 'tour-traveler' ) ?> </h2>
			<p><?php esc_html_e( "Please Click on the link below to know the theme setup information", 'tour-traveler' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=tour-traveler-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Get Started ', 'tour-traveler' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'tour_traveler_notice');


/**
 * Theme Info Page
 */
function tour_traveler_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'tour-traveler' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
				<div class="intro">
					<div class="pad-box">
						<h2 align="center"><?php esc_html_e( 'Welcome to Tour Traveler Theme', 'tour-traveler' ); ?>
						<span class="version" align="center">Version: <?php echo esc_html($theme['Version']);?></span></h2>	
						</span>
						<div class="powered-by">
							<p align="center"><strong><?php esc_html_e( 'Theme created by ThemesEye', 'tour-traveler' ); ?></strong></p>
							<p align="center">
								<img role="img" class="logo" src="<?php echo esc_url(get_theme_file_uri() . '/inc/dashboard/media/logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>

			<div class="tab">
			  <button role="tab" class="tablinks" onclick="tour_traveler_open(event, 'lite_theme')">Getting Started</button>		  
			  <button role="tab" class="tablinks" onclick="tour_traveler_open(event, 'pro_theme')">Get Premium</button>
			</div>

			<!-- Tab content -->
			<div id="lite_theme" class="tabcontent open">
				<h2 class="tg-docs-section intruction-title" id="section-4" align="center"><?php esc_html_e( '1.) Tour Traveler Lite Theme', 'tour-traveler' ); ?></h2>
				<div class="row">
					<div class="col-md-5">
						<div class="pad-box">
	              			<img role="img" role="img" class="logo" src="<?php echo esc_url(get_theme_file_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
	              		 </div> 
					</div>
					<div class="theme-instruction-block col-md-7">
						<div class="pad-box">
		                    <div class="table-image">
								<table class="tablebox">
									<thead>
										<tr>
											<th><?php esc_html_e('Setup', 'tour-traveler'); ?></th>
											<th><?php esc_html_e('Click Here', 'tour-traveler'); ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php esc_html_e('Logo', 'tour-traveler'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Click', 'tour-traveler'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Menus', 'tour-traveler'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Click', 'tour-traveler'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Top Header', 'tour-traveler'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=tafri_travel_topbar') ); ?>" target="_blank"><?php esc_html_e('Click', 'tour-traveler'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Slider', 'tour-traveler'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=tafri_travel_slider') ); ?>" target="_blank"><?php esc_html_e('Click', 'tour-traveler'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Post Settings', 'tour-traveler'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=tafri_travel_blog_post') ); ?>" target="_blank"><?php esc_html_e('Click', 'tour-traveler'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Footer', 'tour-traveler'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=tafri_travel_footer_section') ); ?>" target="_blank"><?php esc_html_e('Click', 'tour-traveler'); ?></a></td>
										</tr>
									</tbody>
								</table>
							</div>
							<ol>
								<li><?php esc_html_e( 'Start','tour-traveler'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','tour-traveler'); ?></a> <?php esc_html_e( 'your website.','tour-traveler'); ?> </li>
								<li><?php esc_html_e( 'Tour Traveler','tour-traveler'); ?> <a target="_blank" href="<?php echo esc_url( TOUR_TRAVELER_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','tour-traveler'); ?></a> </li>
							</ol>
	                    </div>
	                </div>
				</div><br><br>
				
	        </div>
	        <div id="pro_theme" class="tabcontent">
				<h2 class="dashboard-install-title" align="center"><?php esc_html_e( '2.) Premium Theme Information.','tour-traveler'); ?></h2>
            	<div class="row">
					<div class="col-md-7">
						<img role="img" src="<?php echo esc_url(get_theme_file_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
						<div class="pro-links" >
					    	<a href="<?php echo esc_url( TOUR_TRAVELER_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'tour-traveler'); ?></a>
							<a href="<?php echo esc_url( TOUR_TRAVELER_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'tour-traveler'); ?></a>
							<a href="<?php echo esc_url( TOUR_TRAVELER_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'tour-traveler'); ?></a>
						</div>
						<div class="pad-box">
							<h3><?php esc_html_e( 'Pro Theme Description','tour-traveler'); ?></h3>
                    		<p class="pad-box-p"><?php esc_html_e( 'If your goal is to build a professional and visually appealing website for your tours and travel website. Then you should definitely consider using this Traveler WordPress Theme. It offers a simply stylish layout with an excellent design that brings your business to the limelight. As a result, your website can easily be available, capturing the attention of your target audience. In addition to the numerous features contained in this theme, it is extremely lightweight, quick loading, and technically sound. Traveler WordPress Theme makes your life easier by bringing in readymade demos and pre-built content. This will facilitate quick website building without bothering about designing your website from scratch. It is important for you to know that this theme is not only top-class in terms of its look but also in terms of its features and tools.Its Drag and Drop editor facilitates easily customized page building without touching even a single line of code. As this theme is created by keeping the travel and hospitality industry in mind,  you will find many useful functionalities under its hood. There is an amazing full-width slider to show catchy retina-ready pictures and Call to Action (CTA) buttons placed on it always help to boost the conversion rates of your website. With the live theme customizer offering easy customization options, you can transform every single element present in the default design. You may also make use of the shortcodes if you want to add more content elements to your website. This Traveler WordPress Theme is Woocommerce compatible offering you easy online sales options.', 'tour-traveler' ); ?><p>
                    	</div>
					</div>
					<div class="col-md-5 install-plugin-right">
						<div class="pad-box">								
							<h3><?php esc_html_e( 'Pro Theme Features','tour-traveler'); ?></h3>
							<div class="dashboard-install-benefit">
								<ul>
									<li><?php esc_html_e( 'Easy install 10 minute setup Themes','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Multiplue Domain Usage','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Premium Technical Support','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'FREE Shortcodes','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Multiple page templates','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Google Font Integration','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Customizable Colors','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Theme customizer ','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Documention','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Unlimited Color Option','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Plugin Compatible','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Social Media Integration','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Incredible Support','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Eye Appealing Design','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Simple To Install','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Fully Responsive ','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Translation Ready','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'Custom Page Templates ','tour-traveler'); ?></li>
									<li><?php esc_html_e( 'WooCommerce Integration','tour-traveler'); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
          	<div class="dashboard__blocks">
				<div class="row">
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Get Support','tour-traveler'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( TOUR_TRAVELER_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','tour-traveler'); ?></a></li>
							<li><a target="_blank" href="<?php echo esc_url( TOUR_TRAVELER_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','tour-traveler'); ?></a></li>
						</ol>
					</div>

					<div class="col-md-3">
						<h3><?php esc_html_e( 'Getting Started','tour-traveler'); ?></h3>
						<ol>
							<li><?php esc_html_e( 'Start','tour-traveler'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','tour-traveler'); ?></a> <?php esc_html_e( 'your website.','tour-traveler'); ?> </li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Help Docs','tour-traveler'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( TOUR_TRAVELER_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','tour-traveler'); ?></a></li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Buy Premium','tour-traveler'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( TOUR_TRAVELER_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'tour-traveler'); ?></a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		
	</div>

<?php
}?>