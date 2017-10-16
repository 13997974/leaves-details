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
			var name = $("#name").val();
			
			var kannada = $("#kannada").val();
			var hindi = $("#hindi").val();
			var social = $("#social").val();
			var science = $("#science").val();
			var maths = $("#maths").val();
			var active = $("#active").val();

			if(name == "") {
				$("#name").closest('.form-group').addClass('has-error');
				$("#name").after('<p class="text-danger">The Name field is required</p>');
			} else {
				$("#name").closest('.form-group').removeClass('has-error');
				$("#name").closest('.form-group').addClass('has-success');				
			}

			

			if(kannada == "") {
				$("#kannada").closest('.form-group').addClass('has-error');
				$("#kannada").after('<p class="text-danger">The kannada field is required</p>');
			} else {
				$("#kannada").closest('.form-group').removeClass('has-error');
				$("#kannada").closest('.form-group').addClass('has-success');				
			}
			
			if(hindi == "") {
				$("#hindi").closest('.form-group').addClass('has-error');
				$("#hindi").after('<p class="text-danger">The hindi field is required</p>');
			} else {
				$("#hindi").closest('.form-group').removeClass('has-error');
				$("#hindi").closest('.form-group').addClass('has-success');				
			}
			
			if(social == "") {
				$("#social").closest('.form-group').addClass('has-error');
				$("#social").after('<p class="text-danger">The social field is required</p>');
			} else {
				$("#social").closest('.form-group').removeClass('has-error');
				$("#social").closest('.form-group').addClass('has-success');				
			}
			
			if(science == "") {
				$("#science").closest('.form-group').addClass('has-error');
				$("#science").after('<p class="text-danger">The science field is required</p>');
			} else {
				$("#science").closest('.form-group').removeClass('has-error');
				$("#science").closest('.form-group').addClass('has-success');				
			}
			
			if(maths == "") {
				$("#maths").closest('.form-group').addClass('has-error');
				$("#maths").after('<p class="text-danger">The maths field is required</p>');
			} else {
				$("#maths").closest('.form-group').removeClass('has-error');
				$("#maths").closest('.form-group').addClass('has-success');				
			}

			if(active == "") {
				$("#active").closest('.form-group').addClass('has-error');
				$("#active").after('<p class="text-danger">The Active field is required</p>');
			} else {
				$("#active").closest('.form-group').removeClass('has-error');
				$("#active").closest('.form-group').addClass('has-success');				
			}

			if(name && kannada && hindi && social && science && maths &&  active) {
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
				$("#editName").val(response.name);

				

				$("#editKannada").val(response.kannada);

				$("#editHindi").val(response.hindi);	
				
				$("#editSocial").val(response.social);
				
				$("#editScience").val(response.science);
				
				$("#editMaths").val(response.maths);
				
				$("#editActive").val(response.active);

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editName = $("#editName").val();
					
					
					var editKannada = $("#editKannada").val();
					var editHindi = $("#editHindi").val();
					var editSocial = $("#editSocial").val();
					var editScience = $("#editScience").val();
					var editMaths = $("#editMaths").val();
					var editActive = $("#editActive").val();

					if(editName == "") {
						$("#editName").closest('.form-group').addClass('has-error');
						$("#editName").after('<p class="text-danger">The Name field is required</p>');
					} else {
						$("#editName").closest('.form-group').removeClass('has-error');
						$("#editName").closest('.form-group').addClass('has-success');				
					}
					
					
					if(editKannada == "") {
						$("#editKannada").closest('.form-group').addClass('has-error');
						$("#editKannada").after('<p class="text-danger">The english field is required</p>');
					} else {
						$("#editKannada").closest('.form-group').removeClass('has-error');
						$("#editKannada").closest('.form-group').addClass('has-success');				
					}
                    
					if(editHindi == "") {
						$("#editHindi").closest('.form-group').addClass('has-error');
						$("#editHindi").after('<p class="text-danger">The english field is required</p>');
					} else {
						$("#editHindi").closest('.form-group').removeClass('has-error');
						$("#editHindi").closest('.form-group').addClass('has-success');				
					}
					
					if(editSocial == "") {
						$("#editSocial").closest('.form-group').addClass('has-error');
						$("#editSocial").after('<p class="text-danger">The english field is required</p>');
					} else {
						$("#editSocial").closest('.form-group').removeClass('has-error');
						$("#editSocial").closest('.form-group').addClass('has-success');				
					}
					if(editScience == "") {
						$("#editScience").closest('.form-group').addClass('has-error');
						$("#editScience").after('<p class="text-danger">The english field is required</p>');
					} else {
						$("#editScience").closest('.form-group').removeClass('has-error');
						$("#editScience").closest('.form-group').addClass('has-success');				
					}
					if(editMaths == "") {
						$("#editMaths").closest('.form-group').addClass('has-error');
						$("#editMaths").after('<p class="text-danger">The english field is required</p>');
					} else {
						$("#editMaths").closest('.form-group').removeClass('has-error');
						$("#editMaths").closest('.form-group').addClass('has-success');				
					}
					

					if(editActive == "") {
						$("#editActive").closest('.form-group').addClass('has-error');
						$("#editActive").after('<p class="text-danger">The Active field is required</p>');
					} else {
						$("#editActive").closest('.form-group').removeClass('has-error');
						$("#editActive").closest('.form-group').addClass('has-success');				
					}

					if(editName && editKannada && editHindi && editSocial && editScience && editMaths && editActive) {
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