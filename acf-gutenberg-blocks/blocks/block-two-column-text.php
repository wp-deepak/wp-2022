<?php
/**
 * Block Name: What We Did Block
 */

// create id attribute for specific styling
$id = 'two-column-text-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] ); 
$bo_what_we_did_title = $block_fields['bo_two_col_title'];
	$bo_what_we_did_sub_title = $block_fields['bo_two_col_sub_title'];
	$bo_what_we_did_description = $block_fields['bo_two_col_sub_description'];
	$bo_what_we_did_cta = $block_fields['bo_two_col_cta'];
	$bo_two_col_section__background_color = $block_fields['bo_two_col_section__background_color'];
	if($bo_two_col_section__background_color =="nocolor"){?>
		<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block what-we-did-block pb-150">
	<?php }else{?>
		<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color what-we-did-block pb-256" data-color="<?php echo $bo_two_col_section__background_color; ?>">
<?php 	}
	?>
	<div class="container col">
		<div class="d-flex row">
	<div class="col s12 xsb-label"><?php echo $bo_what_we_did_sub_title; ?></div>
	<div class="left-section col l4 s12">

	<div class="list"><span class="h5"><?php echo $bo_what_we_did_title; ?></span></div>
	<?php if($bo_what_we_did_cta != ''){ ?>
		<div class="btn-row"> 
			<a href="<?php echo $bo_what_we_did_cta['url']; ?>" class="btn-link"><?php echo $bo_what_we_did_cta['title']; ?>&nbsp;&nbsp;&nbsp;
			<svg class="arrowdefs"> 
				<defs> 
					<linearGradient id="gradientline-s" x1="1" y1="5.71552" x2="30.5" y2="5.71552" gradientUnits="userSpaceOnUse"> 
						<stop stop-color="#00E0FF"></stop> 
						<stop offset="0.505208" stop-color="#000AFF"></stop> 
						<stop offset="1" stop-color="#FC7BFF"></stop>
					</linearGradient> 
					<linearGradient id="gradientarrow-s" x1="26" y1="1" x2="26" y2="10" gradientUnits="userSpaceOnUse"> 
						<stop stop-color="#8C49FF"></stop> 
						<stop offset="0.40991" stop-color="#EE75FF"></stop> 
						<stop offset="0.597631" stop-color="#EE75FF"></stop> 
						<stop offset="1" stop-color="#C462FF"></stop> 
					</linearGradient> 
					<linearGradient id="gradientline-l" x1="1" y1="13.2155" x2="58.5" y2="13.2155" gradientUnits="userSpaceOnUse"> 
						<stop stop-color="#00E0FF"></stop> 
						<stop offset="0.505208" stop-color="#000AFF"></stop> 
						<stop offset="1" stop-color="#EE75FF"></stop> 
					</linearGradient> 
					<linearGradient id="gradientarrow-l" x1="47.2222" y1="1.5" x2="47.2222" y2="24.5" gradientUnits="userSpaceOnUse"> 
						<stop stop-color="#8C49FF"></stop> 
						<stop offset="0.40991" stop-color="#EE75FF"></stop> 
						<stop offset="0.597631" stop-color="#EE75FF"></stop> 
						<stop offset="1" stop-color="#C462FF"></stop> 
					</linearGradient> 
				</defs>
			</svg>
			<svg class="arrow-s" width="32" height="11" viewBox="0 0 32 11" fill="none" xmlns="http://www.w3.org/2000/svg"> 
				<path class="arrowline-s" d="M1 5.5H31" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
				<path class="arrowarrow-s" d="M26.5 1L31 5.5L26.5 10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
		</a>
		</div>
	<?php } ?>
</div>
	<div class="right-section col l8 s12">
	<p><?php echo $bo_what_we_did_description; ?></p></div>
</div>
	</div>
</div>