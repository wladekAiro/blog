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
use App\ViewModels\ArticleViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class ArticleServiceImpl implements ArticleService
{

    public function create(Request $request)
    {
        $generatedSlug = (new SlugHelper)->slugify($request['title']);

        $article = new Article();
        $article->title = $request['title'];
        $article->body = $request['body'];
        $article->slug = mt_rand(100, 9999999) . "-" . $generatedSlug;
        $article->status = ArticleStatus::Pending;

        $writer = Auth::user();

        $article->save();

        $article->users()->sync($writer);

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

        $users = $article->users();

        $slug = $article['slug'];
        $title = $article['title'];
        $body = $article['body'];
        $imageUrl = $article->images()[0]['link'];
        $status = ArticleStatus::getKey($article['status']);
        $writerName = Null;
        $writerId = Null;
        $editorName = Null;
        $editorId = Null;


        $articleViewModel = new ArticleViewModel($slug , $title , $body , $status , $imageUrl , $writerName ,
            $editorName , $writerId , $editorId);

        return $articleViewModel;
    }

    public function getAllViewModels()
    {
        // TODO: Implement getAllViewModels() method.

        $articles = Article::all();
    }
}
