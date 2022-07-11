<?php
require __DIR__ . '../../Models/DBConnector.php';
require __DIR__ . '../../Models/Customer.php';
require __DIR__ . '../../Models/Product.php';
// DBConnector::getCustomers();



class priceCalculatorController{
    public array $customers;
    public array $products;
    public function __construct(){
        $this->init();
    }
    private function init(){
        $this->loadData();
    }
    private function loadData(){
        $this->customers = CustomerLoader::getCustomers();
        $this->products = ProductLoader::getProducts();
    }
    public function render(){
        $this->renderCustomerSelection($this->customers,$this->products);
    }
    private function renderCustomerSelection($customers,$products){
        require __DIR__ . '../../Views/Components/customerSelectionView.php';
    }
    private function renderProductPrice(){
        
    }

}


?>