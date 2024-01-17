<!-- BEGIN DEFINE VARIABLE -->
<?php 
	$module 	= $this->uri->segment(1);
	$page   	= $this->uri->segment(2);
	$action 	= 'index';
	$actionTmp 	= $this->uri->segment(3);
	if($actionTmp != ''){
		$action =  $this->uri->segment(3);
	}
	$actionId 	= $this->uri->segment(4);
?>
<!-- END DEFINE VARIABLE -->
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Role Maping <small><?php echo $this->config->item('page_title'); ?></small>
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo site_url('welcome'); ?>">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<?php
		if($action == 'add'){
		?>
		<li>
			<a href="<?php echo site_url('auth/role_map/index'); ?>">User</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo site_url('auth/role_map/add'); ?>">Add</a>
		</li>
		<?php
		} else {
		?>
		<li>
			<a href="<?php echo site_url('auth/role_map/index'); ?>">User</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo site_url('auth/user/edit/' . $actionId); ?>">Edit</a>
		</li>
		<?php
		}
		?>
	</ul>
	
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i>Role Mapping
				</div>
				
			</div>
			<div class="portlet-body form">
				<?php echo messages(); ?>
				<!-- BEGIN FORM-->
				<form id="form_sample_3" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-body">
						<!--<h3 class="form-section">Advance validation. <small>Custom radio buttons, checkboxes and Select2 dropdowns</small></h3>-->
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button>
							Your form validation is successful!
						</div>

						
						
					</div>
					<div class="portlet-body form">
				<?php echo messages(); ?>
				<!-- BEGIN FORM-->
				<div class="form-group">
							<label class="col-md-2 control-label">Is LDAP</label>
							<div class="col-md-10">
								<div class="radio-list">
									<label class="radio-inline">
									<input type="radio" name="ldap" id="ldapNo" value="0" checked> No </label>

									<label class="radio-inline">
									<input type="radio" name="ldap" id="ldapYes" value="1"> Yes </label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-2">Search By NIP/Name/Position </label>
							<div class="col-md-10">
								<input type="text" name="search" id="search" class="form-control"/>
							</div>
						</div>

				<form id="form_sample_3" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-body">
						<!-- <h3 class="form-section">Advance validation. <small>Custom radio buttons, checkboxes and Select2 dropdowns</small></h3> -->
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button>
							Your form validation is successful!
						</div>
						
						<div class="form-group" hidden>
							<label class="control-label col-md-2" hidden>Id <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="hidden" id="id" name="id" value="<?php echo !empty($id) ? $id : ''; ?>" data-required="1" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">User name <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="text" id="txtUserName" name="code" value="<?php echo !empty($code) ? $code : ''; ?>" data-required="1" class="form-control" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-2">Role  <span class="required">
							* </span>
							</label>
							<div class="col-md-9">

							<select class="form-control  chosen-select" id="risk_id" name="risk_id" required>
									<?php foreach($risk as $key=>$val): ?>
									<?php if($key==$risk_id) { ?>
									<option value="<?php echo !empty($key) ? $key : ''; ?>" selected="selected"><?php echo !empty($val) ? $val : ''; ?></option>
									<?php } else { ?>
									<option value="<?php echo !empty($key) ? $key : ''; ?>"><?php echo !empty($val) ? $val : ''; ?></option>
									<?php } ?>
									<?php endforeach; ?>
								</select>
						    </div>	
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Start Date <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
							<input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="start_date" data-required="1" value=<?php echo !empty($start_date) ? $start_date : ''; ?>/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">End Date <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
							<input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="end_date" data-required="1" value=<?php echo !empty($end_date) ? $end_date : ''; ?>/>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-2 col-md-9">
								<button type="submit" class="btn green" id="save-button" value="Save" name="save-button">Save</button>
								<!--<button type="submit" class="btn default" id="cancel-button" value="Cancel" name="cancel-button">Cancel</button>-->
								<a href="<?php echo site_url('auth/role_map/index'); ?>" title="View" class="btn default">Cancel</i></a>
							</div>
						</div>
					</div>

				
				</form>
				<!-- END FORM-->
			</div>
			<!-- END VALIDATION STATES-->
		</div>
	</div>
