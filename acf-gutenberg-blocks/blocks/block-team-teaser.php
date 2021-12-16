<?php
/**
 * Block Name: Team Teaser Block
 */

// create id attribute for specific styling
$id = 'meet-the-team-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$team_heading = $block_fields['team_heading'];
$team_description = $block_fields['team_description'];
$team_image = $block_fields['team_image'];
$team_button = $block_fields['team_button']; 
$background_color_mtt = $block_fields['background_color_mtt'];
$members = $block_fields['team_animation_images'];
if($background_color_mtt == "nocolor") { ?> 
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> team-block glide-block scroll-color">
<?php }else{?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> team-block glide-block scroll-color" data-color="<?php echo $background_color_mtt; ?>">
<?php }?>
	<div class="container-l col">
		<div class="row d-flex d-flex-center">
			<div class="col l6  s12 left-col">
				<div class="team-animtion">
				<?php $i=0;
						if($block_fields['team_animation_images']):  
					 	foreach ($members as $member): 
					 	$i++;
						$member_image = $member['member_image'];
				?>
			<div class="imgblock b<?php echo $i?>"><div class="box img<?php echo $i; ?>" style="background-image:url(<?php echo $member_image['url']; ?>)"></div></div>
				<?php 
					 endforeach;
					endif;?>
				</div>
				<!-- <img src="<?php echo $team_image; ?>"> -->
			</div>
		<div class="col l6  s12 right-col">
			<div class="content">
				<div class="h2"><?php echo $team_heading; ?></div>
				<?php echo $team_description; ?>
				<a href="<?php echo $team_button['url']; ?>" class="glow-on-hover btn whitbg"><span><?php echo $team_button['title']; ?></span></a>
			</div>

		</div>
		</div>
	</div>
</div>