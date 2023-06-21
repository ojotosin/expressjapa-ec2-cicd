<?php require './public/payment/stripe/lib/init.php'; ?>

<?php
if (isset($_POST['payment']) && $_POST['payment'] == 'posted') {

    if( empty($_POST['p_id']) || empty($_POST['card_number']) || empty($_POST['card_cvv']) || empty($_POST['card_month']) || empty($_POST['card_year']) ) {
        header('location: '.BASE_URL.'package.php?id='.$_REQUEST['p_id']);
        exit; 
    }

    
    \Stripe\Stripe::setApiKey($setting['stripe_secret_key']);
    try {
        if (!isset($_POST['stripeToken']))
            throw new Exception("The Stripe Token was not generated correctly");

        $payment_date = date('Y-m-d');
        $invoice_no = time();
        $amount = floatval($_POST['paid_amount']);
        $cents = floatval($amount * 100);

        
        $response = \Stripe\Charge::create(array(
                    "amount" => $cents,
                    "currency" => "usd",
                    "card" => $_POST['stripeToken'],
                    "description" => 'Stripe Payment'
        ));

        $transaction_id = $response->id;
        $transaction_status = $response->status;
        
        $statement = $pdo->prepare("INSERT INTO tbl_payment (   
                                traveller_id,
                                payment_date,
                                txnid,
                                p_id,
                                paid_amount,
                                total_adult,
                                total_child_0_2,
                                total_child_3_6,
                                total_child_7_12,
                                total_single_room,
                                total_double_room,
                                card_number,
                                card_cvv,
                                card_month,
                                card_year,
                                bank_transaction_info,
                                payment_method,
                                payment_status,
                                invoice_no
                            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                $_SESSION['traveller']['traveller_id'],
                                $payment_date,
                                $transaction_id,
                                $_POST['p_id'],
                                $amount,
                                $_POST['total_adult'],
                                $_POST['total_child_0_2'],
                                $_POST['total_child_3_6'],
                                $_POST['total_child_7_12'],
                                $_POST['total_single_room'],
                                $_POST['total_double_room'],
                                $_POST['card_number'], 
                                $_POST['card_cvv'], 
                                $_POST['card_month'], 
                                $_POST['card_year'],
                                '',
                                'Stripe',
                                'Completed',
                                $invoice_no
                            ));

        header('location: ../../payment-success.php');

    } catch (Exception $e) {
        $error = $e->getMessage();
        ?><script type="text/javascript">alert('Error: <?php echo $error; ?>');</script><?php
    }
}
?>