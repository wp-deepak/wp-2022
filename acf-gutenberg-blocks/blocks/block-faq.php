<?php
/**
 * Block Name: Recent Projects Block
 */

// create id attribute for specific styling
$id = 'faq-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$faq_title = $block_fields['faq_title'];
$bg_color_faq = $block_fields['bg_color_faq'];
if($bg_color_faq == "nocolor"){
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color accordion-layout acc-style1 faq-block pb-256">
<?php }else{?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block scroll-color accordion-layout acc-style1 faq-block pb-256" data-color="<?php echo $bg_color_faq;?>">
<?php }?>
  <div class="container col">
    <div class="row">
      <div class="col s12 l4 col-left">
        <div class="left-block">
          <div class="block-title"><?php echo $faq_title; ?></div>
        </div>
      </div>
      <div class="col s12 l8 col-right">
        <div class="right-block">
          <ul class="collapsible">
            <?php  if( have_rows('bo_faq_repeater') ): ?>
              <?php while( have_rows('bo_faq_repeater') ): the_row(); 
                    $faq_question = get_sub_field('bo_faq_question');
                    $faq_description = get_sub_field('faq_answer'); ?>
                      <li class="col-item">
                <div class="collapsible-header">
                  <em class="acc-icon">  <svg class="icon-pm" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path class="icon-pm-h" d="M1 9H17" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path class="icon-pm-v" d="M9 17L9 1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg></em>
                  <div class="head-title h4"><?php echo $faq_question;?></div>
                </div>
                <div class="collapsible-body">
                  <div class="info-content"><?php echo $faq_description; ?></div>
                </div>
              </li>
              <?php 
                   endwhile;
                endif;?>
            
            <!-- <li class="col-item">
              <div class="collapsible-header">
                <em class="acc-icon"></em>
                <div class="head-title">Second Title</div>
              </div>
              <div class="collapsible-body">
                <div class="info-content">Lorem ipsum dolor sit amet.</div>
              </div>
            </li>
            <li class="col-item">
              <div class="collapsible-header">
                <em class="acc-icon"></em>
                <div class="head-title">Third Title</div>
              </div>
              <div class="collapsible-body">
                <div class="info-content">Lorem ipsum dolor sit amet.</div>
              </div>
            </li> -->
          </ul>


          <!-- <dl id="accordion" class="accordion-listing">
            <?php if( have_rows('bo_faq_repeater') ): ?>
              <?php while( have_rows('bo_faq_repeater') ): the_row(); 
                $faq_question = get_sub_field('bo_faq_question');
                $faq_description = get_sub_field('faq_answer'); ?>
                <div class="accordion-row">
                  <dt class="acc-title">
                    <span class="acc-arrow">+</span>
                    <?php echo $faq_question; ?>
                  </dt>
                  <dd class="acc-content">
                    <div class="content-info">
                      <?php echo $faq_description; ?>
                    </div>
                  </dd>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </dl> -->
        </div>
      </div>
    </div>
  </div>  
</div>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('.collapsible').collapsible();
  });
</script>