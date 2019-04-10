<?php
/**
 * Created by IntelliJ IDEA.
 * User: wladekairo
 * Date: 4/10/19
 * Time: 1:20 PM
 */

namespace App\Services;


interface ArticleService
{
    public function create($article);
    public function getById($id);
    public function update($article);
    public function getArticleViewModel($slug);
    public function getAllViewModels();
}
