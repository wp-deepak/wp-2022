<?php
/**
 * Block Name: CTA Block
 */

// create id attribute for specific styling
$id = 'cta-home-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );

$cta_text = $block_fields['cta_text'];
$cta_link = $block_fields['cta_link'];
$cta_icon = $block_fields['cta_icon']; 
$background_color_cta = $block_fields['cta_select_background_color']; ?>

<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?>glide-block  scroll-color our-work-cta" data-color="<?php echo $background_color_cta; ?>">
  <div class="container">
  	<a href="<?php echo $cta_link['url']; ?>"> 
  		<div class="d-flex d-flex-center">
	<div class="h4 fwl"><?php echo $cta_text; ?>
		<?php if(!empty($cta_icon)):?>
		<img src="<?php echo $cta_icon['url'];?>" alt="<?php echo $cta_icon['caption'];?>" height="43" width="43">
	<?php endif;?>
	</div>
			<span><svg class="arrowdefs">
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
</svg>

<svg class="arrow-l" width="62" height="26" viewBox="0 0 62 26" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="arrowline-l" d="M1 13H60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
    <path class="arrowarrow-l" d="M48.5 1.5L60 13L48.5 24.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
    <defs>
    </defs>
</svg></span>
	</div>
	</a>
	</div>

</div>