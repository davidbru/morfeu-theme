<div class="<?php echo  is_single() ? 'col-md-12' : 'col-md-4'; ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
				if ( has_post_thumbnail() ){
					$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' )[0];
				}else{
					$large_image_url = get_template_directory_uri().'/assets/images/article-default.jpg';
				}
			?>
			<a href="<?= esc_url( get_permalink() ) ?>">
				<figure class="thumbnail-content" style="background-image: url('<?php echo isset($large_image_url) ? $large_image_url : ''; ?>');">
					<?php if ( !is_single() ) : ?>
						<div class="overlay-thumbnail">
							<span class="glyphicon glyphicon-eye-open"></span>
						</div><!-- .overlay-thumbnail -->
					<?php endif; ?>
				</figure><!-- .thumbnail-content -->
			</a>
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
				endif;
			?>
		</header><!-- .entry-header -->
		<div class="conteudo-post">
			<?php if( is_single() ): ?>
			<div class="entry-meta">
				<?php odin_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php else: ?>
				<div class="entry-meta">
					<?php odin_posted_small(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			<?php if ( is_single() ) : ?>
				<div class="entry-content">
					<?php
						the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</div><!-- .entry-content -->
			<?php endif; ?>
		</div>
	</article><!-- #post-## -->
</div>
