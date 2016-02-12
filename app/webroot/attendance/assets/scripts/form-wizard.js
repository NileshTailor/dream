var FormWizard = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='assets/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#course_list").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
				
            });
			
			 $("#course_list1").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
				
            });
			

            var form = $('#submit_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    //account
                    fname: {
                        required: true
                    },
					name: {
						required: true
					},
					school: {
						 required: true
					},
					 specialization: {
						required: true
                    }, 
					lname: {
                        required: true
                    },
					  birth_date: {
                        required: true
                    },
					 joining_date: {
                        required: true
                    },
					 posting_date: {
                        required: true
                    },
					marital: {
                        required: true
                    },
					ctgry: {
						 required: true
					},
					other_exam: {
						 required: true
					},
					department: {
					 required: true
					},	
					designation: {
					 required: true
					},	
					photo: {
						 required: true
					},
					gen: {
						required: true
					},
					pin_code: {
						maxlength: 6,
						required: true
					},
					payment_method: {
						required: true
					},
					qualification: {
						required: true
					},
					national: {
						required: true
					},
					father_name: {
						required: true
					},
					mother_name: {
						required: true
					},
					postapply: {
					required: true
					},
					bach_quality: {
					required: true
					},
					mas_quality: {
					required: true
					},
					exam: {
					required: true
					},
					state: {
						required: true
					},
    				contact_no: {
						maxlength: 10,
                        required: true
                    },
                    email_id: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true
                    },
					
                    gender: {
                        required: true
                    },
                    address: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    country: {
                        required: true
                    },
                    //payment
					tenyear: {
						 maxlength: 4,
                        required: true
                    },
						bachyear: {
						 maxlength: 4,
                        required: true
                    },
					tenboard: {
                        required: true
                    },
					bachboard: {
						 required: true
					},
					bachsubject: {
						required: true
					},
					bachmarks: {
						
						required: true
					},
					bachpercent: {
							required: true
					},
					tensubject: {
                        required: true
                    },
					tenmarks: {
                        required: true
                    },
					tenpercent: {
                        required: true
                    },
					tweyear: {
						maxlength: 4,
                        required: true
                    },
					tweboard: {
                        required: true
                    },
					twesubject: {
                        required: true
                    },
					twemarks: {
                        required: true
                    },
					twepercent: {
                        required: true
                    },
				    masyear: {
						required: true
					},
					 masboard: {
						required: true
					}, 
					 massubject: {
						required: true
					},  
					maspercent: {
						required: true
					},
                    'payment[]': {
                        required: true,
                        minlength: 1
                    } 
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'payment[]': {
                        required: "Please confirm with your form",
                        minlength: jQuery.format("Please confirm with your form")
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } 
					else if (element.attr("name") == "marital") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_marital_error");
					}
					else if (element.attr("name") == "ctgry") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_ctgry_error");
					}
					else if (element.attr("name") == "exam") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_exam_error");
						
                    }
					else if (element.attr("name") == "school") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_school_error");
					}else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
					form.submit();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function() {
                $('#tab4 .form-control-static', form).each(function(){
                    var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment') {
                        var payment = [];
                        $('[name="payment[]"]').each(function(){
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                App.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    if (form.valid() == false) {
                        return false;
                    }

                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
            }).hide();
        }

    };

}();