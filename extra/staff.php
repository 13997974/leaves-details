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
			
 
            
			
				<div class="removeMessages"></div>

				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Add New staff
				</button>

				<table class="table" id="manageMemberTable">					
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
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

			 
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Name">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="email" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="email" name="email" value="" placeholder="enter valid email address">
			    </div>
			  </div>
			   
			  			 		

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary" name="btn-submit">Save changes</button>
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
			    <label for="editName" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editName" name="editName">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editTDate" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="editTDate" name="editTDate">
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