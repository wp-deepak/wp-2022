<?php
/**
 * Block Name: Location with Image Block
 */

// create id attribute for specific styling
$id = 'address-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
print_r($block_fields);
$address_image = $block_fields['address_image'];
$loc_address_image_text = $block_fields['loc_address_image_text'];
$loc_address_title = $block_fields['loc_address_title'];
$loc_street_address = $block_fields['loc_street_address'];
$loc_map_link = $block_fields['loc_map_link']; ?>

<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block address-block mapping-layout pb-256">
	<div class="container col">
		<div class="row">
			<div class="col s12 m12 col-image">
				<div class="mapping-img">
					<img src="<?php echo $address_image['url']; ?>" />
					<div class="mapping-text"><?php echo $loc_address_image_text;?></div>
				</div>
			</div>
			<div class="col s12 m12 mapping-info">
				<div class="mapping-content">
					<div class="block-title"><?php echo $loc_address_title;?></div>
					<div class="block-address">
						<a href="#"> 
							<?php echo $loc_street_address; ?>
						</a>
						<div class="map-hover">
							<a href="<?php echo $loc_map_link['url']; ?>"><?php echo $loc_map_link['title']; ?> <span><svg class="arrowdefs">
    <defs>
        <lineargradient id="gradientline-s" x1="1" y1="5.71552" x2="30.5" y2="5.71552" gradientUnits="userSpaceOnUse">
            <stop stop-color="#00E0FF"></stop>
            <stop offset="0.505208" stop-color="#000AFF"></stop>
            <stop offset="1" stop-color="#FC7BFF"></stop>
        </lineargradient>
        <lineargradient id="gradientarrow-s" x1="26" y1="1" x2="26" y2="10" gradientUnits="userSpaceOnUse">
            <stop stop-color="#8C49FF"></stop>
            <stop offset="0.40991" stop-color="#EE75FF"></stop>
            <stop offset="0.597631" stop-color="#EE75FF"></stop>
            <stop offset="1" stop-color="#C462FF"></stop>
        </lineargradient>
        <lineargradient id="gradientline-l" x1="1" y1="13.2155" x2="58.5" y2="13.2155" gradientUnits="userSpaceOnUse">
            <stop stop-color="#00E0FF"></stop>
            <stop offset="0.505208" stop-color="#000AFF"></stop>
            <stop offset="1" stop-color="#EE75FF"></stop>
        </lineargradient>
        <lineargradient id="gradientarrow-l" x1="47.2222" y1="1.5" x2="47.2222" y2="24.5" gradientUnits="userSpaceOnUse">
            <stop stop-color="#8C49FF"></stop>
            <stop offset="0.40991" stop-color="#EE75FF"></stop>
            <stop offset="0.597631" stop-color="#EE75FF"></stop>
            <stop offset="1" stop-color="#C462FF"></stop>
        </lineargradient>
    </defs>
</svg><svg class="arrow-s" width="32" height="11" viewBox="0 0 32 11" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="arrowline-s" d="M1 5.5H31" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
    <path class="arrowarrow-s" d="M26.5 1L31 5.5L26.5 10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
</svg></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>