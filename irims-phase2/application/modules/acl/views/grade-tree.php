<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Grade Maping <small><?php echo $this->config->item('page_title'); ?></small>
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo site_url('welcome'); ?>">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo site_url('acl/grade/index'); ?>">Grade Maping</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Index</a>
		</li>
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
		<div class="col-md-6">
			<div class="portlet blue-hoki box">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cogs"></i>Grade maping
					</div>
					
				</div>
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-6">
								<div class="btn-group">
									<a href="#" class="btn green" onclick="PopUpCrud('in','0')">Add New <i class="fa fa-plus"></i></a>
								</div>
							</div>
							<!--
							<div class="col-md-6">
								<div class="btn-group pull-right">
									<button class="btn yellow dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
									Tools <i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right" role="menu">
										<li>
											<a href="javascript:;">
											<i class="fa fa-file-pdf-o"></i>
											Save as PDF </a>
										</li>
										<li>
											<a href="javascript:;">
											<i class="fa fa-file-excel-o"></i>
											Export to Excel </a>
										</li>
										<li>
											<a href="javascript:;">
											<i class="fa fa-file-text-o"></i>
											Export to CSV </a>
										</li>
										<li>
											<a href="javascript:;">
											<i class="fa fa-file-code-o"></i>
											Export to XML </a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="javascript:;">
											<i class="fa fa-print"></i>
											Print </a>
										</li>
									</ul>
								</div>
							</div>
							-->
						</div>
					</div>
					<div>
						<table id="tblGradMaping" class="table table-striped table-bordered table-hover" style="width: 100%;">
								<thead>
									<tr>
										<td style="text-align: center">Actions</td>
										<td style="text-align: center">Employee Grade</td>
										<td style="text-align: center">Role Name</td>
									</tr>
								</thead>
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
		
		UITree.init();
		
	});
	function rendertable() {
			$('#tblGradMaping').DataTable({
				//data: '',
				columns: [
					{
						data: 'GradeMapID',
						render: function (data, type, full, meta) {
							var Button = "";
							var button1 = `<button type="button" title="Remove"  class="btn btn-xs red" onclick="DeleteData('` + meta.row + `')"><span><i class ="fa fa-times"></i></span></button>`;
							var button2 = `<button type="button" title="Edit" class="btn btn-xs blue" onclick="PopUpCrud('up','` + meta.row + `')"><span><i class ="fa fa-edit"></i></span></button>`;
							
							Button = button1 + button2;       
							return Button;
						}
					},
					{ data: 'Grade', orderable: false, defaultContent: "" },
					{ data: 'role_name', orderable: false, defaultContent: "" },


				],
				"columnDefs": [
					{ "width": "80px", "targets": 0 },
					{ "width": "200px", "targets": 1 },
				],
				//pagingType: "listboxWithButtons",
				//dom: '<"row"lf>rt<"row"ip>',
				orderCellsTop: true,
				fixedHeader: true,
				searching: true,
				destroy: true,
   		 });

	}

	function loadData(){
		debugger;
		
		var get_grade_list = InvokeCodeBehind("Grade","get_grade_list", null);
		debugger;
		
		var dt = $("#tblGradMaping").DataTable();
		dt.rows().remove();
		dt.rows.add(get_grade_list).draw();
	}
	
	function PopUpCrud(type_,ID){

		var _form = `
		<div class="col-md-12" style="padding:0px;">
			<div class="portlet box green" >
				<div class="portlet-body form">
					<div  class="form-horizontal">
						<div  class="form-body">
							<div class="form-group" hidden>
								<label class="control-label col-md-4">GrademapID <span class="required">
								* </span>
								</label>
								<div class="col-md-7">
									<input type="text" id="GrademapID" value="0" data-required="1" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Employe Grade <span class="required">
								* </span>
								</label>
								<div class="col-md-7">
									<input type="text" id="EmployeegradeID" data-required="1" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Role 	<span class="required">
								* </span>
								</label>
								<div class="col-md-7">
								<select class="form-control select2" name="ddluserRole" id="ddluserRole" style="width:100%">
									<option value="1">Administrator</option>
									<option value="2">Risk Admin</option>
									<option value="3">Risk Analis</option>
									<option value="9">Risk Owner</option>
									<option value="11">Viewer</option>
								</select>
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
			title: 'Add/edit grade maping',
			body: '<div class="">'+ _form +'</div>',
			//showMax: true,
			showClose: true,
			modal: true,
			width: 600,
      		height: 230,
    	})
       debugger;


	   var get_role_list = InvokeCodeBehind("Grade","get_role_list", null);
	   var arr_ = [{id:0, text: "red"}, {id:1, text: "blue"}];
	   $('#ddluserRole').select2({
                allowClear: true,
                //data: Select2DataTable(get_role_list, 'name', 'id', '')
				//data: dddddd
        })
		debugger;

		if(type_ == 'up'){
			var table = $('#tblGradMaping').DataTable();
    		var rowData = table.row(ID).data();

			$('#ActionType').val(type_);
			$('#GrademapID').val(rowData.GradeMapID);
			$('#EmployeegradeID').val(rowData.Grade);
			$("#ddluserRole").select2("val", rowData.RoleID);
			
		}
	}
    function submitData(){

		var type_ = $('#ActionType').val();
		if($('#EmployeegradeID').val()==''){
			showvalidation(2,'EmployeegradeID','Data harus diisi!')
		}else if($('#ddluserRole').val()==''){
			showvalidation(1,'ddluserRole','Data harus diisi!')
		}else{
			debugger;
			if(type_ == 'up'){
				UpdateData();
			}else{
				InsertData()
			}


		}

	}
	function InsertData(){
		debugger;
	
		var formData = new FormData();
		formData.append("Grade", $('#EmployeegradeID').val());
		formData.append("RoleID",  $('#ddluserRole').val());
		var get_grade_list = InvokeCodeBehind("Grade","insert_grade_maping", formData);
		debugger;
		if(get_grade_list == true){
			w2popup.close();
			loadData();
		}
		
	}
	function UpdateData(){
		var formData = new FormData();
		formData.append("GradeMapID", $('#GrademapID').val());
		formData.append("Grade", $('#EmployeegradeID').val());
		formData.append("RoleID",  $('#ddluserRole').val());
		var update_grade_maping = InvokeCodeBehind("Grade","update_grade_maping", formData);
		debugger;
		if(update_grade_maping == true){
			w2popup.close();
			loadData();
		}
		
	}
	function DeleteData(ID){


		w2confirm('Are you sure to delete this data?')
        .yes(() => { 
			var table = $('#tblGradMaping').DataTable();
			var rowData = table.row(ID).data();
			debugger
			var formData = new FormData();
			formData.append("GradeMapID", rowData.GradeMapID);
			var delete_grade_maping = InvokeCodeBehind("Grade","delete_grade_maping", formData);
			debugger;
			if(delete_grade_maping == true){
				w2popup.close();
				loadData();
			}

		 })
        .no(() => { console.log('no') })



	}
</script>
<!-- END JAVASCRIPTS -->

<!-- ------------------------ -->
