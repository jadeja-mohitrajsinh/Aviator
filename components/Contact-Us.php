<?php

$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  if (empty($nameErr) && empty($emailErr)) {
    echo "Name: $name<br>";
    echo "Email: $email<br>";
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<head>
<link rel="stylesheet" href="../css/style.css">

</head>
<script src="contact-post"></script>
    <section class="contact">
        <div class="background">
            <div class="container-login">
                <div class="screen">
                    <div class="screen-header">
                        <div class="screen-header-left">
                            <div class="screen-header-button close"></div>
                            <div class="screen-header-button maximize"></div>
                            <div class="screen-header-button minimize"></div>
                        </div>
                        <div class="screen-header-right">
                            <div class="screen-header-ellipsis"></div>
                            <div class="screen-header-ellipsis"></div>
                            <div class="screen-header-ellipsis"></div>
                        </div>
                    </div>
                    <div class="screen-body">
                        <div class="screen-body-item left">
                            <div class="app-title">
                                <span>CONTACT</span>
                                <span>US</span>
                            </div>
                        </div>
                        <div class="screen-body-item">
                            <div class="app-form">
                                <form id="contactForm">
                                    <div class="app-form-group">
                                        <input id="name" name="name" class="app-form-control" placeholder="NAME" value="" />
                                    </div>
                                    <div class="app-form-group">
                                        <input id="email" name="email" class="app-form-control" placeholder="EMAIL" />
                                    </div>
                                    <div class="app-form-group">
                                        <input id="contact_no" name="contact_no" class="app-form-control" placeholder="CONTACT NO" />
                                    </div>
                                    <div class="app-form-group message">
                                        <input id="message" name="message" class="app-form-control" placeholder="MESSAGE" />
                                    </div>
                                    <div class="app-form-group buttons">
                                        <button type="button" class="app-form-button" onclick="cancelForm()">CANCEL</button>
                                        <button type="button" class="app-form-button" onclick="submitForm()">SEND</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>