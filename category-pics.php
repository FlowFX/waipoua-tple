<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Waipoua
 * @since Waipoua 1.0
 */

get_header(); ?>

	<div id="content">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h2 class="page-title">
					Bilderarchiv
				</h2>
			</header><!-- end .page-header -->
    
			<?php rewind_posts(); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <?php if ( has_post_thumbnail() ): ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                    <?php endif; ?>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'waipoua' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                </header><!--end .entry-header -->

                <div class="entry-content clearfix">
                </div><!-- end .entry-content -->

            </article><!-- end post -<?php the_ID(); ?> -->
			<?php endwhile; // end of the loop. ?>

			<?php /* Display navigation to next/previous pages when applicable, also check if WP pagenavi plugin is activated */ ?>
			<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?>
				<?php waipoua_content_nav( 'nav-below' ); ?>	
			<?php endif; ?>
			
			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'waipoua' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'waipoua' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

	</div><!-- end #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
