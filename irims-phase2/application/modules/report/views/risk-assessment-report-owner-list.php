<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Risk Progress
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo site_url('welcome'); ?>">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Risk Progress</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Index</a>
		</li>
	</ul>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN FORM FILTER -->
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>Filter
		</div>
		<!-- <div class="tools">
			<a href="javascript:;" class="collapse">
			</a>
			<a href="#portlet-config" data-toggle="modal" class="config">
			</a>
			<a href="javascript:;" class="reload">
			</a>
			<a href="javascript:;" class="remove">
			</a>
		</div> -->
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="" method="POST" class="horizontal-form">
			<div class="form-body">
				<h3 class="form-section">Search with :</h3>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Years</label>
							<input type="text" class="form-control" name="tahun" value="<?php echo !empty($tahun) ? $tahun : date('Y')?>">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Risk Function</label>
							<select class="form-control select2me" name="risk_category_id" required="required">
								<option value="ALL" <?php echo $risk_category_id==="ALL"?"selected='selected'":""?>>ALL</option>
								<?php foreach($risk_category as $key=>$val): ?>
								<?php if($key==$risk_category_id) { ?>
								<option value="<?php echo !empty($key) ? $key : ''; ?>" selected="selected"><?php echo !empty($val) ? $val : ''; ?></option>
								<?php } else { ?>
								<option value="<?php echo !empty($key) ? $key : ''; ?>"><?php echo !empty($val) ? $val : ''; ?></option>
								<?php } ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>

				<div class="row">	
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">State</label>
							<select class="form-control select2me" name="status" required="required">
								<option value="">-- Pilih --</option>
								<option value="ALL" <?php echo $status==="ALL"?"selected='selected'":""?>>Teridentifikasi</option>
								<option value="N" <?php echo $status==="N"?"selected='selected'":""?>>Belum Termitigasi</option>
								<option value="Y" <?php echo $status==="Y"?"selected='selected'":""?>>Termitigasi</option>
							</select>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
			</div>
			<div class="form-actions">
				<button type="submit" class="btn blue"><i class="fa fa-check"></i> Filter</button>
				<a href="<?php echo site_url('report/risk_assessment_report/owner'); ?>" class="btn default">Reset</a>
				<!-- <a href="<?php echo site_url('report/risk_assessment_report/owner_pdf?tahun='.$_POST['tahun'].'&status='.$_POST['status'].'&risk_category_id='.$_POST['risk_category_id']); ?>" class="btn red">Export to PDF<i class="fa fa-file-pdf-o"></i></a>  -->
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
<!-- END FORM FILTER -->
<?php if($search){?>
<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-list"></i>Risk Assessment
		</div>
	</div>
	<div class="portlet-body">
		<div class="overFlowTable">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="hidden-xs" rowspan="2">NO</th>
						<th class="hidden-xs" rowspan="2">RISK REGISTER</th>
						<th class="hidden-xs" rowspan="2">PERISTIWA RISIKO</th>
						<th class="hidden-xs" rowspan="2">PENYEBAB</th>
						<th class="hidden-xs" rowspan="2">DAMPAK</th>
						<th class="hidden-xs" colspan="2">LEVEL</th>
						<th class="hidden-xs" rowspan="2">PENGENDALIAN YANG SUDAH DILAKUKAN</th>
						<th class="hidden-xs" colspan="2">LEVEL</th>
						<th class="hidden-xs" colspan="2">LEVEL</th>
						<th class="hidden-xs" colspan="2">RENCANA PERLAKUAN RISIKO</th>
						<th class="hidden-xs" rowspan="2">PIC (UNIT KERJA)</th>
						<th class="hidden-xs" rowspan="2">TARGET WAKTU</th>
						<th class="hidden-xs" rowspan="2">REALISASI MITIGASI</th>
						<th class="hidden-xs" colspan="2">LEVEL</th>
						<th class="hidden-xs" colspan="2">LEVEL</th>
						<th class="hidden-xs" rowspan="2">JUMLAH RISIKO TER IDENTIFIKASI</th>
						<th class="hidden-xs" rowspan="2">JUMLAH RISIKO TERMITIGASI</th>
						<th class="hidden-xs" rowspan="2">PIC (KANTOR PUSAT)</th>
						<th class="hidden-xs" rowspan="2">KATEGORI RISK</th>
						<th class="hidden-xs" rowspan="2">KATEGORI</th>
					</tr>

					<tr>
						<th class="hidden-xs">K</th>
						<th class="hidden-xs">D</th>
						<th class="hidden-xs">K</th>
						<th class="hidden-xs">D</th>
						<th class="hidden-xs">K</th>
						<th class="hidden-xs">D</th>
						<th class="hidden-xs">KEMUNGKINAN</th>
						<th class="hidden-xs">DAMPAK</th>
						<th class="hidden-xs">K</th>
						<th class="hidden-xs">D</th>
						<th class="hidden-xs">K</th>
						<th class="hidden-xs">D</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$teridentifikasi = 0;
					$termitigasi = 0;
					$summary = array();

					$no = 1;
					foreach ($rows as $risk_item_id => $row):
						$risk_item = $this->risk_item_model->get_by_id($risk_item_id);
					?>
						<?php
							$temp = 1;
							foreach($row['data'] as $d){
								$mitigation = $this->risk_mitigation_model->get_data($d->RISK_IDENTIFICATION_ID);
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<?php if($temp==1){?>
							<td rowspan="<?php echo count($row['data'])?>" style="vertical-align:middle !important"><?php echo $risk_item->name; ?></td>
							<?php } ?>
							<td><a href="<?php echo site_url('report/risk_assessment_report/view/' . $d->RISK_IDENTIFICATION_ID . '/2'); ?>" target="_blank"><font color="blue"><?php echo $d->HAZARD?></font></a></td>
							<td><?php echo $d->PENYEBAB?></td>
							<td><?php echo $d->DAMPAK?></td>
							<td><?php echo $this->risk_probability_model->get_by_id($d->INHERENT_RISK_K_ID)->rating_value;?></td>
							<td><?php echo $this->risk_impact_model->get_by_id($d->INHERENT_RISK_D_ID)->alphabet;?></td>
							<td><?php echo $d->PENGENDALIAN_YANG_TELAH_DILAKUKAN; ?></td>
							<td><?php echo $this->risk_probability_model->get_by_id($d->RESIDUAL_RISK_K_ID)->rating_value;?></td>
							<td><?php echo $this->risk_impact_model->get_by_id($d->RESIDUAL_RISK_D_ID)->alphabet;?></td>
							<?php 
								if($temp==1){
									$risk_rank_inherent = explode(",", $row['nilai_perlakuan']);
							?>
							<td rowspan="<?php echo count($row['data'])?>" style="vertical-align:middle !important"><?php echo $risk_rank_inherent[0]; ?></td>
							<td rowspan="<?php echo count($row['data'])?>" style="vertical-align:middle !important"><?php echo $risk_rank_inherent[1]; ?></td>
							<?php }?>
							<td>
								<?php
									if($mitigation){
										echo "<ol>";
										for ($i=0; $i <= count($mitigation)-1; $i++) { 
											echo "<li>".$mitigation[$i]->RENCANA_PENGENDALIAN."</li>";
										}
										echo "</ol>";
									}else{
										echo "Not Set";
									}
								?>
							</td>
							<td>
								<?php
									if($mitigation){
										echo "<ol>";
										for ($i=0; $i <= count($mitigation)-1; $i++) { 
											echo "<li>".$mitigation[$i]->DAMPAK_RENCANA_PENGENDALIAN."</li>";
										}
										echo "</ol>";
									}else{
										echo "Not Set";
									}
								?>
							</td>
							<td><?php
									if($mitigation){
										echo "<ol>";
										for ($i=0; $i <= count($mitigation)-1; $i++) { 
											echo "<li>".$this->risk_pic_model->get_by_id($mitigation[$i]->PIC_UNIT_KERJA_ID)->name."</li>";
										}
										echo "</ol>";
									}else{
										echo "Not Set";
									}
								?>
							</td>
							<td>
								<?php
									if($mitigation){
										echo "<ol>";
										for ($i=0; $i <= count($mitigation)-1; $i++) { 
											echo "<li>".$mitigation[$i]->TARGET_WAKTU."</li>";
										}
										echo "</ol>";
									}else{
										echo "Not Set";
									}
								?>
							</td>
							<td>
								<?php
									if($mitigation){
										echo "<ol>";
										for ($i=0; $i <= count($mitigation)-1; $i++) { 
											if($mitigation[$i]->REALISASI_MITIGASI!=""){
												echo "<li>".$mitigation[$i]->REALISASI_MITIGASI."</li>";
											}
										}
										echo "</ol>";
									}else{
										echo "Not Set";
									}
								?>
							</td>
							<td><?php echo $this->risk_probability_model->get_by_id($d->MITIGASI_RISK_K_ID)->rating_value; ?></td>
							<td><?php echo $this->risk_impact_model->get_by_id($d->MITIGASI_RISK_D_ID)->alphabet; ?></td>
							<?php 
								if($temp==1){
									$risk_rank_mitigasi = explode(",", $row['nilai_mitigasi']);
							?>
							<td rowspan="<?php echo count($row['data'])?>" style="vertical-align:middle !important"><?php echo $risk_rank_mitigasi[0]; ?></td>
							<td rowspan="<?php echo count($row['data'])?>" style="vertical-align:middle !important"><?php echo $risk_rank_mitigasi[1]; ?></td>
							<?php }?>
							<td><?php echo $d->TERIDENTIFIKASI;?></td>
							<td><?php echo $d->TERMITIGASI;?></td>
							<td>
								<?php
									if($mitigation){
										echo "<ol>";
										for ($i=0; $i <= count($mitigation)-1; $i++) { 
											echo "<li>".$this->risk_pic_model->get_by_id($mitigation[$i]->PIC_KANTOR_PUSAT_ID)->name."</li>";
										}
										echo "</ol>";
									}else{
										echo "Not Set";
									}
								?>
							</td>
							<?php if($temp==1){?>
							<td rowspan="<?php echo count($row['data'])?>" style="vertical-align:middle !important"><?php echo $risk_item->description; ?></td>
							<?php $temp++;}?>
							<td>
								<?php
									$category_risk = $this->risk_category_model->get_by_id($d->RISK_CATEGORY_ID)->name;
									echo $category_risk;
								?>
							</td>
						</tr>
						<?php 
								$teridentifikasi += $d->TERIDENTIFIKASI;
								$termitigasi += $d->TERMITIGASI;

								if(array_key_exists($category_risk, $summary)){
									$summary[$category_risk]['teridentifikasi'] += $d->TERIDENTIFIKASI;
									$summary[$category_risk]['termitigasi'] += $d->TERMITIGASI;
								}else{
									$summary[$category_risk]['teridentifikasi'] = $d->TERIDENTIFIKASI;
									$summary[$category_risk]['termitigasi'] = $d->TERMITIGASI;
								}
							}
						?>
					<?php endforeach; ?>
						<tr>
							<td colspan="21" align="center"><b>JUMLAH</b></td>
							<td><b><?php echo $teridentifikasi?></b></td>
							<td><b><?php echo $termitigasi?></b></td>
							<td colspan="3">&nbsp;</td>
						</tr>
				</tbody>
			</table>

			<table style="width:400px !important" class="table table-striped table-bordered table-hover">
				<tr align="center">
					<td colspan="3"><b>CAPAIAN TARGET</b></td>
				</tr>

				<tr align="center">
					<td>&nbsp</td>
					<td><b>TERIDENTIFIKASI</b></td>
					<td><b>TERMITIGASI</b></td>
				</tr>

				<?php 
				if(array_key_exists('OPSTEK',$summary)){
				?>
				<tr>
					<td>OPSTEK</td>
					<td><?php echo $summary['OPSTEK']['teridentifikasi']?></td>
					<td><?php echo $summary['OPSTEK']['termitigasi']?></td>
				</tr>
				<?php }else{ ?>
				<tr>
					<td>OPSTEK</td>
					<td><?php echo "0"?></td>
					<td><?php echo "0"?></td>
				</tr>
				<?php }?>

				<?php 
				if(array_key_exists('ADKOM',$summary)){
				?>
				<tr>
					<td>ADKOM</td>
					<td><?php echo $summary['ADKOM']['teridentifikasi']?></td>
					<td><?php echo $summary['ADKOM']['termitigasi']?></td>
				</tr>
				<?php }else{ ?>
				<tr>
					<td>ADKOM</td>
					<td><?php echo "0"?></td>
					<td><?php echo "0"?></td>
				</tr>
				<?php }?>

				<tr>
					<td>TOTAL</td>
					<td><?php echo $teridentifikasi?></td>
					<td><?php echo $termitigasi?></td>
				</tr>

				<tr align="center">
					<td><h4><b>TARGET PENCAPAIAN (%)</b></h4></td>
					<td colspan="2"><h2><b>
						<?php
							echo $this->target_pencapaian_model->get_target($unit_id, $tahun);
						?>
					</b></h2></td>
				</tr>
				<tr align="center">
					<td><h4><b>PENCAPAIAN (%)</b></h4></td>
					<td colspan="2"><h2><b>
						<?php
							if($teridentifikasi == 0){
								echo "0";
							}else{
								echo round(($termitigasi/$teridentifikasi)*100, 2);
							} 
						?>
					</b></h2></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php }?>

<style>
	.overFlowTable{
		width: 100%;
		overflow: auto; 
	}
</style>

<script type="text/javascript" charset="utf-8">
	
		//$('.table thead tr')
        //.addClass('filters')
        //.appendTo('#example thead');
 
    var table = $('.table').DataTable({
		
        orderCellsTop: true,
		dom: 'Bfrtip',
		
		buttons: [
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o" style=color:green></i>',
                titleAttr: 'Excel'
            },           
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o" style=color:red></i>',
                titleAttr: 'PDF'
            }
        ],
        initComplete: function () {
            var api = this.api();
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });
		</script>