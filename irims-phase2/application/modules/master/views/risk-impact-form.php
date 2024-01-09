<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Risk Impact <small><?php echo $this->config->item('page_title'); ?></small>
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo site_url('welcome'); ?>">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<?php
		if($this->uri->segment(3) == 'add') {
		?>
		<li>
			<a href="<?php echo site_url('master/risk_impact/index'); ?>">Risk Impact</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo site_url('master/risk_impact/add'); ?>">Add</a>
		</li>
		<?php
		} else if($this->uri->segment(3) == 'edit') {
		?>
		<li>
			<a href="<?php echo site_url('master/risk_impact/index'); ?>">Risk Impact</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo site_url('master/risk_impact/edit/' . $this->uri->segment(4)); ?>">Edit</a>
		</li>
		<?php
		}
		?>
	</ul>
	<!--
	<div class="page-toolbar">
		<div class="btn-group pull-right">
			<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
			Actions <i class="fa fa-angle-down"></i>
			</button>
			<ul class="dropdown-menu pull-right" role="menu">
				<li>
					<a href="#">Action</a>
				</li>
				<li>
					<a href="#">Another action</a>
				</li>
				<li>
					<a href="#">Something else here</a>
				</li>
				<li class="divider">
				</li>
				<li>
					<a href="#">Separated link</a>
				</li>
			</ul>
		</div>
	</div>
	-->
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-table"></i>Risk Impact
				</div>
				<!--
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<a href="javascript:;" class="remove">
					</a>
				</div>
				-->
			</div>
			<div class="portlet-body form">
				<?php echo messages(); ?>
				<!-- BEGIN FORM-->
				<form id="form_sample_3" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-body">
						<!-- <h3 class="form-section">Advance validation. <small>Custom radio buttons, checkboxes and Select2 dropdowns</small></h3> -->
						<h3 class="form-section">#Kriteria Dampak</h3>
						<hr>
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button>
							Your form validation is successful!
						</div>
						<?php /* echo $form->fields(); */ ?>
						<div class="form-group" hidden>
							<label class="control-label col-md-2" hidden>Id <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="hidden" name="id" value="<?php echo !empty($id) ? $id : ''; ?>" data-required="1" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Code <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="text" name="code" value="<?php echo !empty($code) ? $code : ''; ?>" data-required="1" class="form-control" readonly="readonly"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Alphabet <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="text" name="alphabet" value="<?php echo !empty($alphabet) ? $alphabet : ''; ?>" data-required="1" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Name <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="text" name="name" value="<?php echo !empty($name) ? $name : ''; ?>" data-required="1" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Begin <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="text" name="begin" value="<?php echo !empty($begin) ? $begin : ''; ?>" data-required="1" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">End <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<input type="text" name="end" value="<?php echo !empty($end) ? $end : ''; ?>" data-required="1" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Description <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<textarea class="form-control" rows="6" name="description" data-required="1"><?php echo !empty($description) ? $description : ''; ?></textarea>
							</div>
						</div>

						<h3 class="form-section">#Indikator</h3>
						<hr>
						<div class="form-group">
							<label class="control-label col-md-2"> Impact Financial <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<textarea class="form-control" rows="15" name="impact_financial" data-required="1"><?php echo !empty($impact_financial) ? $impact_financial : ''; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Impact Compliance <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<textarea class="form-control" rows="15" name="impact_compliance" data-required="1"><?php echo !empty($impact_compliance) ? $impact_compliance : ''; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Impact Reputation <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<textarea class="form-control" rows="15" name="impact_reputation" data-required="1"><?php echo !empty($impact_reputation) ? $impact_reputation : ''; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Impact Safety <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<textarea class="form-control" rows="15" name="impact_safety" data-required="1"><?php echo !empty($impact_safety) ? $impact_safety : ''; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Impact Operation & Technique <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<textarea class="form-control" rows="15" name="impact_operation_technique" data-required="1"><?php echo !empty($impact_operation_technique) ? $impact_operation_technique : ''; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Impact Strategic <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<textarea class="form-control" rows="15" name="impact_strategic" data-required="1"><?php echo !empty($impact_strategic) ? $impact_strategic : ''; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Impact Environment <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<textarea class="form-control" rows="15" name="impact_environment" data-required="1"><?php echo !empty($impact_environment) ? $impact_environment : ''; ?></textarea>
							</div>
						</div>
						<!--
						<div class="form-group">
							<label class="control-label col-md-2">Status <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<select class="form-control select2me" name="status">
									<?php foreach($status as $key=>$val): ?>
									<?php if($key==$status_id) { ?>
									<option value="<?php echo !empty($key) ? $key : ''; ?>" selected="selected"><?php echo !empty($val) ? $val : ''; ?></option>
									<?php } else { ?>
									<option value="<?php echo !empty($key) ? $key : ''; ?>"><?php echo !empty($val) ? $val : ''; ?></option>
									<?php } ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2">Unit <span class="required">
							* </span>
							</label>
							<div class="col-md-9">
								<select class="form-control select2me" name="unit_id">
									<?php foreach($unit as $key=>$val): ?>
									<?php if($key==$unit_id) { ?>
									<option value="<?php echo !empty($key) ? $key : ''; ?>" selected="selected"><?php echo !empty($val) ? $val : ''; ?></option>
									<?php } else { ?>
									<option value="<?php echo !empty($key) ? $key : ''; ?>"><?php echo !empty($val) ? $val : ''; ?></option>
									<?php } ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						-->	
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-2 col-md-9">
								<button type="submit" class="btn green" id="save-button" value="Save" name="save-button">Save</button>
								<!--<button type="submit" class="btn default" id="cancel-button" value="Cancel" name="cancel-button">Cancel</button>-->
								<a href="<?php echo site_url('master/risk_impact/index'); ?>" title="View" class="btn default">Cancel</i></a>
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
<!-- END PAGE CONTENT-->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script>
	jQuery(document).ready(function() {
		FormValidation.init();
	});
</script>
<!-- END JAVASCRIPTS -->
