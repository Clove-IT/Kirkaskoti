<div class="pbmit-fid-content">
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
	<?php echo pbmit_esc_kses($desc_html); ?>
</div><!-- .pbmit-fld-contents -->