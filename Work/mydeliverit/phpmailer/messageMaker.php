<?php
function mailMaker($name, $dropoff, $pickup, $message, $phone, $service) {
    if ($service == "Delivery") {
        $subject = "Details of Your {$service} Order";
        $str = <<<STR
<!doctype html>
    <html>
    
    <head>
      <meta name="viewport" content="width=device-width" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Simple Transactional Email</title>
      <style>
        img {
          border: none;
          -ms-interpolation-mode: bicubic;
          max-width: 100%;
        }
    
        body {
          background-color: #f6f6f6;
          font-family: sans-serif;
          -webkit-font-smoothing: antialiased;
          font-size: 14px;
          line-height: 1.4;
          margin: 0;
          padding: 0;
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
        }
    
        table {
          border-collapse: separate;
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          width: 100%;
        }
    
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top;
        }
        .body {
          background-color: #f6f6f6;
          width: 100%;
        }
        .container {
          display: block;
          margin: 0 auto !important;
          /* makes it centered */
          max-width: 580px;
          padding: 10px;
          width: 580px;
        }
    
        .content {
          box-sizing: border-box;
          display: block;
          margin: 0 auto;
          max-width: 580px;
          padding: 10px;
        }
        .main {
          background: #ffffff;
          border-radius: 3px;
          width: 100%;
        }
    
        .wrapper {
          box-sizing: border-box;
          padding: 20px;
        }
    
        .content-block {
          padding-bottom: 10px;
          padding-top: 10px;
        }
    
        .footer {
          clear: both;
          margin-top: 10px;
          text-align: center;
          width: 100%;
        }
    
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center;
        }
        h1,
        h2,
        h3,
        h4 {
          color: #000000;
          font-family: sans-serif;
          font-weight: 400;
          line-height: 1.4;
          margin: 0;
          margin-bottom: 30px;
        }
    
        h1 {
          font-size: 35px;
          font-weight: 300;
          text-align: center;
          text-transform: capitalize;
        }
    
        p,
        ul,
        ol {
          font-family: sans-serif;
          font-size: 14px;
          font-weight: normal;
          margin: 0;
          margin-bottom: 15px;
        }
    
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px;
        }
    
        a {
          color: #3498db;
          text-decoration: underline;
        }
        .btn {
          box-sizing: border-box;
          width: 100%;
        }
    
        .btn>tbody>tr>td {
          padding-bottom: 15px;
        }
    
        .btn table {
          width: auto;
        }
    
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center;
        }
    
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize;
        }
    
        .btn-primary table td {
          background-color: #3498db;
        }
    
        .btn-primary a {
          background-color: #3498db;
          border-color: #3498db;
          color: #ffffff;
        }
        .last {
          margin-bottom: 0;
        }
    
        .first {
          margin-top: 0;
        }
    
        .align-center {
          text-align: center;
        }
    
        .align-right {
          text-align: right;
        }
    
        .align-left {
          text-align: left;
        }
    
        .clear {
          clear: both;
        }
    
        .mt0 {
          margin-top: 0;
        }
    
        .mb0 {
          margin-bottom: 0;
        }
    
        .preheader {
          color: transparent;
          display: none;
          height: 0;
          max-height: 0;
          max-width: 0;
          opacity: 0;
          overflow: hidden;
          mso-hide: all;
          visibility: hidden;
          width: 0;
        }
    
        .powered-by a {
          text-decoration: none;
        }
    
        hr {
          border: 0;
          border-bottom: 1px solid #f6f6f6;
          margin: 20px 0;
        }
    
        blockquote {
          font-size: 1.25rem;
          display: block;
          margin-block-start: 1em;
          margin-block-end: 1em;
          margin-inline-start: 0px;
          margin-inline-end: 0px;
          font-weight: 400;
    
        }
        @media only screen and (max-width: 620px) {
          table[class=body] h1 {
            font-size: 28px !important;
            margin-bottom: 10px !important;
          }
    
          table[class=body] p,
          table[class=body] ul,
          table[class=body] ol,
          table[class=body] td,
          table[class=body] span,
          table[class=body] a {
            font-size: 16px !important;
          }
    
          table[class=body] .wrapper,
          table[class=body] .article {
            padding: 10px !important;
          }
    
          table[class=body] .content {
            padding: 0 !important;
          }
    
          table[class=body] .container {
            padding: 0 !important;
            width: 100% !important;
          }
    
          table[class=body] .main {
            border-left-width: 0 !important;
            border-radius: 0 !important;
            border-right-width: 0 !important;
          }
    
          table[class=body] .btn table {
            width: 100% !important;
          }
    
          table[class=body] .btn a {
            width: 100% !important;
          }
    
          table[class=body] .img-responsive {
            height: auto !important;
            max-width: 100% !important;
            width: auto !important;
          }
        }
        @media all {
          .ExternalClass {
            width: 100%;
          }
    
          .ExternalClass,
          .ExternalClass p,
          .ExternalClass span,
          .ExternalClass font,
          .ExternalClass td,
          .ExternalClass div {
            line-height: 100%;
          }
    
          .apple-link a {
            color: inherit !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            text-decoration: none !important;
          }
    
          #MessageViewBody a {
            color: inherit;
            text-decoration: none;
            font-size: inherit;
            font-family: inherit;
            font-weight: inherit;
            line-height: inherit;
          }
    
          .btn-primary table td:hover {
            background-color: #34495e !important;
          }
    
          .btn-primary a:hover {
            background-color: #34495e !important;
            border-color: #34495e !important;
          }
        }
      </style>
    </head>
    
    <body class="">
      <span class="preheader">Message to Deliver-IT</span>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
          <td>&nbsp;</td>
          <td class="container">
            <div class="content">
    
              <table role="presentation" class="main">
    
                <tr>
                  <td class="wrapper">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                            <tbody>
                              <tr>
                                <td align="center">
                                  <table border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <blockquote>
                                            <img src="http://deliver-it.ng/images/logo.png" </blockquote>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <p>Good Day $name,</p>
                          <p>We just recieved your pickup request. You requested pickup from "$pickup"  to be dropped off at "$dropoff".</p>
                          <p>You described your package as: </p>
                            <blockquote>
                                          "$message" </blockquote>
                          <p>We assume your number $phone is on whatsapp but will call you if it is not. </p>
                          <p>
                            Our agent will contact you shortly on this delivery request. 
                          </p>
    
                          <p>Team Deliver-IT</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
    
              </table>
   
              <div class="footer">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="content-block">
                      <span class="apple-link">Deliver-It, Suite B29D, Platinum Mega Mall Jahi District, Abuja</span>
    
                    </td>
                  </tr>
                  <tr>
                    <td class="content-block powered-by">
    
                    </td>
                  </tr>
                </table>
              </div>
    
            </div>
          </td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </body>
    
    </html> 
