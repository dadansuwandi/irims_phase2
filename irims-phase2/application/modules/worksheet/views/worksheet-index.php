<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Worksheet Header <small><?php echo $this->config->item('page_title'); ?></small>
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo site_url('welcome'); ?>">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<!-- <li>
			<a href="<?php echo site_url('acl/grade/index'); ?>">Master</a>
			<i class="fa fa-angle-right"></i>
		</li> -->
		<li>
			<a href="#">Workseet Header</a>
		</li>
	</ul>
	
	
	
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
		<div class="col-md-12">
			<div class="portlet box blue-hoki">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cogs"></i>Worksheet
					</div>
					
				</div>
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-6">
								<div class="btn-group">
								<!-- <a href="<?php echo site_url('master/worksheet/masterworksheet'); ?>" class="btn green">Add Worksheet Header <i class="fa fa-plus"></i></a> -->
								<a href="#" onclick="PopUpCrud('in','0')" class="btn green">Add Worksheet Header <i class="fa fa-plus"></i></a>
								</div>
							</div>
							
						</div>
					</div>
						<div>
							<table id="tblworksheetheader" class="table table-striped table-bordered table-hover" style="width: 100%;">
									<thead>
										<tr>
											<td style="text-align: center">Actions</td>
											<td style="text-align: center">Is Active</td>
											<td style="text-align: center">Worksheet Name</td>
											<td style="text-align: center">Start Date</td>	
											<td style="text-align: center">End Date</td>	
											<td style="text-align: center">Created By</td>
											<td style="text-align: center">Created Date</td>
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
<!-- END PAGE CONTENT-->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script> 
	jQuery(document).ready(function() {   
		
		
		rendertable();
		loadData();
		//UITree.init();
		
	});
	function rendertable() {
			$('#tblworksheetheader').DataTable({
				//data: '',
				columns: [
					{
						data: 'WorksheetHeaderID',
						render: function (data, type, full, meta) {

							var WorksheetHeaderIDEncode = w2utils.base64encode(full.WorksheetHeaderID);
							var Button = "";
							var button1 = `<button type="button" title="Remove"  class="btn btn-xs red" onclick="DeleteData('` + meta.row + `')"><span><i class ="fa fa-times"></i></span></button>`;
							var button2 = `<button type="button" title="Edit" class="btn btn-xs blue" onclick="PopUpCrud('up','` + meta.row + `')"><span><i class ="fa fa-edit"></i></span></button>`;
							var button3 = `<a title="Configuration" href="<?php echo site_url('worksheet/worksheet_form/index')?>?id=`+ WorksheetHeaderIDEncode +`" class="btn btn-xs green"><span><i class ="fa fa-gears"></i></span></a>`
							
							Button = button1 + button2 + button3;       
							return Button;
						}
					},
					{
						data: 'IsActive',
						render: function (data, type, full, meta) {
							var _html = "";
							var chckbx = ``;
							if(full.IsActive == '1')
							{

								chckbx = `<span style="color:green;"><i class="fa fa-check"></i></span>`;
							}
						      
							 _html = chckbx;

							return _html;
						}
					},					
					{ data: 'WorkSheetName', orderable: false, defaultContent: "" },
					{
						data: 'StartDate',
						render: function (data, type, full, meta) {
							debugger;
					
							var SDate = new Date(full.StartDate);
							var SdateObj = moment(SDate, 'MM-DD-YYYY');
							var Sdate_ = SdateObj.format('ll');

							var _html = Sdate_;
							
							return _html;
						}
					},		
					{
						data: 'EndDate',
						render: function (data, type, full, meta) {
							debugger;
					
							var EDate = new Date(full.EndDate);
							var EdateObj = moment(EDate, 'MM-DD-YYYY');
							var Edate_ = EdateObj.format('ll');

							var _html = Edate_;
							
							return _html;
						}
					},			
					{ data: 'CreatedBy', orderable: false, defaultContent: "" },
					{ data: 'CreatedDate', orderable: false, defaultContent: "" },
					// { data: 'role_name', orderable: false, defaultContent: "" }



				],
				"columnDefs": [
					{ "width": "120px", "targets": 0 ,"className": 'dt-center'},
					{ "width": "60px", "targets": 1 ,"className": "dt-center"},
				],
				//pagingType: "listboxWithButtons",
				//dom: '<"row"lf>rt<"row"ip>',
				orderCellsTop: true,
				fixedHeader: true,
				searching: true,
				destroy: true,
   		 });

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
									<label class="control-label col-md-4">WorkSheet Name<span class="required">
									* </span>
									</label>
									<div class="col-md-8">
										<input type="text" id="WorksheetName" data-required="1" class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Periode Date<span class="required">*</span></label>
									<div class="col-md-4">
										<input type="text" id="StartDate" class="form-control  datepicker" />
									</div>
									<div class="col-md-4">
										<input type="text" id="EndDate" class="form-control datepicker" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Is Active</label>
									<div class="col-md-1">
											<input type="checkbox" id="IsActive" class="form-control">
									</div>
								</div>
							</div>

							<div class="form-actions">
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
			height: 280,
		})

		$('.datepicker').datepicker({
	            rtl: Metronic.isRTL(),
	            orientation: "left",
	            autoclose: true,
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
	
	function loadData(){
		debugger;
		
		var get_worksheetHeader = InvokeCodeBehind("worksheet_header","get_worksheetHeader", null);
		debugger;
		
		var dt = $("#tblworksheetheader").DataTable();
		dt.rows().remove();
		dt.rows.add(get_worksheetHeader).draw();
	}
	function submitData(){

			var type_ = $('#ActionType').val();
			if($('#WorksheetName').val()==''){
				showvalidation(1,'WorksheetName','WorkSheet Name harus diisi!')
			}else if($('#StartDate').val()==''){
				showvalidation(1,'StartDate','Periode harus diisi!')
			}else if($('#EndDate').val()==''){
				showvalidation(1,'EndDate','Periode harus diisi!')
			}else{
				debugger;
				if(type_ == 'up'){
					UpdateData();
				}else{
					InsertData()

				}


			}

	}
	function InsertData()
	{
		debugger;

		 
		
	    	var formData = new FormData();
			formData.append("WorkSheetName", $('#WorksheetName').val());
			formData.append("StartDate",StringDatetodbDate($('#StartDate').val()));
			formData.append("EndDate",  StringDatetodbDate($('#EndDate').val()));
			formData.append("IsActive",  ($("#IsActive").prop("checked") == true) ? '1' : '0');
			formData.append("CreatedBy", 'admin' );
			formData.append("CreatedDate", '2023-12-23');
			var insert_WorkHeader = InvokeCodeBehind("worksheet_header","insert_WorkHeader", formData);
			debugger;
			if(insert_WorkHeader == true){
				w2popup.close();
				loadData();
			}

	}
		function UpdateData(){
			debugger;
				var formData = new FormData();
				formData.append("WorksheetHeaderID", $('#WorkSheetHeaderID').val());
				formData.append("WorkSheetName", $('#WorksheetName').val());
				formData.append("StartDate",  StringDatetodbDate($('#StartDate').val()));
				formData.append("EndDate",  StringDatetodbDate($('#EndDate').val()));
				formData.append("IsActive",  ($("#IsActive").prop("checked") == true) ? '1' : '0');
				formData.append("CreatedBy", 'admin' );
				formData.append("CreatedDate", '2023-12-23');
				var update_worksheetheader = InvokeCodeBehind("worksheet_header","update_worksheetheader", formData);
				debugger;
				if(update_worksheetheader == true){
					w2popup.close();
					loadData();
				}

		}
		function DeleteData(ID)
		{


			w2confirm('Are you sure to delete this data?')
			.yes(() => { 
				var table = $('#tblworksheetheader').DataTable();
				var rowData = table.row(ID).data();
				debugger
				var formData = new FormData();
				formData.append("WorksheetHeaderID", rowData.WorksheetHeaderID);
				var delete_workSheetheader = InvokeCodeBehind("worksheet_header","delete_workSheetheader", formData);
				debugger;
				if(delete_workSheetheader == true){
					w2popup.close();
					loadData();
				}

			})
			.no(() => { console.log('no') })



		}
</script>
<!-- END JAVASCRIPTS -->

<!-- ------------------------ -->
