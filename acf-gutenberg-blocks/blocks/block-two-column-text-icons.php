<?php
/**
 * Block Name: Ways we help Block
 */

// create id attribute for specific styling
$id = 'ways-we-help-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$tagline = $block_fields['tagline'];
$ways_we_help  = $block_fields['ways_we_help'];
$background_color_wwh = $block_fields['background_color_wwh']; 
if($background_color_wwh == "nocolor"){
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?>glide-block  ways-we-help-block scroll-color">
<?php }else{?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?>glide-block  ways-we-help-block scroll-color" data-color="<?php echo $background_color_wwh; ?>">
<?php }?>
	<div class="container col">
		<div class="row">
		<div class="left-section col l4 s12">
	        <div class="h5"><?php echo $tagline; ?></div>
	    </div>
	    <div class="right-section col l8 s12">
        <?php if($ways_we_help): ?>
            <ul class="helps"><?php 
                foreach ($ways_we_help as $help): 
					$help_title = $help['help_title'];
					$help_icon = $help['help_icon'];
					$help_link = $help['help_link'];?>
					<li>
						<a href="<?php echo $help_link;?>">
					<div class="help-icon">
						<img src="<?php echo $help_icon['url']; ?>" alt="<?php echo $help_icon['caption'];?>" height="39px" width="39px">
					</div>
					<div class="help-title h2">
						<?php echo $help_title; ?>
					</div></a></li><?php
				endforeach;?>
            </ul><?php 
        endif; ?>
    	</div>
    </div>
     </div>
     </div>
</div>