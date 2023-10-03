<?php



class product extends DB
{
    private $table = "product";
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function gitAllProducts()
    {
        return $this->conn->get($this->table);
    }

    public function insertProduct($data)
    {
        return $this->conn->insert($this->table, $data);
    }
    public function updateProduct($id , $data){
       $db = $this->conn->where("id", $id);
       return $db->update ($this->table, $data)  ;
    }
    
    public  function deleteProduct($id){
        $db = $this->conn->where('id' , $id) ;
        return $db->delete($this->table) ;
    }
    public function getRow($id){
        $db = $this->conn->where('id' , $id) ;
        return $db->getOne ($this->table);
    }
}
