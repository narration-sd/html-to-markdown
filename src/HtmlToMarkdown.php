<?php
/**
 * @link       https://narrationsd.com/
 * @copyright Copyright (c) Narration SD
 * @license   https://narrationsd.com/license
 */

namespace narrationsd\htmltomarkdown;

use Craft;
use craft\base\Plugin;
use narrationsd\htmltomarkdown\twigextensions\HtmlToMdTwigExtension;

/**
 * Class HtmlToMarkdown
 * @package narrationsd\htmltomarkdown
 */
class HtmlToMarkdown extends Plugin
{
    /**
     * @var
     */
    public static $plugin;

    /**
     *
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        $this->name = $this->getName();

        Craft::$app->view->registerTwigExtension(new HtmlToMdTwigExtension);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return Craft::t('html-to-markdown', 'HtmlToMarkdown');
    }
}
