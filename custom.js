$(document).ready(()=>{
	var form = "#signupForm";
	$(".serverValidateResp").html("");
	$(form).submit((e)=>{
		e.preventDefault();
		$(form + " button[type='submit']").html("Loading ...");
		valid  = validateInputs(form);
		if( valid == 0)
		{
		    var frm = $("#signupForm");
		    var url = frm.attr('action');

		    $.ajax({
		           type: "POST",
		           url: url,
		           data: frm.serialize(), // serializes the form's elements.
		           success: function(data)
		           {
		               console.log(data); // show response from the php script.
		               data = JSON.parse(data);
		               $(".serverValidateResp").html(data.message);
		               $(form + " button[type='submit']").html("Register");
		           },
		           error : function(err)
		           {
		           		console.log("Error : " + err);
		           		$(form + " button[type='submit']").html("Register");
		           }
		         });
		}
		else
		{
			$(form + " button[type='submit']").html("Register");
		}
	});

	var validateInputs = (form)=> {
		var nameVal = $(form + " input[name = 'name']").val();
		var emailVal = $(form + " input[name = 'email']").val();
		var passwordVal = $(form + " input[name = 'password']").val();
		var re_passwordVal = $(form + " input[name = 're_password']").val();
		var genderVal = $(form + " input[name = 'gender']:checked").val();
		var occupationVal = $(form + " select[name = 'occupation']").val();
		var prefered_workingVal = [];

		$(form + " input[name = 'name']").next().html("");
		$(form + " input[name = 'email']").next().html("");
		$(form + " input[name = 'password']").next().html("");

		$(form + " input[name = 're_password']").next().html("");
		$(form + " input[name = 'gender']").next(".err_msg").html("");
		$(form + " select[name = 'occupation']").next().html("");
		$(form + " input[name = 'prefered_working[]']").next().html("");

		$.each($(form + " input[name = 'prefered_working[]']:checked"), function(){
			prefered_workingVal.push($(this).val());
		});
		prefered_workingVal.join(",");

		var bug = 0;

		// Name Validation
		if(nameVal == "")
		{
			bug ++;
			$(form + " input[name = 'name']").next().html("This is a required field");
		}
		// Email Validation 
		if(emailVal == "")
		{
			bug ++;
			$(form + " input[name = 'email']").next().html("This is a required field");
		}
		else
		{
			var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

			if(pattern.test(emailVal) == false)
			{
				bug ++;
				$(form + " input[name = 'email']").next().html("This is not a valid email. Email should be like : demo@demo.com");		
			}
		}
		// Password Validation 
		if(passwordVal == "")
		{
			bug ++;
			$(form + " input[name = 'password']").next().html("This is a required field");
		}
		if(re_passwordVal == "")
		{
			bug ++;
			$(form + " input[name = 're_password']").next().html("This is a required field");
		}
		else
		{
			if(re_passwordVal != passwordVal)
			{
				bug ++;
				$(form + " input[name = 're_password']").next().html("Retype Password should match the Password");		
			}
		}
		if(genderVal == undefined)
		{
			bug ++;
			// $(form + " input[name = 're_password']").next().html("This is a required field");
		}
		if(occupationVal == "")
		{
			bug ++;
			$(form + " select[name = 'occupation']").next().html("This is a required field");
		}
		if(prefered_workingVal == "")
		{
			bug ++;
			// $(form + " input[name = 're_password']").next().html("This is a required field");
		}

		console.log(nameVal + " " + emailVal + " " + passwordVal + " " + re_passwordVal + " " + genderVal + " " + occupationVal + " " + prefered_workingVal);

		return bug;
	}
});