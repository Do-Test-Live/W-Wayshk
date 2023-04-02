<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
// Include configuration file
require_once 'config.php';

// Include database connection file
include_once 'dbConnect.php';

$payment_id = $statusMsg = $customer_email = '';
$status = 'error';

// Check whether stripe checkout session is not empty
if (!empty($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    // Fetch transaction data from the database if already exists
    $sqlQ = "SELECT * FROM transactions WHERE stripe_checkout_session_id = ?";
    $stmt = $db->prepare($sqlQ);
    $stmt->bind_param("s", $db_session_id);
    $db_session_id = $session_id;
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Transaction details
        $transData = $result->fetch_assoc();
        $payment_id = $transData['id'];
        $transactionID = $transData['txn_id'];
        $paidAmount = $transData['paid_amount'];
        $paidCurrency = $transData['paid_amount_currency'];
        $payment_status = $transData['payment_status'];

        $customer_name = $transData['customer_name'];
        $customer_email = $transData['customer_email'];

        $status = 'success';
        $statusMsg = 'Your Payment has been Successful!';
    } else {
        // Include the Stripe PHP library
        require_once 'stripe-php/init.php';

        // Set API key
        $stripe = new \Stripe\StripeClient(STRIPE_API_KEY);

        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = $stripe->checkout->sessions->retrieve($session_id);
        } catch (Exception $e) {
            $api_error = $e->getMessage();
        }

        if (empty($api_error) && $checkout_session) {
            // Get customer details
            $customer_details = $checkout_session->customer_details;

            // Retrieve the details of a PaymentIntent
            try {
                $paymentIntent = $stripe->paymentIntents->retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $paymentIntent) {
                // Check whether the payment was successful
                if (!empty($paymentIntent) && $paymentIntent->status == 'succeeded') {
                    // Transaction details
                    $transactionID = $paymentIntent->id;
                    $paidAmount = $paymentIntent->amount;
                    $paidAmount = ($paidAmount / 100);
                    $paidCurrency = $paymentIntent->currency;
                    $payment_status = $paymentIntent->status;

                    // Customer info
                    $customer_name = $customer_email = '';
                    if (!empty($customer_details)) {
                        $customer_name = !empty($customer_details->name) ? $customer_details->name : '';
                        $customer_email = !empty($customer_details->email) ? $customer_details->email : '';
                    }

                    // Check if any transaction data is exists already with the same TXN ID
                    $sqlQ = "SELECT id FROM transactions WHERE txn_id = ?";
                    $stmt = $db->prepare($sqlQ);
                    $stmt->bind_param("s", $transactionID);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $prevRow = $result->fetch_assoc();

                    if (!empty($prevRow)) {
                        $payment_id = $prevRow['id'];
                    } else {
                        $user_id = $_SESSION['user_id'];
                        // Insert transaction data into the database
                        $sqlQ = "INSERT INTO transactions (customer_name,customer_email,billing_id,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,stripe_checkout_session_id,created,modified) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())";
                        $stmt = $db->prepare($sqlQ);
                        $stmt->bind_param("ssissdsdssss", $customer_name, $customer_email, $user_id, $productName, $productID, $productPrice, $currency, $paidAmount, $paidCurrency, $transactionID, $payment_status, $session_id);
                        $insert = $stmt->execute();

                        if ($insert) {
                            $payment_id = $stmt->insert_id;
                        }
                    }

                    $status = 'success';
                    $statusMsg = 'Your Payment has been Successful!';
                } else {
                    $statusMsg = "Transaction has been failed!";
                }
            } else {
                $statusMsg = "Unable to fetch the transaction details! $api_error";
            }
        } else {
            $statusMsg = "Invalid Transaction! $api_error";
        }
    }
} else {
    $statusMsg = "Invalid Request!";
}
?>