STR;
        
    } elseif ($service == "Errand") {
        $subject = "Details of Your {$service} Order";
        $str = <<<STR
<!doctype html>
  <html>
  
  <head>
      <meta name="viewport" content="width=device-width" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Simple Transactional Email</title>
      <style>
        img {
          border: none;
          -ms-interpolation-mode: bicubic;
          max-width: 100%;
        }
    
        body {
          background-color: #f6f6f6;
          font-family: sans-serif;
          -webkit-font-smoothing: antialiased;
          font-size: 14px;
          line-height: 1.4;
          margin: 0;
          padding: 0;
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
        }
    
        table {
          border-collapse: separate;
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          width: 100%;
        }
    
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top;
        }
        .body {
          background-color: #f6f6f6;
          width: 100%;
        }
        .container {
          display: block;
          margin: 0 auto !important;
          /* makes it centered */
          max-width: 580px;
          padding: 10px;
          width: 580px;
        }
    
        .content {
          box-sizing: border-box;
          display: block;
          margin: 0 auto;
          max-width: 580px;
          padding: 10px;
        }
        .main {
          background: #ffffff;
          border-radius: 3px;
          width: 100%;
        }
    
        .wrapper {
          box-sizing: border-box;
          padding: 20px;
        }
    
        .content-block {
          padding-bottom: 10px;
          padding-top: 10px;
        }
    
        .footer {
          clear: both;
          margin-top: 10px;
          text-align: center;
          width: 100%;
        }
    
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center;
        }
        h1,
        h2,
        h3,
        h4 {
          color: #000000;
          font-family: sans-serif;
          font-weight: 400;
          line-height: 1.4;
          margin: 0;
          margin-bottom: 30px;
        }
    
        h1 {
          font-size: 35px;
          font-weight: 300;
          text-align: center;
          text-transform: capitalize;
        }
    
        p,
        ul,
        ol {
          font-family: sans-serif;
          font-size: 14px;
          font-weight: normal;
          margin: 0;
          margin-bottom: 15px;
        }
    
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px;
        }
    
        a {
          color: #3498db;
          text-decoration: underline;
        }
        .btn {
          box-sizing: border-box;
          width: 100%;
        }
    
        .btn>tbody>tr>td {
          padding-bottom: 15px;
        }
    
        .btn table {
          width: auto;
        }
    
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center;
        }
    
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize;
        }
    
        .btn-primary table td {
          background-color: #3498db;
        }
    
        .btn-primary a {
          background-color: #3498db;
          border-color: #3498db;
          color: #ffffff;
        }
        .last {
          margin-bottom: 0;
        }
    
        .first {
          margin-top: 0;
        }
    
        .align-center {
          text-align: center;
        }
    
        .align-right {
          text-align: right;
        }
    
        .align-left {
          text-align: left;
        }
    
        .clear {
          clear: both;
        }
    
        .mt0 {
          margin-top: 0;
        }
    
        .mb0 {
          margin-bottom: 0;
        }
    
        .preheader {
          color: transparent;
          display: none;
          height: 0;
          max-height: 0;
          max-width: 0;
          opacity: 0;
          overflow: hidden;
          mso-hide: all;
          visibility: hidden;
          width: 0;
        }
    
        .powered-by a {
          text-decoration: none;
        }
    
        hr {
          border: 0;
          border-bottom: 1px solid #f6f6f6;
          margin: 20px 0;
        }
    
        blockquote {
          font-size: 1.25rem;
          display: block;
          margin-block-start: 1em;
          margin-block-end: 1em;
          margin-inline-start: 0px;
          margin-inline-end: 0px;
          font-weight: 400;
    
        }
        @media only screen and (max-width: 620px) {
          table[class=body] h1 {
            font-size: 28px !important;
            margin-bottom: 10px !important;
          }
    
          table[class=body] p,
          table[class=body] ul,
          table[class=body] ol,
          table[class=body] td,
          table[class=body] span,
          table[class=body] a {
            font-size: 16px !important;
          }
    
          table[class=body] .wrapper,
          table[class=body] .article {
            padding: 10px !important;
          }
    
          table[class=body] .content {
            padding: 0 !important;
          }
    
          table[class=body] .container {
            padding: 0 !important;
            width: 100% !important;
          }
    
          table[class=body] .main {
            border-left-width: 0 !important;
            border-radius: 0 !important;
            border-right-width: 0 !important;
          }
    
          table[class=body] .btn table {
            width: 100% !important;
          }
    
          table[class=body] .btn a {
            width: 100% !important;
          }
    
          table[class=body] .img-responsive {
            height: auto !important;
            max-width: 100% !important;
            width: auto !important;
          }
        }
        @media all {
          .ExternalClass {
            width: 100%;
          }
    
          .ExternalClass,
          .ExternalClass p,
          .ExternalClass span,
          .ExternalClass font,
          .ExternalClass td,
          .ExternalClass div {
            line-height: 100%;
          }
    
          .apple-link a {
            color: inherit !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            text-decoration: none !important;
          }
    
          #MessageViewBody a {
            color: inherit;
            text-decoration: none;
            font-size: inherit;
            font-family: inherit;
            font-weight: inherit;
            line-height: inherit;
          }
    
          .btn-primary table td:hover {
            background-color: #34495e !important;
          }
    
          .btn-primary a:hover {
            background-color: #34495e !important;
            border-color: #34495e !important;
          }
        }
      </style>
    </head>
  
  <body class="">
    <span class="preheader">Message to Deliver-IT</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">
  
            <table role="presentation" class="main">
  
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="center">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td>
                                        <blockquote>
                                          <img src="http://deliver-it.ng/images/logo.png" </blockquote>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Good Day $name,</p>
                        <p>We just recieved your errand request. </p>
                        <p>Your errand is:</p>
                          <blockquote>
                                        "$message" </blockquote>
                        <p>
                        <p>Your dropoff address is: $dropoff</p>
                        <p>We assume your number $phone is on whatsapp but will call you if it is not. </p>
                          Our agent will contact you shortly on this errand request.  
                        </p>
  
                        <p>Team Deliver-IT</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
  
            </table>
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">Deliver-It, Suite B29D, Platinum Mega Mall Jahi District, Abuja</span>
  
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
  
                  </td>
                </tr>
              </table>
            </div>
  
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
  
  </html>
