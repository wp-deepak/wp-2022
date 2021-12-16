<?php
/**
 * Block Name: Testimonials Block
 */

// create id attribute for specific styling
$id = 'testimonials-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$projects = $block_fields['rp_projects'];?>

<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block  testimonial-section">
	<div class="container">
		<div class="content">
		<div class="owl-carousel  testimonial-slider owl-theme">
				<?php
			$testimonials = get_field('testimonial');
			if( $testimonials ): ?>
			    <?php foreach( $testimonials as $testimonial ): 
			        $title = get_the_title( $testimonial->ID );
			        $testimonial_headline = get_field( 'testimonial_headline', $testimonial->ID );
			        $testimonial_additional_info = get_field( 'testimonial_additional_info', $testimonial->ID ); ?>
			        <div class="item">

			        	 <div class="h3 fwl">
<sup class="top"></sup>
			      <?php echo $testimonial_headline; ?>
<sup class="bottom"></sup></div>
			        	<div class="label-txt"><?php echo $title; ?></div>
			        	<div class="label-txt-sm fwl"><?php echo $testimonial_additional_info; ?></div>
			        </div>
			    <?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div></div>
</div>