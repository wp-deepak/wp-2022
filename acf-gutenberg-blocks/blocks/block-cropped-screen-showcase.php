<?php
/**
 * Block Name: Cropped Screen Showcase Block
 */

// create id attribute for specific styling
$id = 'cropped-screen-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] ); ?>

<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block  scroll-color slider-eq-height cropped-screen-showcase-block pb-256" data-color="lightpink">
  <div class="container">
   <div class="content">
      <?php 
         $heading = $block_fields['bo_cs_title'];
         $paragraph_text = $block_fields['bo_cs_content'];
         ?>
      <?php if(!empty($heading)){?>
      <h2><?php echo $heading;?></h2>
   <?php }?>
      <div class="paragraph_text m-p">
         <?php echo $paragraph_text;?> 
      </div>
   </div>
</div>
   <div class="container-fluid drag-slider">
      <div class="container" >
         <div class="row">
            <div class="slider-services">
            <?php $cs_showcase_images = $block_fields['cs_showcase_images']; 
               if( have_rows('cs_showcase_images') ):
                 while( have_rows('cs_showcase_images') ) : the_row();
                   $cs_showcase_image = get_sub_field('cs_showcase_image');
                   $cs_showcase_alt_tag = empty($cs_showcase_image['alt']) ? "showcase images" : $cs_showcase_image['alt'];?>
                     <div class="slide-item">
                        <div class="col-item">
                           <img src="<?php echo $cs_showcase_image['url']; ?>" alt="<?php echo $cs_showcase_alt_tag;?>">
                        </div>
                     </div>
                  <?php endwhile;
               endif; ?>
            </div>
         </div>
      </div>
   </div>
</div>