<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-880x620'; } ?>
<div class="pbmit-post-item">
	<div class="pbmit-featured-wrapper">
		<div class="pbmit-featured-container">
			<?php pbmit_get_featured_data( array( 'featured_img_only' => true, 'size' => esc_attr($imgsize) ) ); ?>	
			<a class="pbmit-link" href="<?php the_permalink(); ?>"></a>
		</div>
		<div class="pbmit-meta-date pbmit-meta-line">
			<span class="pbmit-post-date"><?php echo get_the_date( 'n M Y' ); ?></span>
		</div>
	</div>
	<div class="pbmit-content-wrapper">
		<h3 class="pbmit-post-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		<div class="pbmit-meta-category-wrapper pbmit-meta-line">
			<div class="pbmit-meta-category"><?php echo get_the_category_list( ' / ' ); ?></div>
		</div>
	</div>
</div>