STR;
        
    } else {
        $subject = "Details of Your Order";
        $str = <<<STR
<!doctype html>
    <html>
    
    <head>
      <meta name="viewport" content="width=device-width" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Simple Transactional Email</title>
      <style>
        img {
          border: none;
          -ms-interpolation-mode: bicubic;
          max-width: 100%;
        }
    
        body {
          background-color: #f6f6f6;
          font-family: sans-serif;
          -webkit-font-smoothing: antialiased;
          font-size: 14px;
          line-height: 1.4;
          margin: 0;
          padding: 0;
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
        }
    
        table {
          border-collapse: separate;
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          width: 100%;
        }
    
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top;
        }
        .body {
          background-color: #f6f6f6;
          width: 100%;
        }
        .container {
          display: block;
          margin: 0 auto !important;
          /* makes it centered */
          max-width: 580px;
          padding: 10px;
          width: 580px;
        }
    
        .content {
          box-sizing: border-box;
          display: block;
          margin: 0 auto;
          max-width: 580px;
          padding: 10px;
        }
        .main {
          background: #ffffff;
          border-radius: 3px;
          width: 100%;
        }
    
        .wrapper {
          box-sizing: border-box;
          padding: 20px;
        }
    
        .content-block {
          padding-bottom: 10px;
          padding-top: 10px;
        }
    
        .footer {
          clear: both;
          margin-top: 10px;
          text-align: center;
          width: 100%;
        }
    
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center;
        }
        h1,
        h2,
        h3,
        h4 {
          color: #000000;
          font-family: sans-serif;
          font-weight: 400;
          line-height: 1.4;
          margin: 0;
          margin-bottom: 30px;
        }
    
        h1 {
          font-size: 35px;
          font-weight: 300;
          text-align: center;
          text-transform: capitalize;
        }
    
        p,
        ul,
        ol {
          font-family: sans-serif;
          font-size: 14px;
          font-weight: normal;
          margin: 0;
          margin-bottom: 15px;
        }
    
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px;
        }
    
        a {
          color: #3498db;
          text-decoration: underline;
        }
        .btn {
          box-sizing: border-box;
          width: 100%;
        }
    
        .btn>tbody>tr>td {
          padding-bottom: 15px;
        }
    
        .btn table {
          width: auto;
        }
    
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center;
        }
    
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize;
        }
    
        .btn-primary table td {
          background-color: #3498db;
        }
    
        .btn-primary a {
          background-color: #3498db;
          border-color: #3498db;
          color: #ffffff;
        }
        .last {
          margin-bottom: 0;
        }
    
        .first {
          margin-top: 0;
        }
    
        .align-center {
          text-align: center;
        }
    
        .align-right {
          text-align: right;
        }
    
        .align-left {
          text-align: left;
        }
    
        .clear {
          clear: both;
        }
    
        .mt0 {
          margin-top: 0;
        }
    
        .mb0 {
          margin-bottom: 0;
        }
    
        .preheader {
          color: transparent;
          display: none;
          height: 0;
          max-height: 0;
          max-width: 0;
          opacity: 0;
          overflow: hidden;
          mso-hide: all;
          visibility: hidden;
          width: 0;
        }
    
        .powered-by a {
          text-decoration: none;
        }
    
        hr {
          border: 0;
          border-bottom: 1px solid #f6f6f6;
          margin: 20px 0;
        }
    
        blockquote {
          font-size: 1.25rem;
          display: block;
          margin-block-start: 1em;
          margin-block-end: 1em;
          margin-inline-start: 0px;
          margin-inline-end: 0px;
          font-weight: 400;
    
        }
        @media only screen and (max-width: 620px) {
          table[class=body] h1 {
            font-size: 28px !important;
            margin-bottom: 10px !important;
          }
    
          table[class=body] p,
          table[class=body] ul,
          table[class=body] ol,
          table[class=body] td,
          table[class=body] span,
          table[class=body] a {
            font-size: 16px !important;
          }
    
          table[class=body] .wrapper,
          table[class=body] .article {
            padding: 10px !important;
          }
    
          table[class=body] .content {
            padding: 0 !important;
          }
    
          table[class=body] .container {
            padding: 0 !important;
            width: 100% !important;
          }
    
          table[class=body] .main {
            border-left-width: 0 !important;
            border-radius: 0 !important;
            border-right-width: 0 !important;
          }
    
          table[class=body] .btn table {
            width: 100% !important;
          }
    
          table[class=body] .btn a {
            width: 100% !important;
          }
    
          table[class=body] .img-responsive {
            height: auto !important;
            max-width: 100% !important;
            width: auto !important;
          }
        }
        @media all {
          .ExternalClass {
            width: 100%;
          }
    
          .ExternalClass,
          .ExternalClass p,
          .ExternalClass span,
          .ExternalClass font,
          .ExternalClass td,
          .ExternalClass div {
            line-height: 100%;
          }
    
          .apple-link a {
            color: inherit !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            text-decoration: none !important;
          }
    
          #MessageViewBody a {
            color: inherit;
            text-decoration: none;
            font-size: inherit;
            font-family: inherit;
            font-weight: inherit;
            line-height: inherit;
          }
    
          .btn-primary table td:hover {
            background-color: #34495e !important;
          }
    
          .btn-primary a:hover {
            background-color: #34495e !important;
            border-color: #34495e !important;
          }
        }
      </style>
    </head>
    
    <body class="">
      <span class="preheader">Message to Deliver-IT</span>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
          <td>&nbsp;</td>
          <td class="container">
            <div class="content">
              <table role="presentation" class="main">
                <tr>
                  <td class="wrapper">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                            <tbody>
                              <tr>
                                <td align="center">
                                  <table border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <blockquote>
                                            <img src="http://deliver-it.ng/images/logo.png" </blockquote>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <p>Good Day $name,</p>
                          <p>You just completed the order form on our website.</p>
                          <p>
                            We have recieved your delivery request. Although you did not specify details of the service you will be needing,     
          our agent will contact you shortly on this delivery request.
                          </p>
                          <p>We assume your number $phone is on whatsapp but will call you if it is not. </p>
                          <p>Team Deliver-IT</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              
              <div class="footer">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="content-block">
                      <span class="apple-link">Deliver-It, Suite B29D, Platinum Mega Mall Jahi District, Abuja</span>
    
                    </td>
                  </tr>
                  <tr>
                    <td class="content-block powered-by">
    
                    </td>
                  </tr>
                </table>
              </div>
    
            </div>
          </td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </body>
    
    </html>
