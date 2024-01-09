<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Worksheet Master <small><?php echo $this->config->item('page_title'); ?></small>
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo site_url('welcome'); ?>">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo site_url('worksheet/worksheet_form/index'); ?>">Worksheet Form</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Workseet Form Action</a>
		</li>
	</ul>

</div>
<!-- END PAGE HEADER-->


<div class="row">
	<div class="col-md-6">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i> Setting Control
					</div>
					
				</div>
				<div class="portlet-body">
					<div>
						<div class="form-horizontal">
							<div class="form-body">
							<div class="form-group">
									<label class="control-label col-md-4">Control Type<span class="required">*</span></label>
									<div class="col-md-8">
										<select id="worksheetControltype" onchange="SettingForm.CommonAction.onchange.controltipe();" class="form-control input-circle select2">
											<option>--select--</option>
											<option value="1">Default Control</option>
											<option value="2">New Control</option>
										</select>
									</div>									
								</div>
								<div id="hidedefaultcontrol" style="display:none;">
									<div class="form-group">
										<label class="control-label col-md-4">Control <span class="required">*</span></label>
										<div class="col-md-8">
											<select id="worksheetcontrol"  onchange="SettingForm.CommonAction.onchange.renderControldefault();"  class="form-control input-circle select2">
												<option>--select--</option>
											</select>
										</div>									
									</div>
								</div>
								
								<div id="hidenewcontrol" style="display:none;">
									<div class="form-group">
										<label class="control-label col-md-4">Lable Name<span class="required">*</span></label>
										<div class="col-md-8">
											<input type="text" id="Worksheetname" class="form-control input-circle" />
										</div>									
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Control Type<span class="required">*</span></label>
										<div class="col-md-8">
											<select id="worksheetdatatypeID" class="form-control input-circle select2">
												<option>--select--</option>
											</select>
										</div>									
									</div>
								</div>								

								<div class="form-group">
									<label class="control-label col-md-4">Sequence<span class="required">*</span></label>
									<div class="col-md-8">
										<input type="text" id="Worksheetname" class="form-control input-circle" />
									</div>									
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Is Active</label>
									<div class="col-md-1">
										<input type="checkbox" id="IsActive" class="form-control">
									</div>									
								</div>
							</div>
							<div class="form-actions" style="padding-top:10px">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<a href="javascript:;" class="btn btn-circle default button-previous disabled" style="display: none;">
										<i class="m-icon-swapleft"></i> Back 
									</a>

									<a href="javascript:;" class="btn btn-circle blue button-next">
										Continue <i class="m-icon-swapright m-icon-white"></i>
									</a>

									<a href="javascript:;" class="btn btn-circle green button-submit" style="display: none;">
										Submit <i class="m-icon-swapright m-icon-white"></i>
									</a>
								</div>
							</div>
						</div>
						</div>
					</div>
					
				</div>
				
				
			</div>
			
	</div>
	<div class="col-md-6">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i> Render Control
					</div>
					
				</div>
				<div class="portlet-body">
					<div>
						<div class="form-horizontal">
							<div class="form-body">
								<div id="rendercontrol">
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
				
				
			</div>
			
	</div>


	</div>

	<script>

		jQuery(document).ready(function() {    
			SettingForm.loadPage.select2();
			SettingForm.BindData.worksheetdatatype();
			SettingForm.BindData.worksheetcontrol();
			$('#hidedefaultcontrol').show();
			
		});
		
		let  SettingForm = {
			loadPage : {
				select2 : function(){
					$('.select2').select2({
						allowClear: true,
					});
				},
			}, 
			BindData : {
				worksheetdatatype : function(){		
					debugger;			
					var get_worksheet_data_type = InvokeCodeBehind("worksheet_form","get_worksheet_data_type", null);
					debugger;

					for (i = 0; i < get_worksheet_data_type.length; i++) 
					{
						$('#worksheetdatatypeID').append(`<option value="`+ get_worksheet_data_type[i]['InputTypeID '] +`">`+ get_worksheet_data_type[i]['InputType'] +`</option>`);
					}
				},
				worksheetcontrol : function(){		
					debugger;			
					var get_worksheet_form_default = InvokeCodeBehind("worksheet_form","get_worksheet_form_default", null);
					debugger;

					for (i = 0; i < get_worksheet_form_default.length; i++) 
					{
						$('#worksheetcontrol').append(`<option value="`+ get_worksheet_form_default[i]['FormDefaultID'] +`">`+ get_worksheet_form_default[i]['LableName'] +`</option>`);
					}
				}

			},
			CommonAction:{
				onchange: {
					controltipe: function(){
						
						if($('#worksheetControltype').val() == 1 )
						{
							$('#hidedefaultcontrol').show();
							$('#hidenewcontrol').hide();
						}		
						else if($('#worksheetControltype').val() == 2 )
						{
							$('#hidenewcontrol').show();
							$('#hidedefaultcontrol').hide()
						}
						else{
							$('#hidenewcontrol').hide();
							$('#hidedefaultcontrol').hide()
						}
						
					},
					renderControldefault: function(){
						debugger;
						var formData = new FormData();
						formData.append("FormDefaultID", $('#worksheetcontrol').val());
						var dtrenderform = InvokeCodeBehind("worksheet_form","get_worksheet_form_default_by_ID", formData);
						debugger;
						
							$('#rendercontrol').html(dtrenderform[0]['Html']);

							$(".wysihtml5").wysihtml5({
								"stylesheets": ["<?php echo base_url() ?>assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"],
								"font-styles": false, //Font styling, e.g. h1, h2, etc.
								"emphasis": true, //Italics, bold, etc.
								"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.
								"html": false, //Button which allows you to edit the generated HTML.
								"link": false, //Button to insert a link.
								"image": false, //Button to insert an image.
								"color": false //Button to change color of font
							});
					},

				},
				
			}


		};




	</script>