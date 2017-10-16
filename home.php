<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html class="no-js" ng-app="myApp" ng-app lang="en">
<head>
    <meta charset="utf-8">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
   
    <style type="text/css">
    ul>li, a{cursor: pointer;}
	
	.dropbtn {
    background-color: ;
    color: ;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: ;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #5cb85c;
}
    </style>


        <title>Leave Details</title>
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
    </head>
 
    <body>
        
        <div class="navbar navbar-default" id="navbar">
    <div class="container" id="navbar-container">
    <div class="navbar-header">
        <a href="staff-list/staff.php" class="navbar-brand active">
            <small>
                <i class="glyphicon glyphicon-home"></i>
                Teacher's Leave Dashboard 
            </small>
        </a><!-- /.brand -->
		<div class="dropdown">
		<button class="dropbtn">Late Coming Details</button>
		  <div class="dropdown-content">
			<a href="late-coming/late-coming.php">View Details</a>
			
			
		  </div>		  
		</div>
		<div class="dropdown">
		  <button class="dropbtn">Leaves</button>
		  <div class="dropdown-content">
			<a href="leaves.php">Leave details</a>
			<a href="leaves.php/#addMember" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">Request leave</a>
			
		  </div>
		</div>
		<div class="dropdown">
		  <button class="dropbtn">Permission</button>
		  <div class="dropdown-content">
			<a href="permission.php">View Permission</a>
			<a href="permission.php/#addMember" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">Request Permission</a>
			
		  </div>
		</div>
		<div class="dropdown">
		  <button class="dropbtn">Substitution</button>
		  <div class="dropdown-content">
			<a href="#">Substituion Record</a>
			<a href="#">Substituion Taken</a>
			<a href="#">Substituion Given</a>
		  </div>
		</div>
    </div><!-- /.navbar-header -->
    <div class="navbar-header pull-right" role="navigation">
        <a href="#" class="navbar-brand ">
        <small><i class="glyphicon glyphicon-user"></i> 
            <?php echo $row['userEmail']; ?> 
        </small>&nbsp;
        </a><!-- /.brand -->
        <a href="logout.php" class="navbar-brand ">
        LogOut<i class="glyphicon glyphicon-log-out"></i>
        </a><!-- /.brand -->
    </div><!-- /.navbar-header -->
    </div>
</div>
<div>
<div class="container">
<br/>
<blockquote><h4><a href="">Teacher's Leave Details</a></h4></blockquote>
<br/>
    <!--<div ng-view="" id="ng-view"></div>-->
 


</div>
</div>
<script src="late-coming/js/angular.min.js"></script>
<script src="late-coming/js/angular-route.min.js"></script>
<script src="late-coming/app/app.js"></script> 
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/jquery-1.9.1.min.js"></script>
<script src="assets/scripts.js"></script>
	

</body>
</html>