<?php if ($statusMsg=="Your Payment has been Successful!") {

    $email_to = $customer_email;
    $subject = '1+ Studio';


    $headers = "From: 1+ Studio <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    $messege = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                    <h3 style='color:black'>電郵回覆內容</h3>
                    <p style='color:black;'>
                    感謝閣下完成預約程序。<br/>
                    預約費用支付經確認後，會在入場前兩小時以短訊及whatsapp發送給閣下已登記之手機號碼。<br/>
                    再次感謝閣下選擇本館，希望使用過程開心，下次再見。
                    </p>
                </div>
                </body>
            </html>";
    if (mail($email_to, $subject, $messege, $headers)) {


        $user_id = $_SESSION['user_id'];

        $data = $db_handle->runQuery("SELECT * FROM information where id={$user_id}");

        $f_name = $data[0]['f_name'];
        $l_name = $data[0]['l_name'];
        $phone = $data[0]['phone'];
        $email = $data[0]['email'];
        $schedule = $data[0]['schedule'];
        $heart_problem = $data[0]['heart_problem'];
        $chest_pain_physical_activity = $data[0]['chest_pain_physical_activity'];
        $chest_pain_not_physical_activity = $data[0]['chest_pain_not_physical_activity'];
        $felt_dizzy = $data[0]['felt_dizzy'];
        $joint_problem = $data[0]['joint_problem'];
        $blood_pressure = $data[0]['blood_pressure'];
        $other_reason = $data[0]['other_reason'];

        $email_to = $db_handle->notify_email();
        $subject = '1+ Studio';


        $headers = "From: 1+ Studio <" . $db_handle->from_email() . ">\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        $messege = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                    <p style='color:black;'>
                        Name: $f_name $l_name
                    </p>
                    <p style='color:black;'>
                        Phone: $phone
                    </p>
                    <p style='color:black;'>
                        Email: $email
                    </p>
                    <p style='color:black;'>
                        Booked session: $schedule
                    </p>
                    <p style='color:black;'>
                        1. 醫生曾否說過你的心臟有問題，以及只可進行醫生建議的體能活動？<br/>
                        Ans: $heart_problem
                    </p>
                    <p style='color:black;'>
                        2. 你進行體能活動時會否感到胸口痛？<br/>
                        Ans: $chest_pain_physical_activity
                    </p>
                    <p style='color:black;'>
                        3. 過去一個月內，你曾否在沒有進行體能活動時也感到胸口痛？<br/>
                        Ans: $chest_pain_not_physical_activity
                    </p>
                    <p style='color:black;'>
                        4. 你曾否因感到暈眩而失去平衡，或曾否失去知覺？ <br/>
                        Ans: $felt_dizzy
                    </p>
                    <p style='color:black;'>
                        5. 你的骨骼或關節(例如脊骨、膝蓋或髖關節)是否有毛病，且會因改變體能活動而惡化？<br/>
                        Ans: $joint_problem
                    </p>
                    <p style='color:black;'>
                        6. 醫生現時是否有開血壓或心臟藥物（例如water pills）給你服用？<br/>
                        Ans: $blood_pressure
                    </p>
                    <p style='color:black;'>
                        7. 是否有其他理由令你不應進行體能活動？<br/>
                        Ans: $other_reason
                    </p>
                </div>
                </body>
            </html>";

        if (mail($email_to, $subject, $messege, $headers)) {
            header('location:index.php?confirm=1#confirmation');
        } else { ?>
            <h1 class="error">Your Payment been failed!</h1>
            <p class="error"><?php echo $statusMsg; ?></p>
            <p>Admin Mail Send Failed.</p>
        <?php }
    } else { ?>
        <h1 class="error">Your Payment been failed!</h1>
        <p class="error"><?php echo $statusMsg; ?></p>
        <p>Customer Mail Send Failed.</p>

    <?php }
} else { ?>
    <h1 class="error">Your Payment been failed!</h1>
    <p class="error"><?php echo $statusMsg; ?></p>
    <p>Status mesage not match.</p>
<?php } ?>
