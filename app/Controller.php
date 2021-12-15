<?php

namespace Controller;

use Dompdf\Dompdf;


class Controller
{

    public function create_bill()
    {
        self::view('create_bill', []);
    }

    public function bill()
    {
        $productSum = [];
        $totalSumNoPvm = 0;
        $pvm = 0;
        $totalSum = 0;
        $bill_number = $_POST['bill_number'] ?? '';
        $bill_date = $_POST['bill_date'] ?? '';
        $bill_expire_date = $_POST['bill_expire_date'] ?? '';
        $bill_editor = $_POST['bill_editor'] ?? '';
        $sum_words = $_POST['sum_words'] ?? '';
        $buyers_name = $_POST['buyers_name'] ?? '';
        $buyers_address = $_POST['buyers_address'] ?? '';
        $buyers_code = $_POST['buyers_code'] ?? '';
        $buyers_pvm_code = $_POST['buyers_pvm_code'] ?? '';
        $buyers_email = $_POST['buyers_email'] ?? '';
        $buyers_phone = $_POST['buyers_phone'] ?? '';

        if (isset($_POST['product_name'])) {
            foreach ($_POST['product_name'] as $name) {
                $product_name[] = $name;
            }
        }
        if (isset($_POST['product_measure'])) {
            foreach ($_POST['product_measure'] as $measure) {
                $product_measure[] = $measure;
            }
        }
        if (isset($_POST['product_amount'])) {
            foreach ($_POST['product_amount'] as $amount) {
                $product_amount[] = $amount;
            }
        }
        if (isset($_POST['product_price_one'])) {
            foreach ($_POST['product_price_one'] as $key => $price_one) {
                $product_price_one[] =  $price_one;
                $productSum[] = (int)$price_one * (int)$product_amount[$key];
            }
        }


        $totalSumNoPvm = array_sum($productSum);
        $pvm = $totalSumNoPvm * 0.21;
        $totalSum = $totalSumNoPvm + $pvm;

        self::view('template', [
            'bill_number' => $bill_number,
            'bill_date' => $bill_date,
            'bill_editor' => $bill_editor,
            'bill_expire_date' => $bill_expire_date,
            'buyers_name' => $buyers_name,
            'buyers_address' => $buyers_address,
            'buyers_code' => $buyers_code,
            'buyers_pvm_code' => $buyers_pvm_code,
            'buyers_email' => $buyers_email,
            'buyers_phone' => $buyers_phone,
            'product_name' => $product_name ?? '',
            'product_measure' => $product_measure ?? '',
            'product_amount' => $product_amount ?? '',
            'product_price_one' => $product_price_one ?? '',
            'productSum' => $productSum,
            'totalSumNoPvm' => $totalSumNoPvm,
            'pvm' => $pvm,
            'totalSum' => $totalSum,
            'sum_words' => $sum_words
        ]);
    }

    public static function redirect($where)
    {
        header('Location: ' . URL . $where);
        die;
    }

    public static function console_log($output)
    {
        $js_code = json_encode($output, JSON_HEX_TAG);
        echo $js_code;
    }

    public static function view($temp, $data = [])
    {
        extract($data);
        require 'views/' . $temp . '.php';
    }

    public function pdf()
    {
        require_once 'vendor/dompdf/autoload.inc.php';
        $fileUrl = URL . "views/saskaita.php";
        $fileContent = file_get_contents($fileUrl);
        $dompdf = new DOMPDF();
        $dompdf->loadHtml($fileContent);
        $dompdf->render();
        $dompdf->stream("sample.pdf");
    }
}
