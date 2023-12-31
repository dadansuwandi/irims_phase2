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
Menu <small><?php echo $this->config->item('page_title'); ?></small>
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
								<input type="hidden" name="id" value="<?php echo !empty($id) ? $id : ''; ?>" data-required="1" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">label <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="text" id="txtlbl" name="label" value="<?php echo !empty($label) ? $label : ''; ?>" data-required="1" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">style <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="text" id="txtstyle" name="style" value="<?php echo !empty($style) ? $style : ''; ?>" data-required="1" class="form-control" />
							</div>
							<a href="https://fontawesome.com/v4/icons/" target="_blank">Reference icon</a>
				
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">url <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="text" id="txturl" name="url" value="<?php echo !empty($url
								) ? $url : ''; ?>" data-required="1" class="form-control" />
							</div>
							
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-2">Parent  <span class="required">
							* </span>
							</label>
							<div class="col-md-9">

							<select class="form-control  chosen-select" id="parent_id" name="parent" required>
									<?php foreach($parent as $key=>$val): ?>
									<?php if($key==$parent_id) { ?>
									<option value="<?php echo !empty($key) ? $key : ''; ?>" selected="selected"><?php echo !empty($val) ? $val : ''; ?></option>
									<?php } else { ?>
									<option value="<?php echo !empty($key) ? $key : ''; ?>"><?php echo !empty($val) ? $val : ''; ?></option>
									<?php } ?>
									<?php endforeach; ?>
								</select>
						    </div>	
						</div>
						
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-2 col-md-9">
								<button type="submit" class="btn green" id="save-button" value="Save" name="save-button">Save</button>
								<!--<button type="submit" class="btn default" id="cancel-button" value="Cancel" name="cancel-button">Cancel</button>-->
								<a href="<?php echo site_url('auth/menu/index'); ?>" title="View" class="btn default">Cancel</i></a>
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
	
	
	if (url.match("view"))
		$('#save-button').hide();
	

	
	$("#save-button").click(function(){
		var label = $("#txtlbl").val();
		var style = $("#txtstyle").val();
		var url = $("#txturl").val();
		var parent = $("#parent_id").val();
		//alert(end_date);

		$.ajax({
					url: "<?php echo site_url('auth/menu/save');?>",
                    method: 'post',
					data: {label:  label,style:style,url:url,parent:parent},
                    success:function(data){
						window.location.href =redirect_url+"auth/menu/index";
						//alert(data);
                       
                    }
                });

	});

	$(".date-picker").datepicker({format: 'yyyy-mm-dd'});
	</script>