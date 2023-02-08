<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$charset = "utf8";
class DataBase
{
    public $conn;
    public $query;
    public $data;
    protected $server;
    protected $dbusername;
    protected $dbpassword;
    protected $dbname;
    protected $user;
    protected $charset;

    public function __construct()
    {
        $this->conn = null;
        $this->data = null;
        $this->query = null;

        $this->server = "localhost";
        $this->dbusername = "root";
        $this->dbpassword = "";
        $this->dbname = "test";
        $this->charset = "utf8";
    }
    function dbConnect()
    {
        $this->conn = mysqli_connect($this->server, $this->dbusername, $this->dbpassword, $this->dbname);
        mysqli_set_charset($this->conn, $this->charset);
        return $this->conn;
    }
    function prepareData($data)
    {
        return mysqli_real_escape_string($this->conn, stripcslashes(htmlspecialchars($data)));
    }

    function signUpGrad($username, $department, $phone, $email, $password)
    {
        $username = $this->prepareData($username);
        $department = $this->prepareData($department);
        $phone = $this->prepareData($phone);
        $email = $this->prepareData($email);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $this->query = "SELECT * FROM `graduates` WHERE Email_Address='$email'";
        if ($this->conn->query($this->query)->num_rows < 1) {
            $this->query =
                "INSERT INTO `graduates` (`Name`, `Department`, `Phone_Number`, `Email_Address`, `Password`) 
                    VALUES ('$username', '$department', '$phone', '$email', '$password');";
            if (mysqli_query($this->conn, $this->query)) {
                return true;
            } else
                return false;
        }
    }
    function getInfoFromEmail($email)
    {
        $this->query = "SELECT * FROM `graduates` WHERE Email_Address='$email'";
        return mysqli_fetch_assoc(mysqli_query($this->conn, $this->query));
    }

    function logIn($table, $email, $password)
    {
        $table = $this->prepareData($table);
        $email = $this->prepareData($email);
        $password = $this->prepareData($password);

        $this->query = "SELECT Password FROM $table WHERE Email_Address='$email'";
        $result = mysqli_query($this->conn, $this->query);

        if ($result->num_rows == 1) {
            $this->user = mysqli_fetch_assoc($result);
            if (password_verify($password, $this->user['Password'])) {
                return true;
            } else
                return false;
        } else
            return false;
    }
    function donate($name, $phone, $amount)
    {
        $name = $this->prepareData($name);
        $phone = $this->prepareData($phone);
        $amount = $this->prepareData($amount);
        if ($amount > 0) {
            $this->query = "INSERT INTO `donations` (`Name`, `Phone_Number`, `Amount`) 
                    VALUES ('$name', '$phone', '$amount');";
            if (mysqli_query($this->conn, $this->query)) {
                return true;
            } else
                return false;
        } else
            return false;
    }

}