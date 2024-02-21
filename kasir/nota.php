<?php

class Item {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

class Receipt {
    public $date;
    public $time;
    public $cashier;
    public $transactionNumber;
    public $items = [];
    public $total;
    public $payment;
    public $change;

    public function __construct($cashier, $transactionNumber) {
        $this->date = date("d F Y");
        $this->time = date("H:i:s");
        $this->cashier = $cashier;
        $this->transactionNumber = $transactionNumber;
    }

    public function addItem($name, $price) {
        $this->items[] = new Item($name, $price);
    }

    public function calculateTotal() {
        $this->total = 0;
        foreach ($this->items as $item) {
            $this->total += $item->price;
        }
    }

    public function processPayment($payment) {
        $this->payment = $payment;
        $this->change = $payment - $this->total;
    }

   public function printReceipt() {
    $this->calculateTotal();
    printf("========================================\n");
    printf("          INDOMARET - Toko Kelontong Terdekat\n");
    printf("========================================\n");
    printf("Tanggal: %s %s\n", $this->date, $this->time);
    printf("Kasir  : %s (Kasir #%s)\n", $this->cashier['name'], $this->cashier['id']);
    printf("Struk  : %s\n", $this->transactionNumber);
    printf("----------------------------------------\n");
    printf("Barang                    Harga\n");
    printf("----------------------------------------\n");
    foreach ($this->items as $item) {
        printf("%-25sRp %10.2f\n", $item->name, $item->price);
    }
    printf("----------------------------------------\n");
    printf("Total Belanja    : Rp %10.2f\n", $this->total);
    printf("Jumlah Barang    : %d\n", count($this->items));
    printf("Tunai            : Rp %10.2f\n", $this->payment);
    printf("Kembalian        : Rp %10.2f\n", $this->change);
    printf("----------------------------------------\n");
    printf("Terima Kasih Telah Berbelanja di Toko Kami\n");
    printf("Kunjungi Kami Lagi!\n");
    printf("========================================\n");
}
}

// Contoh penggunaan
$cashier = array('id' => '003', 'name' => 'Budi Santoso');
$transactionNumber = '1234567890123456';

$receipt = new Receipt($cashier, $transactionNumber);
$receipt->addItem("Mie Sedap Goreng Ayam Bawang", 3500);
$receipt->addItem("Teh Botol Sosro", 6000);
$receipt->addItem("Sabun Mandi Lifebuoy", 8500);
$receipt->addItem("Tisu Gulung Cap Gajah", 5000);
$receipt->processPayment(25000);
$receipt->printReceipt();

?>