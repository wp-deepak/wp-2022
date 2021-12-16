<?php
/**
 * Block Name: Side by Side Images Variation
 */

// create id attribute for specific styling
$id = 'side-by-side-variation-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$left_image = $block_fields['v_left_image'];
$right_image = $block_fields['v_right_image']; 
if(empty($left_image['alt'])){
	$left_image['alt'] = 'single work image';
}
if(empty($right_image['alt'])){
	$right_image['alt'] = 'single work image';
}
?>

<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color side-variation-layout pb-256 side-by-side-images-variation" data-color="lightpink">
	<div class="container col">
		<div class="row">
			<div class="col s12 m6 col-left">
				<div class="left-section">
					<img src="<?php echo $left_image['url']; ?>" alt="<?php echo $left_image['alt']; ?>">
				</div>
			</div>
			<div class="col s12 m6 col-right">
				<div class="right-section">
					<img src="<?php echo $right_image['url']; ?>" alt="<?php echo $right_image['alt']; ?>">
				</div>
			</div>
		</div>
	</div>	
</div>