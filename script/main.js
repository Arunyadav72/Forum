//Handle SignUp
$(document).ready(function () {
  $("#create-account").click(function () {
    // Get the values from the input fields
    var username = $("#signup-form #userusername").val();
    var emailId = $("#signup-form #emailId").val();
    var userPhoneNumber = $("#signup-form #phone-number").val();
    var userPassword = $("#signup-form #userpassword").val();

    $.ajax({
      url: "server/signup.php",
      type: "post",
      data: {
        username: username,
        emailId: emailId,
        phoneNumber: userPhoneNumber,
        password: userPassword,
      },
      success: function (data, status) {
        $("#signUp-modal #txtHint").html(data);
      },
      error: function () {
        alert("Error");
      },
    });
  });
});

//Handle Login
$(document).ready(function () {
    $("#login").click(function () {
      // Get the values from the input fields
      var username = $("#login-form #username").val();
      var emailId = $("#login-form #user-email-id").val();
      var userPassword = $("#login-form #user-password").val();
  
      $.ajax({
        url: "server/auth.php",
        type: "post",
        data: {
          username: username,
          emailId: emailId,
          password: userPassword,
        },
        success: function (data, status) {
            if($.isEmptyObject(data) || data === ""){
                $('#login-modal #login-message').html(data)
            }
            else{
                $('#login-modal #login-message').addClass('text-danger');
                $('#login-modal #login-message').html(data)
            }
        },
        error: function () {
          alert("Error");
        },
      });
    });
});


//add browse question (Thread List)
$(document).ready(function() {
    $('#add-question').click(function() {
        // Get the values from the input fields
        var questionTitle = $('#question-title').val();
        var questionDescription = $('#question-description').val();
        var categoryId = $('#question-box').attr('category-id');

        $.ajax({
            url: "./server/applyThreadList.php?category-id=" + categoryId,
            type: 'post',
            data: {
                questionTitle: questionTitle,
                questionDescription: questionDescription,
            },
            success: function(data, status) {
                $('#add-browse-question #txtHint').html(data);
            },
            error: function() {
                alert('Error');
            }
        });
    });
});

////add browse answer (Thread)
$(document).ready(function() {
    $('#add-comment').click(function() {
        // Get the values from the input fields
        var commentDescription = $('#comment-description').val();
        var threadId = $('#answer-box').attr('thread-id');

        $.ajax({
            url: "./server/thread.php?thread-id=" + threadId,
            type: 'post',
            data: {
                commentDescription: commentDescription
            },
            success: function(data, status) {
                $('#add-browse-answer #txtHint').html(data);
            },
            error: function() {
                alert('Error');
            }
        });
    });
});
