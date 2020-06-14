<!doctype html>
    <?php 
	    $x = $_REQUEST['logstatus'];
		if(isset($x))
		{
			if($x=="NotExist" )
			{
			    $message = "UserName or Password is Incorrect";
			    echo "<script type='text/javascript'>alert('$message');</script>";
			}else if($x=="Inactive")
			{
			    $message = "Employee Inactive";
			    echo "<script type='text/javascript'>alert('$message');</script>";
			}
	    }
	?>
<html>
	<head>
		<meta content="utf-8" />
		<meta name="viewport" content="width=device-width,intial-scale=1.0" />
		<title>Candidox | Login</title>
		<link rel="icon" href="images/candidoxicon.png" type="image/x-icon">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<link rel="stylesheet" type="text/css" href="css/deign.css">
		<style>
            .btn-success{
                background-color:#66388b;
                border-color:#66388b;
                 padding:7px 20px;
                font-size: 18px;
                padding-top: 10px;
                padding-bottom: 10px;
                margin-top: 20px;
            }

            .btn-success:hover{
                background-color: #4a1972;
                border-color: #4a1972;

            }
            .figur{
                width: 100%;
                margin-top: 20px;
               
            }
            .figur img{
                width: 100%;
                height: 200px;
            }
            @media (max-width:480px){
                .panel-body{
                    padding:20px;
                }
                .figur{
                width: 100%;
                margin-top:0px;
               
            }
                .figur img{
                width: 100%;
                height: 150px;
            }
            }
        </style>
	</head>
    <body style="background-color:white">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-offset-4 col-sm-4 col-xs-6 col-sm-offset-4 col-xs-offset-3">
					<div class="figur">
						<figure>
							<img src="images/candidox.png" />
						</figure>
					</div>
                </div>
				<div class="col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
					<div class="login-panel panel panel-default" style="border:1px solid #D5D8DC">
						<div class="panel-heading pdg20" style="background-color:#D5D8DC">
							<h3 class="panel-title ">Candidox Admin Login</h3>
						</div>
						<div class="panel-body">
							<form role="form" name="loginvalidate" method="POST" action="login_check.php">   
								<input type="hidden" name="request_type" value="Loginvalidate">	
							
								<div class="form-group">
									<input class="form-control" placeholder="Emp Code" name="Empcode" value="<?php echo $_COOKIE['empcode']; ?>" type="text"  autofocus required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="Password" value="<?php echo $_COOKIE['passwd']; ?>" type="password" required>
								</div>
								<div class="checkbox">
									<label class="email-txt">
										<input name="asp_remember" type="checkbox" 
											<?php 
												if(isset($_COOKIE['empcode'])) 
												{  
													echo 'checked="checked"'; 
												}else{
													echo '';
												}
											?>
											
											
											>Remember Me
									</label>
									<!--<label class="pull-right email-txt"><a href="forgotpassword.php">Forgot Password</a></label> -->
								</div>
									<button type="submit" class="btn btn-lg btn-success btn-block" style="font-size:18px;background-color:#F33614;border:1px solid #F33614">Login</button>
							</form>
						</div>
					</div>
				</div>
            </div>
        </div>
        <?php include "new_password.php" ?>

    <?php
        $empreset   = $_REQUEST['status'];
        $popup      = $_REQUEST['pps'];
        $passupdate = $_REQUEST['rst'];
		if($empreset=="smaid")
		{
			echo "<script>alert('Password Reset link sent to mail');</script>";
		}
        elseif($empreset=="smaidnx"){
            echo "<script>alert('Mailid NotExist');</script>";	
        }
		if($popup=="esrtq")
		{		
			echo "<script>
			$(document).ready(function(){
				$('#modal_new_password').modal('show');
			})
		</script>";
		}
        if($passupdate=="dner")	
	    {
		    $message = "Password updated successfully. Please login";
		    echo "<script type='text/javascript'>alert('$message');</script>";
	    }
        elseif($passupdate=="nrde"){
	        $message = "Failed to reset Password";
		    echo "<script type='text/javascript'>alert('$message');</script>";
        }	
    ?>
    <link rel="stylesheet" href="css/responsive.css"/>
    </body>
</html>
	<script type="text/javascript">
		history.pushState(null, null, document.URL);
		window.addEventListener('popstate', function () {
		history.pushState(null, null, document.URL);
	  }); 
	</script>