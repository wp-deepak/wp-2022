<?php
/**
 * Block Name: What We Did Block
 */

// create id attribute for specific styling
$id = 'intro-alongside-headline-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] ); 

// Meta fields related to current block
$block_fields = get_fields( $block['id'] ); 
$bo_intro_alongside_headline = $block_fields['bo_intro_alongside_headline'];
$bo_intro_alongside_large_text = $block_fields['bo_intro_alongside_large_text'];
$bo_intro_alongside_reg_text = $block_fields['bo_intro_alongside_reg_text'];?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block what-we-did-block pb-150">
		<div class="container col">
			<div class="d-flex row">
		<div class="col s12 xsb-label"></div>
		<div class="left-section col l4 s12">

		<div class="list"><span class="h5"><?php echo $bo_intro_alongside_headline; ?></span></div>
	</div>
		<div class="right-section col l8 s12">
		<div class="large-text">
		<p><?php echo $bo_intro_alongside_large_text; ?></p>
		</div>
		<div class="reg-text">
		<p><?php echo $bo_intro_alongside_reg_text; ?></p>
		</div>

	</div>
	</div>
		</div>
</div>