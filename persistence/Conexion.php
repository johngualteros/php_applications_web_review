<?php
class Conexion
{
    private $mysqli;
    private $result;
    function open(){
        $this->mysqli=new mysqli("localhost","root","123456","storage");
        $this->mysqli->set_charset("utf-8");
    }
    function execute($sentence){
        $this->result=$this->mysqli->query($sentence);
    }
    function close(){
        $this->mysqli->close();
    }
    function numberRows(){
        return($this->result != null )?
            $this->result->num_rows:0;
    }
    function extract(){
        return $this->result->fetch_row();
    }
    function latestId(){
        return $this->result->insert_id;
    }
}