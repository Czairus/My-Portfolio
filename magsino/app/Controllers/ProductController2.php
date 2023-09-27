<?php

namespace App\Controllers;
use App\Models\ProductModel2;
use App\Models\ProductModel;
use App\Controllers\BaseController;

class ProductController2 extends BaseController
{
    public function index()
    {
        
    }


    public function listByCategory()
{
    $category = $this->request->getGet('category');
   
    $productModel2 = new ProductModel2(); 
    $products2 = $productModel2->where('ProductCategory', $category)->findAll();

    // Fetch products from ProductModel
    $productModel = new ProductModel();
    $products = $productModel->where('ProductCategory', $category)->findAll();

    return view('product_list', ['category' => $category, 'products' => $products, 'products2' => $products2]);
}

    public function category()
    { 
        return view('category');
    }
    

    public function categories()
{
    if ($this->request->getMethod() === 'post') {
        $ProductCategory = $this->request->getPost('ProductCategory');
        

        $productModel2 = new ProductModel2();

        $data = [
            'ProductCategory' => $ProductCategory,
        ];

        if ($productModel2->insert($data)) {
            return redirect()->to('/main');
        }
    }
}



}
