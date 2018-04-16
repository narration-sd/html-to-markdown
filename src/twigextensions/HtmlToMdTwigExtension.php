<?php
/**
 * @link       https://narrationsd.com/
 * @copyright Copyright (c) Narration SD
 * @license   https://narrationsd.com/license
 */

namespace narrationsd\htmltomarkdown\twigextensions;

use Craft;
use League\HTMLToMarkdown\HtmlConverter;

/**
 * Class HtmlToMdTwigExtension
 * @package narrationsd\htmltomarkdown\twigextensions
 */
class HtmlToMdTwigExtension extends \Twig_Extension
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'HtmlToMarkdown';
    }

    /**
     * @return array|\Twig_Filter[]
     */
    public function getFilters()
    {
        return [
            'htmltomarkdown' => new \Twig_Filter('htmltomarkdown',
                function ($str, $options = null) {
                    return $this->htmltomarkdownFilter($str, $options);
                }),
        ];
    }

    /**
     * @param $html
     * @param null $convertOptions
     * @return \Twig_Markup
     */
    public function htmltomarkdownFilter($html, $convertOptions = null) {

        $charset = Craft::$app->getView()->getTwig()->getCharset();

        $converter = new HtmlConverter();

        if ($convertOptions && \is_array($convertOptions)) {
            foreach ($convertOptions as $option => $value) {
                $converter->getConfig()->setOption($option, $value);
            }
        }

        $markdown = $converter->convert($html);

        return new \Twig_Markup($markdown, $charset);
    }
}
