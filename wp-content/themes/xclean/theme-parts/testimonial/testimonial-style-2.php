<div class="pbminfotech-post-item">
	<div class="pbminfotech-box-desc">
		<blockquote class="pbminfotech-testimonial-text"><?php the_content(''); ?></blockquote>
	</div>
	<div class="pbmit-auther-content">
		<h3 class="pbminfotech-box-title"><?php echo get_the_title(); ?></h3>
		<?php pbmit_testimonial_details(); ?>
	</div>
	<?php pbmit_get_featured_data( array( 'size' => 'pbmit-img-500x500' ) ); ?>
</div>