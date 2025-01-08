<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-1000x1000';  } // Default image size ?>
<div class="pbminfotech-post-content">
	<?php pbmit_get_featured_data( array( 'featured_img_only' => true, 'size' => esc_attr($imgsize) ) ); ?>
	<div class="pbminfotech-box-content">
		<div class="pbminfotech-titlebox">
			<div class="pbmit-port-cat"><?php echo get_the_term_list( get_the_ID(), 'pbmit-portfolio-category', '', ', ' ); ?></div>
			<h3 class="pbmit-portfolio-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		</div>
	</div>
	<div class="pbmit-portfolio-btn">
		<a href="<?php the_permalink(); ?>"><i class="pbmit-atlaw-icon pbmit-base-icon-arrow-right"></i></a>
	</div>
	<a class="pbmit-link" href="<?php the_permalink(); ?>"></a>
</div>