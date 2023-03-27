<?php

class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    //Class constructor
    public function __construct(

        $dbname = "Newdb",
        $tablename ="Productdb",
        $servername ="localhost",
        $username ="root",
        $password = "root"

    )
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        //Create connection

        $this->$con = mysqli_connect($servername,$username,$password);

        //Check connection

        if(!$this->$con)
        {
            die("connection failed:".mysqli_connect_error());
        }

        //Query

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        //Execute query

        if(mysqli_query($this->$con,$sql)){

            $this->con = mysqli_connect($servername,$username,$password,$dbname);
            
        //Sql to create new table

        // $sql= "CREATE TABLE IF NOT EXISTS $tablename
        // (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        // product_name VARCHAR(25 NOT NULL,
        // product_price FLOAT(25),
        // product_image VARCHAR(100));";  

        // if(!mysqli_query($this->$con,$sql))
        // {
        //     echo "Error creating table :" .mysqli_error($this->$con);
        // }
        // }else
        // {
        //     return false;
        // }
        
     
   
    }
}
 public function getdata()
    {
        $Sql ="SELECT * FROM $this->$tablename";
        $result = mysqli_query($this->$con,$sql);
        if(mysqli_num_rows($result) > 0 ){
            return $result;
        }
    }
}