<?php
/**
 * Block Name: Mobile Preview Block
 */

// create id attribute for specific styling
$id = 'mobile-preview-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$mo_preview_images = $block_fields['bo_mobile_preview']; 
?>

<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color mobile-preview-layout title-paragraph-block pb-256" data-color="lightpink">
  <div class="container-fluid drag-slider">
    <div class="container" >
      <div class="row">
        <div class="slider-services">
          <?php $wo_gallery_images = $block_fields['wo_gallery_images']; 
          if( have_rows('bo_mobile_preview') ):
            foreach ($mo_preview_images as $mo_images):
              $images = $mo_images['bo_mobile_preview_images'];
              $alt_tag = empty($images['alt']) ? "mobile preview images" : $images['alt'];?>
              <div class="col-item">
                <div class="mobile-vector">
                  <div class="mobile-img">
                    <div class="mobile-layer-one"></div>
                    <div class="mobile-layer-two"></div>
                    <img src="<?php echo $images['url']; ?>" alt="<?php echo $alt_tag;?>">
                  </div>                  
                </div>
              </div>
            <?php endforeach;
          endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>