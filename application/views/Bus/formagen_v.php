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
																		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kode Agen</label>

																		<div class="col-sm-9">
																			<input name="kode_agen" value="<?php echo set_value('kode_agen', isset($default['kode_agen']) ? $default['kode_agen'] : ''); ?>" type="text" class="col-xs-10 col-sm-5" placeholder="wajib diisi" data-bv-trigger="keyup" required data-bv-notempty-message="The first name is required and cannot be empty" maxlength=5 required>
																			<?php echo form_error('kode_agen', '<p class="field_error">', '</p>');?>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Agen</label>

																		<div class="col-sm-9">
																			<input name="nama_agen" value="<?php echo set_value('nama_agen', isset($default['nama_agen']) ? $default['nama_agen'] : ''); ?>" type="text" class="col-xs-10 col-sm-5" placeholder="wajib diisi" data-bv-trigger="keyup" required data-bv-notempty-message="The first name is required and cannot be empty" maxlength=30 required>
																			<?php echo form_error('nama_agen', '<p class="field_error">', '</p>');?>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat Agen</label>

																		<div class="col-sm-9">
																			<input name="alamat_agen" value="<?php echo set_value('alamat_agen', isset($default['alamat_agen']) ? $default['alamat_agen'] : ''); ?>" type="text" class="col-xs-10 col-sm-5" placeholder="wajib diisi" data-bv-trigger="keyup" required data-bv-notempty-message="The first name is required and cannot be empty" maxlength=40 required>
																			<?php echo form_error('alamat_agen', '<p class="field_error">', '</p>');?>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">No Telephone</label>

																		<div class="col-sm-9">
																			<input name="no_telp" value="<?php echo set_value('no_telp', isset($default['no_telp']) ? $default['no_telp'] : ''); ?>" type="text" class="col-xs-10 col-sm-5" placeholder="wajib diisi" data-bv-trigger="keyup" required data-bv-notempty-message="The first name is required and cannot be empty" maxlength=15 required>
																			<?php echo form_error('no_telp', '<p class="field_error">', '</p>');?>
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
						

