<?php
declare(strict_types=1);
abstract class DBConnector{
    protected static function connect(){
        $dbServerName = $_ENV['MYSQL_HOST'];
        $dbUserName = $_ENV['MYSQL_USERNAME'];
        $dbPassword = $_ENV['MYSQL_PASSWORD'];
        $dbName = $_ENV['MYSQL_DATABASE'];
        $dsn = 'mysql:host=' . $dbServerName . ';dbname=' . $dbName . ';charset=UTF8';
            try{
                $pdo = new PDO($dsn, $dbUserName,$dbPassword);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if($pdo){
                    return $pdo;
                }
            }catch(PDOException $error){
                echo 'There was an error connecting to the database: ' . $dbName;
                echo $error->getMessage();
            }
    }
}
abstract class CustomerLoader extends DBConnector{
    public static function getCustomers():array{
        $conn = self::connect(); 
        $customers = [];
        $data = $conn->query('SELECT firstname, lastname, group_id,fixed_discount,variable_discount FROM customer');
        while($row = $data->fetch(PDO::FETCH_NUM)){
            $firstname = $row[0];
            $lastname = $row[1];
            $group_id = $row[2];
            $group_name = self::getGroupInfo($group_id);
            if($row[3]){
            $fixedDiscount = $row[3];
            }else{
                $fixedDiscount = 0;
            }
            if($row[4]){
            $varDiscount = $row[4];
            }else{
                $varDiscount = 0;
            }
            $tmp = new Customer($firstname,$lastname,$group_name,$fixedDiscount,$varDiscount);
            array_push($customers,$tmp);
        }
        return $customers;
    }
    private static function getGroupInfo($group_id):Group{
        $conn = self::connect();
        $groupName;$groupFixedDiscount=0;$groupVarDiscount=0;
        $groupData = $conn->query('SELECT name,fixed_discount,variable_discount FROM customer_group WHERE id=' . $group_id);
        while($row = $groupData->fetch(PDO::FETCH_NUM)){
            $groupName = $row[0];
            if($row[1]){
            $groupFixedDiscount = $row[1];
            }
            if($row[2]){
            $groupVarDiscount=$row[2];
            }
        }
        $tmp =  new Group($groupName,$groupFixedDiscount,$groupVarDiscount);
        return $tmp;
    }
}
abstract class ProductLoader extends DBConnector{
    public static function getProducts():array{
        $conn = self::connect();
        $products = [];
        $data = $conn->query('SELECT name , price FROM product');
        while($row = $data->fetch(PDO::FETCH_NUM)){
            $productName = $row[0];
            $productPrice = $row[1];
            $tmp = new Product($productName,$productPrice);
            array_push($products,$tmp);
        }
        return $products;
    }
}
    ?>