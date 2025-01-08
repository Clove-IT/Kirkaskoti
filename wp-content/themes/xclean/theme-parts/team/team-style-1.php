<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-650x620';  } // Default image size ?>
<div class="pbminfotech-post-item">
	<div class="pbmit-featured-wrap">
		<div class="pbmit-featured-inner">
			<?php pbmit_get_featured_data( array( 'featured_img_only' => true, 'size' => esc_attr($imgsize) ) ); ?>
			<a class="pbmit-link" href="<?php the_permalink(); ?>"></a>
		</div>
	</div>
	<div class="pbminfotech-box-content">
		<div class="pbminfotech-box-content-inner">
			<h3 class="pbmit-team-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
			<?php pbmit_team_designation(); ?>
		</div>
		<div class="pbmit-team-btn"><a class="pbmit-team-text" href="#"><i class="pbmit-base-icon-share"></i></a>
			<div class="pbminfotech-box-social-links">
				<?php echo pbmit_team_social_links(); ?>
			</div>
		</div>
	</div>
</div>