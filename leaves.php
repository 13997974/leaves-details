
<?php
require_once 'class.user.php';

if(isset($_POST['btn-submit']))
{
	$email = $_POST['txtemail'];
	
	$stmt = $user->runQuery("SELECT  userEmail FROM tbl_users WHERE userType='admin' LIMIT 1");
	$stmt->execute(array("admin"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		
		
		$message= "
				   Hello , $email
				   <br /><br />
				   We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
				   <br /><br />
				   Click Following Link To Reset Your Password 
				   <br /><br />
				   <a href='http://localhost/apps/our_websites/Taechers/sign-up/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
				   <br /><br />
				   thank you :)
				   ";
		$subject = "Request for leave";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  this email not found. 
			    </div>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Leave details</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css">

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
			
            <?php require_once 'home.php';?>
			
				<div class="removeMessages"></div>

				<!--<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Add New Details
				</button>-->

				<table class="table" id="manageMemberTable">					
					<thead>
						<tr>
							<th>Id</th>
							<th>Month</th>
							<th>From Date</th>
							<th>To Date</th>								
							<th>Leave Type</th>
							<th>Absence</th>
							<th>informed</th>
							<th>Status</th>
							<th>Action</th>
							
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- add modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Add New request for Leave</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="month" class="col-sm-2 control-label">Month</label>
			    <div class="col-sm-10"> 
			    
			      <select class="form-control" id="month" name="month" >
                    <option value="">-select -</option>
			      	<option value="jan">January</option>
			      	<option value="feb">february</option>
			      	<option value="mar">march</buaryoption>
			      	<option value="apr">april</buaryoption>
			      	<option value="may">may</buaryoption>
			      	<option value="jun">june</buaryoption>
			      	<option value="jul">july</buaryoption>
			      	<option value="aug">august</buaryoption>
			      	<option value="sep">september</buaryoption>
			      	<option value="oct">october</buaryoption>
			      	<option value="nov">november</buaryoption>
			      	<option value="dec">december</option>
			     </select>
				<!-- here the text will apper  -->
			    </div>
			  </div>
			 
			  <div class="form-group">
			    <label for="fromDate" class="col-sm-2 control-label">From Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="fromDate" name="fromDate" value="" placeholder="yyyy-mm-dd">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="toDate" class="col-sm-2 control-label">To Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="toDate" name="toDate" value="" placeholder="yyyy-mm-dd">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="casual" class="col-sm-2 control-label">Leave type</label>
			    <div class="col-sm-10">
			     <select class="form-control" name="casual" id="casual">
			     <option value="">-select -</option>
			      	<option value="CL">casual leave</option>
			      	<option value="OL">Other/personel</option>
			     </select>
			  
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="absence" class="col-sm-2 control-label">Absence</label>
			    <div class="col-sm-10">
			     <select class="form-control" name="absence" id="absence">
			     <option value="">-select -</option>
			      	<option value="yes">yes</option>
			      	<option value="No">No</option>
			     </select>
			      

			    </div>
			  </div>
			   <div class="form-group">
			    <label for="informed" class="col-sm-2 control-label">Informed</label>
			    <div class="col-sm-10">
			    <select class="form-control" name="informed" id="informed">
			    <option value="">-select -</option>
			      	<option value="yes">yes</option>
			      	<option value="No">No</option>
			      </select>
			      
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="active" class="col-sm-2 control-label">Status</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="active" id="active">
			      <option value="">-select -</option>
			      	<option value="1">Approved</option>
					<option value="2">Not Approved</option>
			      </select>
			    </div>
			  </div>			 		

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary" name="btn-submit">Send Request</button>
	      </div>
	      </form> 
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /add modal -->

	<!-- remove modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Details</h4>
	      </div>
	      <div class="modal-body">
	        <p>Do you really want to remove?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="removeBtn">Delete</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove modal -->

	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Details</h4>
	      </div>

		<form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">	      

	      <div class="modal-body">
	        	
	        <div class="edit-messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="editMonth" class="col-sm-2 control-label">Month</label>
			    <div class="col-sm-10"> 
			  
			      <select class="form-control" id="editMonth" name="editMonth" >
			      <option value="">-select -</option>
			      	<option value="jan">January</option>
			      	<option value="feb">february</option>
			      	<option value="mar">march</option>
			      	<option value="apr">april</option>
			      	<option value="may">may</option>
			      	<option value="jun">june</option>
			      	<option value="jul">july</option>
			      	<option value="aug">august</option>
			      	<option value="sep">september</option>
			      	<option value="oct">october</option>
			      	<option value="nov">november</option>
			      	<option value="dec">december</option>
			     </select>
				<!-- here the text will apper  -->
			    </div>
			  </div>
			 
			  <div class="form-group">
			    <label for="editFDate" class="col-sm-2 control-label">From date</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="editFDate" name="editFDate" placeholder="yyyy-mm-dd">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editTDate" class="col-sm-2 control-label">To date</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="editTDate" name="editTDate" placeholder="yyyy-mm-dd">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editCasual" class="col-sm-2 control-label">Leave type</label>
			    <div class="col-sm-10">
			      
			      <select class="form-control" id="editCasual" name="editCasual">
			        <option value="">-select -</option>
			      	<option value="Casual Leave">Casual leave</option>
			      	<option value="Other Leave">Other leave</option>
			     </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editAbsence" class="col-sm-2 control-label">Absence</label>
			    <div class="col-sm-10">
			      <select class="form-control" id="editAbsence" name="editAbsence">
			      <option value="">-select-</option>
			      	<option value="yes">yes</option>
			      	<option value="no">no</option>
			     </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editInformed" class="col-sm-2 control-label">Informed</label>
			    <div class="col-sm-10">
			     
			      <select class="form-control" id="editInformed" name="editInformed">
			      <option value="">-select -</option>
			      	<option value="yes">yes</option>
			      	<option value="no">No</option>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editActive" class="col-sm-2 control-label">Status</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="editActive" id="editActive">
			      <option value="">-select-</option>
			      	<option value="1">Approved</option>
			      	<option value="2">Not Approved</option>
			      </select>
			    </div>
			  </div>	
	      </div>
	      <div class="modal-footer editMemberModal">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /edit modal -->

	<!-- jquery plugin -->
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js"></script>
	

</body>
</html>