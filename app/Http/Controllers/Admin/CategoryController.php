<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }
    public function categoryData()
    {
        return Datatables::of(Category::query())
        ->addColumn('action', function ($category) {
            return '<a href="/admin/category/'.$category->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <span class="btn btn-xs btn-danger" data-id="'.$category->id.'"><i class="glyphicon glyphicon-remove"></i> Dellete</span>';
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
        $category=new Category();
        return view('admin.category.edit', compact('category'));
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
            'name'=>'required|unique:categories|min:4|max:255',
            //'slug'=>'required|min:4|max:32',
            //'description'=>'sometimes|nullable|min:10',
        ]);
        $category=new Category;
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description=strip_tags($request->description);
        $images=explode(',', $request->imgPath);
        $category->imgPath=$images[0];
        /*$file=$request->file('imgPath');
        if($file!=null){//если $file не равна нулю(не пустая)
            $file->move(public_path().'/images', $file->getClientOriginalName());//куда и под каким именем
            $category->imgPath='/images/'.$file->getClientOriginalName();
        }*/
        $category->save();
        /*if(!$category->save()){
            return redirect('/admin/category/edit')->withErrors($category->getErrors())->withInput();
        }
        return redirect('/admin/category')->with('success', 'Category with id '.$category->id.' added!');*/
        return redirect('/admin/category')->with('success', 'Category with id '.$category->id.' added!');
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
        $category=Category::find($id);
        return view('admin.category.edit', compact('category'));
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
            'name'=>'required|unique:categories,name,'.$id.'|min:4|max:255',
            //'slug'=>'required|min:4|max:32',
            //'description'=>'sometimes|nullable|min:10',
        ]);
        $category=Category::find($id);
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description=strip_tags($request->description);
        $images=explode(',', $request->imgPath);
        $category->imgPath=$images[0];
        $category->save();
        return redirect('/admin/category')->with('success', 'Category with id '.$category->id.' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        if($category){
            $category->delete();
        }
    }
}
