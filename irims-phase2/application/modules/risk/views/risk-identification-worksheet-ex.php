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
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list"></i>Risk Assessment
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="row">
						<div class="col-md-6">
							<div class="btn-group">
								<a href="<?php echo site_url('risk/risk_identification/add'); ?>" class="btn btn-circle green">Buat Kertas Kerja<i class="fa fa-plus"></i></a>
							</div>
						</div>
					</div>
					<br/>
					<div class="overFlowTable">
					<table id="tblRiskAssesment" class="table table-striped table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
							<th class="hidden-xs" rowspan="2">NO</th>
							<th class="hidden-xs" rowspan="2">STATUS</th>
							<th class="hidden-xs" rowspan="2">SASARAN ORGANISASI/PROSES BISNIS</th>
							<th class="hidden-xs" colspan="2">RISIKO</th>
							<th class="hidden-xs" rowspan="2">PENYEBAB</th>
							<th class="hidden-xs" rowspan="2">DAMPAK</th>
							<th class="hidden-xs" rowspan="2">JENIS RISIKO</th>
							<th class="hidden-xs" colspan="3">INHERENT RISK</th>
							<th class="hidden-xs" rowspan="2">PENGENDALIAN YANG SUDAH DILAKUKAN (EXISTING CONTROL)</th>
							<th class="hidden-xs" colspan="2">NILAI EFEKTIVITAS EXCO</th>
							<th class="hidden-xs" colspan="3">CURRENT RISK</th>
							<th class="hidden-xs" colspan="2">RENCANA PERLAKUAN RISIKO</th>
							<th class="hidden-xs" colspan="3">TARGET RESIDUAL RISK</th>
							<th class="hidden-xs" rowspan="2">BIAYA MITIGASI</th>
							<th class="hidden-xs" colspan="2">RENCANA JADWAL PENANGANAN RISIKO</th>
							<th class="hidden-xs" rowspan="2">PIC (UNIT KERJA)</th>
							<th class="hidden-xs" rowspan="2">TANGGAL REGISTER</th>
						</tr>

						<tr>
							<th class="hidden-xs">RISK REGISTER</th>
							<th class= "hidden-xs">RISK EVENT</th>

							<th class="hidden-xs">K</th>
							<th class="hidden-xs">D</th>
							<th class="hidden-xs">NILAI (K x D)</th>

							<th class="hidden-xs">K</th>
							<th class="hidden-xs">D</th>
							
							<th class="hidden-xs">K</th>
							<th class="hidden-xs">D</th>
							<th class="hidden-xs">NILAI (K x D)</th>

							<th class="hidden-xs">KEMUNGKINAN</th>
							<th class="hidden-xs">DAMPAK</th>
							<th class="hidden-xs">K</th>
							<th class="hidden-xs">D</th>
							<th class="hidden-xs">NILAI (K x D)</th>
							<th class="hidden-xs">MULAI</th>
							<th class="hidden-xs">SELESAI</th>
						</tr>
					</thead>
   					</table>
					<div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	//new DataTable('#example');


	  jQuery(document).ready(function() {    
		///renderTable();
		rendertableasesment();
		loadData();
		
		
	});

	function rendertableasesment()
	{
		$('#tblRiskAssesment').DataTable({
		width: '9000px',		
		columns: [
					{ data: 'Grade', orderable: false, defaultContent: "" },
					{ data: 'STATUS_DOKUMEN_ID', orderable: false, defaultContent: "" },
					{ data: 'OBJECTIVE', orderable: false, defaultContent: "" },
					{ data: 'RISK_ITEM_ID', orderable: false, defaultContent: "" },
					{
						data: 'HAZARD',
						render: function (data, type, full, meta) {
							let txt = full.HAZARD;
							let result = w2utils.stripTags(txt.substring(0, 100));
							var _html = (full.HAZARD.length > '20') ? result + ` ...<i style="font-size:18px;color:#FBC02D" class="fa fa-info-circle" onclick="informationdetail('HAZARD','` + meta.row + `')"></i>` : full.HAZARD ;    
							return _html;
						}
					},
					{
						data: 'PENYEBAB',
						render: function (data, type, full, meta) {
							let txt = full.PENYEBAB;
							let result = w2utils.stripTags(txt.substring(0, 100));
							var _html = (full.PENYEBAB.length > '20') ? result + ` ...<i style="font-size:18px;color:#FBC02D" class="fa fa-info-circle" onclick="informationdetail('PENYEBAB','` + meta.row + `')"></i>` : full.PENYEBAB ;    
							return _html;
						}
					},
					{
						data: 'DAMPAK',
						render: function (data, type, full, meta) {
							let txt = full.DAMPAK;
							let result = w2utils.stripTags(txt.substring(0, 100));
							var _html = (full.DAMPAK.length > '20') ? result + ` ...<i style="font-size:18px;color:#FBC02D" class="fa fa-info-circle" onclick="informationdetail('DAMPAK','` + meta.row + `')"></i>` : full.DAMPAK ;    
							return _html;
						}
					},
					//{ data: 'HAZARD', orderable: false, defaultContent: "" },
					//{ data: 'PENYEBAB', orderable: false, defaultContent: "" },
					//{ data: 'DAMPAK', orderable: false, defaultContent: "" },
					{ data: 'RISK_CATEGORY_ID', orderable: false, defaultContent: "" },
					{ data: 'INHERENT_RISK_K_ID', orderable: false, defaultContent: "" },
					{ data: 'INHERENT_RISK_D_ID', orderable: false, defaultContent: "" },
					{ data: 'INHERENT_RISK_K_ID', orderable: false, defaultContent: "" },
					{ data: 'PENGENDALIAN_YANG_TELAH_DILAKUKAN', orderable: false, defaultContent: "" },
					{ data: 'EXCO_EFFECTIVENESS_VALUE_K_ID', orderable: false, defaultContent: "" },
					{ data: 'EXCO_EFFECTIVENESS_VALUE_D_ID', orderable: false, defaultContent: "" },
					{ data: 'RESIDUAL_RISK_K_ID', orderable: false, defaultContent: "" },
					{ data: 'RESIDUAL_RISK_D_ID', orderable: false, defaultContent: "" },
					{ data: 'RESIDUAL_RISK_K_ID', orderable: false, defaultContent: "" },
					{ data: 'role_name', orderable: false, defaultContent: "" },
					{ data: 'role_name', orderable: false, defaultContent: "" },
					{ data: 'TARGET_RESIDUAL_RISK_K_ID', orderable: false, defaultContent: "" },
					{ data: 'TARGET_RESIDUAL_RISK_D_ID', orderable: false, defaultContent: "" },
					{ data: 'TARGET_RESIDUAL_RISK_K_ID', orderable: false, defaultContent: "" },
					{ data: 'role_name', orderable: false, defaultContent: "" },
					{ data: 'role_name', orderable: false, defaultContent: "" },
					{ data: 'role_name', orderable: false, defaultContent: "" },
					{ data: 'role_name', orderable: false, defaultContent: "" },
					{ data: 'role_name', orderable: false, defaultContent: "" },


				],
				"columnDefs": [
					{ "width": "20px", "targets": 0 },
					{ "width": "180px", "targets": 1 },
					{ "width": "200px", "targets": 3},
					{ "width": "200px", "targets": 4 },
					{ "width": "200px", "targets": 5 },
					{ "width": "200px", "targets": 6 },
				],
				"bFilter": false,
				//pagingType: "listboxWithButtons",
				//dom: '<"row"lf>rt<"row"ip>',
				paging: false,
				scrollCollapse: true,
				scrollY: '1000px',
				scrollX: true,
				fixedColumns: {
					left: 3
					},
				
 	 	});


	}
	function loadData(){
		debugger;
		
		var get_grade_list = InvokeCodeBehind("risk_identification_worksheet","get_list_owner", null);
		debugger;
		
		var dt = $("#tblRiskAssesment").DataTable();
		dt.rows().remove();
		dt.rows.add(get_grade_list).draw();
	}
	function informationdetail(tipe,id){

		var table = $('#tblRiskAssesment').DataTable();
    		var rowData = table.row(id).data();
		var _form = `
			<div class="col-md-12" style="padding:20px;">
			`+ rowData[tipe] +`
			</div>



			`;
    debugger;
		w2popup.open({
			title: 'details',
			body: '<div class="">'+ _form +'</div>',
			//showMax: true,
			showClose: true,
			//modal: true,
			width: 600,
			height: 400,
		})
	
	}
</script>