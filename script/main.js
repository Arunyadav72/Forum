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
        if ($.isEmptyObject(data) || data === "") {
          $("#login-modal #login-message").html(data);
        } else {
          $("#login-modal #login-message").addClass("text-danger");
          $("#login-modal #login-message").html(data);
        }
      },
      error: function () {
        alert("Error");
      },
    });
  });
});

// =============> browse question (Thread List) <=============
$(document).ready(function () {
  function user_alert(alertType, alertName){
    return `<div class="alert ${alertType} alert-dismissible fade show" role="alert">
                <strong> ${alertName}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;
  }

  //When click Add Question button
  $("#add-question").click(function () {
    // Get the values from the input fields
    var questionTitle = $("#question-title").val();
    var questionDescription = $("#question-description").val();
    var categoryId = $("#question-box").attr("category-id");

    if(questionTitle === ''){
      $("#add-browse-question #txtHint").html(user_alert('alert-danger', 'Please add question title'));
    }
    else if(questionDescription === ''){
      $("#add-browse-question #txtHint").html(user_alert('alert-danger', 'Please add description'));
    }
    else{
      $.ajax({
        url: "./server/applyThreadList.php?category-id=" + categoryId,
        type: "post",
        data: {
          questionTitle: questionTitle,
          questionDescription: questionDescription,
        },
        success: function (data, status) {
          $("#add-browse-question #txtHint").html(data);
          display_BrowseQuestion();
        },
        error: function () {
          alert("Error");
        },
      });
    }
  });

  //Display Browse Question
  display_BrowseQuestion();
  function display_BrowseQuestion() {
    var categoryId = $("#question-box").attr("category-id");

    $.ajax({
      url: "./server/applyThreadList.php?category-id=" + categoryId,
      type: "post",
      data: {
        display_BrowseQuestion: "browseQuestion",
      },
      success: function (response, status) {
        var data = JSON.parse(response);
        $('#question-box').children().first().remove();
        if (data.length != 0) {
          for (var i = 0; i < data.length; i++) {
            $('#question-box').prepend(`<section class="d-flex flex-column gap-1 py-2">
                <!-- added user -->
                <div class="d-flex gap-2">
                    <div style="width: 45px; height:45px;" class="border rounded-circle text-center">
                        <i class="bi bi-person fs-2"></i>
                    </div>
                    <div>
                        <p class="m-0 fw-semibold">${data[i].username}</p>
                        <p class="m-0">
                            ${[i].created ? new Date(data[i].created).toLocaleTimeString([], {hour: "2-digit",minute: "2-digit",}) + "||" : ""}
                            ${new Date(data[i].created).toLocaleDateString("en-US",{ day: "numeric", month: "long", year: "numeric" })}
                        </p>
                    </div>
                </div>
                <div class="d-flex gap-3" style="margin-left:20px;">
                    <div style="width:9px;" class="bg-secondary-subtle rounded"></div>
                    <div class="h-100">
                        <a href="thread.php?thread-id=${data[i].thread_id}" class="fw-semibold fs-5">${data[i].thread_title}</a>
                        <p>${data[i].thread_description}</p>
                    </div>
                </div>
            </section>`);
          }
        } else {
          $('#question-box').html(`<div class="jumbotron bg-secondary-subtle p-5 rounded-3">
                    <h1 class="display-6">Browse Question Not Founds</h1>
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            </div>`);
        }
      },
    });
  }
});

////add browse answer (Thread)
$(document).ready(function () {
  $("#add-comment").click(function () {
    // Get the values from the input fields
    var commentDescription = $("#comment-description").val();
    var threadId = $("#answer-box").attr("thread-id");

    $.ajax({
      url: "./server/thread.php?thread-id=" + threadId,
      type: "post",
      data: {
        commentDescription: commentDescription,
      },
      success: function (data, status) {
        $("#add-browse-answer #txtHint").html(data);
      },
      error: function () {
        alert("Error");
      },
    });
  });
});
