<?php
/**
 * Block Name: Book a Meeting
 */

// create id attribute for specific styling
$id = 'book-a-parameeting-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block boo-a-meeting-block">
	<div class="container">
		<div class="d-flex">

	<?php $bm_title = $block_fields['bm_title']; ?>
	<?php $meeting = $block_fields['meeting']; ?>
		<div class="left-col">
	<h2><?php echo $bm_title; ?></h2></div>
		<div class="right-col"><?php echo $meeting; ?></div>
</div></div>
</div>