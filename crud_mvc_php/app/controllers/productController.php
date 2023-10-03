<?php

class productController
{
    public function index()
    {
        $db = new product();
        $data["products"] = $db->gitAllProducts();
        view::load("product/index", $data);
    }

    // add product - view add page
    public function add()
    {
        view::load("product/add");
    }

    // get data from form and insert it into data base
    public function store()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $desc = $_POST['description'];
            $qty = $_POST['qty'];

            $data = array(
                "name" => $name,
                "price" => $price,
                "description" => $desc,
                "qty" => $qty
            );
            $db = new product();
            echo "saof";
            if ($db->insertProduct($data)) {
                view::load("product/add", ["success" => 'Data Created Successfully']);
            }
        } else {
            view::load("product/add");
        }
    }
    public function edit($id)
    {
        $db = new product();
        if ($db->getRow($id)) {
            $data['row'] = $db->getRow($id) ;
            view::load("product/edit" , $data);
        } else {
            echo "error";
        }
    }
    public function update($id){
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $desc = $_POST['description'];
            $qty = $_POST['qty'];

            $dataInsert = array(
                "name" => $name,
                "price" => $price,
                "description" => $desc,
                "qty" => $qty
            );
            $db = new product();
            if ($db->updateProduct($id , $dataInsert)) {
                view::load("product/edit", ["success" => 'Data Updated Successfully' , "row" => $db->getRow($id) ]);
            }
        } else {
            view::load("product/add");
        }
    }
    // delete data - view delete page 
    public function delete($id)
    {
        $db = new product();
        if ($db->deleteProduct($id)) {
            view::load("product/delete", ["success" => 'Deleted Successfully']);
        } else {
            echo "error";
        }
    }
}
