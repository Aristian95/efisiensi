			<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 id="buttons" class="page-header"><a href="#"><?php echo $h2_title; ?></a></h1>
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
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-dismissable alert-warning">
                        <button data-dismiss="alert" class="close" type="button">&times;</button>
                        <?php					
													
																	echo ! empty($message) ? '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Sorry! </strong>' . $message . '</div>': '';
																	
																	$flashmessage = $this->session->flashdata('message');
																	echo ! empty($flashmessage) ? '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Thank You! </strong>' . $flashmessage . '</div>': '';

																	echo ! empty($table) ? $table : '';
																	
																	?>
                        <br />
                        <nav aria-label="Page navigation">
  <ul class="pagination">
    <li >
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="active"><a  href="#">1</a></li>
    <li class="active"><a href="#">2</a></li>
    <li class="active"><a href="#">3</a></li>
    <li >
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
                    </div>
                </div>
            </div>
        </div>
