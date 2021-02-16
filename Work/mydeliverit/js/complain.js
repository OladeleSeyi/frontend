$(document).ready(function () {
  function uuid() {
    var uuid = "",
      i,
      random;

    for (i = 0; i < 6; i++) {
      random = (Math.random() * 16) | 0;

      if (i == 4 || i == 6 || i == 8) {
        uuid;
      }

      uuid += (i == 3 ? 2 : i == 4 ? (random & 3) | 5 : random).toString(6);
    }

    return uuid;
  }

  function mailMaker(data) {
    return `Good day, ${data.name}. You just logged a complaint for ${data.service} request ${data.orderId}. 
  
    Your complaint is: "${data.message}"
    Your number ${data.phone} will be used to contact you.
  
    We apologize that this occurred and we will get in touch with you shortly to resolve it. `;
  }

  // process the form
  $("#complainForm").submit(function (event) {
    event.preventDefault();
    $(".form-group").removeClass("alert alert-danger"); // remove the error class
    $(".help-block").remove(); // remove the error text

    // get the form data
    // there are many ways to get this data using jQuery (you can use the class or id also)
    var formData = {
      name: $("input[name=name]").val(),
      email: $("input[name=email]").val(),
      phone: $("input[name=phone]").val(),
      service: $("select[name=service]").val(),
      orderId: $("input[name=orderId]").val(),
      hpot: $("input[name=hpot]").val(),
      complaintId: uuid(),
      message: $("textarea[name=message]").val(),
    };
    formData.mail = mailMaker(formData);

    console.log(formData);

    $.post(
      "http://www.deliver-it.ng/phpmailer/complaincontrol.php",
      formData,
      function (data) {
        // place success code here
        // log data to the console so we can see

        console.log(data);
        let res = JSON.parse(data);
        console.log(res);

        // here we will handle errors and validation messages
        if (!res.success) {
          // handle errors for name ---------------
          if (res.errors.name) {
            $("#name-div").addClass("alert alert-danger"); // add the error class to show red input
            $("#name-div").append(
              '<div class="help-block">' + res.errors.name + "</div>"
            ); // add the actual error message under our input
          }
          // handle errors for email ---------------
          if (res.errors.email) {
            $("#email-div").addClass("alert alert-danger"); // add the error class to show red input
            $("#email-div").append(
              '<div class="help-block">' + res.errors.email + "</div>"
            ); // add the actual error message under our input
          }

          // handle errors for phone ---------------
          if (res.errors.phone) {
            $("#phone-div").addClass("alert alert-danger"); // add the error class to show red input
            $("#phone-div").append(
              '<div class="help-block">' + res.errors.phone + "</div>"
            ); // add the actual error message under our input
          }

          // handle errors for service---------------
          if (res.errors.service) {
            $("#service-div").addClass("alert alert-danger"); // add the error class to show red input
            $("#service-div").append(
              '<div class="help-block">' + res.errors.service + "</div>"
            ); // add the actual error message under our input
          }

          // handle errors for Order Id---------------
          if (res.errors.orderId) {
            $("#orderId-div").addClass("alert alert-danger"); // add the error class to show red input
            $("#orderId-div").append(
              '<div class="help-block">' + res.errors.orderId + "</div>"
            ); // add the actual error message under our input
          }

          // handle errors for message---------------
          if (res.errors.message) {
            $("#message-div").addClass("alert alert-danger"); // add the error class to show red input
            $("#message-div").append(
              '<div class="help-block">' + res.errors.message + "</div>"
            ); // add the actual error message under our input
          }

          // handle errors for message---------------
          if (res.errors.other) {
            $("#other-div").addClass("alert alert-danger"); // add the error class to show red input
            $("#other-div").append(
              '<div class="help-block">' + res.errors.other + "</div>"
            ); // add the actual error message under our input
          }
        } else {
          $("#complainForm").append(
            '<div class="alert alert-success">' + res.message + "</div>"
          );
        }
      }
    ).fail(function (data) {
      // place error code here
      //Server failed to respond - Show an error message
      $("#complainForm").append(
        '<div class="alert alert-danger help-block">Could not reach server, please try again later.</div>'
      );
    });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
  });
});
