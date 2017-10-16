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
            <?php

require_once 'home.php';


?>
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
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Add New request for permission</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

	      <div class="modal-body">
	      	<div class="messages"></div>
			<div class="form-group">
			    <label for="maths" class="col-sm-2 control-label">Month</label>
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
			  <div class="form-group">
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