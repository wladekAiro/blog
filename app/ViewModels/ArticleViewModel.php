<?php
/**
 * Created by IntelliJ IDEA.
 * User: wladekairo
 * Date: 4/10/19
 * Time: 10:57 AM
 */

namespace App\ViewModels;


class ArticleViewModel
{
    public $slug;
    public $title;
    public $body;
    public $articleStatus;
    public $imageUrl;
    public $writerName;
    public $editorName;
    public $writerId;
    public $editorId;

    function __construct($slug, $title, $body, $articleStatus, $imageUrl, $writerName, $editorName, $writerId, $editorId)
    {
        $this->slug = $slug;
        $this->title = $title;
        $this->body = $body;
        $this->articleStatus = $articleStatus;
        $this->imageUrl = $imageUrl;
        $this->writerName = $writerName;
        $this->editorName = $editorName;
        $this->writerId = $writerId;
        $this->editorId = $editorId;
    }
}
