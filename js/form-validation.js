// Wait for the DOM to be ready
$().ready(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#registration_form").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      fName: "required",
      lName: "required",
      gender:"required",
      
      emailAddress: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      type:"required",
      uName:{
         required:true,
         minlength:2
      },
      password: {
        required: true,
        minlength: 5
      },
      confirmPassword:{
        required: true,
        minlength: 5,
        equalTo:"#password"
      }
    },
    // Specify validation error messages
    messages: {
      fName: "Please enter your firstname",
      lName: "Please enter your lastname",
      gender:"please select gender",
      emailAddress: "Please enter a valid email address",
      type:"Select the type of client",
      uName:"Enter the username",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      confirmPassword:{
          required:"Please provide a password",
           minlength: "Your password must be at least 5 characters long",
           equalTo:"Please enter the same password as above"
      }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});