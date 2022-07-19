<?php

class ProductDAO
{
    private $idProduct;
    private $name;
    private $amount;
    private $price;

    function productDAO($pIdProduct="",$pName="",$pAmount="",$pPrice="")
    {
        $this->idProduct=$pIdProduct;
        $this->name=$pName;
        $this->amount=$pAmount;
        $this->price=$pPrice;
    }
    function insert()
    {
        return "insert into product(name,amount,price)
                values(\"" . $this->name ."\",
                        \"" . $this->amount . "\",
                        \"" . $this->price . "\")";
    }
    function update()
    {
        return "update product set 
                name = \"" . $this->name . "\",
                amount = \"" . $this->amount . "\",
                price = \"" . $this->price . "\"
                where idProduct= \"" . $this->idProduct . "\"";
    }
    function queryProduct()
    {
        return "select * from product where idProduct = \"" . $this->idProduct ."\" ";
    }
    function queryAll()
    {
        return "select * from product";
    }
    function queryAllOrder($order,$dir)
    {
        return "select * from product order by ".$order . " " .$dir;
    }
    function search($filter)
    {
        return "select * from product where name like \"%" . $filter . "%\" or
                amount like \"%" . $filter . "%\" or 
                price like \"%" . $filter . "%\" ";
    }
    function delete()
    {
        return "delete from product where idProduct = \"" . $this->idProduct ."\" ";
    }
}