<?php
abstract class PriceCalculator{
    public function __construct(){
        
    }
    public static function getPrice($product,$customer):string{
        $price = $product->getPrice();
        $priceMinusFixedDiscount = $price - $customer->getFixedDiscount();
        $priceMinusVariableDiscount = $price - (($price*$customer->getVariableDiscount())/100);
        if($priceMinusFixedDiscount<$priceMinusVariableDiscount){
            $priceMinusFixedDiscount = $priceMinusFixedDiscount/100;
            $priceMinusFixedDiscount = round($priceMinusFixedDiscount,2);
            return $priceMinusFixedDiscount . ' Eur';
        }else{
            $priceMinusVariableDiscount = $priceMinusVariableDiscount/100;
            $priceMinusVariableDiscount = round($priceMinusVariableDiscount,2);
            return $priceMinusVariableDiscount . ' Eur';
        }
    }
}

?>