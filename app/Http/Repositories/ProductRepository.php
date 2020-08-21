<?php


namespace App\Http\Repositories;


use App\Product;

class ProductRepository
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function getDesc()
    {
        return $this->product->select('*')->orderBy('id', 'desc')->paginate(8);
    }
    public function getAll()
    {
        return $this->product->all();
    }
    public function save($product)
    {
        $product->save();
    }
    public function show($id)
    {
        return $this->product->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->product->destroy($id);
    }
}
