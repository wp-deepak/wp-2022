<?php
/**
 * Block Name: Related Project CTA Block
 */

// create id attribute for specific styling
$id = 'related-project-cta-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$projects = $block_fields['rp_cta_select_projects'];
$view_all_button = $block_fields['rp_cta_see_all_projects']; ?>


<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?>glide-block project-teaser-block">
    <div id="cursor">
  <div class="cursor__circle"></div>
</div>
 <div class="container">
<?php if( $projects ): ?>
    <div class="h5"><?php echo $block_fields['rp_cta_title'];?></div>
    <ul class="row d-flex">
    <?php foreach( $projects as $project ): 
    	$permalink = get_permalink( $project->ID );
        $title = get_the_title( $project->ID ); 
        $portfolio_image = get_the_post_thumbnail_url($project->ID,"full");
        $overlay_image = get_field('portfolio_image',$project->ID);
        $image_wp = wp_get_attachment_image(get_post_thumbnail_id($project->ID), "");
        $alt = get_post_meta(get_post_thumbnail_id($project->ID), '_wp_attachment_image_alt', true);
        if(empty($alt)){
            $alt = "Portfolio Image";
        }
        ?>
        <li class="col m12 s12"> <a cursor-class="arrow" href="<?php echo esc_url( $permalink ); ?>">
            <div class="imgbox">
            <img src="<?php echo $portfolio_image;?> " class="recent_img" alt="<?php echo $alt; ?>" width="560px" height="360px">
            <?php if(!empty($overlay_image)){?>
            <div  class="abs-img">
            <img src="<?php  echo $overlay_image['url'];?>" alt="<?php  echo $overlay_image['alt'];?>" width="560px" height="360px"> </div>
        <?php }?>
            <div class="arrow"></div>
        </div>

            <div class="label-txt"><?php // esc_html( $title ); ?></div>
            <div class="h4 fwl"><?php // get_field('po_description',$project->ID);?></div></a>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php 
    wp_reset_postdata(); ?>
<?php endif; ?>
<?php if(!empty($view_all_button['url'])){?>
    <div class="btn-row">
  
    <a href="<?php echo $view_all_button['url']; ?>" class="btn glow-on-hover whitbg"><span><?php echo $view_all_button['title']; ?></span></a></div>
<?php }?>

 </div>
</div>