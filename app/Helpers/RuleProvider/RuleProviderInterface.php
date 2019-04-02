<?php
/**
 * Created by IntelliJ IDEA.
 * User: wladekairo
 * Date: 4/2/19
 * Time: 11:16 AM
 */
/**
 * This file is part of cocur/slugify.
 *
 * (c) Florian Eckerstorfer <florian@eckerstorfer.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Helpers\RuleProvider;

/**
 * RuleProviderInterface
 *
 * @package   Cocur\Slugify\RuleProvider
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
interface RuleProviderInterface
{
    /**
     * @param $ruleset
     *
     * @return array
     */
    public function getRules($ruleset);
}
