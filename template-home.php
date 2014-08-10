<?php
/*
Template Name: Home Template
*/
?>

<header class="banner home-header" role="banner">
  <div class="container">
		<h1 class="title">
			<span class="subtitle">together with their families</span>
			<span class="bride-name">Heather</span>
			<span class="and">and</span>
			<span class="groom-name">Zac</span>
			<span class="subtitle">invite you to their wedding</span>
		</h1>
		<h2 class="datetime">
			<span class="date">Saturday, October 4th</span>
				at
			<span class="time">4 o'clock in the evening</span>
		</h2>
		<h3 class="location">The Woods Inn – Inlet, New York</h3>
  </div>
	<?php get_template_part('templates/content', 'page'); ?>
</header>

<?php
	/*
	do_action('get_header');
	// Use Bootstrap's navbar if enabled in config.php
	if (current_theme_supports('bootstrap-top-navbar')) {
		get_template_part('templates/header-top-navbar');
	} else {
		get_template_part('templates/header');
	}
	*/
?>

<?php

$child_pages = new WP_Query( array(
    'post_type'      => 'page', // set the post type to page
    'posts_per_page' => 10, // number of posts (pages) to show
    'post_parent'    => get_the_ID(), // enter the post ID of the parent page
    'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
    'orderby' => 'menu_order',
    'order' => 'ASC',
) );

if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

  <section id="<?php echo $post->post_name ?>" class="<?php //echo roots_main_class(); ?>">
    <div class="container">
      <header>
        <h1 class=""><?php the_title(); ?></h1>
      </header>
      <div class="content">
        <?php the_content(); ?>
      </div>
    </div>
  </section>

<?php endwhile; endif;

wp_reset_postdata();
