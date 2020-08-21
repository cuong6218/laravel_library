<?php


namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;
use App\Product;
use Illuminate\Http\Request;

class ProductService
{
    protected $productRepo;
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function getAll()
    {
        return $this->productRepo->getAll();
    }
    public function getDesc()
    {
        return $this->productRepo->getDesc();
    }
    public function store($request)
    {
        $product = new Product();
        $data = $request->all();
        //upload file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $data['image'] = $path;
            // fill data
            $product->fill($data);
            $this->productRepo->save($product);
        }
    }
    public function show($id)
    {
        return $this->productRepo->show($id);
    }
    public function update($request, $id)
    {
        $product = $this->productRepo->show($id);
        $data = $request->all();
        //upload file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $data['image'] = $path;
            // fill data
            $product->fill($data);
            $this->productRepo->save($product);
        }
    }
    public function destroy($id)
    {
        $this->productRepo->destroy($id);
    }
}
