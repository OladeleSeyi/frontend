$(document).ready(function () {
  function mailMaker(data) {
    return `Good day, We have just recieved your submission. Thank you for your time and patronage`;
  }

  // process the form
  $("#feedbackForm").submit(function (event) {
    event.preventDefault();
    $(".form-group").removeClass("alert alert-danger"); // remove the error class
    $(".help-block").remove(); // remove the error text

    // get the form data
    // there are many ways to get this data using jQuery (you can use the class or id also)
    var formData = {
      orderId: $("input[name=orderId]").val(),
      email: $("input[name=email]").val(),
      service: $("select[name=service]").val(),
      referral: $("select[name=refer]").val(),
      churn: $("select[name=repeat]").val(),
      recommend: $("select[name=recommend]").val(),
      hpot: $("input[name=hpot]").val(),
      message: $("textarea[name=message]").val(),
    };
    formData.mail = mailMaker(formData);

    console.log(formData);

    $.post(
      "http://www.deliver-it.ng/phpmailer/feedbackcontrol.php",
      formData,
      function (data) {
        // place success code here
        // log data to the console so we can see

        console.log(data);
        let res = JSON.parse(data);
        console.log(res);

        // here we will handle errors and validation messages
        if (!res.success) {
          // handle errors for name

          // handle errors for Order Id---------------

          // handle errors for message---------------
          if (res.errors.other) {
            $("#other-div").addClass("alert alert-danger"); // add the error class to show red input
            $("#other-div").append(
              '<div class="help-block">' + res.errors.other + "</div>"
            ); // add the actual error message under our input
          }
        } else {
          $("#feedbackForm").append(
            '<div class="alert alert-success">' + res.message + "</div>"
          );
        }
      }
    ).fail(function (data) {
      // place error code here
      //Server failed to respond - Show an error message
      $("#feedbackForm").append(
        '<div class="alert alert-danger help-block">Could not reach server, please try again later.</div>'
      );
    });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
  });
});
