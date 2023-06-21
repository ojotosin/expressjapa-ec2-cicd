<?php
ob_start();
session_start();
include("../../admin/config.php");
include("../../admin/functions.php");
?>
<?php
if( empty($_POST['p_id']) || empty($_POST['transaction_info']) ) {
	header('location: '.BASE_URL.'package.php?id='.$_REQUEST['p_id']);
	exit;
} else {
	

    $amount = floatval($_POST['paid_amount']);

    $payment_date = date('Y-m-d');
    $invoice_no = time();

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
                                '',
                                $_POST['p_id'],
                                $amount,
                                $_POST['total_adult'],
                                $_POST['total_child_0_2'],
                                $_POST['total_child_3_6'],
                                $_POST['total_child_7_12'],
                                $_POST['total_single_room'],
                                $_POST['total_double_room'],
                                '', 
                                '', 
                                '', 
                                '',
                                $_POST['transaction_info'],
                                'Bank Deposit',
                                'Pending',
                                $invoice_no
                            ));

    header('location: ../../payment-pending.php');
}
?>