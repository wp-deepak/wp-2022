<?php
/**
 * Block Name: Form Block
 */

// create id attribute for specific styling
$id = 'form-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$bo_select_form = $block_fields['bo_select_form'];?>

<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block form-block pb-256">
	<div class="container col">
		<div class="row">
			<div class="col s12 m12">
				<?php if(!empty($bo_select_form)): ?>
			    	<?php //echo do_shortcode(gravity_form( $bo_select_form, false, false, false,true));
			    	echo gravity_form( $bo_select_form, false, false, false, '', true); ?>
				<?php ?>
			</div>
		</div>
	</div>
    <?php endif; ?>
 </div>