<?php 

    class Model
    {
        /**
         * Khai báo biến kết nối
         * @@ [type]
         */
        // ten data base
        const DB_NAME  = 'database_db';

        // ten may chu vd localhos hoac 127.0.0.1
        const HOST     = 'localhost';

        // ten user dang nhap database
        const NAME     = 'root';

        // password dang nhap database
        const PASSWORD = '';

        public $conn ;

        public function __construct()
        {
            $this->conn = mysqli_connect(self::HOST, self::NAME, self::PASSWORD, self::DB_NAME);

            if (!$this->conn) {
                header("Location: error.php");
            }
            
            mysqli_set_charset($this->conn,"utf8");
        }
        
        /**
         * [insert description] hàm insert 
         * @param  $table
         * @param  array  $data  
         * @return integer
         */
        public function insert($table, array $data)
        {
            //code
           $sql = "INSERT INTO {$table} ";
            $columns = implode(',', array_keys($data));
            $values  = "";
            $sql .= '(' . $columns . ')';
            foreach($data as $field => $value) {
                if(is_string($value)) {
                    $values .= "'". mysqli_real_escape_string($this->conn,$value) ."',";
                } else {
                    $values .= mysqli_real_escape_string($this->conn,$value) . ',';
                }
            }
            $values = substr($values, 0, -1);
            $sql .= " VALUES (" . $values . ')';
            mysqli_query($this->conn, $sql) or die("Lỗi  query  insert ----" .mysqli_error($this->conn));
            return mysqli_insert_id($this->conn);
        }



        /**
         * [update description] hàm update
         * @param  $table [description]
         * @param  array  $data  [description]
         * @param  array  $conditions  [description] điều kiện
         * @return [type]        [description]
         */

        public function update($table, array $data, array $conditions)
        {
            $sql = "UPDATE {$table}";

            $set = " SET ";

            $where = " WHERE ";

            foreach($data as $field => $value) {
                if(is_string($value)) {
                    $set .= $field .'='.'\''. mysqli_real_escape_string($this->conn, xss_clean($value)) .'\',';
                } else {
                    $set .= $field .'='. mysqli_real_escape_string($this->conn, xss_clean($value)) . ',';
                }
            }

            $set = substr($set, 0, -1);


            foreach($conditions as $field => $value) {
                if(is_string($value)) {
                    $where .= $field .'='.'\''. mysqli_real_escape_string($this->conn, xss_clean($value)) .'\' AND ';
                } else {
                    $where .= $field .'='. mysqli_real_escape_string($this->conn, xss_clean($value)) . ' AND ';
                }
            }

            $where = substr($where, 0, -5);

            $sql .= $set . $where;
           
            mysqli_query($this->conn, $sql) or die( "Lỗi truy vấn Update -- " .mysqli_error());

            return mysqli_affected_rows($this->conn);
        }


        /**
         * [delete description] hàm delete
         * @param  $table      [description]
         * @param  array  $conditions [description]
         * @return integer             [description]
         */
        public function delete ($table ,$id)
        {
            $sql = "DELETE FROM {$table} WHERE id = $id ";

            mysqli_query($this->conn,$sql) or die (" Lỗi Truy Vấn delete   --- " .mysqli_error($this->conn));
            return mysqli_affected_rows($this->conn);
        }


        /**
         * Đếm số bản ghi
         * @param  [type] $table [description]
         * @return [type] integer [description]
         */
        public function countTable($table)
        {
            $sql = "SELECT id FROM  {$table}";
            $result = mysqli_query($this->conn, $sql) or die("Lỗi Truy Vấn countTable----" .mysqli_error($this->conn));
            $num = mysqli_num_rows($result);
            return $num;
        }


        /**
         * [fetch description] lấy  1 bản ghi theo điều kiện
         * @param  [type] $where [description]
         * @return array        [description]
         */
        public function getOne ($table ,$where)
        {
            $sql = "SELECT * FROM {$table} WHERE ";
            
            $sql .= $where;
           
          
            $result = mysqli_query($this->conn, $sql) or die("Lỗi Truy Vấn fetch" .mysqli_error($this->conn));
            return mysqli_fetch_assoc($result);
        }

        /**
         * [fetch description] lấy  data bản ghi theo điều kiện
         * @param  [type] $where cau lenh dieu kien truy van
         * @param  [type] $table ten bang can lay du lieu
         * @return array        $data
         */

        public function getWhere ($table ,$where)
        {
            $sql = "SELECT * FROM {$table} WHERE ";

            $sql .= $where;

            $result = mysqli_query($this->conn, $sql) or die("Lỗi Truy Vấn fetch" .mysqli_error($this->conn));

            $data = [];

            if ($result) {

                while ($num = mysqli_fetch_assoc($result)) {
                    $data[] = $num;
                }
            }
            return $data;
        }

        /**
         * [fetchAll description] lấy tất cả bản ghi
         * @param  [type] $table ten bang can lay du lieu
         * @return array        $data
         */
        public function getAll($table)
        {
            $sql = "SELECT * FROM {$table} WHERE 1" ;
            $result = mysqli_query($this->conn,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($this->conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }

        /** kiem tra  1 truong da ton tai trong csdl chua
         * @param $table
         * @param $string
         * @return array|null
         */

        public function isExistsRow($table, $string)
        {
            $sql = "SELECT id FROM {$table} WHERE ";
            $sql .= $string ;
            $sql .= " LIMIT 1";
            $result = mysqli_query($this->conn , $sql) or die (" Lỗi truy vấn  is_exists_row - -- " .mysqli_error());
            return mysqli_fetch_assoc($result);
        }


        /* lấy tour  hot */
        public  function fetchhot($table,$fild)
        {
            $sql = "SELECT * FROM {$table} ORDER BY $fild DESC LIMIT 0,10";
            $result = mysqli_query($this->conn,$sql) or die("Lỗi  truy vấn sql " .mysqli_error($this->conn));
            $data = [];
            if( $result) {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }

        /**
         * lay du lieu theo id
         *
         * @param      <type>  $table  The table
         * @param      <type>  $id     The identifier
         *
         * @return     array   The id.
         */
        public function getID($table, $id)
        {
            $sql = "SELECT * FROM  {$table} where id = {$id}";
            $result = mysqli_query($this->conn, $sql) or die("Lỗi Truy Vấn " .mysqli_error($this->conn));
            $data =[];
            if ( $result) {
                # code...
                 while ($row = mysqli_fetch_assoc($result)) {
                # code...
                    $data[] = $row;
                }
            }
           
            return $data;
        }
    }

 ?>