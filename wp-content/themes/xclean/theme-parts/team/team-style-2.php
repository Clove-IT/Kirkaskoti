<?php if( empty($imgsize)){ $imgsize = 'pbmit-img-325x330'; } // Default image size 
global $number;
$number_html1 = '';
if( empty($number1) ){
	$number1 = 1;
	$number_html1 = esc_html ('01');
} else {
	if ( strlen( $number1 ) == 1 ){
		$number_html1 = esc_html ('0').$number1;
	}
}
?>
<div class="pbminfotech-post-item">
	<div class="pbminfotech-box-content">
		<div class="pbminfotech-box-number"><?php echo esc_html($number_html1); ?></div>
		<?php pbmit_get_featured_data( array( 'featured_img_only' => true, 'size' => esc_attr($imgsize) ) ); ?>
		<h3 class="pbmit-team-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		<?php pbmit_team_designation(); ?>	
		<a class="pbmit-team-btn" href="<?php the_permalink(); ?>"><span class="pbmit-button-icon-wrapper"><span class="pbmit-button-icon"><i class="pbmit-base-icon-black-arrow-1"></i></span></span></a>
	</div>
	<a class="pbmit-link" href="<?php the_permalink(); ?>"></a>
</div>
<?php $number1++; ?>