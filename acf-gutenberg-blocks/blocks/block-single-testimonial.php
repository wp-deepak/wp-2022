<?php
/**
 * Block Name: Single Testimonials
 */

// create id attribute for specific styling
$id = 'single-testimonial-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$projects = $block_fields['rp_projects'];
$bg_color_single_testimonial = $block_fields['bg_color_single_testimonial'];
if($bg_color_single_testimonial == "nocolor") { ?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color single-testimonial testimonial-section  pb-256">
<?php }elseif(empty($bg_color_single_testimonial)){?>
	<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color single-testimonial testimonial-section  pb-256" data-color="lightpink">
<?php }else{?>
	<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color single-testimonial testimonial-section  pb-256" data-color="<?php echo $bg_color_single_testimonial;?>">
<?php }?>
	<div class="container">
		<div class="row">
			<div class="col s12 m12">
				<div class="content">
					<?php
					$count = count(get_field('bo_single_select_testimonial'));?>
					<div class="<?php echo ($count>1) ? 'owl-carousel  testimonial-slider owl-theme' : 'testimonial-simple' ; ?>">
					<?php 
					$testimonials = get_field('bo_single_select_testimonial');
					if( $testimonials ): ?>
						<?php foreach( $testimonials as $testimonial ): 
							$title = get_the_title( $testimonial->ID );
							$testimonial_headline = get_field( 'testimonial_headline', $testimonial->ID );
							$testimonial_additional_info = get_field( 'testimonial_additional_info', $testimonial->ID ); ?>
							<div class="<?php echo ($count>1) ? 'item' : 'single-testimonial' ; ?>">
								<div class="h3 fwl quote-title">
									<sup class="top"></sup>
									<?php echo $testimonial_headline; ?>
									<sup class="bottom"></sup></div>
									<div class="label-txt"><?php echo $title; ?></div>
									<div class="label-txt-sm fwl"><?php echo $testimonial_additional_info; ?></div>
								</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
</div>