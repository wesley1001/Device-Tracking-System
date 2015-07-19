var Script = function () {

    $.validator.setDefaults({
        submitHandler: function() { alert("submitted!"); }
    });

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#feedback_form").validate();

        // validate signup form on keyup and submit
        $("#register_form").validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 3
                },

                middle_name: {
                    required: true,
                    minlength: 3
                },

                last_name: {
                    required: true,
                    minlength: 3
                }
               
               
            },
            messages: {                
                first_name: {
                    required: "Please enter a First Name.",
                    minlength: "Your Full Name must consist of at least 3 characters long."
                },
                
            }
        });



}();