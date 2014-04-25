<div class="sccu-updates">

	<?php foreach ( get_terms( 'course' ) as $course ) :
		$array              = get_option( 'taxonomy_' . $course->term_id );
		$post_list_title    = $array['post_list_title'];
		$course_description = term_description( $course->term_id, 'course' );

		$posts = get_posts( array(
			'post_type' => 'post',
			'orderby'   => 'post_date',
			'order'     => 'DSC',
			'taxonomy'  => $course->taxonomy,
			'term'      => $course->slug,
			'nopaging'  => true,
		) );

		// get date of first post and in $posts loop

		$dates = array();

		foreach ( $posts as $post ) {
			$dates[] = $post->post_date;
		}

		$since_date = date( 'F d, Y', strtotime( min( $dates ) ) );
	?>

		<div class="sccu-update sccu-mb-double">

			<!-- Intro -->

			<div class="sccu-intro sccu-mb-single">

				<!-- Title -->
	
				<?php if ( $post_list_title != '' ) : ?>
	
					<h3 class="sccu-title"><?php echo $post_list_title; ?></h3>
	
				<?php else : ?>
	
					<h3 class="sccu-title"><?php echo $course->name; ?></h3>
	
				<?php endif; ?>
	
				<!-- Description -->
	
				<?php if ( $course_description != '' ) : ?>

					<div class="sccu-desc">

						<?php echo wpautop( $course_description ); ?>

					</div>

				<?php endif; ?>

			</div>

			<!-- List Head -->

			<div class="sccu-list-head">

				<span class="sccu-head-updates"><?php echo count( $posts ) . __( ' updates since ', 'sccu' ) . $since_date; ?></span>

			</div>

			<!-- List -->

			<div class="sccu-list">

				<?php foreach ( $posts as $post ) : ?>

					<div class="sccu-list-item">

						<!-- Byline -->

						<div class="sccu-list-byline sccu-mb-third">

							<span class="sccu-list-byline-item sccu-list-byline-date"><i class="sccu-icon sccu-icon-clock"></i> <?php echo sccu_relative_time( get_the_time( 'U', $post->ID ), current_time( 'timestamp' ) ) . __( ' ago', 'kol' ); ?></span>

							<span class="sccu-list-byline-item sccu-list-byline-comments"><a href="<?php echo get_comments_link( $post->ID ); ?>"><i class="sccu-icon sccu-icon-comment"></i><?php echo get_comments_number( $post->ID ); ?></a></span>

						</div>

						<!-- Title -->

						<p class="sccu-list-title sccu-mb-half"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $post->post_title; ?></a></p>

						<!-- Excerpt -->

						<?php if ( $post->post_excerpt ) : ?>

							<div class="sccu-list-excerpt">

								<?php echo $post->post_excerpt; ?>

							</div>

						<?php endif; ?>

					</div>

				<?php endforeach; ?>

			</div>

		</div>

	<?php endforeach; ?>

</div>