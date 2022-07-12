<?php
declare(strict_types=1);
class Customer{
    private string $firstName,$lastName;
    private int $id,$fixedDiscount,$variableDiscount;
    private Group $group;
    public function __construct(string $firstName,string $lastName,Group $group,int $fixedDiscount,int $variableDiscount){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group = $group;
        $this->fixedDiscount = $fixedDiscount;
        $this->variableDiscount = $variableDiscount;
    }
    public function getName():string{
        return $this->firstName . ' ' . $this->lastName;

    }
    public function getGroupName():string{
        return $this->group->getName();
    }
    public function getGroup(){
        return $this->group;
    }
    public function getFixedDiscount():int{
        if($this->getGroup()->getFixedDiscount()>=$this->fixedDiscount){
            return $this->getGroup()->getFixedDiscount();
        }else{
            return $this->fixedDiscount;
        }
    }
    public function getVariableDiscount():int{
        if($this->getGroup()->getVariableDiscount()>=$this->variableDiscount){
            return $this->getGroup()->getVariableDiscount();
        }else{
            return $this->variableDiscount;
        }
    }
}
class Group{
    private string $name;
    private int $fixedDiscount,$variableDiscount;
    public function __construct(string $name,int $fixedDiscount,int $variableDiscount){
        $this->name = $name;
        $this->fixedDiscount = $fixedDiscount;
        $this->variableDiscount = $variableDiscount;
    }
    public function getName():string{
        return $this->name;
    }
    public function getFixedDiscount():int{
        return $this->fixedDiscount;
    }
    public function getVariableDiscount():int{
        return $this->variableDiscount;
    }
}

?>