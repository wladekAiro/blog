<?php

namespace App\Http\Controllers;

use App\Enums\ArticleStatus;
use App\Helpers\SlugHelper;
use App\Services\ArticleService;
use App\Services\ArticleServiceImpl;
use Illuminate\Http\Request;
use \App\Article;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.stories.list')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $action = "Create";
        return view('admin.stories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $articleService  = new ArticleServiceImpl();

        $article = $articleService->create($request);

        return view('admin.stories.view')->with('article' , $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $articleService  = new ArticleServiceImpl();
        $article = $articleService->getById($id);
        return view('admin.stories.view', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
