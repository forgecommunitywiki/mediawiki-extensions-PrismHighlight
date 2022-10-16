<?php

if (function_exists('wfLoadExtension')) {
    wfLoadExtension('PrismHighlight');
    return true;
} else {
    die('This version of the PrismHighlight extension requires MediaWiki 1.35+');
}