STR;
        
    }
    return array($str, $subject);
}

function complaintMaker($name, $orderId, $complaintId, $message, $phone, $service) {
  $subject = "[Complaint {$complaintId}] We recieved your Complaint";
      $str = <<<STR
<!doctype html>
  <html>
  
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%;
      }
  
      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
      }
  
      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%;
      }
  
      table td {
        font-family: sans-serif;
        font-size: 14px;
        vertical-align: top;
      }
      .body {
        background-color: #f6f6f6;
        width: 100%;
      }
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px;
      }
  
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px;
      }
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%;
      }
  
      .wrapper {
        box-sizing: border-box;
        padding: 20px;
      }
  
      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }
  
      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%;
      }
  
      .footer td,
      .footer p,
      .footer span,
      .footer a {
        color: #999999;
        font-size: 12px;
        text-align: center;
      }
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px;
      }
  
      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize;
      }
  
      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px;
      }
  
      p li,
      ul li,
      ol li {
        list-style-position: inside;
        margin-left: 5px;
      }
  
      a {
        color: #3498db;
        text-decoration: underline;
      }
      .btn {
        box-sizing: border-box;
        width: 100%;
      }
  
      .btn>tbody>tr>td {
        padding-bottom: 15px;
      }
  
      .btn table {
        width: auto;
      }
  
      .btn table td {
        background-color: #ffffff;
        border-radius: 5px;
        text-align: center;
      }
  
      .btn a {
        background-color: #ffffff;
        border: solid 1px #3498db;
        border-radius: 5px;
        box-sizing: border-box;
        color: #3498db;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        font-weight: bold;
        margin: 0;
        padding: 12px 25px;
        text-decoration: none;
        text-transform: capitalize;
      }
  
      .btn-primary table td {
        background-color: #3498db;
      }
  
      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff;
      }
      .last {
        margin-bottom: 0;
      }
  
      .first {
        margin-top: 0;
      }
  
      .align-center {
        text-align: center;
      }
  
      .align-right {
        text-align: right;
      }
  
      .align-left {
        text-align: left;
      }
  
      .clear {
        clear: both;
      }
  
      .mt0 {
        margin-top: 0;
      }
  
      .mb0 {
        margin-bottom: 0;
      }
  
      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0;
      }
  
      .powered-by a {
        text-decoration: none;
      }
  
      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0;
      }
  
      blockquote {
        font-size: 1.25rem;
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: 400;
  
      }
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important;
        }
  
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important;
        }
  
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important;
        }
  
        table[class=body] .content {
          padding: 0 !important;
        }
  
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important;
        }
  
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important;
        }
  
        table[class=body] .btn table {
          width: 100% !important;
        }
  
        table[class=body] .btn a {
          width: 100% !important;
        }
  
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important;
        }
      }
      @media all {
        .ExternalClass {
          width: 100%;
        }
  
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%;
        }
  
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important;
        }
  
        #MessageViewBody a {
          color: inherit;
          text-decoration: none;
          font-size: inherit;
          font-family: inherit;
          font-weight: inherit;
          line-height: inherit;
        }
  
        .btn-primary table td:hover {
          background-color: #34495e !important;
        }
  
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important;
        }
      }
    </style>
  </head>
  
  <body class="">
    <span class="preheader">Message to Deliver-IT</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">
  
            <table role="presentation" class="main">
  
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="center">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td>
                                        <blockquote>
                                          <img src="http://deliver-it.ng/images/logo.png" </blockquote>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Good Day $name,</p>
                        <p>You just logged a complaint for $service request $orderId. </p>
                        <p>Your complaint is:</p>
                          <blockquote>
                                        "$message" </blockquote>
                        <p>Your number $phone will be used to contact you.</p>
                        <p>Your complaint ID is $complaintId</p>
                        <p>
                        We apologize that this occurred and we will get in touch with you shortly to resolve it. 
                        </p>
  
                        <p>Team Deliver-IT</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
  
            </table>
 
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">Deliver-It, Suite B29D, Platinum Mega Mall Jahi District, Abuja</span>
  
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
  
                  </td>
                </tr>
              </table>
            </div>
  
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
  
  </html> 
