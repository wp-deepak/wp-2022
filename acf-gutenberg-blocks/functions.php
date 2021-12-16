<?php




/*
* Loading multiapal files using array form in wordpress.
*
*/

$file_includes = array(
	'includes/setup.php',           // Basic theme setup
	'includes/scripts.php',         // Enqeue theme styles and scripts
	'includes/widgets.php',         // Theme widget area
	'includes/project.php',         // Custom functions for this specific project
	'includes/acf.php',             // Advanced custom fields functions
	'includes/blocks.php',          // Custom Gutenberg blocks
	'includes/cpt.php',             // Custom post types setup
	'includes/custom.php',          // Custom functions
	'includes/ajax.php',            // Ajax related functions
	'includes/browsers.php',        // Browser detection function
        'includes/pagination.php',      // Ajax Pagination

);

/**
 * Checks if any file have error while including it.
 */
foreach ( $file_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'ptc_td' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath );
global $browser;
$browser = new Browsersphp\Browsers();



/**
 * Functions for ACF Blocks
 * NOTE :- You can also wirte these code seprated file like include/block.php
 *
 * @link https://www.advancedcustomfields.com/resources/
 */

/**
 * Register Custom Block Categories
 */

function my_acf_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'glide-blocks',
				'title' => __( 'Glide Blocks', 'theme_textdomain' ),
				'icon'  => 'admin-generic',
			),

		)
	);
}
add_filter( 'block_categories', 'my_acf_block_categories', 10, 2 );


/**
 * Register Custom Blocks
 */

 add_action( 'acf/init', 'my_acf_init' );
