$(document).ready(function () {
  // process the form
  $("form").submit(function (event) {
    $(".form-group").removeClass("has-error"); // remove the error class
    $(".help-block").remove(); // remove the error text

    // get the form data
    // there are many ways to get this data using jQuery (you can use the class or id also)
    var formData = {
      name: $("input[name=name]").val(),
      email: $("input[name=email]").val(),
      phone: $("input[name=phone]").val(),
      service: $("select[name=service]").val(),
      pickup: $("input[name=pickup]").val(),
      dropoff: $("input[name=dropoff]").val(),
      hpot: $("input[name=hpot]").val(),
      message: $("input[name=message]").val(),
    };
    console.log("object", { ...formData, mail: "mail" });

    $.post("phpmailer/order.php", formData, function (data) {
      // place success code here
      // log data to the console so we can see
      console.log(data);

      // here we will handle errors and validation messages
      if (!data.success) {
        // handle errors for name ---------------
        if (data.errors.name) {
          $("#name-div").addClass("alert alert-dangerr"); // add the error class to show red input
          $("#name-div").append(
            '<div class="help-block">' + data.errors.name + "</div>"
          ); // add the actual error message under our input
        }

        // handle errors for email ---------------
        if (data.errors.email) {
          $("#email-div").addClass("alert alert-danger"); // add the error class to show red input
          $("#email-div").append(
            '<div class="help-block">' + data.errors.email + "</div>"
          ); // add the actual error message under our input
        }

        // handle errors for phone ---------------
        if (data.errors.phone) {
          $("#phone-div").addClass("alert alert-danger"); // add the error class to show red input
          $("#phone-div").append(
            '<div class="help-block">' + data.errors.phone + "</div>"
          ); // add the actual error message under our input
        }

        // handle errors for service---------------
        if (data.errors.service) {
          $("#service-div").addClass("alert alert-danger"); // add the error class to show red input
          $("#service-div").append(
            '<div class="help-block">' + data.errors.service + "</div>"
          ); // add the actual error message under our input
        }

        // handle errors for superhero alias ---------------
        if (data.errors.pickup) {
          $("#pickup-div").addClass("alert alert-danger"); // add the error class to show red input
          $("#pickup-div").append(
            '<div class="help-block">' + data.errors.pickup + "</div>"
          ); // add the actual error message under our input
        }

        // handle errors for superhero alias ---------------
        if (data.errors.dropoff) {
          $("#dropoff-div").addClass("alert alert-danger"); // add the error class to show red input
          $("#dropoff-div").append(
            '<div class="help-block">' + data.errors.dropoff + "</div>"
          ); // add the actual error message under our input
        }

        // handle errors for superhero alias ---------------
        if (data.errors.message) {
          $("#message-div").addClass("alert alert-danger"); // add the error class to show red input
          $("#message-div").append(
            '<div class="help-block">' + data.errors.message + "</div>"
          ); // add the actual error message under our input
        }
      } else {
        // ALL GOOD! just show the success message!
        $("#orderForm").append(
          '<div class="alert alert-success">' + data.message + "</div>"
        );
      }
    }).fail(function (data) {
      // place error code here
      //Server failed to respond - Show an error message
      $("#orderForm").append(
        '<div class="alert alert-danger help-block">Could not reach server, please try again later.</div>'
      );
    });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
  });
});
