<div class="pbmit-fld-contents">
	<div class="pbmit-fld-wrap">
		<h4 class="pbmit-fid-inner">
			<span class="pbmit-fid-before"><?php echo pbmit_esc_kses( $before_text ); ?></span>
			<span
				class					= "pbmit-number-rotate"
				data-appear-animation	= "animateDigits"
				data-from				= "0"
				data-to			 		= "<?php echo esc_html( $digit ); ?>"
				data-interval			= "<?php echo esc_html( $interval ); ?>"
				data-before		  		= ""
				data-before-style		= ""
				data-after				= ""
				data-after-style	 	= ""
				>
				<?php echo esc_html( $digit ); ?>
			</span>
			<span class="pbmit-fid"><?php echo pbmit_esc_kses( $after_text ); ?></span>
		</h4>
	</div>
	<?php echo pbmit_esc_kses($desc_html); ?>
</div><!-- .pbmit-fld-contents -->
<div class="pbmit-sticky-corner  pbmit-bottom-left-corner">
	<svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
		<path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
	</svg>
</div>
<div class="pbmit-sticky-corner pbmit-top-right-corner">
	<svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
		<path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
	</svg>
</div>