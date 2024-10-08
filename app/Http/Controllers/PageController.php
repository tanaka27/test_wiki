<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all(); // 全てのページを取得
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
        $page->save();

        return redirect("/pages/" . $page->id);
    }
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('pages.show', ['page' => $page]);
    }

}
