<?php



// Define assets folder
DEFINE( 'assetDir', get_template_directory_uri() . '/assets' );

function ptc_enqueue_admin_script() {
	wp_enqueue_script( 'admin-js', assetDir . '/js/admin.js', array(), null, false );

}
add_action( 'admin_enqueue_scripts', 'ptc_enqueue_admin_script' );



/**
 * Register a user import/export menu page.
 */
add_action("admin_menu", "ptc_import_export_menu");

function ptc_import_export_menu() {
    add_submenu_page("users.php", "Import/Export", "Import/Export", 0, "ptc-import-export", "ptc_user_import_export_page");
}


function ptc_user_import_export_page() {
	update_option( 'ptc_total_record_processed', 0 );
	if(isset($_POST['ptcimport'])){
		$extension = pathinfo($_FILES['import_file']['name'], PATHINFO_EXTENSION);
		if(!empty($_FILES['import_file']['name']) && $extension == 'csv'){

			$totalInserted = 0;

			// Open file in read mode
			$csvFile = fopen($_FILES['import_file']['tmp_name'], 'r');

			fgetcsv($csvFile); // Skipping header row

		// Read file
			while(($csvData = fgetcsv($csvFile)) !== FALSE){

				$csvData = array_map("utf8_encode", $csvData);

				// Row column length
				$dataLen = count($csvData);

				// Skip row if length != 4
				if( !($csvData[0] != "") ) continue;

				// Assign value to variables
				$id = trim($csvData[0]);
				if(user_id_exists($id)) {
					$firstname = trim($csvData[1]);
					$lastname = trim($csvData[2]);
					$email = trim($csvData[3]);
					$driving_donversion = $shaping_convo = $ptc_certified = $ptc_partners = $cpt_awards_winner = '';
					if(trim($csvData[4])=='yes') { $driving_donversion = 1; }
					if(trim($csvData[5])=='yes') { $shaping_convo = 2; }
					if(trim($csvData[6])=='yes') { $ptc_certified = 3; }
					if(trim($csvData[7])=='yes') { $ptc_partners = 4; }
					if(trim($csvData[8])=='yes') { $cpt_awards_winner = 5; }
					$badges = array($driving_donversion, $shaping_convo, $ptc_certified, $ptc_partners, $cpt_awards_winner);

					// Check record already exists or not
					update_user_meta($id, 'profile_badges', $firstname);
					update_field( 'profile_badges', $badges, 'user_'.$id );

					$totalInserted++;
				}
			}
			echo "<h3 style='color: green;'>Total record Updated : ".$totalInserted."</h3>";
		}else{
			echo "<h3 style='color: red;'>Invalid Extension</h3>";
		}
	}

	?>
		<h1>Import/Export User Badges</h1>
		<div class="panel-body">
			<span id="message"></span>
			<form id="sample_form" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="form-group">
					<label class="col-md-4 control-label">Select CSV File</label>
					<input type="file" name="file" id="csvfile" />
				</div>
				<div class="form-group" align="center">
					<input type="hidden" name="hidden_field" value="1" />
					<input type="hidden" id="hidden_cv_file" name="hidden_csv_file" value="" />
					<input type="submit" name="import" id="import" class="btn btn-info" value="Import" />
				</div>
			</form>
			<div class="form-group" id="process" style="display:none;">
				<div class="progress">
					<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
						<span id="process_data">0</span> - <span id="total_data">0</span>
					</div>
				</div>
			</div>
		</div>

		<button id="zipcodes_export_btn" class="page-title-action button">Export to CSV</button>
		<div id="export-loader" style="display: none;"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/img/loader.gif"></div>

		<style>
			.progress-bar {
				background: green;
				display: block;
				height: 20px;
				text-align: center;
				transition: width .3s;
				width: 0;
			}

			.progress-bar.hide {
				opacity: 0;
				transition: opacity 1.3s;
			}
		</style>
	<?php
}

function ptc_csv_export() {
	echo 'test in the action'; exit;
}

function user_id_exists( $user_id ) {
    global $wpdb;
    $count = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(ID) FROM $wpdb->users WHERE ID = %d", $user_id ) );
    return empty( $count ) || 1 > $count ? false : true;
}




/*Ajax callback action*/

// Upload csv file action
add_action('wp_ajax_ptc_csv_file_upload', 'ptc_csv_file_upload');
add_action('wp_ajax_nopriv_ptc_csv_file_upload', 'ptc_csv_file_upload');

function ptc_csv_file_upload() {
	$arr_img_ext = array('text/csv', 'application/csv', 'application/vnd.ms-excel');
    if (in_array($_FILES['file']['type'], $arr_img_ext)) {
        $upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));
		$file_content = file($upload['file'], FILE_SKIP_EMPTY_LINES);
   		$total_line = count($file_content);
		$output = array(
			'success'  => true,
			'message'  => '',
			'total_line' => ($total_line-1),
			'uploaded_csv' => $upload['file']
		);
		wp_send_json_success($output);
		wp_die();
    } else {
		$message = 'Please choose csv file.';
		wp_send_json_success(array('message' => $message));
		wp_die();
	}
}

