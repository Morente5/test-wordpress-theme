
<div class="article-wrapper">
		<article
			<?php post_class(); ?>
			id="post-<?php the_ID(); ?>"
			<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			?>
				style="background-image: url('<?php the_post_thumbnail_url('large'); ?>')"
			<?php
			}
			?>
		>
			<div class="overlay-6 bg-info"></div>
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" class="foreground overlay"></a>
			<div class="container">
				<header class="entry-header">
			
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>' ); ?>
			
					<?php if ( 'post' == get_post_type() ) : ?>
			
						
			
					<?php endif; ?>
			
				</header><!-- .entry-header -->
			
				<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
			
				<div class="entry-content">
			
					<?php
					echo excerpt(20);
					?>
			
				</div><!-- .entry-content -->
			
				<footer class="entry-footer">
					<div class="entry-meta">
						<?php yofisio_posted_on();?>
					</div><!-- .entry-meta -->
					<?php yofisio_entry_footer(); ?>
			
				</footer><!-- .entry-footer -->
			</div>
		
		</article><!-- #post-## -->
</div>