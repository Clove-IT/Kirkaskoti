<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-770x892';  } // Default image size ?>
<div class="pbminfotech-post-content">
	<div class="pbminfotech-image-wapper">
		<?php pbmit_get_featured_data( array( 'featured_img_only' => true, 'size' => esc_attr($imgsize) ) ); ?>
		<a class="pbmit-link" href="<?php the_permalink(); ?>"></a>
	</div>
	<div class="pbminfotech-box-content">
		<div class="pbminfotech-titlebox">
			<div class="pbmit-port-cat"><?php echo get_the_term_list( get_the_ID(), 'pbmit-portfolio-category', '', ', ' ); ?></div>
			<h3 class="pbmit-portfolio-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		</div>
	</div>
</div>