function my_acf_init() {
	// check function exists
	if ( function_exists( 'acf_register_block' ) ) {
        // register a 2 Column Text with Icons
        acf_register_block(
            array(
                'name'            => 'two-column-text-icons',
                'title'           => __( '2 Column Text with Icons', 'text-domain' ),
                'description'     => __( 'Ways we help block.', 'text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'admin-comments',
                'mode'            => 'edit',
                'keywords'        => array( 'Ways', 'Help', 'Ways We Help'),
            )
        );
        // register a Project Teaser Block
        acf_register_block(
            array(
                'name'            => 'project-teaser',
                'title'           => __( 'Project Teaser Block','text-domain' ),
                'description'     => __( 'Project Teaser block.','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'portfolio',
                'mode'            => 'edit',
                'keywords'        => array( 'project', 'projects', 'Teaser'),
            )
        );
        // register a CTA-TEXT Block
        acf_register_block(
            array(
                'name'            => 'CTA-TEXT',
                'title'           => __( 'CTA TEXT Block','text-domain' ),
                'description'     => __( 'CTA TEXT block.','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'admin-comments',
                'mode'            => 'edit',
                'keywords'        => array( 'CTA','TEXT'),
            )
        );
        // register Logo Grid Block
        acf_register_block(
            array(
                'name'            => 'logo-grid',
                'title'           => __( 'Logo Grid Block','text-domain' ),
                'description'     => __( 'Logo Grid block.','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'admin-comments',
                'mode'            => 'edit',
                'keywords'        => array( 'Logo','Logos','Grid'),
            )
        );
         // register Related Project Block
        acf_register_block(
            array(
                'name'            => 'related-project',
                'title'           => __( 'Related Project Block','text-domain' ),
                'description'     => __( 'Related Project Block.','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'businessperson',
                'mode'            => 'edit',
                'keywords'        => array( 'Project','Projects','Teaser'),
            )
        );
        acf_register_block(
            array(
                'name'            => 'related-project-cta',
                'title'           => __( 'Related Project CTA Block','text-domain' ),
                'description'     => __( 'Related Project CTA Block.','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'admin-comments',
                'mode'            => 'edit',
                'keywords'        => array( 'Project CTA','Projects','Teaser'),
            )
        );
        // register Team Teaser Block
        acf_register_block(
            array(
                'name'            => 'team-teaser',
                'title'           => __( 'Team Teaser Block','text-domain' ),
                'description'     => __( 'Team Teaser block.','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'businessperson',
                'mode'            => 'edit',
                'keywords'        => array( 'Team','Teaser'),
            )
        );
         // register 2 Column Text  Block
        acf_register_block(
            array(
                'name'            => 'two-column-text',
                'title'           => __( '2 Column Text','text-domain' ),
                'description'     => __( '2 Column Text','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'desktop',
                'mode'            => 'edit',
                'keywords'        => array( '2 Column','Text','Portfolio'),
            )
        );

        // register Stats Post-Launch Results
        acf_register_block(
            array(
                'name'            => 'stats-post-launch',
                'title'           => __( 'Stats Block','text-domain' ),
                'description'     => __( 'Post-Launch Stats Results for single work page' , 'text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'chart-bar',
                'mode'            => 'edit',
                'keywords'        => array( 'Stats','Post-Launch','Results'),
            )
        );

          // register Image Collage
        acf_register_block(
            array(
                'name'            => 'image-collage',
                'title'           => __( 'Image Collage','text-domain' ),
                'description'     => __( 'Image Collage','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Image','Collage','featured'),
            )
        );


         // register Work Gallery Images
        acf_register_block(
            array(
                'name'            => 'full-screen-showcase',
                'title'           => __( 'Full Screen Showcase','text-domain' ),
                'description'     => __( 'Work Gallery Images for single work page','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Work','Gallery','Showcase'),
            )
        );
        // register Testimonials Block 
        acf_register_block(
            array(
                'name'            => 'testimonials',
                'title'           => __( 'Testimonials Block','text-domain' ),
                'description'     => __( 'Testimonials block with carousel','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Testimonial','Testimonials','Testimonial Slider'),
            )
        );
        // register FAQ Block 
        acf_register_block(
            array(
                'name'            => 'faq',
                'title'           => __( 'FAQ Block','text-domain' ),
                'description'     => __( 'FAQ block','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'FAQ','Questions'),
            )
        );

        // register 3 Column Text Block 
        acf_register_block(
            array(
                'name'            => 'three-column-text',
                'title'           => __( '3 Column Text','text-domain' ),
                'description'     => __( '3 Column Details','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( '3','column','details',''),
            )
        );
         // register Form Block
        acf_register_block(
            array(
                'name'            => 'form',
                'title'           => __( 'Form Block','text-domain' ),
                'description'     => __( 'Form block', 'text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Form','Gravity'),
            )
        );
         
        //register Location with image - Address Block
        acf_register_block(
            array(
                'name'            => 'location-w-image',
                'title'           => __( 'Location With Image','text-domain' ),
                'description'     => __( 'Location with image','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'location',
                'mode'            => 'edit',
                'keywords'        => array( 'Location','With','Image'),
            )
        );


         // register We Love Our Clients Block
        acf_register_block(
            array(
                'name'            => 'love-our-clients',
                'title'           => __( 'We Love Our Clients Block','text-domain' ),
                'description'     => __( 'We love our clients block', 'text-domain'),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Love','We','Clients','Our'),
            )
        );
        // register Side by Side Images Block
        acf_register_block(
            array(
                'name'            => 'side-by-side',
                'title'           => __( 'Side by Side Images Block','text-domain' ),
                'description'     => __( 'Side by Side Images block','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Side','By','Images'),
            )
        );
        // register Side by Side Images Variation Block
        acf_register_block(
            array(
                'name'            => 'side-by-side-variation',
                'title'           => __( 'Side by Side Images Variation Block','text-domain' ),
                'description'     => __( 'Side by Side Images Variation Block','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Side','By','Images','Variation'),
            )
        );
        // register Off side Paragraph Block
        acf_register_block(
            array(
                'name'            => 'off-side-paragraph',
                'title'           => __( 'Off Side Paragraph Block','text-domain' ),
                'description'     => __( 'Off Side Paragraph Block','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Side','Off','Paragraph'),
            )
        );
        // register Book a Meeting Block
        acf_register_block(
            array(
                'name'            => 'book-a-meeting',
                'title'           => __( 'Book a Meeting Block','text-domain' ),
                'description'     => __( 'Book a Meeting Block','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Book','Meeting'),
            )
        );
        // register Cropped Screen Showcase Block
        acf_register_block(
            array(
                'name'            => 'cropped-screen-showcase',
                'title'           => __( 'Cropped Screen Showcase Block','text-domain' ),
                'description'     => __( 'Cropped Screen Showcase Block','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Cropped','Screen','Showcase'),
            )
        );

         // register Simple Paragraph Text
        acf_register_block(
            array(
                'name'            => 'paragraph-simple',
                'title'           => __( 'Simple Paragraph','text-domain' ),
                'description'     => __( 'Simple Paragraph','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Paragraph','Text','',''),
            )
        );

        // register Single Testimonial Text
        acf_register_block(
            array(
                'name'            => 'single-testimonial',
                'title'           => __( 'Single Testimonial','text-domain' ),
                'description'     => __( 'Single Testimonial','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Testimonial','Clients','Quote',''),
            )
        );


        // register Mobile Preview
        acf_register_block(
            array(
                'name'            => 'mobile-preview-work',
                'title'           => __( 'Mobile Preview' ,'text-domain'),
                'description'     => __( 'Mobile Preview','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'format-gallery',
                'mode'            => 'edit',
                'keywords'        => array( 'Mobile','Preview','',''),
            )
        );
        // register Team Block Preview
        acf_register_block(
            array(
                'name'            => 'intro-alongside-headline',
                'title'           => __( 'Intro Alongside Headline','text-domain' ),
                'description'     => __( 'Intro Alongside Headline','text-domain' ),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'admin-comments',
                'mode'            => 'edit',
                'keywords'        => array( 'Intro','Headline','Section'),
            )
        );


        // register Team Block Preview
        acf_register_block(
            array(
                'name'            => 'team',
                'title'           => __( 'Team','text-domain' ),
                'description'     => __( 'Team' ,'text-domain'),
                'render_callback' => 'my_acf_block_render_callback',
                'category'        => 'glide-blocks',
                'icon'            => 'businessperson',
                'mode'            => 'edit',
                'keywords'        => array( 'Team','Section'),
            )
        );
	}
}
function my_acf_block_render_callback( $block ) {

	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace( 'acf/', '', $block['name'] );

	// include a template part from within the "template-parts/block" folder
	if ( file_exists( get_theme_file_path( "/blocks/block-{$slug}.php" ) ) ) {
		include get_theme_file_path( "/blocks/block-{$slug}.php" );
	}
}
