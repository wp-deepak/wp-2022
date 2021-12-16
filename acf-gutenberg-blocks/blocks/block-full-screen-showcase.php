<?php
/**
 * Block Name: Work Gallery Block
 */

// create id attribute for specific styling
$id = 'work-gallery-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] ); 
$full_screen_showcase_bg_color = $block_fields['full_screen_showcase_bg_color'];
if($full_screen_showcase_bg_color == "nocolor") { ?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color title-paragraph-block pb-256">
<?php }elseif(empty($full_screen_showcase_bg_color)){?>
	<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color title-paragraph-block pb-256" data-color="lightpink">
<?php }else{?>
		<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color title-paragraph-block pb-256" data-color="<?php echo $full_screen_showcase_bg_color;?>">
<?php }?>
<div class="container">
   <div class="content">
      <?php 
         $heading = $block_fields['wo_title'];
         $paragraph_text = $block_fields['wo_content'];
         ?>
      <h2><?php echo $heading;?></h2>
      <div class="paragraph_text m-p">
         <?php echo $paragraph_text;?> 
      </div>
   </div>
</div>
<div class="container-fluid drag-slider">
   <div class="container" >
      <div class="row">
         <div class="slider-services">
            <?php $wo_gallery_images = $block_fields['wo_gallery_images']; 
               if( have_rows('wo_gallery_images') ):
                 while( have_rows('wo_gallery_images') ) : the_row();
                   $wo_image = get_sub_field('wo_image');
                   if(empty($wo_image['alt'])){
            $wo_image['alt'] = "fullscreen showcase image";
       }?>
            <div class="slide-item">
               <div class="col-item">
                  <img src="<?php echo $wo_image['url']; ?>" alt="<?php echo $wo_image['alt']?>">
               </div>
            </div>
            <?php endwhile;
               endif; ?>
         </div>
      </div>
   </div>
</div>
</div>