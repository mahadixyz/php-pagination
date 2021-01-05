<?php
    session_start();
    error_reporting(0);

    class Main
    {
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $db = 'pagination';
        
        private $perPage = 5;
        private $errmsg;
        private $sql;
        protected $connection;

        public function __construct()
        {
            $this->connectDB();
            
        }
        public function connectDB()
        {
            try
            {
                $this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }            
            catch(PDOException $Exception)
            {
                echo $Exception->getMessage();
            }
        }

        public function viewUsers($pageNum)
        {
            $offset = (int) ($pageNum-1) * $this->perPage;
            if($offset < 0)
            {
                $offset=0;
            }
            
            $this->sql = $this->connection->prepare("SELECT * FROM user LIMIT $offset, $this->perPage");            

            try
            {                
                $this->sql->execute();

                if($this->sql->rowCount() > 0)
                {
                    $data = $this->sql->fetchAll(PDO::FETCH_OBJ);
                    return $data;
                }
                else
                {
                    return false;
                }    
            }
            catch(PDOException $Exception)
            {
                $_SESSION['err'] = "error: ".$Exception->getMessage();                
                return false;
            }  

        }

        public function totalPage()
        {
            $this->sql = $this->connection->prepare('SELECT * FROM user');
            try
            {
                $this->sql->execute();

                $data = $this->sql->rowCount();

                $totalPageNo = ceil($data/$this->perPage);
                
                return $totalPageNo;
               
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['err'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return false;
            } 
        }

    }
?>