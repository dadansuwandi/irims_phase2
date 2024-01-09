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
			<a href="<?php echo site_url('worksheet/worksheet_form/index'); ?>">Worksheet Header</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Workseet Header</a>
		</li>
	</ul>

</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i> Worksheet Header
					</div>
					
				</div>
				<div class="portlet-body">
					<div class="row" >
						<div class="form-horizontal">
							<div class="form-body">
								<div class="form-group">
									<label class="control-label col-md-2">Worksheet Name<span class="required">*</span></label>
									<div class="col-md-3">
										<input type="text" id="Worksheetname" class="form-control input-circle"  readonly="readonly"/>
									</div>
									
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Periode Date<span class="required">*</span></label>
									<div class="col-md-2">
										<input type="text" id="Sdate" class="form-control input-circle" readonly="readonly"/>
									</div>
									<div class="col-md-2">
										<input type="text" id="Edate" class="form-control input-circle" readonly="readonly"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Is Active<span class="required">*</span></label>
									<div class="col-md-3">
										<lable id="lblActive"  class="form-control input-circle">Not Active</lable>
									</div>
									
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
				
				
			</div>
			
		</div>
	

		<div class="col-md-12"><!-- FRR01-Konteks-->
			<div class="portlet blue-hoki box">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-file"></i> 1. Penetapan Lingkup, Konteks, & Kriteria
					</div>
					<div class="tools hidden-xs">
						<a href="javascript:;" class="collapse">
						</a>						
					</div>
					
				</div>
				<div class="portlet-body" >
					<div class="table-toolbar">
						<!-- <div class="row">
							<div class="col-md-6">
								<div class="btn-group">
									<a href="#" class="btn green" onclick="PopUpCrud('in','0')">Add New <i class="fa fa-plus"></i></a>
								</div>
							</div>
							
						</div>-->
					</div> 
					<div style="min-height:200px;">
							<div>
								<table id="tblFRR01" class="table table-striped table-bordered table-hover" style="width: 100%;">
									<thead>
										<tr>
											<td style="text-align: center">Actions</td>		
											<td style="text-align: center">Active Control</td>	
											<td style="text-align: center">sequence Control</td>
											<td style="text-align: center">Lable Name</td>
										</tr>

									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="col-md-12"><!-- FRR01-Konteks-->
			<div class="portlet blue-hoki box">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-file"></i> 2. Risk Assessment
					</div>
					<div class="tools hidden-xs">
						<a href="javascript:;" class="collapse">
						</a>						
					</div>
					
				</div>
				<div class="portlet-body" >
					<div class="table-toolbar">
						<!-- <div class="row">
							<div class="col-md-6">
								<div class="btn-group">
									<a href="#" class="btn green" onclick="PopUpCrud('in','0')">Add New <i class="fa fa-plus"></i></a>
								</div>
							</div>
							
						</div>-->
					</div> 
					<div style="min-height:200px;">
							<div>
								<table id="tblFRR02" class="table table-striped table-bordered table-hover" style="width: 100%;">
									<thead>
									<tr>
											<td style="text-align: center">Actions</td>		
											<td style="text-align: center">Active Control</td>	
											<td style="text-align: center">sequence Control</td>
											<td style="text-align: center">Lable Name</td>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="col-md-12"><!-- FRR01-Konteks-->
			<div class="portlet blue-hoki box">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-file"></i> 3.  Risk Treatment
					</div>
					<div class="tools hidden-xs">
						<a href="javascript:;" class="collapse">
						</a>						
					</div>
					
				</div>
				<div class="portlet-body" >
					<div class="table-toolbar">
						<!-- <div class="row">
							<div class="col-md-6">
								<div class="btn-group">
									<a href="#" class="btn green" onclick="PopUpCrud('in','0')">Add New <i class="fa fa-plus"></i></a>
								</div>
							</div>
							
						</div>-->
					</div> 
					<div style="min-height:200px;">
							<div>
								<table id="tblFRR03" class="table table-striped table-bordered table-hover" style="width: 100%;">
									<thead>
									<tr>
											<td style="text-align: center">Actions</td>		
											<td style="text-align: center">Active Control</td>	
											<td style="text-align: center">sequence Control</td>
											<td style="text-align: center">Lable Name</td>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
			
		</div>
		
		


			
	</div>
