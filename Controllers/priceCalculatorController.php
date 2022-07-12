<?php
require __DIR__ . '../../Models/DBConnector.php';
require __DIR__ . '../../Models/Customer.php';
require __DIR__ . '../../Models/Product.php';
require __DIR__ . '../../Models/PriceCalculator.php';

class priceCalculatorController{
    private array $customers;
    private array $products;
    public function __construct($POST){
        if(isset($POST['products'])&&isset($POST['customers'])){
        $this->init($POST['products'],$POST['customers']);
        }else{
            $this->init(null,null);
        }
    }
    private function init($selectedProduct,$selectedCustomer){
        $this->loadData();
        $this->setSelection($selectedProduct,$selectedCustomer);
    }
    private function loadData(){
        $this->customers = CustomerLoader::getCustomers();
        $this->products = ProductLoader::getProducts();
    }
    private function setSelection($selectedProduct,$selectedCustomer){
        if($selectedProduct&&$selectedCustomer){
        $this->selectedProduct = $this->products[$selectedProduct];
        $this->selectedCustomer = $this->customers[$selectedCustomer];        
        }
    }
    public function render(){
        $this->renderCustomerSelection($this->customers,$this->products);
        if(isset($this->selectedCustomer) && isset($this->selectedProduct)){
        $this->renderProductPrice($this->selectedProduct,$this->selectedCustomer);
        }
    }
    private function renderCustomerSelection($customers,$products){
        require __DIR__ . '../../Views/Components/customerSelectionView.php';
    }
    private function renderProductPrice($selectedProduct,$selectedCustomer){
        $selectedProductPrice = PriceCalculator::getPrice($this->selectedProduct,$this->selectedCustomer);
        require __DIR__ . '../../Views/Components/productPriceView.php';
    }

}


?>