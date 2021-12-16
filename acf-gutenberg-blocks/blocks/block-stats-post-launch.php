<?php
/**
 * Block Name: Post Launch Results Block
 */

// create id attribute for specific styling
$id = 'stats-post-lauch-results-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Meta fields related to current block
$block_fields = get_fields( $block['id'] ); 
$bo_post_launch_title = $block_fields['bo_post_launch_title'];
$bo_post_launch_results 		= $block_fields['bo_post_launch_results'];?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class.' '.$class_name;?> glide-block post-lunch-block pb-256">
 <div class="container col">
 	<div class="xsb-label"><?php echo $bo_post_launch_title; ?></div>
		<div class="row">
			
		<?php 
		if($bo_post_launch_results):
			foreach ($bo_post_launch_results as $result) {?>
				<div class="col s12 m4 l4">
				<div class="result-percentage <?php echo (fmod($result['traffic_percentage'], 1) !== 0.00) ? 'decimal' : ''; ?>"><?php echo  $result['traffic_percentage'];?>%</div>

				<div class="traffic-type h4"><?php echo $result['traffic'];?> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/launch-arrow.svg" alt="arrow"/>
</div>
</div>
			<?php
			}

		endif;
		?>
	</div>
</div>
</div>