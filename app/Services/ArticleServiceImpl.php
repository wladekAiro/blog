<?php
/**
 * Created by IntelliJ IDEA.
 * User: wladekairo
 * Date: 4/10/19
 * Time: 1:20 PM
 */

namespace App\Services;


use \App\Article;
use App\Enums\ArticleStatus;
use App\Helpers\SlugHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleServiceImpl implements ArticleService
{

    public function create(Request $request)
    {
        // TODO: Implement create() method.
        $generatedSlug = (new SlugHelper)->slugify($request['title']);

        $article = new Article();
        $article->title = $request['title'];
        $article->body = $request['body'];
        $article->slug = mt_rand(100, 9999999) . "-" . $generatedSlug;
        $article->status = ArticleStatus::Pending;

        $writer = Auth::user();

        $article->save();

        $article->user()->sync($writer);

        return $article;
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.

        return Article::findOrFail($id);
    }

    public function update($article)
    {
        // TODO: Implement update() method.
    }

    public function getArticleViewModel($slug)
    {
        // TODO: Implement getArticleViewModel() method.
        $article = Article::where('slug', '=', $slug)->first();

        return $article;
    }

    public function getAllViewModels()
    {
        // TODO: Implement getAllViewModels() method.

        $articles = Article::all();
    }
}
