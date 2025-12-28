<?php
    class Database{
        public $host    =  DB_HOST;
        public $user    =  DB_USER;
        public $pass    =  DB_PASS;
        public $dbname  =  DB_NAME;//$host, $user, $pass và $dbname lưu trữ thông tin cấu hình kết nối database
        public $link;//lưu trữ đối tượng kết nối
        public $error;//lưu trữ thông báo lỗi nếu kết nối thất bại
    
	//Hàm khởi tạo
    public function __construct(){
        $this -> connectDB();
    }
    private function connectDB() {
        $this -> link = new mysqli($this->host,
                                   $this->user,
                                   $this->pass,
                                   $this->dbname);
        if(!$this->link){
            $this->error = "Connection".$this->link->connect_error;
            return false;
        }
    }

    // Select or read data
    public function select($query){
        $res = $this->link->query($query) or
         die($this->link->error.__LINE__);
        if($res ->num_rows > 0){
            return $res;
        }
        return false;
    }


    // insert data
    public function insert($query){
        $insert_row = $this->link->query($query) or
         die($this->link->error.__LINE__);
        if($insert_row){
            return $insert_row;
        }
        return false;
    }

    // update data
    public function update($query){
        $update_row = $this->link->query($query) or
         die($this->link->error.__LINE__);
        if($update_row){
            return $update_row;
        }
        return false;
    }
    // delete data
    public function delete($query){
        $delete_row = $this->link->query($query) or
         die($this->link->error.__LINE__);
        if($delete_row){
            return $delete_row;
        }
        return false;
    }
	}

?>