</div>
<script>
	var url = $(location).attr('href');
	var redirect_url     = <?php echo json_encode(base_url()); ?>;
	var isUpdate= false;
	
	if (url.match("view"))
		$('#save-button').hide();
	
    if (url.match("edit"))
	  isUpdate = true;
		
	

		
	$("#save-button").click(function(e){
		e.preventDefault();
		var id = $("#id").val();
		var UserName = $("#txtUserName").val();
		var risk_id = $("#risk_id").val();
		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
		if (start_date > end_date)
		{
			alert("end date  greater than start date.")
		}
		else
		{

			if (isUpdate == true){
				$.ajax({
							url: "<?php echo site_url('auth/role_map/update');?>",
							method: 'post',
							data: {id:  id,UserName:  UserName,risk_id:risk_id,start_date:start_date,end_date:end_date},
							success:function(data){
								window.location.href =redirect_url+"auth/role_map/index";
							
							},
							error: function(xhr){
								alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
							}
						});

			}
			else
			{

				$.ajax({
							url: "<?php echo site_url('auth/role_map/save');?>",
							method: 'post',
							data: {UserName:  UserName,risk_id:risk_id,start_date:start_date,end_date:end_date},
							success:function(data){
								window.location.href =redirect_url+"auth/role_map/index";
							
							},
							error: function(xhr){
								alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
							}
						});
			}
		}

	});

	$(".date-picker").datepicker({format: 'yyyy-mm-dd'});
	$('#search').prop('readonly', true);
	$('#ldapYes').on('click', function(e) {
			if ($('#ldapYes').is(':checked')) { 
				$('#search').prop('readonly', false);
				$('#txtUserName').prop('readonly', true);
				
			} 
		});

		$('#ldapNo').on('click', function(e) {
			if ($('#ldapNo').is(':checked')) { 
				$('#txtUserName').prop('readonly', true);
				$('#search').prop('readonly', true);
				
			} 
		});
	// Initialize 
	var base_url = '<?php echo base_url() ?>';
		var API_HOST_DEV_AP2 = '<?php echo getenv('API_HOST_DEV_AP2');?>'
		var API_HOST_USER_AP2 = '<?php echo getenv('API_HOST_USER_AP2');?>'
		var API_HOST_PASS_AP2 = '<?php echo getenv('API_HOST_PASS_AP2');?>'
		var urlUser = '<?php echo '/mobile/employee/getEmployeeDataSidoelbyfilter';?>'
		//var urlPhoto = '<?php echo '/mobile/Photo/index/';?>'
	$("#search").autocomplete({
        	source: function( request, response ) {
				if (request.term != "") {
					// Fetch data
					$.ajax({
						url: API_HOST_DEV_AP2 + urlUser,
						type: 'post',
						dataType: "json",
						data: {
							username: API_HOST_USER_AP2,
							password: API_HOST_PASS_AP2,
							params: request.term, // by Nip/PeopleName/PeoplePosition
							submit: 1
						},
						async: true,
						success: function( data ) {
							if (data != "") {
								//response( data );
								var resp = $.map(data,function(obj){
									var name = obj.PeopleName;
									$('#txtUserName').val(obj.PeopleUsername);
									$('#risk_id').val(obj.RoleId);

									console.log(obj);
									// for (var key in obj) {
									// if (obj.hasOwnProperty(key)) {
									// 	alert(key + "/" + obj[key]);
									// 	//PeopleUsername
									// 	//Nip
									// 	//PeoplePosition
									// 	//RoleId
									// 	//RoleDesc
									// 	//BranchIataCode
									// 	//BranchName

									// 	}
									// }
									//alert(name);
                                    // return {
                                    //     label: name,
                                    //     value: name,
                                    //     data: obj
                                    // }
								}); 
								response(resp);
								console.log("Connection LDAP is Ok.");
							}
						},
						error: function (jqXHR, exception) {
							var error_msg = '';
							if (jqXHR.status === 0) {
								error_msg = 'Not connect.\n Verify Network.';
							} else if (jqXHR.status == 404) {
								// 404 page error
								error_msg = 'Requested page not found. [404]';
							} else if (jqXHR.status == 500) {
								// 500 Internal Server error
								error_msg = 'Internal Server Error [500].';
							} else if (exception === 'parsererror') {
								// Requested JSON parse
								error_msg = 'Requested JSON parse failed.';
							} else if (exception === 'timeout') {
								// Time out error
								error_msg = 'Time out error.';
							} else if (exception === 'abort') {
								// request aborte
								error_msg = 'Ajax request aborted.';
							} else {
								error_msg = 'Uncaught Error.\n' + jqXHR.responseText;
							}
							// error alert message
							alert('error :: ' + error_msg);
						}
					});
				}
        	},
        	// select: function (event, ui) {
			// 	// Call removeCookie function with name of Cookie that you want to remove
			// 	removeCookie('nip');
          		
			// 	// Set selection
			// 	var data = ui.item.data;
          	// 	$('#first_name').val(data.PeopleName);
          	// 	$('#username').val(data.PeopleUsername);
			// 	$('#email').val(data.PeopleUsername + '<?php echo getenv('HOST_DOMAIN_AP2');?>');
				
			// 	// To create cookie, call setCookie with three params: name of cookie, value of cookie, expired time (days)
			// 	setCookie('nip', data.Nip, 0);
			// 	var nip = data.Nip;
			// 	var desc = data.PeopleName;
			// 	var saveCookieName = $.ajax({
			// 		url: 'save_cookie_temp',
			// 		type: "post",
			// 		data: { name: nip, description: desc },
			// 		success: function (data) {
			// 			var dataParsed = JSON.parse(data);
			// 			//console.log(dataParsed);
			// 		},
			// 		error: function (jqXHR, exception) {
			// 			var error_msg = '';
			// 			if (jqXHR.status === 0) {
			// 				error_msg = 'Not connect.\n Verify Network.';
			// 			} else if (jqXHR.status == 404) {
			// 				// 404 page error
			// 				error_msg = 'Requested page not found. [404]';
			// 			} else if (jqXHR.status == 500) {
			// 				// 500 Internal Server error
			// 				error_msg = 'Internal Server Error [500].';
			// 			} else if (exception === 'parsererror') {
			// 				// Requested JSON parse
			// 				error_msg = 'Requested JSON parse failed.';
			// 			} else if (exception === 'timeout') {
			// 				// Time out error
			// 				error_msg = 'Time out error.';
			// 			} else if (exception === 'abort') {
			// 				// request aborte
			// 				error_msg = 'Ajax request aborted.';
			// 			} else {
			// 				error_msg = 'Uncaught Error.\n' + jqXHR.responseText;
			// 			}
			// 			// error alert message
			// 			alert('error :: ' + error_msg);
			// 		}
			// 	});

			// 	// var img = $("#previewimgprofile").attr('src', API_HOST_DEV_AP2 + urlPhoto + data.Nip)
			// 	// .on('load', function() {
			// 	// 	if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
			// 	// 		alert('broken image!');
			// 	// 	} else {
			// 	// 		if (saveCookieName.status == 200) {
			// 	// 			<?php
			// 	// 				// $nipData = $this->curl->simple_get(base_url() .'my_api/get_cookie_name');
			// 	// 				// $getNip = json_decode($nipData, TRUE);
			// 	// 				// $getNip['nip'];
			// 	// 			?>	

			// 	// 			// Remote image URL
			// 	// 			<?php 
			// 	// 				/* $url = getenv('API_HOST_DEV_AP2').'/mobile/Photo/index/'.$getNip['nip'];
			// 	// 				// Image path
			// 	// 				$imgDownload = 'uploads/user/' . date('Ymd') . '-ldap-'.$getNip['nip'].'.jpg';
			// 	// 				// Save image
			// 	// 				$ch = curl_init($url);
			// 	// 				$fp = fopen($imgDownload, 'wb');
			// 	// 				curl_setopt($ch, CURLOPT_FILE, $fp);
			// 	// 				curl_setopt($ch, CURLOPT_HEADER, 0);
			// 	// 				curl_exec($ch);
			// 	// 				curl_close($ch);
			// 	// 				fclose($fp); */
			// 	// 			?>
			// 	// 		}
			// 	// 	}
			// 	// });
				
			// 	// //clear a file input with jQuery 
			// 	// $("#userfile").val("");
			// 	// $("#userfile").remove();
			// 	// // redeclare file input
			// 	// var base_url = '<?php echo base_url();?>'
			// 	// var imgDownload = '<?php echo 'uploads/user/' . date('Ymd') . '-ldap-';?>' + nip + '<?php echo '.jpg';?>';
			// 	// var urlImage = base_url + imgDownload;
			// 	// var input =  $('<input>').attr({
			// 	// 	type: 'hidden',
			// 	// 	value: '',
			// 	// 	id: 'photo',
			// 	// 	name: 'photo',
			// 	// });
			// 	// $('#photo-temp').append(input);
			// 	// //insert to value input file
			// 	// var filename = urlImage.substring(urlImage.lastIndexOf('/')+1);
			// 	// $('#photo').val(filename);
			// 	// console.log(filename);

			// 	// // Call removeCookie function with name of Cookie that you want to remove
			// 	// removeCookie('nip');

			// 	// // clear search input after selection
			// 	// $("#search").load(location.href + " #search");
			// 	// $('#search').val('').trigger('change');
				
          	// 	return false;
        	// },
			minLength: 1,
			autoFocus: true,
			classes: {
				"ui-autocomplete": "highlight"
			}
      	});
	</script>