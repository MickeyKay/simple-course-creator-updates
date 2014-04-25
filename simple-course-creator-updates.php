<?php
/**
 * Plugin Name: Simple Course Creator Updates
 * Plugin URI: http://kolakube.com/
 * Description: Use SCC as a way to post updates in a timeline format.
 * Version: 0.3
 * Author: Alex Mangini
 * Author URI: http://kolakube.com/
 * License: GPL2
 * Requires at least: 3.8
 * Tested up to: 3.8
 * Text Domain: scc
*/

if ( ! defined( 'ABSPATH' ) ) exit; // no accessing this file directly

// oop it later

function test() { ?>

	<div class="scc-updates">

		<?php foreach ( get_terms( 'course' ) as $course ) :
			$array              = get_option( 'taxonomy_' . $course->term_id );
			$post_list_title    = $array['post_list_title'];
			$course_description = term_description( $course->term_id, 'course' );
		?>

			<div class="scc-update">

				<!-- Title -->
	
				<?php if ( $post_list_title != '' ) : ?>
	
					<h3 class="scc-update-title"><?php echo $post_list_title; ?></h3>
	
				<?php else : ?>
	
					<h3 class="scc-update-title"><?php echo $course->name; ?></h3>
	
				<?php endif; ?>
	
				<!-- Description -->
	
				<?php if ( $course_description != '' ) : ?>

					<div class="scc-update-desc">

						<?php echo wpautop( $course_description ); ?>

					</div>

				<?php endif; ?>

				<!-- List -->

				<?php
					$posts = get_posts( array(
						'post_type' => 'post',
						'orderby'   => 'menu_order',
						'order'     => 'ASC',
						'taxonomy'  => $course->taxonomy,
						'term'      => $course->slug,
						'nopaging'  => true,
					) );

		
					$options        = get_option( 'course_display_settings' );
					$list_container = $options[ 'list_type' ] == 'ordered' ? 'ol' : 'ul';
					$no_list        = $options[ 'list_type' ] == 'none' ? 'style="list-style: none;"' : '';
				?>

				<<?php echo $list_container; ?> class="scc-update-list">

					<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>

						<li class="scc-update-list-item" <?php echo $no_list; ?>>

							<div class="scc-update-list-item-byline">
<?php //print_r($post); ?>
								<?php echo '<span class="scc-update-list-item-byline-date">' . get_the_date() . '</span>'; ?>

								<?php echo '<p class="scc-update-list-item-byline-title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></p>'; ?>

							</div>

						</li>
					<?php endforeach; ?>

				</<?php echo $list_container; ?>>

			</div>

		<?php endforeach; ?>

	</div>

<?php }




// todo: output buffer

function scc_updates_shortcode() {
	return test();
}

add_shortcode( 'scc_updates', 'scc_updates_shortcode' );