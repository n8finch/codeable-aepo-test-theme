<?php

//* Template Name: AEPO Home
//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Remove the default Genesis loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Add custom homepage content
add_action( 'genesis_loop', 'aepo_homepage_content' );
function aepo_homepage_content() { ?>

	<!-- Slider Section -->
	<section id="aepo-slider-section" class="section-class">
			<?php masterslider(1); ?>
	</section>

	<!-- We Are AEPO Section -->
	<section id="aepo-we-are-section" class="section-class">

			<h2>We Are AEPO</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut sem at leo rhoncus semper molestie nec ante. Quisque tincidunt eros vitae sollicitudin iaculis. Donec bibendum mi est, at viverra nulla iaculis suscipit. Curabitur nec risus laoreet, suscipit augue non, suscipit metus.</p>

	</section>

	<!-- Latest Posts Section -->
	<section id="aepo-latest-posts-section" class="section-class">
		<h2>Latest Posts</h2>
		<div id="aepo-latest-posts-container">
			<div class="one-third first">
				<img src="http://placehold.it/300x350"/>
				<h4>Post Title</h4>
				<div class="aepo-latest-posts-hover-card">
				<h4>Post Title</h4>
				<span>Date</span>
				<p>Excerpt: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<p>Read all</p>
				</div>

			</div>
			<div class="one-third">
				<img src="http://placehold.it/300x350"/>
				<h4>Post Title</h4>
				<div class="aepo-latest-posts-hover-card">
					<h4>Post Title</h4>
					<span>Date</span>
					<p>Excerpt: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<p>Read all</p>
				</div>

			</div>
			<div class="one-third">
				<img src="http://placehold.it/300x350"/>
				<h4>Post Title</h4>
				<div class="aepo-latest-posts-hover-card">
					<h4>Post Title</h4>
					<span>Date</span>
					<p>Excerpt: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<p>Read all</p>
				</div>

			</div>
		</div> <!--End Latest Posts Container-->
	</section>

	<!-- Why Hire Us Section -->
	<section id="aepo-hire-us-section" class="section-class">
		<h2>Why Hire Us</h2>
		<div class="aepo-hire-us-container">
			<div class="one-half first">
				<span>
					<img src="http://placehold.it/50x50">
				</span>
				<span>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				</span>
			</div>
			<div class="one-half">
				<span>
					<img src="http://placehold.it/50x50">
				</span>
				<span>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				</span>
			</div>
		</div>



	</section>

	<!-- Our Clients Section -->
	<section id="aepo-our-clients-section" class="section-class">
		<h2>Our Clients</h2>
		<?php kw_sc_logo_carousel('clients'); ?>

	</section>

	<!-- From Our Clients Testimonials Section -->
	<section id="aepo-testimonials-section" class="section-class">
		<h2>From Our Clients Section</h2>
		<div>
		<?php do_shortcode('[testimonials_cycle theme="default_style" width="25%" count="5" order_by="date" order="ASC" show_thumbs="1" hide_view_more="0" testimonials_per_slide="1" transition="scrollHorz" timer="5000" pause_on_hover="true" auto_height="calc" show_pager_icons="1"]'); ?>
		</div>

	</section>

	<!-- How Was That Section -->
	<section id="aepo-how-was-that-section" class="section-class">
		<h2>How Was That Section</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut sem at leo rhoncus semper molestie nec ante. Quisque tincidunt eros vitae sollicitudin iaculis. Donec bibendum mi est, at viverra nulla iaculis suscipit. Curabitur nec risus laoreet, suscipit augue non, suscipit metus.
		</p>
	</section>

<?php }


// Add custom footer content
add_action( 'genesis_footer', 'aepo_extra_footer_content', 5 );
function aepo_extra_footer_content() { ?>
	<!-- Extra Footer Content -->
	<section id="aepo-extra-footer-section" class="section-class">
		<img src="http://placehold.it/75x75"/>
		<p>All rights reserved, ©2016 AEPO inc</p>
	</section>


<?php }

//* Run the Genesis loop
genesis();
