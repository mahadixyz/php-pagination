<?php
    session_start();
    error_reporting(0);

    class Main
    {
        // Database Variables
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $db = 'pagination';
        
        // User Defined Setting variables
        private $perPage = 5;
        private $errmsg;
        private $sql;
        protected $connection;

        /**
         * Constructor Method
         * Invoke connectDB() method on object instantiation
         */
        public function __construct()
        {
            $this->connectDB();            
        }

        /**
         * connectDB() method
         * Connect with Database
         * @return void
         */
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

        /**
         * viewUsers() Method
         * Return User data form database with pagination limit and offset
         * @param int $pageNum
         * @return void
         */
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
                // Set error message on SESSION
                $_SESSION['err'] = "error: ".$Exception->getMessage();                
                return false;
            }  

        }

        /**
         * totalPage() Method
         * This method retrun total page number on Pagination
         * @return int $totalPageNo
         */
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
                // Set error message on SESSION
                $this->errmsg = $Exception->getMessage();
                $_SESSION['err'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return false;
            } 
        }

    }
?>