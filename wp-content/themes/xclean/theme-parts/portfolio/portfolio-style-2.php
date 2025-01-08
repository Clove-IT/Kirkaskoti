<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-930x666'; } ?>
<div class="pbminfotech-post-content" data-cursor-tooltip>
	<?php pbmit_get_featured_data( array( 'featured_img_only' => true, 'size' => esc_attr($imgsize) ) ); ?>
	<div class="pbminfotech-box-content">
		<div class="pbmit-cat"><?php echo get_the_term_list( get_the_ID(), 'pbmit-portfolio-category', '', ', ' ); ?></div>
		<h3 class="pbmit-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
	</div>
	<a href="<?php the_permalink(); ?>" class="pbmit-link"></a>
</div>