</div>
<!-- END PAGE CONTENT-->


<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script>
	//  	
	//alert('ss');
	jQuery(document).ready(function() {    
		//rendertable();
		//loadData();
		$('.datepicker').datepicker({
	            rtl: Metronic.isRTL(),
	            orientation: "left",
	            autoclose: true,
	    });
		
		loadDataHeader();
		rendertable('FRR01');
		rendertable('FRR02');
		rendertable('FRR03');
		LoadData(1,'FRR01');
		LoadData(2,'FRR02');
		LoadData(3,'FRR03');
	//	UITree.init();
	
		
	});
	function loadDataHeader()
	{
		debugger;
		var WorksheetHeaderID  = w2utils.base64decode(getParameterByName('id'));
		var formData = new FormData();
			formData.append("WorksheetHeaderID", WorksheetHeaderID);
			var get_worksheetHeader_by_id = InvokeCodeBehind("worksheet_form","get_worksheetHeader_by_id", formData);
		debugger;
			$('#Worksheetname').val(get_worksheetHeader_by_id[0]['WorkSheetName']);
			$('#Sdate').val(dbDatetoStringFormat(get_worksheetHeader_by_id[0]['StartDate'],'ll'));
			$('#Edate').val(dbDatetoStringFormat(get_worksheetHeader_by_id[0]['EndDate'],'ll'));
			if(get_worksheetHeader_by_id[0]['IsActive'] == 1){
				$('#lblActive').text('Active Worksheet');
				$('#lblActive').attr('style', 'background-color :#26a69a;color:white;');
				// style="background-color :#26a69a;"
			}
			
	}
	function rendertable(ID) {
	
			$('#tbl' + ID).DataTable({
				//data: dt,
				columns: [
					{
						data: 'WorksheetFormID',
						render: function (data, type, full, meta) {
							var Button = "";
							//var button1 = `<button type="button" title="Remove"  class="btn btn-xs red" onclick="DeleteData('` + meta.row + `')"><span><i class ="fa fa-times"></i></span></button>`;
							var button2 = `<button type="button" title="Edit" class="btn btn-xs blue" onclick="PopUpCrud('up','` + meta.row + `','`+ ID +`')"><span><i class ="fa fa-edit"></i></span></button>`;
							
							Button = button2;       
							return Button;
						}
					},	
					{
						data: 'IsActive',
						render: function (data, type, full, meta) {
							var _html = "";
							var chckbx = `<span style="color:#f39c12;"><i class="fa fa-close"></i></span>`;
							if(full.IsActive == '1')							
							{

								chckbx = `<span style="color:#00a65a;"><i class="fa fa-check"></i></span>`;
							}
						      
							 _html = chckbx;

							return _html;
						}
					},
					{ data: 'Sequence', orderable: false, defaultContent: "" },
					{ data: 'LableName', orderable: false, defaultContent: "" },



				],
				"columnDefs": [
					{ "width": "120px", "targets": 0 ,className: 'dt-center'},
					{ "width": "120px", "targets": 1 },
				    { "width": "120px", "targets": 2 },
					//{ "width": "60px", "targets": 4 },
				],
				//pagingType: "listboxWithButtons",
				//dom: '<"row"lf>rt<"row"ip>',
				orderCellsTop: true,
				fixedHeader: true,
				searching: true,
				destroy: true,
   		 });

	}	
	function LoadData(flowType,ID)
	{
		
		debugger;
		var WorksheetHeaderID  = w2utils.base64decode(getParameterByName('id'));
		var formData = new FormData();
			formData.append("WorksheetHeaderID", WorksheetHeaderID);
			formData.append("WorkSheetFlowID",flowType);
			var get_worksheetmaster_By_WorkSheetFlowID = InvokeCodeBehind("worksheet_form","get_worksheetmaster_By_WorkSheetFlowID", formData);
		debugger;
		
		var dt = $("#tbl" + ID).DataTable();
		dt.rows().remove();
		dt.rows.add(get_worksheetmaster_By_WorkSheetFlowID).draw();

	}

	function PopUpCrud(type_,ID,tblname)
	{	
									
		debugger;
		var _form = `
			<div class="col-md-12" style="padding:0px;">
				<div class="portlet box green" style="height:100px" >
					<div class="portlet-body form">
						<div  class="form-horizontal">
							<div  class="form-body">
								<div class="form-group" hidden>
									<label class="control-label col-md-4">WorksheetFormID<span class="required">
									* </span>
									</label>
									<div class="col-md-8">
										<input type="text" id="WorksheetFormID" value="0" data-required="1" class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Lable Name<span class="required">
									* </span>
									</label>
									<div class="col-md-8">
										<input type="text" id="LableName" data-required="1" class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Sequence form<span class="required">
									* </span>
									</label>
									<div class="col-md-8">
										<input type="number" id="Sequence" data-required="1" class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Sequence column<span class="required">
									* </span>
									</label>
									<div class="col-md-8">
										<input type="number" id="Sequencecolumn" data-required="1" class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Active Form</label>
									<div class="col-md-1">
											<input type="checkbox" id="IsActive" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Active Column</label>
									<div class="col-md-1">
											<input type="checkbox" id="ActiveColumn" class="form-control">
									</div>
								</div>


							</div>

							<div class="form-actions" style="margin-top:20px;">
								<div class="row">
									<div class="col-md-offset-2 col-md-9 ">
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
			width: 600,
			height: 400,
		})

		$('.datepicker').datepicker({
	            rtl: Metronic.isRTL(),
	            orientation: "left",
	            autoclose: true,
	        });
		
	    var dt =[{'id': '1', 'text' : 'heavy'}]
		$('#ddluserRole').select2({
                allowClear: true,
				data : dt
                //data: Select2DataTable(get_role_list, 'name', 'id', '')
				//data: dddddd
        })
		
			
		debugger;
		if(type_ == 'up'){
			var table = $('#tbl' + tblname).DataTable();
    		var rowData = table.row(ID).data();

			$('#ActionType').val(type_);
			$('#WorksheetFormID').val(rowData.WorksheetFormID);
			$('#LableName').val(rowData.LableName);
			$('#Sequence').val(rowData.Sequence);
			$('#Sequencecolumn').val(rowData.sequencecolumn);
			$("#IsActive").prop("checked",(rowData.FormActive == '1') ? true : false)
			$("#ActiveColumn").prop("checked",(rowData.ActiveColumn == '1') ? true : false)
		}

		
	}
	function submitData(){
		var type_ = $('#ActionType').val();
		if($('#Sequence').val()==''){
			showvalidation(1,'Sequence','Sequence harus diisi!')
		}else{
			   debugger;
				var formData = new FormData();
				formData.append("WorksheetFormID", $('#WorksheetFormID').val());
				formData.append("Sequence", $('#Sequence').val());
				formData.append("Sequencecolumn", $('#Sequencecolumn').val());
				formData.append("IsActive",  ($("#IsActive").prop("checked") == true) ? '1' : '0');
				formData.append("ActiveColumn",  ($("#ActiveColumn").prop("checked") == true) ? '1' : '0');
				var update_worksheet_form = InvokeCodeBehind("worksheet","update_worksheet_form", formData);
				debugger;
				if(update_worksheet_form == true){
					w2popup.close();
					LoadData(1,'FRR01');
					LoadData(2,'FRR02');
					LoadData(3,'FRR03');
				}

		}
	}
</script>
<!-- END JAVASCRIPTS -->

<!-- ------------------------ -->
