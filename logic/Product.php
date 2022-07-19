<?php
require_once ("persistence/Conexion.php");
require_once ("persistence/ProductDAO.php");
class Product
{
    private $idProduct;
    private $name;
    private $amount;
    private $price;
    private $productDAO;
    private $conexion;

    /**
     * @param $idProduct
     * @param $name
     * @param $amount
     * @param $price
     */
    public function Product($pIdProduct="",$pName="",$pAmount="",$pPrice="")
    {
        $this->idProduct = $pIdProduct;
        $this->name = $pName;
        $this->amount = $pAmount;
        $this->price = $pPrice;
        $this->productDAO = new ProductDAO($this->idProduct,$this->name,$this->amount,$this->price);
        $this->conexion = new Conexion();
    }

    /**
     * @return mixed
     */
    function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * @param mixed $pIdProduct
     */
    function setIdProduct($pIdProduct)
    {
        $this->idProduct = $pIdProduct;
    }

    /**
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $pName
     */
    function setName($pName)
    {
        $this->name = $pName;
    }

    /**
     * @return mixed
     */
    function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $pAmount
     */
    function setAmount($pAmount)
    {
        $this->amount = $pAmount;
    }

    /**
     * @return mixed
     */
    function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $pPrice
     */
    function setPrice($pPrice)
    {
        $this->price = $pPrice;
    }
    function insert()
    {
        $this-> conexion->open();
        $this->conexion->run($this->productDAO->insert());
        $this->conexion->close();
    }
    function update()
    {
        $this->conexion->open();
        $this->conexion->run($this->productDAO->update());
        $this->conexion->close();
    }
    function queryProduct()
    {
        $this->conexion->open();
        $this->conexion->run($this->productDAO->queryProduct());
        $result= $this->conexion->extract();
        $this->conexion->close();
        $this->idProduct=$result[0];
        $this->name=result[1];
        $this->amount=result[2];
        $this->price=result[3];

    }
    function queryAll()
    {
        $this->conexion->open();
        $this->conexion->run($this->productDAO->queryAll());
        while($result=$this->conexion->extract())
        {
            array_push($products,new Product($result[0],$result[1],result[2],result[3]));
        }
        $this->conexion->close();
        return $products;
    }
    function queryAllOrder($order,$dir)
    {
        $this->conexion->open();
        $this->conexion->run($this->ProductDAO->queryAllOrder($order,$dir));
        $products=array();
        while($result=$this->conexion->extract())
        {
            array_push($products,new Product($result[0],$result[1],result[2],result[3]));
        }
        $this->conexion->close();
        return $products;
    }
    function search($filter)
    {
        $this->conexion->open();
        $this->conexion->run($this->productDAO->search($filter));
        $products=array();
        while($result=$this->conexion->extract())
        {
            array_push($products,new Product($result[0],$result[1],result[2],result[3]));
        }
        $this->conexion->close();
        return $products;
    }
    function delete()
    {
        $this->conexion->open();
        $this->conexion->run($this->productDAO->delete());
        $this->conexion->close();
    }
}