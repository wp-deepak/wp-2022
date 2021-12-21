jQuery(document).ready(function(){
	// Export ajax action
	jQuery("#zipcodes_export_btn").click(function() {
		jQuery('.myprogress').css('width', '0');

		jQuery.ajax({
			type:"POST",
			url:ajaxurl,
			data: {action:'ptc_import_export_badegs_ajax', actiontype:'export'},
			beforeSend: function () {
				jQuery('#export-loader').show();
			},
			success:function(res){
				//console.log(res);
				/*
				* Make CSV downloadable
				*/
				var downloadLink = document.createElement("a");
				var fileData = ['\ufeff'+res];

				var blobObject = new Blob(fileData,{
					type: "text/csv;charset=utf-8;"
				});

				var url = URL.createObjectURL(blobObject);
				downloadLink.href = url;
				downloadLink.download = "ptc_user_badges.csv";

				/*
				* Actually download CSV
				*/
				document.body.appendChild(downloadLink);
				downloadLink.click();
				document.body.removeChild(downloadLink);
			},
			complete: function () {
				jQuery('#export-loader').hide();
			}
		});
	});

	// Import ajax action
	var clear_timer;

	jQuery('#sample_form').on('submit', function(event){
		jQuery('#message').html('');
		event.preventDefault();

		file_data = jQuery('#csvfile').prop('files')[0];
		form_data = new FormData();
		form_data.append('file', file_data);
		form_data.append('action', 'ptc_csv_file_upload');

		jQuery.ajax({
			url:ajaxurl,
			method:"POST",
			data: form_data,
			dataType:"json",
			contentType:false,
			cache:false,
			processData:false,
			beforeSend:function(){
				jQuery('#import').attr('disabled','disabled');
				jQuery('#import').val('Importing');
			},
			success:function(data){
				//console.log(data.data.message);
				if(data.success && data.data.message=="") {
					//console.log(data);
					//console.log(data.data.total_line);
					//console.log(data.data.uploaded_csv);
					jQuery('#total_data').text(data.data.total_line);
					jQuery('#hidden_cv_file').val(data.data.uploaded_csv);

					start_import(data.data.uploaded_csv);

					clear_timer = setInterval(get_import_data, 2000);
				}
				if(data.data.message!="") {
					jQuery('#message').html('<div class="notice notice-error is-dismissible">'+data.data.message+'</div>');
					jQuery('#import').attr('disabled',false);
					jQuery('#import').val('Import');
				}
				if(data.error) {
					jQuery('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
					jQuery('#import').attr('disabled',false);
					jQuery('#import').val('Import');
				}
			}
		})


		function start_import(uploaded_csv) {
			jQuery('#process').css('display', 'block');
			jQuery.ajax({
				url:ajaxurl,
				method:"POST",
				dataType:"json",
				data: {action:'ptc_import_export_badegs_ajax', actiontype:'import', uploadedcsv: uploaded_csv},
				success:function(data) {

				}
			})
		}

		function get_import_data() {
			jQuery.ajax({
				url:ajaxurl,
				data: {action:'ptc_record_preccessing'},
				success:function(data){
					//console.log(data.data);
					var total_data = jQuery('#total_data').text();
					var width = Math.round((data.data/total_data)*100);
					jQuery('#process_data').text(data.data);
					jQuery('.progress-bar').css('width', width + '%');
					if(width >= 100) {
						clearInterval(clear_timer);
						jQuery('#csvfile').val('');
						jQuery('#message').html('<div class="alert alert-success">User Badges Successfully Imported</div>');
						jQuery('#import').attr('disabled',false);
						jQuery('#import').val('Import');
					}
				}
			})
		}
	});
});
