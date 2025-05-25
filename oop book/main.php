<?php
class Book {
    private $code_book;
    private $name;
    private $qty;

    public function __construct($code_book, $name, $qty) {
        $this->setCodeBook($code_book);
        $this->name = $name;
        $this->setQty($qty);
    }

    // Getter untuk code_book
    public function getCodeBook() {
        return $this->code_book;
    }
    
    // Getter untuk qty
    public function getQty() {
        return $this->qty;
    }

    // Setter private untuk code_book
    private function setCodeBook($code_book) {
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            echo "Error: code_book harus dalam format 'BB00' (2 huruf kapital + 2 angka).\n";
        }
    }

    // Setter private untuk qty
    private function setQty($qty) {
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            echo "Error: qty harus berupa bilangan bulat positif lebih dari 0.\n";
        }
    }
}

// Contoh
$book1 = new Book("AA11", "Pemrograman PHP", 3);
echo "Kode Buku: " . $book1->getCodeBook() . "\n";
echo "Jumlah: " . $book1->getQty() . "\n";

$book2 = new Book("A123", "Statistika", -3); // Menampilkan pesan error
?>