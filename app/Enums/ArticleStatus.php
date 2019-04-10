<?php
/**
 * Created by IntelliJ IDEA.
 * User: wladekairo
 * Date: 4/10/19
 * Time: 11:58 AM
 */

namespace App\Enums;


use BenSampo\Enum\Enum;

class ArticleStatus extends Enum
{
    const Pending = 0;
    const Review = 1;
    const Rejected = 2;
    const Published = 3;
    const Returned = 4;
}