STR;
 return array($str, $subject);     
  }


function complaintMaker() {
  $subject = "FeedBack Submission";
      $str = <<<STR
<!doctype html>
  <html>
  
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%;
      }
  
      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
      }
  
      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%;
      }
  
      table td {
        font-family: sans-serif;
        font-size: 14px;
        vertical-align: top;
      }
      .body {
        background-color: #f6f6f6;
        width: 100%;
      }
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px;
      }
  
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px;
      }
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%;
      }
  
      .wrapper {
        box-sizing: border-box;
        padding: 20px;
      }
  
      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }
  
      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%;
      }
  
      .footer td,
      .footer p,
      .footer span,
      .footer a {
        color: #999999;
        font-size: 12px;
        text-align: center;
      }
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px;
      }
  
      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize;
      }
  
      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px;
      }
  
      p li,
      ul li,
      ol li {
        list-style-position: inside;
        margin-left: 5px;
      }
  
      a {
        color: #3498db;
        text-decoration: underline;
      }
      .btn {
        box-sizing: border-box;
        width: 100%;
      }
  
      .btn>tbody>tr>td {
        padding-bottom: 15px;
      }
  
      .btn table {
        width: auto;
      }
  
      .btn table td {
        background-color: #ffffff;
        border-radius: 5px;
        text-align: center;
      }
  
      .btn a {
        background-color: #ffffff;
        border: solid 1px #3498db;
        border-radius: 5px;
        box-sizing: border-box;
        color: #3498db;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        font-weight: bold;
        margin: 0;
        padding: 12px 25px;
        text-decoration: none;
        text-transform: capitalize;
      }
  
      .btn-primary table td {
        background-color: #3498db;
      }
  
      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff;
      }
      .last {
        margin-bottom: 0;
      }
  
      .first {
        margin-top: 0;
      }
  
      .align-center {
        text-align: center;
      }
  
      .align-right {
        text-align: right;
      }
  
      .align-left {
        text-align: left;
      }
  
      .clear {
        clear: both;
      }
  
      .mt0 {
        margin-top: 0;
      }
  
      .mb0 {
        margin-bottom: 0;
      }
  
      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0;
      }
  
      .powered-by a {
        text-decoration: none;
      }
  
      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0;
      }
  
      blockquote {
        font-size: 1.25rem;
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: 400;
  
      }
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important;
        }
  
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important;
        }
  
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important;
        }
  
        table[class=body] .content {
          padding: 0 !important;
        }
  
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important;
        }
  
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important;
        }
  
        table[class=body] .btn table {
          width: 100% !important;
        }
  
        table[class=body] .btn a {
          width: 100% !important;
        }
  
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important;
        }
      }
      @media all {
        .ExternalClass {
          width: 100%;
        }
  
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%;
        }
  
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important;
        }
  
        #MessageViewBody a {
          color: inherit;
          text-decoration: none;
          font-size: inherit;
          font-family: inherit;
          font-weight: inherit;
          line-height: inherit;
        }
  
        .btn-primary table td:hover {
          background-color: #34495e !important;
        }
  
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important;
        }
      }
    </style>
  </head>
  
  <body class="">
    <span class="preheader">Message to Deliver-IT</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">
  
            <table role="presentation" class="main">
  
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="center">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td>
                                        <blockquote>
                                          <img src="http://deliver-it.ng/images/logo.png" </blockquote>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Good Day,</p>
                          <p>We have just recieved your submission. Thank you for your time and patronage
                          </p>
  
                        <p>Team Deliver-IT</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
  
            </table>
 
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">Deliver-It, Suite B29D, Platinum Mega Mall Jahi District, Abuja</span>
  
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
  
                  </td>
                </tr>
              </table>
            </div>
  
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
  
  </html> 
STR;
 return array($str, $subject);     
  }
