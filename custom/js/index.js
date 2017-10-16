// global the manage memeber table 
var manageMemberTable;

$(document).ready(function() {
	manageMemberTable = $("#manageMemberTable").DataTable({
		"ajax": "php_action/retrieve.php",
		"order": []
	});

	$("#addMemberModalBtn").on('click', function() {
		// reset the form 
		$("#createMemberForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createMemberForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var month = $("#month").val();
			
			var fromDate = $("#fromDate").val();
			var toDate = $("#toDate").val();
			var casual = $("#casual").val();
			var absence = $("#absence").val();
			var informed = $("#informed").val();
			var active = $("#active").val();

			if(month == "") {
				$("#month").closest('.form-group').addClass('has-error');
				$("#month").after('<p class="text-danger">The month field is required</p>');
			} else {
				$("#month").closest('.form-group').removeClass('has-error');
				$("#month").closest('.form-group').addClass('has-success');				
			}

			

			if(fromDate == "") {
				$("#fromDate").closest('.form-group').addClass('has-error');
				$("#fromDate").after('<p class="text-danger">The toDateDate field is required</p>');
			} else {
				$("#fromDate").closest('.form-group').removeClass('has-error');
				$("#fromDate").closest('.form-group').addClass('has-success');				
			}
			
			if(toDate == "") {
				$("#toDate").closest('.form-group').addClass('has-error');
				$("#toDate").after('<p class="text-danger">The toDate field is required</p>');
			} else {
				$("#toDate").closest('.form-group').removeClass('has-error');
				$("#toDate").closest('.form-group').addClass('has-success');				
			}
			
			if(casual == "") {
				$("#casual").closest('.form-group').addClass('has-error');
				$("#casual").after('<p class="text-danger">The casual field is required</p>');
			} else {
				$("#casual").closest('.form-group').removeClass('has-error');
				$("#casual").closest('.form-group').addClass('has-success');				
			}
			
			if(absence == "") {
				$("#absence").closest('.form-group').addClass('has-error');
				$("#absence").after('<p class="text-danger">The absence field is required</p>');
			} else {
				$("#absence").closest('.form-group').removeClass('has-error');
				$("#absence").closest('.form-group').addClass('has-success');				
			}
			
			if(informed == "") {
				$("#informed").closest('.form-group').addClass('has-error');
				$("#informed").after('<p class="text-danger">The informed field is required</p>');
			} else {
				$("#informed").closest('.form-group').removeClass('has-error');
				$("#informed").closest('.form-group').addClass('has-success');				
			}

			if(active == "") {
				$("#active").closest('.form-group').addClass('has-error');
				$("#active").after('<p class="text-danger">The Active field is required</p>');
			} else {
				$("#active").closest('.form-group').removeClass('has-error');
				$("#active").closest('.form-group').addClass('has-success');				
			}

			if(month && toDate && fromDate && casual && absence && informed &&  active) {
				//submi the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error 
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

							// reset the form
							$("#createMemberForm")[0].reset();		

							// reload the datatables
							manageMemberTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
						}  // /else
					} // success  
				}); // ajax subit 				
			} /// if


			return false;
		}); // /submit form for create member
	}); // /add modal

});

function removeMember(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/remove.php',
				type: 'post',
				data: {member_id : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageMemberTable.ajax.reload(null, false);

						// close the modal
						$("#removeMemberModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again');
	}
}

function editMember(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#member_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {
				$("#editMonth").val(response.month);

				

				$("#editFDate").val(response.fromDate);

				$("#editTDate").val(response.toDate);	
				
				$("#editCasual").val(response.casual);
				
				$("#editAbsence").val(response.absence);
				
				$("#editInformed").val(response.informed);
				
				$("#editActive").val(response.active);

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editMonth = $("#editMonth").val();
					
					
					var editFDate = $("#editFDate").val();
					var editTDate = $("#editTDate").val();
					var editCasual = $("#editCasual").val();
					var editAbsence = $("#editAbsence").val();
					var editInformed = $("#editInformed").val();
					var editActive = $("#editActive").val();

					if(editMonth == "") {
						$("#editMonth").closest('.form-group').addClass('has-error');
						$("#editMonth").after('<p class="text-danger">The Month field is required</p>');
					} else {
						$("#editMonth").closest('.form-group').removeClass('has-error');
						$("#editMonth").closest('.form-group').addClass('has-success');				
					}
					
					
					if(editFDate == "") {
						$("#editFDate").closest('.form-group').addClass('has-error');
						$("#editFDate").after('<p class="text-danger">The english field is required</p>');
					} else {
						$("#editFDate").closest('.form-group').removeClass('has-error');
						$("#editFDate").closest('.form-group').addClass('has-success');				
					}
                    
					if(editTDate == "") {
						$("#editTDate").closest('.form-group').addClass('has-error');
						$("#editTDate").after('<p class="text-danger">The english field is required</p>');
					} else {
						$("#editTDate").closest('.form-group').removeClass('has-error');
						$("#editTDate").closest('.form-group').addClass('has-success');				
					}
					
					if(editCasual == "") {
						$("#editCasual").closest('.form-group').addClass('has-error');
						$("#editCasual").after('<p class="text-danger">The leave type field is required</p>');
					} else {
						$("#editCasual").closest('.form-group').removeClass('has-error');
						$("#editCasual").closest('.form-group').addClass('has-success');				
					}
					if(editAbsence == "") {
						$("#editAbsence").closest('.form-group').addClass('has-error');
						$("#editAbsence").after('<p class="text-danger">The english field is required</p>');
					} else {
						$("#editAbsence").closest('.form-group').removeClass('has-error');
						$("#editAbsence").closest('.form-group').addClass('has-success');				
					}
					if(editInformed == "") {
						$("#editInformed").closest('.form-group').addClass('has-error');
						$("#editInformed").after('<p class="text-danger">The english field is required</p>');
					} else {
						$("#editInformed").closest('.form-group').removeClass('has-error');
						$("#editInformed").closest('.form-group').addClass('has-success');				
					}
					

					if(editActive == "") {
						$("#editActive").closest('.form-group').addClass('has-error');
						$("#editActive").after('<p class="text-danger">The Active field is required</p>');
					} else {
						$("#editActive").closest('.form-group').removeClass('has-error');
						$("#editActive").closest('.form-group').addClass('has-success');				
					}

					if(editMonth && editFDate && editTDate && editCasual && editAbsence && editInformed && editActive) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');

									// reload the datatables
									manageMemberTable.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error 
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>')
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

	} else {
		alert("Error : Refresh the page again");
	}
}