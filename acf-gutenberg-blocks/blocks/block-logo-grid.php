<?php
/**
 * Block Name: Logo Grid Block
 */

// create id attribute for specific styling
$id = 'our-client-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$our_clients_title = $block_fields['our_clients_title'];
$view_all_button = $block_fields['view_all_button'];
$clients = $block_fields['clients']; 
$background_color_oc = $block_fields['background_color_oc'];
if($background_color_oc == "nocolor") {?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color our-client-logo">
<?php }else{?>

<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color our-client-logo" data-color="<?php echo $background_color_oc; ?>">
<?php }?>
    <div class="container col">
    <?php if(!empty($our_clients_title)){?>
    <h2 class="h5"><?php echo $our_clients_title; ?></h2>
<?php }?>
    <?php if( $clients ): ?>
        <ul class="row d-flex d-flex-center">
        <?php foreach( $clients as $client ): 
        	$permalink = get_permalink( $client->ID );
            $title = get_the_title( $client->ID );
            $featured_img_url = get_the_post_thumbnail_url($client->ID,'full'); ?>
            <li class="col l3 m4 s6 logos">
                <img src="<?php echo $featured_img_url; ?>" alt="Clients Logo" width="240" height="50">
            </li>
        <?php endforeach; ?>
        </ul>
        <?php 
        wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php if(!empty($view_all_button['url'])){?>
            <div class="btn-row">
   <a href="<?php echo $view_all_button['url']; ?>" class="btn-link"><?php echo $view_all_button['title']; ?><svg class="arrowdefs">
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


<svg class="arrow-s" width="32" height="11" viewBox="0 0 32 11" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="arrowline-s" d="M1 5.5H31" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
    <path class="arrowarrow-s" d="M26.5 1L31 5.5L26.5 10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
</svg></a></div>
<?php }?>

</div>
</div>