<!DOCTYPE html>
<html lang="en">
    
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-Gaji</title>
<link href="<?php echo base_url('assets');?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendors/nprogress/nprogress.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendors/animate.css/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
<div class="login_wrapper" >
<div class="animate form login_form" style="  border: 1px solid;">
<section class="login_content">
<form action="<?php echo base_url('C_login/login');?>" method="post" enctype="multipart/formdata">
<p style="font-size:80px;"><span class="fa fa-money"></span></p>
<div class="col-md-12 col-xs-12">
<input name="email" type="email" class="form-control"  placeholder="email" required="" />
</div>
<div class="col-md-12 col-xs-12">
<input name="password" type="password" class="form-control" placeholder="Password" required="" />
</div>
<div class="clearfix"></div>
<div>
<button type="submit" name="btn_login" class="btn btn-success " ><span class="fa fa-lock"></span> LOGIN</button>
</div>
<div class="clearfix"></div>
<div class="separator">
<div class="clearfix"></div>
<br />
<div>
<i class="fa fa-money"></i> E-Gaji
<p>©2018 All Rights Reserved.E-Gaji</p>
</div>
</div>
</form>
</section>
</div>
    
</div>
</div>
</body>
</html>
