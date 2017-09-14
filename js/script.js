/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{
  jQuery.validator.addMethod("lettersonly", function(value, element)
  {
  return this.optional(element) || /^[a-z ]+$/i.test(value);
  }, "Letters and spaces only please");
     /* validation */
	 $("#login-form").validate({
    rules:
	  {
  			password:
        {
  			     required: true,
  			},
  			user_id:
        {
              lettersonly: true,
              required: true,
        },
	   },
    messages:
	  {
            password:
            {
                      required: "กรุณากรอกรหัสผ่าน"
            },
            user_id: "กรุณากรอกชื่อผู้ใช้ของท่าน",
    },
	  submitHandler: submitForm
    });
	   /* validation */

	   /* login submit */
	   function submitForm()
	   {
			var data = $("#login-form").serialize();

			$.ajax({

    			type : 'POST',
    			url  : 'check_login.php',
          data : data,
    			beforeSend: function()
    			{
    				$("#error").fadeOut();
    				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
    			},
    			success :  function(response)
    			{
    					if(response.trim()=="0")
              {
    						$("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
    						setTimeout(' window.location.href = "index.php"; ',4000);
    					}
              else if(response.trim()=="1")
              {
                $("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                setTimeout(' window.location.href = "dashboard/index.html"; ',4000);
              }
    					else
              {
    						   $("#error").fadeIn(1000, function(){
    				                $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.trim()+' !</div>');
    											  $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
    							 });
    					}
    			 }
		   });
				return false;
		}
	   /* login submit */
});
