<?php
/**
 * Block Name: Image Collage
 */

// create id attribute for specific styling
$id = 'showcase-work-image-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] ); ?>

<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block pb-256 center-align">
<?php $single_showcase_image = $block_fields['single_showcase_image'];
		if(empty($single_showcase_image['alt'])){
            $single_showcase_image['alt'] = "image collage";
       } ?>
	<img src="<?php echo $single_showcase_image['url']; ?>" alt="<?php echo $single_showcase_image['alt'];?>">
</div>