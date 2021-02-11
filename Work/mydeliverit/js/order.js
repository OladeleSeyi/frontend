$(document).ready(function () {
  function uuid() {
    var uuid = "",
      i,
      random;

    for (i = 0; i < 12; i++) {
      random = (Math.random() * 16) | 0;

      if (i == 4 || i == 6 || i == 8) {
        uuid += "-";
      }

      uuid += (i == 8 ? 4 : i == 10 ? (random & 3) | 8 : random).toString(16);
    }

    return uuid;
  }

  function mailMaker(data) {
    if (data.service === "Type of Service") {
      return `Good day, ${data.name}.
      
      We just recieved your delivery request.
       Although you did not specify details of the service you will be needing,     
      our agent will contact you shortly on this delivery request. We assume your number ${data.phone} is on whatsapp but will call you if it is not. `;
    }
    if (data.service === "Delivery") {
      return `Good day, ${data.name}.
      
      We just recieved your pickup request. You requested pickup from "${data.pickup}"  to be dropped off at "${data.dropoff}.
      You described your package as such "${data.message}"
      We assume your number ${data.phone} is on whatsapp but will call you if it is not.
      Our agent will contact you shortly on this delivery request. `;
    }
    return `Good day, ${data.name}. We just recieved your errand request. 

    Your errand is: "${data.message}"

    We assume your number ${data.phone} is on whatsapp but will call you if it is not.
    
    Our agent will contact you shortly on this errand request. `;
  }

  // process the form
  $("#orderForm").submit(function (event) {
    $(".form-group").removeClass("alert alert-danger"); // remove the error class
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
      id: uuid(),
      message: $("textarea[name=message]").val(),
    };
    console.log(formData);
    var mail = mailMaker(formData);
    console.log(mail);

    $.post(
      "http://www.deliver-it.ng/phpmailer/ordercontrol.php",
      { ...formData, mail },
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

          // handle errors for pickup---------------
          if (res.errors.pickup) {
            $("#pickup-div").addClass("alert alert-danger"); // add the error class to show red input
            $("#pickup-div").append(
              '<div class="help-block">' + res.errors.pickup + "</div>"
            ); // add the actual error message under our input
          }

          // handle errors for dropoff---------------
          if (res.errors.dropoff) {
            $("#dropoff-div").addClass("alert alert-danger"); // add the error class to show red input
            $("#dropoff-div").append(
              '<div class="help-block">' + res.errors.dropoff + "</div>"
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
          $("#orderForm").append(
            '<div class="alert alert-success">' + res.message + "</div>"
          );
        }
      }
    ).fail(function (data) {
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
