<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }
    public function productData()
    {
        $products=Product::select(['id', 'name', 'imgPath', 'price', 'category_id']);
        return Datatables::of($products)
        ->addColumn('category', function($product){
            return $product->category->name;
        })
        ->addColumn('action', function ($product) {
            return '<a href="/admin/products/'.$product->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <span class="btn btn-xs btn-danger" data-id="'.$product->id.'"><i class="glyphicon glyphicon-remove"></i> Dellete</span>';
            })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=new Product();
        $category=Category::pluck('name', 'id');
        return view('admin.products.edit', compact('product', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|unique:products|min:4|max:32',
            //'slug'=>'required|min:4|max:32',
            //'description'=>'sometimes|nullable|min:10',
        ]);
        $product=new Product;
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->category_id=$request->category_id;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->recommended=$request->recommended ? 1 : 0;

        $images=explode(',', $request->imgPath);
        $product->imgPath=$images[0];

        $product->gallery=$request->gallery;

        $product->save();

        return redirect('/admin/products')->with('success', 'Product with id '.$product->id.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $category=Category::pluck('name', 'id');
        return view('admin.products.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|unique:products,name,'.$id.'|min:4|max:32',
            //'slug'=>'required|min:4|max:32',
            //'description'=>'sometimes|nullable|min:10',
        ]);
        $product=Product::find($id);
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->category_id=$request->category_id;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->recommended=$request->recommended ? 1 : 0;

        $images=explode(',', $request->imgPath);
        $product->imgPath=$images[0];

        $product->gallery=$request->gallery;

        $product->save();

        return redirect('/admin/products')->with('success', 'Product with id '.$product->id.' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        if($product){
            $product->delete();
        }
    }
}
