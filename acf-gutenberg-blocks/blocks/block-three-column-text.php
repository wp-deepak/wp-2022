<?php
/**
 * Block Name: Not Big on Forms Block
 */

// create id attribute for specific styling
$id = 'three-column-text-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$not_big_on_forms_title = $block_fields['not_big_on_forms_title'];
$column_1_heading = $block_fields['column_1_heading'];
$column_2_heading = $block_fields['column_2_heading'];
$column_3_heading = $block_fields['column_3_heading'];
$column_1_description = $block_fields['column_1_description'];
$column_2_description = $block_fields['column_2_description'];
$column_3_description = $block_fields['column_3_description'];
$bg_color = $block_fields['bg_color_three_col'];
if($bg_color == "nocolor"){
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color not-big-on-forms-block contact-info pb-256">
<?php }else{?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color not-big-on-forms-block contact-info pb-256" data-color="<?php echo $bg_color; ?>">
<?php }?>
	<div class="container col">
		<div class="row">
			<div class="col s12 m12">
				<h2 class="block-title h3"><?php echo $not_big_on_forms_title; ?></h2>
			</div>
			<div class="clear"></div>
			<div class="info-row">
				<div class="col s12 m6 l4 col-item">
					<div class="item-row">
						<div class="item-title h4"><?php echo $column_1_heading; ?></div>
    					<div class="item-desc"><?php echo $column_1_description; ?></div>
					</div>
				</div>
				<div class="col s12 m6 l4 col-item">
					<div class="item-row">
						<div class="item-title h4"><?php echo $column_2_heading; ?></div>
    					<div class="item-desc"><?php echo $column_2_description; ?></div>
					</div>
				</div>
				<div class="col s12 m6 l4 col-item">
					<div class="item-row">
						<div class="item-title h4"><?php echo $column_3_heading; ?></div>
    					<div class="item-desc"><?php echo $column_3_description; ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
 </div>