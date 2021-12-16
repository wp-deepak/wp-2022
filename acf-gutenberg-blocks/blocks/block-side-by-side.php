<?php
/**
 * Block Name: Side by Side Images
 */

// create id attribute for specific styling
$id = 'side-by-side-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$left_image = $block_fields['left_image'];
$right_image = $block_fields['right_image']; 
$left_image_alt = empty($left_image['alt']) ? "side by side left block" : $left_image['alt'];
$right_image_alt = empty($right_image['alt']) ? "side by side right block" : $right_image['alt'];

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block side-image-layout side-by-side-images pb-256">
	<div class="container col">
		<div class="row">
			<div class="col s6 col-left">
				<div class="left-section">
					<img src="<?php echo $left_image['url']; ?>" alt="<?php echo $left_image_alt;?>">
				</div>
			</div>
			<div class="col s6 col-right">
				<div class="right-section">
					<img src="<?php echo $right_image['url']; ?>" alt="<?php echo $right_image_alt;?>">
				</div>
			</div>
		</div>
	</div>
</div>