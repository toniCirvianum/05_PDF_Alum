<?php
session_start();
include('../vendor/autoload.php');

use Dompdf\Dompdf;



if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (!isset($_POST['order'])) {
        //si no existeix order torna a la vista
        header('Location: ../views/history.php');
        exit;
        
    }

    $orderId = $_POST['order'];

    $userHistory = $_SESSION['user_history'];

    if (!isset($userHistory[$orderId])) {
        header('Location: ../views/history.php');
        exit;
    }

    $orderInvoice = $userHistory[$orderId];

    $dompdfInvocie = new Dompdf();
    $html = "<h1>". $orderInvoice['date'] ."</h1>";

    $dompdfInvocie->loadHtml($html);
    $dompdfInvocie->setPaper('A4','portrait');
    $dompdfInvocie->render();
    $dompdfInvocie->stream("factrua1.pdf",[
        'Attachment'=>false
    ]);


}