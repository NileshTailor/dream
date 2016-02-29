var FormValidation = function () {

    var handleValidation1 = function() 
	{
		///////////////////////// company_category
			var form1 = $('#add_company_category');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					category_name: {
						minlength: 3,
						required: true
					},
					service: {
						required: true
					},
					
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			/////////////////////////////////////////      company_category
			var form1 = $('#edit_company_category');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					edit_category: {
						minlength: 3,
						required: true
					},
					 editoption_category: {
                        required: true
                    },
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			///////////////////////////////////////// company_category
			var form1 = $('#delete_company_category');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 deleteoption_category: {
                        required: true
                    },
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			///////////////////////////////////////// add_company_registration
			var form1 = $('#add_company_registration');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 company_name: {
                        required: true
                    },
					company_category_id: {
                        required: true
                    },
					mobile_no: {
                        maxlength:10
                    },
					
					master_plan_id: {
                        required: true
                    },
					authorized_person_name: {
                        required: true
                    },
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			
			///////////////////////////////////////// edit_company_registration
			$('.btn').click(function () {
            var id= $(this).attr('atttter');
			var form1 = $('#edit_company_registration'+ id);
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 edit_company_name: {
                        required: true
                    },
					edit_company_category_id: {
                        required: true
                    },
					edit_master_plan_id: {
                        required: true
                    },
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			});
			///////////////////////////////////////// add_company_discount
			var form1 = $('#add_company_discount');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 company_category_id: {
                        required: false
                    },
					
					item_type_id: {
                        required: true
                    },
					room_type_id: {
                        required: true
                    },
					discount: {
                        required: true
                    },
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			///////////////////////////////////////// edit_company_discount
		 $('.btn').click(function () {
            var id= $(this).attr('atttter');
			var form1 = $('#edit_company_discount'+ id);
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 edit_company_category_id: {
                        required: true
                    },
					edit_company_name_id: {
                        required: true
                    },
					edit_item_type_id: {
                        required: true
                    },
					edit_room_type_id: {
                        required: true
                    },
					edit_discount: {
                        required: true
                    },
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			});
			///////////////////////////////////////// addt_company_tariff
			var form1 = $('#addt_company_tariff');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 
					company_category_id: {
                        required: false
                    },
					company_id:{
						required: true
					},
					master_room_type_id: {
                        required: true
                    },
					master_room_plan_id: {
                        required: true
                    },
					date_from: {
                        required: true
                    },
					date_to: {
                        required: true
                    },
					
					
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			///////////////////////////////////////// edit_company_tariff
      	 $('.btn').click(function () {
           var id= $(this).attr('atttter');
		   
			var form1 = $('#edit_company_tariff'+id);
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 
					edit_company_category_id: {
                        required: false
                    },
					edit_company_id:{
						required: true
					},
					
					edit_master_room_type_id: {
                        required: true
                    },
					edit_master_room_plan_id: {
                        required: true
                    },
					edit_date_from: {
                        required: true
                    },
					edit_date_to: {
                        required: true
                    },
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
		});
		/////////////////////////// add_function_booking
		var form1 = $('#add_function_booking');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					name: {
                        required: true
                    },
					outlet_venue_id: {
                        required: true
                    },
					t_number: {
                        required: true
                    },
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			///////////////////////////////////////// edit_fbooking
      	 $('.btn').click(function () {
           var id= $(this).attr('atttter');
		   
			var form1 = $('#edit_function_booking'+id);
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					edit_b_date: {
                        required: true
                    },
					edit_name: {
                        required: true
                    },
					edit_outlet_venue_id: {
                        required: true
                    },
					edit_t_number: {
                        required: true
                    },
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
		});
		////////////////////////// add_master_table
		var form1 = $('#add_master_table');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					master_outlet_id: {
                        required: true
                    },
					table_capacity: {
                        required: true
                    },
					table_no: {
                        required: true
                    },
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			////////////////////////// add_bill_settlement
		var form1 = $('#add_bill_settlement');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					steward: {
                        required: true
                    },
					table_no: {
                        required: true
                    },
					guest_name: {
                        required: true
                    },
					bill_no: {
                        required: true
                    },
					amount: {
                        required: true
                    },
					taxes: {
                        required: true
                    },
					service_charge: {
                        required: true
                    },
					gross: {
                        required: true
                    },
					tips: {
                        required: true
                    },
					discount:{
						 required: true
					},
					payment_mode:{
						 required: true
					},
					
					
				},
				errorPlacement: function (error, element) { 
						if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
						} else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
	
	///////////////////////////////////////// room servicing 
			var form1 = $('#roomtype_addform');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 master_roomno_id: {
                        required: true
                    },
					serviced_by: {
                        required: true
                    },
					
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			
			///////////////////////////////////////// editroom servicing
			$('.btn').click(function () {
            var id= $(this).attr('atttter');
			var form1 = $('#edit_room_servicing'+ id);
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 edit_master_roomno_id: {
                        required: true
                    },
					edit_serviced_by: {
                        required: true
                    },
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			});

				////////////////////////////////////masterroom
			//////////////// add_billing_kot
			var form1 = $('#add_billing_kot');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 outlet_name: {
                        required: true
                    },
					table_no: {
                        required: false
                    },
					room_no: {
                        required: false
                    },
					guest_name: {
                        required: true
                    },
					covers: {
                        required: false
                    },
					steward: {
                        required: false
                    },
					
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			
			//////////////// add_plan_kot
			var form1 = $('#add_plan_kot');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 outlet_name: {
                        required: true
                    },
					table_no: {
                        required: false
                    },
					room_no: {
                        required: false
                    },
					guest_name: {
                        required: true
                    },
					covers: {
                        required: false
                    },
					steward: {
                        required: false
                    },
					
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
	
	//////////////// add_nc_kot
			var form1 = $('#add_nc_kot');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 outlet_name: {
                        required: true
                    },
					table_no: {
                        required: false
                    },
					room_no: {
                        required: false
                    },
					guest_name: {
                        required: true
                    },
					covers: {
                        required: false
                    },
					steward: {
                        required: false
                    },
					plan_id:{
						required: false
					}
					
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
	
	
	
	
	
	
	////////////////////////////////////masterroom
			var form1 = $('#add_master_room');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 master_room_type_id: {
                        required: true
                    },
					tarrif_rate: {
                        required: true
                    },
					tax_applicable_id: {
                        required: true
                    },
					
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			
	
			///////////////////////////////////////// editmasterroom
			$('.btn').click(function () {
            var id= $(this).attr('atttter');
			var form1 = $('#edit_master_room'+ id);
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 master_room_type_id_edit: {
                        required: true
                    },
					tarrif_rate_edit: {
                        required: true
                    },
					tax_applicable_id_edit: {
                        required: true
                    },
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			});
			/////////////////////////////
			////////////////////////////////////checkin
			var form1 = $('#roomreservation');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 city: {
                        required: true
                    },
					name_person: {
                        required: true
                    },
					arrival_date: {
                        required: true
                    },
					guest_name: {
                        required: true
                    },
					nationality: {
                        required: true
                    },
					telephone: {
                        required: true
                    }
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			
	
			
			////////////////////////////////////checkin
			var form1 = $('#checkinaddform');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 card_no: {
                        required: true
                    },
					arrival_date: {
                        required: true
                    },
					guest_name: {
                        required: true
                    },
					room_type_id: {
                        required: true
                    },
					plan_id: {
                        required: false
                    },
					master_roomno_id: {
                        required: true
                    },
					total_room: {
                        required: true
                    },
					duration: {
                        required: true
                    },
					city: {
                        required: true
                    },
					mobile_no: {
                        required: true
                    },
					pax: {
                        required: true
                    },
					arriving_from: {
                        required: true
                    },
									
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			
	
			///////////////////////////////////////// checkin
			$('.btn').click(function () {
            var id= $(this).attr('atttter');
			var form1 = $('#checkineditform'+ id);
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 
					 edit_card_no: {
                        required: true
                    },
					edit_arrival_date: {
                        required: true
                    },
					edit_company_id: {
                        required: true
                    },
					
					edit_guest_name: {
                        required: true
                    },
					edit_room_type_id: {
                        required: true
                    },
					edit_plan_id: {
                        required: false
                    },
					edit_master_roomno_id: {
                        required: true
                    },
					edit_total_room: {
                        required: true
                    },
					edit_duration: {
                        required: true
                    },
					edit_taxes: {
                        required: true
                    },
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			});
			//////////////////////////////////// add_registration
			var form1 = $('#add_registration');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					name: {
                        required: true
                    },
					p_address: {
                        required: true
                    },
					mobile_no: {
                        required: true
                    },
									
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
	
			////////////////////////////////////masteritemtype
			var form1 = $('#add_master_item');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 master_item_type_id: {
                        required: true
                    },
					item_name: {
                        required: true
                    },
					billing_rate: {
                        required: true
                    },
					
				
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			
	
			///////////////////////////////////////// editmasterroom
			$('.btn').click(function () {
            var id= $(this).attr('atttter');
			var form1 = $('#edit_master_item'+ id);
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 
					 edit_master_item_type_id: {
                        required: true
                    },
					edit_item_name: {
                        required: true
                    },
					edit_billing_rate: {
                        required: true
                    },
				
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			});
			
	
			////////////////////////////////////receipt
			var form1 = $('#receiptadd_id');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 room_no: {
                        required: false
                    },
					reg_no: {
                        required: true
                    },
					guest_name: {
                        required: false
                    },
					
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			
	
			/////////////////////////////////////////receipt
			$('.btn').click(function () {
            var id= $(this).attr('atttter');
			var form1 = $('#edit_receipt_checkout'+ id);
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 edit_room_no: {
                        required: false
                    },
					edit_reg_no: {
                        required: false
                    },
					edit_guest_name: {
                        required: false
                    },
				
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			});
			
			
			////////////////////////////paid receipt
			var form1 = $('#add_paid_receipt');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 card_no: {
                        required: true
                    },
					date_to: {
                        required: true
                    },
					amount: {
                        required: true
                    },
					
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			
	
			/////////////////////////////////////////paid receipt
			$('.btn').click(function () {
            var id= $(this).attr('atttter');
			var form1 = $('#edit_paid_receipt'+ id);
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					 
					edit_card_no: {
                        required: true
                    },
					edit_date_to: {
                        required: true
                    },
					edit_amount: {
                        required: true
                    },
				
									},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
			});
	
		//////////////////////////////////// registration_edit_form
		
			var form1 = $('#registration_edit_form');
			var error1 = $('.alert-danger', form1);
			var success1 = $('.alert-success', form1);
			form1.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					name_edit: {
                        required: true
                    },
					p_address_edit: {
                        required: true
                    },
					mobile_no_edit: {
                        required: true
                    },
					reg_type_edit:{
						required: true
					},
					guest_type_edit:{
						required: true
					},
									
				},
				invalidHandler: function (event, validator) { //display error alert on form submit              
					success1.hide();
					error1.show();
					Metronic.scrollTo(error1, -200);
				},
				highlight: function (element) { // hightlight error inputs
					$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
				},
				unhighlight: function (element) { // revert the change done by hightlight
					$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
				},
				success: function (label) {
					label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
				},
				submitHandler: function (form) {
					success2.show();
					error2.hide();
					form[0].submit(); // submit the form
				}
			});
		
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    // validation using icons
    var handleValidation2 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form2 = $('#form_sample_2');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    url: {
                        required: true,
                        url: true
                    },
                    number: {
                        required: true,
                        number: true
                    },
                    digits: {
                        required: true,
                        digits: true
                    },
                    creditcard: {
                        required: true,
                        creditcard: true
                    },
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success2.hide();
                    error2.show();
                    Metronic.scrollTo(error2, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");  
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-icon').children('i');
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    icon.removeClass("fa-warning").addClass("fa-check");
                },

                submitHandler: function (form) {
                    success2.show();
                    error2.hide();
                    form[0].submit(); // submit the form
                }
            });


    }

    // advance validation
    var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#form_sample_3');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit
            form3.on('submit', function() {
                for(var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }
            })

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },  
                    options1: {
                        required: true
                    },
                    options2: {
                        required: true
                    },
                    select2tags: {
                        required: true
                    },
                    datepicker: {
                        required: true
                    },
                    occupation: {
                        minlength: 5,
                    },
                    membership: {
                        required: true
                    },
                    service: {
                        required: true,
                        minlength: 2
                    },
                    markdown: {
                        required: true
                    },
                    editor1: {
                        required: true
                    },
                    editor2: {
                        required: true
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    membership: {
                        required: "Please select a Membership type"
                    },
                    service: {
                        required: "Please select  at least 2 types of Service",
                        minlength: jQuery.validator.format("Please select  at least {0} types of Service")
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    Metronic.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success3.show();
                    error3.hide();
                    form[0].submit(); // submit the form
                }

            });

             //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('.select2me', form3).change(function () {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

            // initialize select2 tags
            $("#select2_tags").change(function() {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            }).select2({
                tags: ["red", "green", "blue", "yellow", "pink"]
            });

            //initialize datepicker
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
            $('.date-picker .form-control').change(function() {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            })
    }

    var handleWysihtml5 = function() {
        if (!jQuery().wysihtml5) {
            
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["../../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }

    return {
        //main function to initiate the module
        init: function () {

            handleWysihtml5();
            handleValidation1();
            handleValidation2();
            handleValidation3();

        }

    };

}();