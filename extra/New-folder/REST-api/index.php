<!DOCTYPE html>
<html>
<head>
	<title>Leave details</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">

			<header id="header" role="banner">
					<div class="container">
						<div id="navbar" class="navbar navbar-default">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-main">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							   
							</div>
							<div class="collapse navbar-collapse" id="nav-main">
								<ul class="nav navbar-nav nav-left">
									 <li><a href="../index.php">Home</a></li>
									<li class="active"><a href="#">Leave Details</a></li>
									<li class="dropdown">
		                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">substitutions<b class="caret"></b>

		                                </a>
		                                <ul class="dropdown-menu" id="menu1">
		                                    <li><a href="">Substitution details</a></li>
		                                    <li><a href="">Substitution given</a></li>
		                                    <li><a href="">Substitution taken</a></li>
		                                 
		                                </ul>
		                            </li>
								
									<!--<li style="margin-right:20px; margin-top:5px;"><marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
									<p style="font-size:17px; color:#ff0000;">fields with<span id="vld_FirstName" style="color:Red">(*)</span> are mandatory. In date & time field you can just select date, time is optional.</p>
								</marquee></li>-->
								</ul>
							</div>
						</div>
					</div>
				</header><!--/#header-->
				<div class="removeMessages"></div>

				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Add New Details
				</button>

				<br /> <br /> <br />

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
							<th>Actions</th>
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
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Add New Details</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="name" class="col-sm-2 control-label">Month</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="name" name="name" placeholder="Enter month">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			 
			  <div class="form-group">
			    <label for="kannada" class="col-sm-2 control-label">From Date</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="kannada" name="kannada" value="" placeholder="Enter the from date">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="hindi" class="col-sm-2 control-label">To Date</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="hindi" name="hindi" value="" placeholder="Enter the to date">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="social" class="col-sm-2 control-label">Leave type</label>
			    <div class="col-sm-10">
			     <select class="form-control" name="social" id="social">
			      	<option value="0">Default</option>
			      	<option value="CL">casual leave</option>
			      	<option value="SL">sick leave</option>
			     </select>
			  
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="science" class="col-sm-2 control-label">Absence</label>
			    <div class="col-sm-10">
			     <select class="form-control" name="science" id="science">
			      	<option value="0">Default</option>
			      	<option value="yes">yes</option>
			      	<option value="No">No</option>
			     </select>
			      

			    </div>
			  </div>
			   <div class="form-group">
			    <label for="maths" class="col-sm-2 control-label">Informed</label>
			    <div class="col-sm-10">
			    <select class="form-control" name="maths" id="maths">
			      	<option value="">Default</option>
			      	<option value="yes">yes</option>
			      	<option value="No">No</option>
			      </select>
			      
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="active" class="col-sm-2 control-label">Status</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="active" id="active">
			      	<option value="0">Default</option>
			      	<option value="1">Approved</option>
			      	<option value="2">Not Approved</option>
			      </select>
			    </div>
			  </div>			 		

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
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
			    <label for="editName" class="col-sm-2 control-label">Month</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="editName" name="editName" >
				<!-- here the text will apper  -->
			    </div>
			  </div>
			 
			  <div class="form-group">
			    <label for="editKannada" class="col-sm-2 control-label">From date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editKannada" name="editKannada" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editHindi" class="col-sm-2 control-label">To date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editHindi" name="editHindi" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editSocial" class="col-sm-2 control-label">Leave type</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editSocial" name="editSocial" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editScience" class="col-sm-2 control-label">Absence</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editScience" name="editScience" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editMaths" class="col-sm-2 control-label">Informed</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editMaths" name="editMaths" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editActive" class="col-sm-2 control-label">Status</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="editActive" id="editActive">
			      	<option value="0">Default</option>
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
	<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js"></script>

</body>
</html>