<?php
/**
 * Block Name: What We Did Block
 */

// create id attribute for specific styling
$id = 'paragraph-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block title-paragraph-block pb-256">
	<div class="container">
		<div class="content">
	<?php 
	$heading = $block_fields['bo_paragraph_heading'];
	$paragraph_text = $block_fields['bo_paragraph_text'];
	?>
	<h2><?php echo $heading;?></h2>
	<div class="paragraph_text m-p">
		<?php echo $paragraph_text;?> 
	</div>
		</div></div>
</div>