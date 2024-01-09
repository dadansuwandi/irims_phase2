<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Risk Assessment Form
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo site_url('welcome'); ?>">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<?php
		if($this->uri->segment(3) == 'worksheet_form') {
		?>
		<li>
			<a href="#">Risk Assessment</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Add New</a>
		</li>
		<?php
		} else if($this->uri->segment(3) == 'edit') {
		?>
		<li>
			<a href="#">Risk Assessment</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Edit</a>
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
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-table"></i>Risk Assessment Input Review
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
			<div class="portlet-body">
				body	
			</div>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue" id="form_wizard_1">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i> Risk Assessment Form - <span class="step-title">
					Step 1 of 4 </span>
				</div>
				<div class="tools hidden-xs">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<!-- <a href="javascript:;" class="remove">
					</a> -->
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-horizontal">
					<div class="form-wizard">	
						<div class="form-body">
							<ul class="nav nav-pills nav-justified steps">
								<li>
									<a href="#tab1" data-toggle="tab" class="step">
									<span class="number">
									1 </span>
									<span class="desc">
									<i class="fa fa-check"></i> Penetapan Lingkup, Konteks, & Kriteria</span>
									</a>
								</li>
								<li>
									<a href="#tab2" data-toggle="tab" class="step">
									<span class="number">
									2 </span>
									<span class="desc">
									<i class="fa fa-check"></i> Risk Assessment</span>
									</a>
								</li>
								<li>
									<a href="#tab3" data-toggle="tab" class="step active">
									<span class="number">
									3 </span>
									<span class="desc">									
									<i class="fa fa-check"></i>  Risk Treatment</span>
									</a>
								</li>
								<li>
									<a href="#tab4" data-toggle="tab" class="step">
									<span class="number">
									4 </span>
									<span class="desc">
									<i class="fa fa-check"></i> Risk Monitoring & Review</span>
									</a>
								</li>
							</ul>
							<div id="bar" class="progress progress-striped" role="progressbar">
								<div class="progress-bar progress-bar-success">
								</div>
							</div>
							<div class="tab-content">
								<div class="alert alert-danger display-none">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success display-none">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>
								<input type="hidden" class="form-control" name="RISK_IDENTIFICATION_ID" value="0" id="risk_identification_id"/>
								<div class="tab-pane active" id="tab1">
										<!-- <div class="form-group">
											<label class="control-label col-md-3">Unit Kerja<span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" id="UNIT_KERJA"  class="form-control input-circle" readonly="readonly"/>
											</div>											
										</div> -->
										<div class="form-group">
										<label class="control-label col-md-3">Unit Kerja<span class="required">*</span></label>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon input-circle-left"><i class="fa fa-database"></i></span>
												<select class="form-control select2" id="UNIT_KERJA" name="UNIT_KERJA"  disabled>													
												</select>
											</div>
										</div>
									</div>
										<div class="form-group">
											<label class="control-label col-md-3">Tahun<span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" id="CREATED_AT_YEAR" class="form-control input-circle" readonly="readonly"/>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Tanggal<span class="required">*</span></label>
											<div class="col-md-6">
												<input type="text" id="CREATED_AT_DATE"  class="form-control input-circle" readonly="readonly"/>
											</div>
										</div>
									<div id="contentTab1">
									</div>
								</div>			
								<div class="tab-pane " id="tab2">
									<div id="contentTab2">
									</div>
								</div>
								<div class="tab-pane " id="tab3">
								<div>
											<div class="table-toolbar">
											<div class="row">
												<div class="col-md-6">
													<div class="btn-group">
													<!-- <a href="<?php echo site_url('master/worksheet/masterworksheet'); ?>" class="btn green">Add Worksheet Header <i class="fa fa-plus"></i></a> -->
													<a href="#" onclick="PopUpCrud('in','0')" class="btn green">Add Mitigasi <i class="fa fa-plus"></i></a>
													</div>
												</div>
												
											</div>
										</div>
										<table id="tblmitigasi" class="table table-striped table-bordered table-hover" style="width: 100%;">
										<thead>
													<tr>
														<td style="text-align: center">Actions</td>
														<td style="text-align: center">Tipe Rencana Perlakuan Risiko</td>
														<td style="text-align: center">Rencana Perlakuan Risiko</td>
														<td style="text-align: center">PIC (Unit Kerja )</td>	
														<td style="text-align: center">Tanggal Mulai</td>	
														<td style="text-align: center">Tanggal Selesai</td>
														<td style="text-align: center">Biaya Mitigasi </td>
													</tr>

												</thead>
												<tbody>
												</tbody>
											</table>	
										</div>
										<div class="form-horizontal" style="padding-top:80px">
											<div id="contentTab3">
											</div>
										</div>
								</div>
								<div class="tab-pane " id="tab4">
								
								</div>	
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<a href="javascript:;" class="btn btn-circle default button-previous">
										<i class="m-icon-swapleft"></i> Back 
									</a>

									<a href="javascript:;" class="btn btn-circle blue button-next">
										Continue <i class="m-icon-swapright m-icon-white"></i>
									</a>

									<a href="javascript:;" class="btn btn-circle green button-submit">
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
</div>
<!-- END PAGE CONTENT-->


<?php $this->load->view('level-modal'); ?>
<?php $this->load->view('exco-effectiveness-modal'); ?>

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script>
	
	jQuery(document).ready(function() {
		debugger;
		formwizardrisk();
		loadheader();
		renderControl(1);
	    renderControl(2);
		renderControl(3);
		rendertablemitigasi();

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

		$('.select2me').select2({
                allowClear: true,
        })
		
		

	});
	function loadheader(){

		let dtUnit = GetdataUnitAll();
		for (let i = 0; i < dtUnit.length ;i++) {
			//_value += `<option value='` + dtcontrol[a]['id'] + `'>`+ dtcontrol[a]['text'] +` </option>`;
			$('#UNIT_KERJA').append($('<option>', {
				value: dtUnit[i]['code'],
				text: dtUnit[i]['name']
			}));
		}
		$('#UNIT_KERJA').select2({
                allowClear: true,
        })

		$("#UNIT_KERJA").select2("val", $('#UnitCodeID').val());	
		$('#CREATED_AT_YEAR').val(moment().year());
		$('#CREATED_AT_DATE').val(moment().format('LL'));
	
	}
	function formwizardrisk()
	{
		var error  	 = $('.alert-danger');
	    var success  = $('.alert-success');

		$('#form_wizard_1').bootstrapWizard(
			{
	                'nextSelector': '.button-next',
	                'previousSelector': '.button-previous',
	                onTabClick: function (tab, navigation, index, clickedIndex) {
						debugger;
						
	                    return true;
	                    /*
	                    success.hide();
	                    error.hide();
	                    if (form.valid() == false) {
	                        return false;
	                    }
	                    handleTitle(tab, navigation, clickedIndex);
	                    */
	                },
	                onNext: function (tab, navigation, index) {
						debugger;
						
						let dtformcontrol;
						debugger;
						if(index == 1){
							dtformcontrol = Getdataformcontrol(1);
						}
						else if(index == 2){
							dtformcontrol = Getdataformcontrol(2);

						}
						else if(index == 3){
							dtformcontrol = Getdataformcontrol(3);
						}
						for (let i = 0; i < dtformcontrol.length; i++) {
							if(dtformcontrol[i]['IsRequired'] == '1'){
								if($('#' + dtformcontrol[i]['ControlID']).val() == '' ){
								
									Focusclass('form-wizard',1000)
									error.show();
									$('#div' + dtformcontrol[i]['ControlID']).removeClass("form-group has-success").addClass("form-group has-error");							
								
								
									return false;
								}
								else if($('#' + dtformcontrol[i]['ControlID'] +'_K_ID').val() == '' || $('#' + dtformcontrol[i]['ControlID'] +'_D_ID').val() == '' ){
								
									Focusclass('form-wizard',1000)
									error.show();
									$('#div' + dtformcontrol[i]['ControlID']).removeClass("form-group has-success").addClass("form-group has-error");							
								
								
									return false;
								}
								else{
									error.hide();
									$('#div' + dtformcontrol[i]['ControlID']).removeClass("form-group has-error").addClass("form-group has-success");	
								
									//update data ke db

									if(index == 1)
									{
										if($('#RISK_IDENTIFICATION_ID').val()=='0') // insert ke table header
										{
											debugger;
											var formData = new FormData();
											formData.append("UnitKerjaCode", $('#UnitCodeID').val());
											formData.append("PeriodeDate", moment().format('YYYY-MM-DD'));
											var retval = InvokeCodeBehind("risk_identification_worksheet","get_woinsert_tr_worksheet_headerrksheet_form_active_by_WorkSheetFlowID", formData);
											debugger;

										}else{ // update ke table header


										}

									}



									//end update data
														
									
								}

							}

						}
						debugger;
	
						//return false;
	                    // success.hide();
	                    // error.hide();

	                    // if (form.valid() == false) {
	                    //     return false;
	                    // }

	                    // ajaxPostData(form, false);
	                    handleTitle(tab, navigation, index);
	                },
	                onPrevious: function (tab, navigation, index) {
						debugger;
						
	                    // success.hide();
	                    // error.hide();

	                     handleTitle(tab, navigation, index);
	                },
	                onTabShow: function (tab, navigation, index) {
						debugger;


	                    var total = navigation.find('li').length;
	                    var current = index + 1;
	                    var $percent = (current / total) * 100;
	                    $('#form_wizard_1').find('.progress-bar').css({
	                        width: $percent + '%'
	                    });
						if(index == 0){
							$('#form_wizard_1').find('.button-previous').hide();
							$('#form_wizard_1').find('.button-submit').hide();						}
						
						
	                }
	        }
		);
		var handleTitle = function(tab, navigation, index) 
		{
	                var total = navigation.find('li').length;
	                var current = index + 1;
	                // set wizard title
	                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
	                // set done steps
	                jQuery('li', $('#form_wizard_1')).removeClass("done");
	                var li_list = navigation.find('li');
	                for (var i = 0; i < index; i++) {
	                    jQuery(li_list[i]).addClass("done");
	                }

	                if (current == 1) {
	                    $('#form_wizard_1').find('.button-previous').hide();
	                } else {
	                    $('#form_wizard_1').find('.button-previous').show();
	                }

	                if (current >= total) {
	                    $('#form_wizard_1').find('.button-next').hide();
	                    $('#form_wizard_1').find('.button-submit').show();
	                } else {
	                    $('#form_wizard_1').find('.button-next').show();
	                    $('#form_wizard_1').find('.button-submit').hide();
	                }
	                //Metronic.scrollTo($('.page-title'));
	    };

	};
	
	function renderControl(id)
	{
		var _html=``;
		debugger;
		var formData = new FormData();
		formData.append("WorkSheetFlowID", id);
		var dtworksheet = InvokeCodeBehind("risk_identification_worksheet","get_worksheet_form_active_by_WorkSheetFlowID", formData);
		debugger;
		if(dtworksheet.length > 0){

			for (let i = 0; i < dtworksheet.length; i++) {
				let Required = (dtworksheet[i]['IsRequired'] == '1') ? '<span class="required">*</span>' : '';

				if(dtworksheet[i]['ControlTypeID'] == '1'){ // freetext short text
					_html +=`
						<div id="div`+ dtworksheet[i]['ControlID'] +`" class="form-group">
						<label  class="control-label col-md-3 ">`+ dtworksheet[i]['LableName'] +` `+ Required +`</label>
						<div class="col-md-6">
						<input type="text" id="`+ dtworksheet[i]['ControlID'] +`"  class="form-control input-circle"/>
						</div>
						<span><i style="font-size:18px;color:#FBC02D" class="fa fa-info-circle" onclick="informationdetail('Sasaran Organisasi')"></i></span>
						</div>
					`;

				}
				else if(dtworksheet[i]['ControlTypeID'] == '2'){ // freetext long text
					_html +=`
						<div id="div`+ dtworksheet[i]['ControlID'] +`" class="form-group">
						<label class="control-label col-md-3">`+ dtworksheet[i]['LableName'] +` `+ Required +`</label>
						<div class="col-md-6" id="warn">
							<textarea class="form-control input-circle wysihtml5" required rows="6" id="`+dtworksheet[i]['ControlID']+`"></textarea>
						</div>
						<span><i style="font-size:18px;color:#FBC02D" class="fa fa-info-circle" onclick="informationdetail('Sasaran Organisasi')"></i></span>
						</div>
					`;

				}		
				else if(dtworksheet[i]['ControlTypeID'] == '3'){ // dropdowlist
					debugger;
					let onchange_ = '';
					if(dtworksheet[i]['ControlID']=='PertimbanganID'){
						onchange_ = `onchange="getPertimbanganID();"`
					}
					let _value = `<option value="">-- select -- </option>`;
							var formDatadinamis = new FormData();
							formDatadinamis.append("TableName", dtworksheet[i]['TableName']);
							formDatadinamis.append("ID", dtworksheet[i]['IDValue']);
							formDatadinamis.append("Text", dtworksheet[i]['Text']);
							var dtcontrol = InvokeCodeBehind("risk_identification_worksheet","worksheet_control_data_table_master_dinamis", formDatadinamis);
							debugger;
							 if(dtcontrol.length > 0){
							  	for (let a = 0; a < dtcontrol.length; a++) {
									_value += `<option value='` + dtcontrol[a]['id'] + `'>`+ dtcontrol[a]['text'] +` </option>`;
							 	}
								
							  }

					_html +=`
						<div id="div`+ dtworksheet[i]['ControlID'] +`" class="form-group">
							<label class="control-label col-md-3">`+ dtworksheet[i]['LableName'] +` `+ Required +`</label>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">`+ dtworksheet[i]['Icon'] +`</span>
									<select class="form-control select2me" `+ onchange_ +` id="`+ dtworksheet[i]['ControlID'] +`">
										`+ _value +`
									</select>
								</div>
							</div>
						</div>
					`;

				}
				else if(dtworksheet[i]['ControlTypeID'] == '2'){ // datetime
					_html +=`
						<div id="div`+ dtworksheet[i]['ControlID'] +`" class="form-group">
						<label class="control-label col-md-3">`+ dtworksheet[i]['LableName'] +` `+ Required +`</label>
						<div class="col-md-6">
							<textarea class="form-control input-circle wysihtml5" required rows="6" id="`+dtworksheet[i]['ControlID']+`"></textarea>
						</div>
						<span><i style="font-size:18px;color:#FBC02D" class="fa fa-info-circle" onclick="informationdetail('Sasaran Organisasi')"></i></span>
						</div>
					`;

				}					
				else if(dtworksheet[i]['ControlTypeID'] == '7'){ 
					_html +=`
							<div id="div`+ dtworksheet[i]['ControlID'] +`" class="form-group">
								<label class="control-label col-md-3">`+ dtworksheet[i]['LableName'] +` `+ Required +`</label>
								<div class="col-md-2">
									<div class="input-group">
										<span class="input-group-addon input-circle-left">K</span>
										<select class="form-control select2me" id="`+ dtworksheet[i]['ControlID'] +`_K_ID" name="`+ dtworksheet[i]['ControlID'] +`_RISK_K_ID">
											<?php foreach($INHERENT_RISK_K as $key=>$val): ?>
											<?php if($key==$INHERENT_RISK_K_ID) { ?>
											<option value="<?php echo !empty($key) ? $key : ''; ?>" selected="selected"><?php echo !empty($val) ? $val : ''; ?></option>
											<?php } else { ?>
											<option value="<?php echo !empty($key) ? $key : ''; ?>"><?php echo !empty($val) ? $val : ''; ?></option>
											<?php } ?>
											<?php endforeach; ?>
										</select>
									</div>
									<span class="help-block">Level kemungkinan sebelum dilakukan kontrol</span>
								</div>
								<label class="btn btn-circle blue col-md-1 informasi-kemungkinan" onclick="renderInformation()">Informasi</label>
								
								<div class="col-md-2">
									<div class="input-group">
										<span class="input-group-addon input-circle-left">D</span>
										<select class="form-control select2me" id="`+ dtworksheet[i]['ControlID'] +`_D_ID" name="I`+ dtworksheet[i]['ControlID'] +`_D_ID">
											<?php foreach($INHERENT_RISK_D as $key=>$val): ?>
											<?php if($key==$INHERENT_RISK_D_ID) { ?>
											<option value="<?php echo !empty($key) ? $key : ''; ?>" selected="selected"><?php echo !empty($val) ? $val : ''; ?></option>
											<?php } else { ?>
											<option value="<?php echo !empty($key) ? $key : ''; ?>"><?php echo !empty($val) ? $val : ''; ?></option>
											<?php } ?>
											<?php endforeach; ?>
										</select>
									</div>
									<span class="help-block">Level dampak sebelum dilakukan kontrol</span>
								</div>
								<label class="btn btn-circle blue col-md-1 informasi-dampak"  onclick="renderInformationdampak()">Informasi</label>
									</div>
					`;

				}
				else if(dtworksheet[i]['ControlTypeID'] == '8'){
					_html +=`
					<div id="div`+ dtworksheet[i]['ControlID'] +`" class="form-group">
										<label class="control-label col-md-3">`+ dtworksheet[i]['LableName'] +` `+ Required +`</label>
										<div class="col-md-2">
											<div class="input-group">
												<span class="input-group-addon input-circle-left">K</span>
												<input type="text" id="EXCO_EFFECTIVENESS_VALUE_K_ID" name="EXCO_EFFECTIVENESS_VALUE_K_ID" value="<?php echo !empty($EXCO_EFFECTIVENESS_VALUE_K_ID) ? $EXCO_EFFECTIVENESS_VALUE_K_ID : 0; ?>" data-required="1" class="form-control input-circle-right" placeholder="Otomatis" readonly="readonly"/>
											</div>
											<span class="help-block">Skor exco kemungkinan </span>
											<div class="alert alert-success" id="EXCO_EFFECTIVENESS_VALUE_K_ID_INFO"  style="display:none;">
												<span class="label label-sm label-info"><label id="EXCO_EFFECTIVENESS_VALUE_K_ID_TINGKAT"><strong></strong></label></span>
												<label id="EXCO_EFFECTIVENESS_VALUE_K_ID_DESCRIPTION"></label>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-2">
											<div class="input-group">
												<span class="input-group-addon input-circle-left">D</span>
												<input type="text" id="EXCO_EFFECTIVENESS_VALUE_D_ID" name="EXCO_EFFECTIVENESS_VALUE_D_ID" value="<?php echo !empty($EXCO_EFFECTIVENESS_VALUE_D_ID) ? $EXCO_EFFECTIVENESS_VALUE_D_ID : 0; ?>" data-required="1" class="form-control input-circle-right" placeholder="Otomatis" readonly="readonly"/>
											</div>
											<span class="help-block">Skor exco dampak </span>
											<div class="alert alert-success" id="EXCO_EFFECTIVENESS_VALUE_D_ID_INFO"  style="display:none;">
												<span class="label label-sm label-info"><label id="EXCO_EFFECTIVENESS_VALUE_D_ID_TINGKAT"><strong></strong></label></span>
												<label id="EXCO_EFFECTIVENESS_VALUE_D_ID_DESCRIPTION"></label>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-2">
											<div class="btn-group pull-right">
												<button type="button" class="btn btn-circle purple dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
												<i class="fa fa-question-circle"></i> Hitung Nilai EXCO <i class="fa fa-angle-down"></i>
												</button>
												<ul class="dropdown-menu pull-right" role="menu">
													<li>
														<a href="#" onclick="nilaiskorkemungkinan()" class="nilai-skor-kemungkinan">Skor Kemungkinan</a>
													</li>
													<li class="divider"></li>
													<li>
														<a href="#" onclick="nilaiskorkemungkinan()" class="nilai-skor-dampak">Skor Dampak</a>
													</li>
													<li class="divider"></li>
													<li>
														<a href="#" onclick="nilaiskorkd()" class="nilai-skor-k-d">Skor Kemungkinan dan Dampak</a>
													</li>
												</ul>
											</div>
										</div>
										<!--/span-->
									</div>
					
					`;


				}



				//html += dtworksheet[i]['html'];
			}
			$('#contentTab'+ id).html(_html);
		}



		

	};
	function rendertablemitigasi(){
		$('#tblmitigasi').DataTable({
				//data: '',
				columns: [
					{
						data: 'ID',
						render: function (data, type, full, meta) {

							var WorksheetHeaderIDEncode = w2utils.base64encode(full.WorksheetHeaderID);
							var Button = "";
							var button1 = `<button type="button" title="Remove"  class="btn btn-xs red" onclick="DeleteData('` + meta.row + `')"><span><i class ="fa fa-times"></i></span></button>`;
							var button2 = `<button type="button" title="Edit" class="btn btn-xs blue" onclick="PopUpCrud('up','` + meta.row + `')"><span><i class ="fa fa-edit"></i></span></button>`;
							var button3 = `<a title="Configuration" href="<?php echo site_url('master/worksheet/masterworksheet')?>?id=`+ WorksheetHeaderIDEncode +`" class="btn btn-xs green"><span><i class ="fa fa-gears"></i></span></a>`
							
							Button = button1 + button2;       
							return Button;
						}
					},
					{ data: 'TipeKemungkinan', orderable: false, defaultContent: "" },
					{ data: 'RencanaPerlakuan', orderable: false, defaultContent: "" },
					{ data: 'pic', orderable: false, defaultContent: "" },
					{ data: 'sdate', orderable: false, defaultContent: "" },
					{ data: 'edate', orderable: false, defaultContent: "" },
					{ data: 'biaya', orderable: false, defaultContent: "" }



				],
				"columnDefs": [
					{ "width": "70px", "targets": 0 ,"className": 'dt-center'},
				//	{ "width": "60px", "targets": 1 ,"className": "dt-center"},
				],
				//pagingType: "listboxWithButtons",
				//dom: '<"row"lf>rt<"row"ip>',
				order: [2, 'desc'],
				orderCellsTop: true,
				fixedHeader: true,
				"bFilter": false,
				destroy: true,
				paging: false,
				"info":     false
   		 });


	}
	function submitData(){
		debugger;
			var dtlist=[
				{
					'kemungkinan' : $('#RENCANA_PENGENDALIAN').val(),
					'RencanaPerlakuan' :  $('#DAMPAK_RENCANA_PENGENDALIAN').val(),
					'pic' :  $('#PIC_UNIT_KERJA_ID').val(),
					'sdate' :  $('#MULAI_WAKTU').val(),
					'edate' :  $('#TARGET_WAKTU').val(),
					'biaya' :  $('#MITIGATION_COSTS').val(),
					'TipeKemungkinanID' : $('#TIPEKEMUNGKINAN').val(),
					'TipeKemungkinan' : $("#TIPEKEMUNGKINAN option:selected").text()

				}
			]
			var dt = $("#tblmitigasi").DataTable();
			//dt.rows().remove();
			dt.rows.add(dtlist).draw();
			w2popup.close();
	}

	function PopUpCrud(type_,ID)
	{	
									
		debugger;
		var _form = `
			<div class="col-md-12" style="padding:0px;">
				<div class="portlet box green" >
					<div class="portlet-body form">
						<div  class="form-horizontal">
							<div  class="form-body">
								<div class="form-group" hidden>
									<label class="control-label col-md-4">WorkSheetHeaderID <span class="required">
									* </span>
									</label>
									<div class="col-md-8">
										<input type="text" id="WorkSheetHeaderID" value="0" data-required="1" class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Tipe Rencana Perlakuan Risiko </span></label>
									<div class="col-md-8">
									<div class="col-md-8">
										<select class="form-control select2mehidden" id="TIPEKEMUNGKINAN" data-required="1">
															<option value="0">--select--</option>
															<option value="1">Kemungkinan</option>
															<option value="2">Dampak</option>
											</select>	
									</div>		</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">Rencana Perlakuan Risiko <span class="required">*</span></label>
									<div class="col-md-8">
										<textarea class="form-control  wysihtml5hidden" rows="3" id="DAMPAK_RENCANA_PENGENDALIAN" data-required="1"></textarea>
									</div>
								</div>
								<div class="form-group">
		                                        <label class="control-label col-md-3">PIC (Unit Kerja) 1 <span class="required">*</span></label>
		                                        <div class="col-md-6">
													<div class="input-group">
													<span class="input-group-addon input-circle-left"><i class="fa fa-user"></i></span>
														<select class="form-control select2mehidden" id="PIC_UNIT_KERJA_ID" data-required="1">
															<option value="CORPORATE">CORPORATE</option>
														</select>	
													</div>
		                                        </div>
		                        	</div>
									<div class="form-group">
												<label class="control-label col-md-3">Tanggal Mulai <span class="required">*</span></label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon input-circle-left"><i class="fa fa-calendar"></i></span>
														<input type="text" class="form-control input-circle-right date-picker" data-date-format="yyyy-mm-dd" id="MULAI_WAKTU" data-required="1"/>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-md-3">Tanggal Selesai <span class="required">*</span></label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon input-circle-left"><i class="fa fa-calendar"></i></span>
														<input type="text" class="form-control input-circle-right date-picker" data-date-format="yyyy-mm-dd" id="TARGET_WAKTU"  data-required="1"/>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-md-3">Biaya Mitigasi <span class="required">*</span></label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon input-circle-left"><i class="fa fa-money"></i></span>
														<input type="text" class="form-control input-circle-right format-rupiah"  id="MITIGATION_COSTS" data-required="1"/>
													</div>
													<span class="help-block">Input format ( Rp. xxx.xxx.xxx )</span>
												</div>
											</div>

							</div>

							<div class="form-actions" style="margin-top:50px;">
								<div class="row">
									<div class="col-md-offset-2 col-md-9">
									<input type="hidden" id="ActionType" value="in" class="form-control"/>
										<button type="button" class="btn default  pull-right" style="min-width:120px;margin-left:10px" onclick="w2popup.close()">Cancel </button>									
										<button type="button" onclick="submitData()" class="btn green pull-right" style="min-width:120px;" id="save-button" value="Save" name="save-button">Save</button>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										
									</div>
								</div>
							</div>
							
						</div>
						
						
					</div>
				</div>
			</div>



			`;

		w2popup.open({
			title: 'add/edit mitigasi',
			body: '<div class="">'+ _form +'</div>',
			//showMax: true,
			showClose: true,
			modal: true,
			width: 800,
			height: 600,
		})

		$('.date-picker').datepicker({
	            rtl: Metronic.isRTL(),
	            orientation: "left",
	            autoclose: true,
	        });

		$(".wysihtml5hidden").wysihtml5({
            "stylesheets": ["<?php echo base_url() ?>assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"],
            "font-styles": false, //Font styling, e.g. h1, h2, etc.
		    "emphasis": true, //Italics, bold, etc.
		    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.
		    "html": false, //Button which allows you to edit the generated HTML.
		    "link": false, //Button to insert a link.
		    "image": false, //Button to insert an image.
		    "color": false //Button to change color of font
        });
		
		var rupiah = document.getElementById("MITIGATION_COSTS");
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

			
		debugger;
		if(type_ == 'up'){
			var table = $('#tblworksheetheader').DataTable();
    		var rowData = table.row(ID).data();

			$('#ActionType').val(type_);
			$('#WorkSheetHeaderID').val(rowData.WorksheetHeaderID);
			$('#WorksheetName').val(rowData.WorkSheetName);
			$('#StartDate').datepicker("setDate", new Date(dbDatetoStringDate(rowData.StartDate)) );
			$('#EndDate').datepicker("setDate", new Date(dbDatetoStringDate(rowData.EndDate)) );
			$("#IsActive").prop("checked",(rowData.IsActive == '1') ? true : false)
		}


	}

	

		/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}

	function Getdataformcontrol(id){

		debugger;
		var formData = new FormData();
		formData.append("WorkSheetFlowID", id);
		var dtworksheet = InvokeCodeBehind("risk_identification_worksheet","get_worksheet_form_active_by_WorkSheetFlowID", formData);
		return dtworksheet;
	}

	function renderInformation(){
		$('#kemungkinan-modal').modal('show');

	}
	function renderInformationdampak(){
		$('#dampak-modal').modal('show');

	}

	function getPertimbanganID(){
	//alert('dd')
	debugger;
	
		var formData = new FormData();
		formData.append("ID", $("#PertimbanganID").val());
		var getPertimbangankeputusan = InvokeCodeBehind("risk_identification_worksheet","getPertimbangankeputusan", formData);

			$("#KeteranganID").data("wysihtml5").editor.setValue(getPertimbangankeputusan[0]['PertimbanganValue'])
	}
	function GetdataUnitAll(){
		debugger;
		var retval = InvokeCodeBehind("risk_identification_worksheet","getUnitall", null);
		return retval;
	}

</script>
