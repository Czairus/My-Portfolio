<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductModel2;
use CodeIgniter\Controller;

class ProductController extends BaseController
{
  
    public function index()
    {
        $productModel = new ProductModel();
        $product = $productModel->findAll();
    
        // Pass the products data to the view
        $data['product'] = $product;
    
        return view('main', $data);
    }
    public function create()
    { 
        $categoryModel = new ProductModel2();
        $categories = $categoryModel->getCategoryOptions();

        return view('insert', ['categories' => $categories]);
    }
    
    public function insert()
    {
      
        if ($this->request->getMethod() === 'post') {
        
            $ProductName = $this->request->getPost('ProductName');
            $ProductDescription = $this->request->getPost('ProductDescription');
            $ProductCategory = $this->request->getPost('ProductCategory');
            $ProductQuantity = $this->request->getPost('ProductQuantity');
            $ProductPrice = $this->request->getPost('ProductPrice');

           $productModel = new ProductModel();
    
            $data = [
                'ProductName' => $ProductName,
                'ProductDescription' => $ProductDescription,
                'ProductCategory' => $ProductCategory,
                'ProductQuantity' => $ProductQuantity,
                'ProductPrice' => $ProductPrice,
                
            ];
    
            if ($productModel->insert($data)) {
                return redirect()->to('/main');
            } 
        }
    }

 

    public function edit($id)
    {
        // Assuming you fetch the product record from your ProductModel
        $productModel = new ProductModel();
        $record = $productModel->find($id);

        // Fetch category options using the CategoryModel
        $categoryModel = new ProductModel2();
        $categories = $categoryModel->getCategoryOptions();

        return view('edit', ['categories' => $categories, 'record' => $record]);
    }

    public function update($id)
{
   
    if ($this->request->getMethod() === 'post') {
    
        $ProductName = $this->request->getPost('ProductName');
        $ProductDescription = $this->request->getPost('ProductDescription');
        $ProductCategory = $this->request->getPost('ProductCategory');
        $ProductQuantity = $this->request->getPost('ProductQuantity');
        $ProductPrice = $this->request->getPost('ProductPrice');

       $productModel = new ProductModel();

       
        $data = [
            'ProductName' => $ProductName,
                'ProductDescription' => $ProductDescription,
                'ProductCategory' => $ProductCategory,
                'ProductQuantity' => $ProductQuantity,
                'ProductPrice' => $ProductPrice,
        ];

       $productModel->update($id, $data);

        return redirect()->to('/main');
    }
}
public function delete($id)
{
   $productModel = new ProductModel();
   $productModel->delete($id);
    return redirect()->to('/main');
}


    
}