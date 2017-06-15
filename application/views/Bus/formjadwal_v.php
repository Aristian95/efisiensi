						<div class="main-content">
							<div class="main-content-inner">
								<div class="breadcrumbs" id="breadcrumbs">
									<script type="text/javascript">
										try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
									</script>

									<ul class="breadcrumb">
										<li>
											<i class="ace-icon fa fa-home home-icon"></i>
											<a href="#"><?php echo $h2_title; ?></a>
										</li>
										
										
									</ul><!-- /.breadcrumb -->					
								</div>
								<div class="page-content">
									<div class="row">
										<div class="col-xs-12">
											<!-- PAGE CONTENT BEGINS -->
											<div class="widget-box">
														<div class="widget-header widget-header-large">
																	<b>								
																	<?php 
																	if ( ! empty($link))
																		{
																			
																			foreach($link as $links)
																			{
																				echo $links . ' ';
																			}
																		
																		}
																	
																	?>

																	</b>
															

															<div class="widget-toolbar">
																
																<a href="#" data-action="collapse">
																	<i class="ace-icon fa fa-chevron-up"></i>
																</a>

																<a href="#" data-action="close">
																	<i class="ace-icon fa fa-times"></i>
																</a>
															</div>
														</div>

														<div class="widget-body">
															<div class="widget-main">
																<?php											
																	echo ! empty($message) ? '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Sorry!</strong>' . $message . '</div>': '';
																	$flashmessage = $this->session->flashdata('message');
																	echo ! empty($flashmessage) ? '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Thank You! </strong>' . $flashmessage . '</div>': '';					
																?>
																
																<form class="form-horizontal" action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data">
																	<div class="form-group">
																		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode</label>

																		<div class="col-sm-9">
																			<input class="col-xs-1 disabled" name="id" value="<?php echo set_value('id', isset($default['id']) ? $default['id'] : ''); ?>" type="text" disabled>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kode Jadwal</label>

																		<div class="col-sm-9">
																			<input name="kode_jadwal" value="<?php echo set_value('kode_jadwal', isset($default['kode_jadwal']) ? $default['kode_jadwal'] : ''); ?>" type="text" class="col-xs-10 col-sm-5" placeholder="wajib diisi" data-bv-trigger="keyup" required data-bv-notempty-message="The first name is required and cannot be empty" maxlength=5 required>
																			<?php echo form_error('kode_jadwal', '<p class="field_error">', '</p>');?>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Asal</label>

																		<div class="col-sm-9">
																			<input name="asal" value="<?php echo set_value('asal', isset($default['asal']) ? $default['asal'] : ''); ?>" type="text" class="col-xs-10 col-sm-5" placeholder="wajib diisi" data-bv-trigger="keyup" required data-bv-notempty-message="The first name is required and cannot be empty" maxlength=15 required>
																			<?php echo form_error('asal', '<p class="field_error">', '</p>');?>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tujuan</label>

																		<div class="col-sm-9">
																			<input name="tujuan" value="<?php echo set_value('tujuan', isset($default['tujuan']) ? $default['tujuan'] : ''); ?>" type="text" class="col-xs-10 col-sm-5" placeholder="wajib diisi" data-bv-trigger="keyup" required data-bv-notempty-message="The first name is required and cannot be empty" maxlength=10 required>
																			<?php echo form_error('tujuan', '<p class="field_error">', '</p>');?>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jam Keberangkatan</label>

																		<div class="col-sm-9">
																			<input name="jam_keberangkatan" value="<?php echo set_value('jam_keberangkatan', isset($default['jam_keberangkatan']) ? $default['jam_keberangkatan'] : ''); ?>" type="text" class="col-xs-10 col-sm-5" placeholder="wajib diisi" data-bv-trigger="keyup" required data-bv-notempty-message="The first name is required and cannot be empty" maxlength=10 required>
																			<?php echo form_error('jam_keberangkatan', '<p class="field_error">', '</p>');?>
																		</div>
																	</div>
																	
																	
																	<div class="clearfix form-actions">
																		<div class="col-md-offset-4 col-md-8">
																			<input type="submit" id="tbsave" name="tbsave" value="Submit" class=" btn btn-info">						
																			&nbsp; &nbsp; &nbsp;
																			<button class="btn" type="reset">															
																				Reset
																			</button>
																		</div>
																	</div>
																</form>
																
															</div>
															
																
											
												
											
														</div>
													</div>
											
											<!-- PAGE CONTENT ENDS -->
										</div><!-- /.col -->
									</div><!-- /.row -->
								</div><!-- /.page-content -->
							</div>
						</div><!-- /.main-content -->
						

