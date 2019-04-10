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
    public $title;
    public $body;
    public $imageUrl;
    public $writerName;
    public $editorName;
    public $writerId;
    public $editorId;

    function __construct($title , $body , $imageUrl , $writerName , $editorName , $writerId , $editorId) {
        $this -> title = $title;
        $this -> body = $body;
        $this -> imageUrl = $imageUrl;
        $this -> writerName = $writerName;
        $this -> editorName = $editorName;
        $this -> writerId = $writerId;
        $this -> editorId = $editorId;
    }
}
