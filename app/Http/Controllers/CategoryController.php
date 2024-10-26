<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index($id=null){
        try {
            $category = Category::find($id);
            if ($id) {
                $categories = Category::where('id',$id)->with('childrenRecursive','pages')->where('user_id', auth()->id())->get();                
                # code...
            }else{
                $categories = Category::whereNull('parent_id')->with('childrenRecursive', 'pages')->where('user_id', auth()->id())->get();
            }
            $pages = Page::where('user_id', auth()->id())->where('category_id',$id)->get();
        } catch (\Throwable $th) {
            return redirect("/categories")->with("fail", $th->getMessage());
        }
        return view('categories.index', ['categories'=> $categories,'pages'=> $pages, 'thisCategory' => $category]);
    }
    public function show($id){
        try {
            $categories = Category::where('id',$id)->with('childrenRecursive','pages')->where('user_id', auth()->id())->get();
        } catch (\Throwable $th) {
            return redirect("/categories")->with("fail", $th->getMessage());
        }
        return view('categories.index', ['categories'=> $categories]);
    }
    public function create()
{
    $categories = Category::whereNull('parent_id')->get(); // 親カテゴリのみ取得
    return view('categories.create', ['categories' => $categories]);
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'parent_id' => 'nullable|exists:categories,id',
    ]);

    Category::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'user_id' => auth()->id(),
        'parent_id' => $request->input('parent_id'),
    ]);

    return redirect()->route('categories.index')->with('success', 'Category created successfully!');
}

}
