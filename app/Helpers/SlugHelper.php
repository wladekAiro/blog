<?php
/**
 * Created by IntelliJ IDEA.
 * User: wladekairo
 * Date: 4/2/19
 * Time: 12:48 AM
 */

namespace App\Helpers;

use App\Helpers\RuleProvider\DefaultRuleProvider;

class SlugHelper
{
    const LOWERCASE_NUMBERS_DASHES = '/[^A-Za-z0-9]+/';
    /**
     * @var array<string,string>
     */
    protected $rules = [];
    /**
     * @var RuleProviderInterface
     */
    protected $provider;
    /**
     * @var array<string,mixed>
     */
    protected $options = [
        'regexp'    => self::LOWERCASE_NUMBERS_DASHES,
        'separator' => '-',
        'lowercase' => true,
        'lowercase_after_regexp' => false,
        'trim' => true,
        'strip_tags' => false,
        'rulesets'  => [
            'default',
            // Languages are preferred if they appear later, list is ordered by number of
            // websites in that language
            // https://en.wikipedia.org/wiki/Languages_used_on_the_Internet#Content_languages_for_websites
            'armenian',
            'azerbaijani',
            'burmese',
            'hindi',
            'georgian',
            'norwegian',
            'vietnamese',
            'ukrainian',
            'latvian',
            'finnish',
            'greek',
            'czech',
            'arabic',
            'turkish',
            'polish',
            'german',
            'russian',
            'romanian'
        ],
    ];
    /**
     * @param array                 $options
     * @param RuleProviderInterface $provider
     */
    public function __construct(array $options = [], RuleProviderInterface $provider = null)
    {
        $this->options  = array_merge($this->options, $options);
        $this->provider = $provider ? $provider : new DefaultRuleProvider();
        foreach ($this->options['rulesets'] as $ruleSet) {
            $this->activateRuleSet($ruleSet);
        }
    }
    /**
     * Returns the slug-version of the string.
     *
     * @param string            $string  String to slugify
     * @param string|array|null $options Options
     *
     * @return string Slugified version of the string
     */
    public function slugify($string, $options = null)
    {
        // BC: the second argument used to be the separator
        if (is_string($options)) {
            $separator            = $options;
            $options              = [];
            $options['separator'] = $separator;
        }
        $options = array_merge($this->options, (array) $options);
        // Add a custom ruleset without touching the default rules
        if (isset($options['ruleset'])) {
            $rules = array_merge($this->rules, $this->provider->getRules($options['ruleset']));
        } else {
            $rules = $this->rules;
        }
        $string = ($options['strip_tags'])
            ? strip_tags($string)
            : $string;
        $string = strtr($string, $rules);
        unset($rules);
        if ($options['lowercase'] && !$options['lowercase_after_regexp']) {
            $string = mb_strtolower($string);
        }
        $string = preg_replace($options['regexp'], $options['separator'], $string);
        if ($options['lowercase'] && $options['lowercase_after_regexp']) {
            $string = mb_strtolower($string);
        }
        return ($options['trim'])
            ? trim($string, $options['separator'])
            : $string;
    }
    /**
     * Adds a custom rule to Slugify.
     *
     * @param string $character   Character
     * @param string $replacement Replacement character
     *
     * @return Slugify
     */
    public function addRule($character, $replacement)
    {
        $this->rules[$character] = $replacement;
        return $this;
    }
    /**
     * Adds multiple rules to Slugify.
     *
     * @param array <string,string> $rules
     *
     * @return Slugify
     */
    public function addRules(array $rules)
    {
        foreach ($rules as $character => $replacement) {
            $this->addRule($character, $replacement);
        }
        return $this;
    }
    /**
     * @param string $ruleSet
     *
     * @return Slugify
     */
    public function activateRuleSet($ruleSet)
    {
        return $this->addRules($this->provider->getRules($ruleSet));
    }
    /**
     * Static method to create new instance of {@see Slugify}.
     *
     * @param array <string,mixed> $options
     *
     * @return Slugify
     */
    public static function create(array $options = [])
    {
        return new static($options);
    }
}
