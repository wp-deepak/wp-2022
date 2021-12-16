<?php
/**
 * Block Name: Off Side Paragraph
 */

// create id attribute for specific styling
$id = 'off-side-paragraph-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color  off-side-text-layout off-side-paragraph-block pb-256" data-color="lightpink">
	<div class="container">
		<div class="row">
			<div class="col s12 m12">
				<div class="block-content">
					<?php $paragraph = $block_fields['paragraph']; ?>
					<div class="block-desc"><?php echo $paragraph; ?></div>
				</div>
			</div>
		</div>
	</div>
	
</div>