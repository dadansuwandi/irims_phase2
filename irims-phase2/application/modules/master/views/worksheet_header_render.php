<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Risk Assessment
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo site_url('welcome'); ?>">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Risk Assessment</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Index</a>
		</li>
	</ul>
</div>
<!-- END PAGE HEADER-->
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
					<a href="javascript:;" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-wizard">
					<div class="form-body">
						<ul class="nav nav-pills nav-justified steps">
								<li class="active">
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
									<i class="fa fa-check"></i> Risk Treatment</span>
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
									<div class="tab-pane active" id="tab1">
										<div class="form-horizontal">
											<div class="form-group">
												<label class="control-label col-md-3">Unit Kerja<span class="required">*</span></label>
												<div class="col-md-6">
													<input type="text" name="USER_LAST_NAME" value="<?php echo !empty($USER_LAST_NAME) ? $USER_LAST_NAME : ''; ?>" class="form-control input-circle" readonly="readonly"/>
												</div>
												
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Tahun<span class="required">*</span></label>
												<div class="col-md-6">
													<input type="text" name="CREATED_AT_YEAR" value="<?php echo !empty($CREATED_AT_YEAR) ? $CREATED_AT_YEAR : ''; ?>" class="form-control input-circle" readonly="readonly"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Tanggal<span class="required">*</span></label>
												<div class="col-md-6">
													<input type="text" name="CREATED_AT_DATE" value="<?php echo !empty($CREATED_AT_DATE) ? $CREATED_AT_DATE : ''; ?>" class="form-control input-circle" readonly="readonly"/>
												</div>
											</div>
											<div id="contentTab1">
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab2">
										<div class="form-horizontal">
											<div id="contentTab2">
											</div>
										</div>

									</div>
									<div class="tab-pane" id="tab3">
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
											<td style="text-align: center">Rencana Perlakuan Risiko (Kemungkinan)</td>
											<td style="text-align: center">Rencana Perlakuan Risiko (Dampak) </td>
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
										<div class="form-horizontal">
											<div id="contentTab3">
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab4">
									
									</div>
							</div>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.w2ui-popup {
   	 z-index: 20000;
	}
	</style>


<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script>
	
	jQuery(document).ready(function() {
		debugger;
		formwizardrisk();
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
		
	});

	function formwizardrisk()
	{
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
	                    success.hide();
	                    error.hide();

	                    if (form.valid() == false) {
	                        return false;
	                    }

	                    ajaxPostData(form, false);
	                    handleTitle(tab, navigation, index);
	                },
	                onPrevious: function (tab, navigation, index) {
	                    success.hide();
	                    error.hide();

	                    handleTitle(tab, navigation, index);
	                },
	                onTabShow: function (tab, navigation, index) {
						

	                    var total = navigation.find('li').length;
	                    var current = index + 1;
	                    var $percent = (current / total) * 100;
	                    $('#form_wizard_1').find('.progress-bar').css({
	                        width: $percent + '%'
	                    });
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
		var dtworksheet = InvokeCodeBehind("worksheet","get_worksheet_form_active_by_WorkSheetFlowID", formData);
		debugger;
		if(dtworksheet.length > 0){
			for (let i = 0; i < dtworksheet.length; i++) {

				_html += dtworksheet[i]['html'];
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
					{ data: 'kemungkinan', orderable: false, defaultContent: "" },
					{ data: 'dampak', orderable: false, defaultContent: "" },
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
					'dampak' :  $('#DAMPAK_RENCANA_PENGENDALIAN').val(),
					'pic' :  $('#PIC_UNIT_KERJA_ID').val(),
					'sdate' :  $('#MULAI_WAKTU').val(),
					'edate' :  $('#TARGET_WAKTU').val(),
					'biaya' :  $('#MITIGATION_COSTS').val(),

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
									<label class="control-label col-md-3">Rencana Perlakuan Risiko (Kemungkinan) <span class="required">*</span></label>
									<div class="col-md-8">
										<textarea class="form-control  wysihtml5hidden" rows="3" id="RENCANA_PENGENDALIAN" data-required="1"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">Rencana Perlakuan Risiko (Dampak) <span class="required">*</span></label>
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

							<div class="form-actions" style="margin-top:75px;">
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
			title: 'Add/edit Worksheet Header',
			body: '<div class="">'+ _form +'</div>',
			//showMax: true,
			showClose: true,
			modal: true,
			width: 800,
			height: 680,
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
</script>