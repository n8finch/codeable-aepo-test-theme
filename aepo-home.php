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
	<section id="aepo-we-are-section" class="section-class">

			<h2><?php echo $intro_section_title; ?></h2>
			<?php echo $intro_section_content; ?>

	</section>

	<!-- Latest Posts Section -->
	<section id="aepo-latest-posts-section" class="section-class">
		<h2><?php echo $latest_posts_title;?></h2>
		<div id="aepo-latest-posts-container">

			<?php

			$args = array(
				'posts_per_page' => 3,
				'post_type'        => 'post',
			);

			$myposts = get_posts( $args );
			$i = 1;
			foreach ( $myposts as $post ) {

				//Get the variables for each post
				$is_first = $i === 1 ? 'first' : '' ;
				$post_ID = $post->ID;
				$post_permalink = $post->guid;
				$post_title = $post->post_title;
				$post_date = $post->post_date;
				$post_content = strip_tags($post->post_content);
				$post_content = substr($post_content, 0, 25);
				$post_thumb = get_the_post_thumbnail_url($post_ID);



				?>
				<div class="one-third <?php echo $is_first; ?>">
					<img src="<?php echo $post_thumb; ?>"/>
					<h4><?php echo $post_title; ?></h4>
					<a href="<?php echo $post_permalink; ?>">
					<div class="aepo-latest-posts-hover-card">
						<h4><?php echo $post_title; ?></h4>
						<span><?php echo $post_date?></span>
						<p><?php echo $post_content; ?></p>
						<p>Read all</p>
					</div>
					</a>

				</div>

				<?php
			$i++;
			} //endforeach
			wp_reset_postdata();
			?>

		</div> <!--End Latest Posts Container-->
	</section>

	<!-- Why Hire Us Section -->
	<section id="aepo-hire-us-section" class="section-class">
		<h2><?php echo $hire_us_title; ?></h2>
		<div class="aepo-hire-us-container">

			<?php

			// check if the repeater field has rows of data
			if( have_rows('hire_us_elements') ):
				$j = 1;
				// loop through the rows of data
				while ( have_rows('hire_us_elements') ) : the_row();
					$is_first = $j%2 === 1 ? 'first' : '' ;
					?>
					<div class="one-half <?php echo $is_first; ?>">
						<span>
							<img src="<?php the_sub_field('hire_us_icon'); ?>">
						</span>
						<span>
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
	<section id="aepo-our-clients-section" class="section-class">
		<h2>Our Clients</h2>
		<?php kw_sc_logo_carousel($our_clients_carousel_id); ?>

	</section>

	<!-- From Our Clients Testimonials Section -->
	<section id="aepo-testimonials-section" class="section-class">
		<h2><?php echo $testimonials_tile; ?></h2>
		<div>
		<?php echo do_shortcode($testimonials_shortcode); ?>
		</div>

	</section>

	<!-- How Was That Section -->
	<section id="aepo-how-was-that-section" class="section-class">
		<h2><?php echo $how_was_that_title; ?></h2>
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
