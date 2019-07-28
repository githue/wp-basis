<?php

/**
 * Template part for displaying posts.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
$read_more_text = __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'basis');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-post-id="<?php the_ID(); ?>">
	<header class="entry-header">
		<?php
		if (is_singular() && !is_attachment()) :
			the_title('<h1 class="entry-title">', '</h1>');
		elseif (!is_attachment()) :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
			?>
			<div class="entry-meta">
				<?php
				basis_posted_on();
				basis_posted_by();
				echo " | ";
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__('Edit <span class="screen-reader-text">%s</span>', 'basis'),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	if (!is_singular()) :
		basis_post_thumbnail();
	endif;
	?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					$read_more_text,
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'basis'),
			'after' => '</div>',
		));
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php basis_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->