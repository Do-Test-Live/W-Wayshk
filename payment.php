<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

if (isset($_POST["placeOrder"])) {

    $f_name = $db_handle->checkValue($_POST['f_name']);
    $l_name = $db_handle->checkValue($_POST['l_name']);
    $phone = $db_handle->checkValue($_POST['phone_number']);
    $email = $db_handle->checkValue($_POST['email']);
    $address = $db_handle->checkValue($_POST['address']);
    $city = $db_handle->checkValue($_POST['city']);
    $zip_code = $db_handle->checkValue($_POST['zip_code']);
    $addInfo = $db_handle->checkValue($_POST['addInfo']);
    $payment = $db_handle->checkValue($_POST['payment']);

    $inserted_at = date("Y-m-d H:i:s");

    $insert_user = $db_handle->insertQuery("INSERT INTO `information`(`f_name`, `l_name`, `phone`, `email`, `schedule`, `heart_problem`, `chest_pain_physical_activity`, `chest_pain_not_physical_activity`, `felt_dizzy`, `joint_problem`, `blood_pressure`, `other_reason`, `inserted_at`) VALUES  ('$f_name','$l_name','$phone','$email','$schedule','$heart_problem','$chest_pain_physical_activity','$chest_pain_not_physical_activity','$felt_dizzy','$joint_problem','$blood_pressure','$other_reason','$inserted_at')");

    $data = $db_handle->runQuery("SELECT id FROM information order by id desc LIMIT  1");

    $id = $data[0]['id'];

    // Include configuration file
    require_once 'config.php';

    if (isset($_SESSION) && $insert_user) {
        session_unset();
        session_destroy();

        session_start();
        $_SESSION['user_id'] = $id;
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                .loader {
                    position: absolute;
                    width: 100px;
                    height: 100px;
                    left: 50%;
                    top: 50%;
                    margin-left: -50px;
                    margin-top: -50px;
                }

                .loader {
                    border: 16px solid #f3f3f3;
                    border-radius: 50%;
                    border-top: 16px solid #ffcba3;
                    width: 120px;
                    height: 120px;
                    -webkit-animation: spin 2s linear infinite; /* Safari */
                    animation: spin 2s linear infinite;
                }

                /* Safari */
                @-webkit-keyframes spin {
                    0% {
                        -webkit-transform: rotate(0deg);
                    }
                    100% {
                        -webkit-transform: rotate(360deg);
                    }
                }

                @keyframes spin {
                    0% {
                        transform: rotate(0deg);
                    }
                    100% {
                        transform: rotate(360deg);
                    }
                }
            </style>
        </head>
        <body>
        <div class="loader"></div>
        <button class="btn btn-primary stripe-button" id="payButton" style="display: none">
            <div class="spinner hidden" id="spinner"></div>
            <span id="buttonText">Pay Now</span>
        </button>

        <!-- Stripe JavaScript library -->
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            window.onload = function () {
                document.getElementById('payButton').click();
            }


            // Set Stripe publishable key to initialize Stripe.js
            const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

            // Select payment button
            const payBtn = document.querySelector("#payButton");

            // Payment request handler
            payBtn.addEventListener("click", function (evt) {
                setLoading(true);

                createCheckoutSession().then(function (data) {
                    if (data.sessionId) {
                        stripe.redirectToCheckout({
                            sessionId: data.sessionId,
                        }).then(handleResult);
                    } else {
                        handleResult(data);
                    }
                });
            });

            // Create a Checkout Session with the selected product
            const createCheckoutSession = function (stripe) {
                return fetch("payment_init.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        createCheckoutSession: 1,
                    }),
                }).then(function (result) {
                    return result.json();
                });
            };

            // Handle any errors returned from Checkout
            const handleResult = function (result) {
                if (result.error) {
                    showMessage(result.error.message);
                }

                setLoading(false);
            };

            // Show a spinner on payment processing
            function setLoading(isLoading) {
                if (isLoading) {
                    // Disable the button and show a spinner
                    payBtn.disabled = true;
                    document.querySelector("#spinner").classList.remove("hidden");
                    document.querySelector("#buttonText").classList.add("hidden");
                } else {
                    // Enable the button and hide spinner
                    payBtn.disabled = false;
                    document.querySelector("#spinner").classList.add("hidden");
                    document.querySelector("#buttonText").classList.remove("hidden");
                }
            }

            // Display message
            function showMessage(messageText) {
                const messageContainer = document.querySelector("#paymentResponse");

                messageContainer.classList.remove("hidden");
                messageContainer.textContent = messageText;

                setTimeout(function () {
                    messageContainer.classList.add("hidden");
                    messageText.textContent = "";
                }, 5000);
            }
        </script>
        </body>
        </html>
        <?php
    } else if ($insert_user) {
        $_SESSION['user_id'] = $id;
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                .loader {
                    position: absolute;
                    width: 100px;
                    height: 100px;
                    left: 50%;
                    top: 50%;
                    margin-left: -50px;
                    margin-top: -50px;
                }

                .loader {
                    border: 16px solid #f3f3f3;
                    border-radius: 50%;
                    border-top: 16px solid #ffcba3;
                    width: 120px;
                    height: 120px;
                    -webkit-animation: spin 2s linear infinite; /* Safari */
                    animation: spin 2s linear infinite;
                }

                /* Safari */
                @-webkit-keyframes spin {
                    0% {
                        -webkit-transform: rotate(0deg);
                    }
                    100% {
                        -webkit-transform: rotate(360deg);
                    }
                }

                @keyframes spin {
                    0% {
                        transform: rotate(0deg);
                    }
                    100% {
                        transform: rotate(360deg);
                    }
                }
            </style>
        </head>
        <body>
        <div class="loader"></div>
        <button class="btn btn-primary stripe-button" id="payButton" style="display: none">
            <div class="spinner hidden" id="spinner"></div>
            <span id="buttonText">Pay Now</span>
        </button>

        <!-- Stripe JavaScript library -->
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            window.onload = function () {
                document.getElementById('payButton').click();
            }


            // Set Stripe publishable key to initialize Stripe.js
            const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

            // Select payment button
            const payBtn = document.querySelector("#payButton");

            // Payment request handler
            payBtn.addEventListener("click", function (evt) {
                setLoading(true);

                createCheckoutSession().then(function (data) {
                    if (data.sessionId) {
                        stripe.redirectToCheckout({
                            sessionId: data.sessionId,
                        }).then(handleResult);
                    } else {
                        handleResult(data);
                    }
                });
            });

            // Create a Checkout Session with the selected product
            const createCheckoutSession = function (stripe) {
                return fetch("payment_init.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        createCheckoutSession: 1,
                    }),
                }).then(function (result) {
                    return result.json();
                });
            };

            // Handle any errors returned from Checkout
            const handleResult = function (result) {
                if (result.error) {
                    showMessage(result.error.message);
                }

                setLoading(false);
            };

            // Show a spinner on payment processing
            function setLoading(isLoading) {
                if (isLoading) {
                    // Disable the button and show a spinner
                    payBtn.disabled = true;
                    document.querySelector("#spinner").classList.remove("hidden");
                    document.querySelector("#buttonText").classList.add("hidden");
                } else {
                    // Enable the button and hide spinner
                    payBtn.disabled = false;
                    document.querySelector("#spinner").classList.add("hidden");
                    document.querySelector("#buttonText").classList.remove("hidden");
                }
            }

            // Display message
            function showMessage(messageText) {
                const messageContainer = document.querySelector("#paymentResponse");

                messageContainer.classList.remove("hidden");
                messageContainer.textContent = messageText;

                setTimeout(function () {
                    messageContainer.classList.add("hidden");
                    messageText.textContent = "";
                }, 5000);
            }
        </script>
        </body>
        </html>
        <?php
    }
}



