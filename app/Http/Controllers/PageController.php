<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $pages=Auth::user()->pages; // 全てのページを取得
        return view('pages.index', ['pages' => $pages]);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $page = new Page;
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->user_id= auth()->user()->id;
        $page->save();

        return redirect("/page/" . $page->id)->with("success","Page created successfully");
    }
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('pages.show', ['page' => $page]);
    }
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('pages.edit', ['page' => $page]);
    }
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->save();

        return redirect('/pages/' . $page->id)->with('status', 'Page updated successfully!')->with('success','Page updated successfully!');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect('/pages')->with('success', 'Page deleted successfully!');
    }



}
