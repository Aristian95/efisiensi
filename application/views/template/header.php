<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUS EFISIENSI</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>aset/admin/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>aset/admin/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>aset/admin/css/local.css" />
    <script type="text/javascript" src="<?php echo base_url();?>aset/admin/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>aset/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
</head>
<body>
    <div id="wrapper">
          <nav class="navbar navbar-default  navbar-fixed-top navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>index.php/Admin">BUS EFISIENSI</a>
            </div>
            <ul class="nav navbar-nav navbar-right navbar-user">
                    <li>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('USER'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           
                            <li class="divider"></li>
                            
                            <li><?php echo anchor('admisi/logout','<i class="fa fa-power-off"></i> Log Out</li>')?>
                            <a href="#">
                        </ul>
                    </li>
                </ul>
            </nav>
        <nav class="navbar navbar-inverse  navbar-fixed-left" role="navigation">
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li class="selected"><a href="<?php echo base_url();?>index.php/Admin"><i class="fa fa-bullseye"></i> Dashboard</a></li>
					<li class="selected"><a href="<?php echo base_url();?>index.php/bus"><i class="fa fa-globe"></i> Daftar Bus</a></li>
					<li class="selected"><a href="<?php echo base_url();?>index.php/jadwal_bus"><i class="fa fa-globe"></i> Jam Keberangkatan</a></li>
					<li class="selected"><a href="<?php echo base_url();?>index.php/agen_bus"><i class="fa fa-globe"></i> Daftar Agen</a></li>
                </ul>                         
            </div>
        </nav>
         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-dismissable alert-warning">
                        <button data-dismiss="alert" class="close" type="button">&times;</button>
                        Hello Admin  !!
                        <br />
                    </div>
                </div>
            </div>
        </div>