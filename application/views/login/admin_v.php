 <div class="container-fluid-full">
        <div class="row-fluid">
                    
            <div class="row-fluid">
                <div class="login-box">
                    <div class="icons">
                        <a href="#"><?php echo $h2_title; ?><i class="halflings-icon home"></i></a>                      
                    </div>
                    <h2>Login to your account</h2>
                    <?php											
																	echo ! empty($message) ? '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Sorry!</strong>' . $message . '</div>': '';
																	$flashmessage = $this->session->flashdata('message');
																	echo ! empty($flashmessage) ? '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Thank You! </strong>' . $flashmessage . '</div>': '';			
																	$atrib=array('name'=>'login','class'=>'form-horisontal', 'id'=>'login');
																	echo form_open('admin/cek_login',$atrib)
																?>
                       <fieldset>
                       
                            <div class="input-prepend" title="Username">
                                <span class="add-on"><i class="halflings-icon user"></i></span>
                                <input class="input-large span10" name="username" value="<?php echo set_value('username', isset($default['username']) ? $default['username'] : ''); ?>"
                                 type="text" placeholder="type username" required/>
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend" title="Password">
                                <span class="add-on"><i class="halflings-icon lock"></i></span>
                                <input class="input-large span10" name="pass" value="<?php echo set_value('pass', isset($default['pass']) ? $default['pass'] : ''); ?>"
                                 
                                type="password" placeholder="type password" required/>
                            </div>
                            <div class="clearfix"></div>


                            <div class="button-login">  
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="clearfix"></div>
                        </fieldset>                     
                    </form>
                    <hr>
                    
                </div><!--/span-->
            </div><!--/row-->
            

    </div><!--/.fluid-container-->
    
        </div><!--/fluid-row-->
 