<?php
/**
 * Block Name: Team Block
 */

// create id attribute for specific styling
$id = 'team-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
$team_heading = $block_fields['team_heading'];
$team_description = $block_fields['team_description'];
$team_members = $block_fields['team_members'];?>


<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block team-list-block">



    <div class="container col">
        <?php if( $team_members ): ?>
            <div class="h2"><?php echo $block_fields['team_heading'];?></div>
            <div class="m-p"><?php echo $block_fields['team_description']; ?></div>
            <ul class="row d-flex list-of-team">
            <?php foreach( $team_members as $team_member ): 
            	$permalink = get_permalink( $team_member->ID );
                $title = get_the_title( $team_member->ID ); 
                $team_image = get_the_post_thumbnail_url($team_member->ID,"full");?>
                <li class="col l4 m6 s12 open-slider" data-id="<?php echo $team_member->ID;?>"> 
                    
                        <div class="imgbox">
                            <img src="<?php echo $team_image;?> " class="recent_img">
                        </div>
                        <div class="label-txt"><?php echo esc_html( $title ); ?></div>
                        <div class="s-p"><p><?=CFS()->get('position',$team_member->ID)?></p></div>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php 
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</div>

