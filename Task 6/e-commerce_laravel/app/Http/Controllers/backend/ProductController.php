<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\traits\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use media;
    public function index()
    {
        $products = DB::table('products')->select('id', 'name_en', 'name_ar', 'code', 'status', 'price', 'quantity', 'created_at')->get();
        return view('backend.products.index', compact('products'));
    }
    public function create()
    {
        $brands = DB::table('brands')->select('id', 'name_en')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en')->where('status', 1)->get();
        return view('backend.products.create', compact('brands', 'subcategories'));
    }
    public function edit($id)
    {
        $brands = DB::table('brands')->select('id', 'name_en')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en')->where('status', 1)->get();
        $product = DB::table('products')->where('id', $id)->first();
        return view('backend.products.edit', compact('product', 'brands', 'subcategories'));
    }
    public function store(StoreProductRequest $request)
    {
    
        $photoName = $this->uploadPhoto($request->image,'products');

        $data = $request->except('image', '_token', 'page');
        $data['image'] = $photoName;
        DB::table('products')->insert($data);
        return $this->redirectAccordingToRequests($request);
    }
    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'page', 'image');
        if ($request->has('image')) {
            $oldPhotoName = DB::table('products')->select('image')->where('id', $id)->first();
            $photoPath = public_path('/dist/img/products/').$oldPhotoName;
            $this->deletePhoto($photoPath);
            $photoName = $this->uploadPhoto($request->image,'products');
            $data['image'] = $photoName;
        }
        DB::table('products')
            ->where('id', $id)
            ->update($data);

            return $this->redirectAccordingToRequests($request);
        
    }
    public function destroy($id)
    {
        $oldPhotoName = DB::table('products')->select('image')->where('id', $id)->first();
        $photoPath = public_path('/dist/img/products/').$oldPhotoName;
        $this->deletePhoto($photoPath);
        DB::table('products')->where('id', $id)->delete();
        return redirect()->back();
    }
    private function redirectAccordingToRequests($request)
    {
        if ($request->page == 'back') {
            return redirect()->back()->with('success','Successful Operation');
        } else {
            return redirect()->route('products.index')->with('success','Successful Operation');
        }
    }
}