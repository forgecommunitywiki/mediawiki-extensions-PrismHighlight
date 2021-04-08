$(document).ready(function() {
    $('pre.code2highlight, code.code2highlight, pre.mw-code').each(function(i, block) {
        Prism.highlightElement(block);
    });
});
