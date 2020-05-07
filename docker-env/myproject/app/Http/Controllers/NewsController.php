<?php

namespace App\Http\Controllers;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class NewsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $newss = News::all();
        return view('admin.news.index', compact('newss'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        if (News::where('code',$request->code)->first())
        {
            return "Đã tồn tại";
        } else {
            $news = new News();
            $news->code = $request->code;
            $news->branch = $request->branch;
            $news->news = $request->news;
            $news->save();
            return view('admin.news.create');
        }
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->branch = $request->branch;
        $news->news = $request->news;
        $news->save();
        return view('admin.news.show');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return response('', 200);
    }
}
