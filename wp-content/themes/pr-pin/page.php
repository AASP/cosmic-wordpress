<?php get_header(); ?>
<div class="container"> 
	<div id="content">
		<div class="row">
		<?php prpin_get_sidebar_single('left'); ?>
			<div class="<?php echo prpin_get_contentspan(); ?>">		
					<?php while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
					<?php the_title( '<div class="h1-wrapper"><h1>', '</h1></div>' ); ?>
						<div class="post-content">
							<?php 	the_content();
							wp_link_pages( array( 'before' => '<p><strong>' . __('Pages:', 'prpin') . '</strong>', 'after' => '</p>' ) ); ?>
							<div class="clearfix"></div>
						    <div class="post-meta-top">
						  <?php edit_post_link(__('Edit', 'prpin'),'<i class="fa fa-pencil"></i> [ ',' ]</p>');
							?>
						     </div>
						</div>
						
						<div class="post-comments">
							<div class="post-comments-wrapper">
								<?php comments_template(); ?>
							</div>
						</div>
						
					</div>
					<?php endwhile; ?>
				 </div>
		<?php prpin_get_sidebar_single('right'); ?>
	</div>
</div>	
</div>
  <div id="scroll-top"><a href="#"><i class="fa fa-chevron-up fa-3x"></i></a></div>
<?php get_footer(); ?>
