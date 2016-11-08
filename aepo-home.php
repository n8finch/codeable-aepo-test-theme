<?php

//* Template Name: AEPO Home
//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Remove the default Genesis loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Add custom homepage content
add_action( 'genesis_loop', 'aepo_homepage_content' );
function aepo_homepage_content() {

	//Get all the field variables
	$home_slider_id = get_field('home_slider_id');
	$intro_section_title = get_field('intro_section_title');
	$intro_section_content = get_field('intro_section_content');
	$latest_posts_title = get_field('latest_posts_title');
	$hire_us_title = get_field('hire_us_title');
	$our_clients_carousel_id = get_field('our_clients_carousel_id');
	$testimonials_tile = get_field('testimonials_tile');
	$testimonials_shortcode = get_field('testimonials_shortcode');
	$how_was_that_title = get_field('how_was_that_title');
	$how_was_that_content = get_field('how_was_that_content');
	$how_was_that_button_1_text = get_field('how_was_that_button_1_text');
	$how_was_that_button_1_link = get_field('how_was_that_button_1_link');
	$how_was_that_button_2_text = get_field('how_was_that_button_2_text');
	$how_was_that_button_2_link = get_field('how_was_that_button_2_link');

	?>
	<!-- Slider Section -->
	<section id="aepo-slider-section" class="section-class">
			<?php masterslider($home_slider_id); ?>
	</section>

	<!-- We Are AEPO Section -->
	<section id="aepo-we-are-section" class="aepo-white-section">

			<h4><?php echo $intro_section_title; ?></h4>
			<?php echo $intro_section_content; ?>

	</section>

	<!-- Latest Posts Section -->
	<?php

	$args = array(
		'posts_per_page' => 3,
		'post_type'        => 'post',
	);

	$myposts = get_posts( $args );
	?>
	<section id="aepo-latest-posts-section" class="aepo-off-white-section">
		<h4><?php echo $latest_posts_title;?></h4>
		<div id="aepo-latest-posts-container">

			<?php
			foreach ( $myposts as $post ) {

				//Get the variables for each post
				$post_ID = $post->ID;
				$post_permalink = $post->guid;
				$post_title = $post->post_title;
				$post_date = $post->post_date_gmt;
				$post_date = date_format( date_create($post_date), 'd M Y');
				$post_content = strip_tags($post->post_content);
				$post_content = substr($post_content, 0, 75);
				$post_thumb = get_the_post_thumbnail_url($post_ID);


				?>

				<div class="latest-post hover-tile-outer" style="background-image: url('<?php echo $post_thumb ?>');">
					
					<div class="hover-tile-container">
						<div class="hover-tile hover-tile-visible">
							<h6><?php echo $post_title; ?></h6>
						</div>
						<div class="hover-tile hover-tile-hidden">
							<a href="<?php echo $post_permalink; ?>">

							<h6><?php echo $post_title; ?></h6>
							<span><?php echo $post_date?></span>
							<p><?php echo $post_content; ?>...</p>
							<p class="hover-tile-read-all">Read all</p>
							</a>
						</div>

					</div>
				</div>

				<?php
			$i++;
			} //endforeach
			?>

		</div> <!--End Latest Posts Container-->
	</section>

	<!-- Why Hire Us Section -->
	<section id="aepo-hire-us-section" class="aepo-white-section">
		<h4><?php echo $hire_us_title; ?></h4>
		<div class="aepo-hire-us-container">

			<?php

			// check if the repeater field has rows of data
			if( have_rows('hire_us_elements') ):
				// loop through the rows of data
				while ( have_rows('hire_us_elements') ) : the_row();
					?>
					<div class="aepo-hire-us-elements">
						<span class="aepo-hire-us-image">
							<img src="<?php the_sub_field('hire_us_icon'); ?>">
						</span>
						<span class="aepo-hire-us-text">
							<?php the_sub_field('hire_us_text'); ?>
						</span>
					</div>
				<?php
				$j++;
				endwhile;

			else :

				// no rows found

			endif;

			?>

		</div>
	</section>

	<!-- Our Clients Section -->
	<section id="aepo-our-clients-section" class="aepo-off-white-section">
		<h4>Our Clients</h4>
		<?php kw_sc_logo_carousel($our_clients_carousel_id); ?>

	</section>

	<!-- From Our Clients Testimonials Section -->
	<section id="aepo-testimonials-section" class="aepo-white-section">
		<h4><?php echo $testimonials_tile; ?></h4>
		<div>
		<?php echo do_shortcode($testimonials_shortcode); ?>
		</div>

	</section>

	<!-- How Was That Section -->
	<section id="aepo-how-was-that-section" class="aepo-off-white-section">
		<h4><?php echo $how_was_that_title; ?></h4>
		<p><?php echo $how_was_that_content; ?></p>
		<p>
			<a href="<?php echo $how_was_that_button_1_link?>" >
				<button>
					<?php echo $how_was_that_button_1_text?>
				</button>
			</a>
			<a href="<?php echo $how_was_that_button_2_link?>" >
				<button>
					<?php echo $how_was_that_button_2_text?>
				</button>
			</a>
		</p>
	</section>

<?php }


// Add custom footer content
add_action( 'genesis_footer', 'aepo_extra_footer_content', 5 );
function aepo_extra_footer_content() {

	//Get Footer Fields

	$footer_image = get_field('footer_image');
	$footer_copyright = get_field('footer_copyright');
	?>
	<!-- Extra Footer Content -->
	<section id="aepo-extra-footer-section" class="section-class">
		<img src="<?php echo $footer_image; ?>"/>
		<p><?php echo $footer_copyright; ?></p>
	</section>


<?php }

//* Run the Genesis loop
genesis();
