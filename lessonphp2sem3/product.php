<?php
    class Product{

        function __construct($data){
            while($result = mysqli_fetch_array($data)){
                $mass[] = $result;
            }
            $this->data = $mass;
        }
        function read(){
            return $this->data;
        }
        function rowCount(){
            return count($this->data);
        }
    }
?>