// Import Export ajax action
add_action('wp_ajax_ptc_import_export_badegs_ajax', 'ptc_import_export_badegs_ajax');
add_action('wp_ajax_nopriv_ptc_import_export_badegs_ajax', 'ptc_import_export_badegs_ajax');

function ptc_import_export_badegs_ajax() {
	//echo "<pre>"; print_r($_POST); exit;
	if($_POST['actiontype']=='export') {

		$header_row = array(
			'ID',
			'Email',
			'First Name',
			'Last Name',
			'Driving/Conversation',
			'Shaping the Convo',
			'PTC certified',
			'PTC partners',
			'CPO award winners',
		);

		$data_rows = array();
		$usercount = count_users();
		$totalusers = $usercount['total_users'];
		$allusers = get_users( array('number'  => $totalusers, 'orderby' => 'ID', 'order' => 'ASC' ) );

		foreach ( $allusers as $user ) {
			$profile_badges = get_field('profile_badges', 'user_' . $user->ID);
			$b1 = $b2 = $b3 = $b4 = $b5 = 'no';
			foreach($profile_badges as $pbkey => $pbval) {
				if($pbval==1) { $b1 = 'yes'; }
				if($pbval==2) { $b2 = 'yes'; }
				if($pbval==3) { $b3 = 'yes'; }
				if($pbval==4) { $b4 = 'yes'; }
				if($pbval==5) { $b5 = 'yes'; }
			}

			$row = array(
				'ID' => $user->ID,
				'Email' => $user->user_email,
				'First Name' => get_user_meta($user->ID, 'last_name', true),
				'Last Name' => get_user_meta($user->ID, 'first_name', true),
				'Driving/Conversation' => $b1,
				'Shaping the Convo' => $b2,
				'PTC certified' => $b3,
				'PTC partners' => $b4,
				'CPO award winners' => $b5,
			);

			$data_rows[] = $row;
		}

		return get_user_badges_data($data_rows);
	}
	if($_POST['actiontype']=='import') {
		$csvfile = $_POST['uploadedcsv'];

		$totalInserted = 0;

		// Open file in read mode
		$csvFile = fopen($csvfile, 'r');

		fgetcsv($csvFile); // Skipping header row

		// Read file
		while(($csvData = fgetcsv($csvFile)) !== FALSE){
			$csvData = array_map("utf8_encode", $csvData);

			// Row column length
			$dataLen = count($csvData);

			// Skip row if length != 4
			if( !($csvData[0] != "") ) continue;

			// Assign value to variables
			$id = trim($csvData[0]);
			if(user_id_exists($id)) {
				$email = trim($csvData[1]);
				$firstname = trim($csvData[2]);
				$lastname = trim($csvData[3]);
				$driving_donversion = $shaping_convo = $ptc_certified = $ptc_partners = $cpt_awards_winner = '';
				if(trim($csvData[4])=='yes' || trim($csvData[4])=='YES' || trim($csvData[4])=='Yes') { $driving_donversion = 1; }
				if(trim($csvData[5])=='yes' || trim($csvData[5])=='YES' || trim($csvData[5])=='Yes') { $shaping_convo = 2; }
				if(trim($csvData[6])=='yes' || trim($csvData[6])=='YES' || trim($csvData[6])=='Yes') { $ptc_certified = 3; }
				if(trim($csvData[7])=='yes' || trim($csvData[7])=='YES' || trim($csvData[7])=='Yes') { $ptc_partners = 4; }
				if(trim($csvData[8])=='yes' || trim($csvData[8])=='YES' || trim($csvData[8])=='Yes') { $cpt_awards_winner = 5; }
				$badges = array($driving_donversion, $shaping_convo, $ptc_certified, $ptc_partners, $cpt_awards_winner);

				// Check record already exists or not
				//update_user_meta($id, 'profile_badges', $firstname);
				update_field( 'profile_badges', $badges, 'user_'.$id );
				update_option( 'ptc_total_record_processed', $totalInserted+1 );
				$totalInserted++;
			}
		}
		exit;
	}
}

add_action('wp_ajax_ptc_record_preccessing', 'ptc_record_preccessing');
add_action('wp_ajax_nopriv_ptc_record_preccessing', 'ptc_record_preccessing');

function ptc_record_preccessing() {
	$option = get_option('ptc_total_record_processed');
	wp_send_json_success($option);
}

// Import Export ajax action
add_action('wp_ajax_ptc_import_export_badegs_ajax', 'ptc_import_export_badegs_ajax');
add_action('wp_ajax_nopriv_ptc_import_export_badegs_ajax', 'ptc_import_export_badegs_ajax');

function get_user_badges_data($array, $filename = "export.csv", $delimiter=",") {
    // tell the browser it's going to be a csv file
    header('Content-Type: text/csv; charset=utf-8');

    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename=export.csv');

    // open the "output" stream
    // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
    $f = fopen('php://output', 'w');
	//array_unshift($array, array('ID', 'First Name', 'Last Name', 'Email', 'Driving/Conversation', 'Shaping the Convo', 'PTC certified', 'PTC partners', 'CPO award winners'));

    // use keys as column titles
    fputcsv( $f, array_keys( $array['0'] ) , $delimiter );

    foreach ($array as $lkey => $line) {
		fputcsv($f, $line, $delimiter);
    }
}
