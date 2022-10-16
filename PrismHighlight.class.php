<?php

class PrismHighlight
{
    /**
     * @return true
     */
    public static function onBeforePageDisplay(OutputPage &$out, Skin &$skin): bool
    {
        $out->addModules('ext.PrismHighlight');

        return true;
    }

    /**
     * @return true
     */
    public static function onParserFirstCallInit(Parser &$parser): bool
    {
        global $wgHighlightTags;

        foreach ($wgHighlightTags as $tag) {
            // $parser->setHook( tag, array( class, method ) );
            $parser->setHook($tag, ['PrismHighlight', 'renderSyntaxhighlight']);
        }

        return true;
    }

    /**
     * @param string $in
     * @param array $param
     * @param mixed|null $parser
     * @param bool $frame
     *
     * @return string HTML
     */
    public static function renderSyntaxhighlight(string $in, array $param = array(), $parser = null, $frame = false): string
    {
        global $wgLangMapping;

        /**
         * Get the language
         * E.g.: <syntaxhighlight lang="bash"></syntaxhighlight> would return "bash"
         * @var string $lang
         */
        $lang = $param['lang'] ?? '';

        $highlightClass = 'code2highlight';
        if ($lang === 'nohighlight') {
            $highlightClass = 'nohighlight';
            $lang = '';
        }

        // map lang if necessary
        if (array_key_exists($lang, $wgLangMapping)) {
            $lang = $wgLangMapping[$lang];
        }

        // class
        /** @var array<string> $htmlAttribs */
        $htmlAttribs['class'] = isset($param['class']) ? $param['class'] . ' ' . $highlightClass : $highlightClass;
        if (!empty($lang)) {
            $htmlAttribs['class'] .= " lang-$lang";
        }

        // id
        if (isset($param['id'])) {
            $htmlAttribs['id'] = $param['id'];
        }

        $code = htmlspecialchars(trim($in));

        // inline ?
        //<syntaxhighlight lang="bash" inline></syntaxhighlight>
        $inline = isset($param['inline']);

        if ($inline) {
            $htmlAttribs['style'] = 'display: inline;';
            $out = Html::rawElement('code', $htmlAttribs, $code);
        } else {
            $out = Html::rawElement('pre', $htmlAttribs, $code);
        }

        return $out;
    }
}
