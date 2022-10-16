== Prism Integration ==

This extension allows source code to be syntax highlighted on wiki pages.

This extension is derived from the Highlightjs Integration by Nikus Pokus, and
works as a drop-in replacement.

== Requirements ==

This version of the extension has been tested with Prism 1.23.0 and MediaWiki
1.35.1.

== Installation ==

Add this line to your LocalSettings.php:

    wfLoadExtension( 'PrismHighlight' );

By default, this extension will use a bundled copy of Prism 1.23.0 with the
following customizations:

* Plugins: Line Highlight, Line Numbers, Match braces, Diff Highlight
* Languages: Markup + HTML + XML + SVG + MathML + SSML + Atom + RSS, CSS, 
C-like, JavaScript, ABNF, ANTLR4, Bash + Shell, Batch, BNF + RBNF, C, Clojure,
CSS Extras, CSV, Diff, EBNF, Git, GLSL, Groovy, .ignore + .gitignore + .hgignore
+ .npmignore, Ini, Java, JavaDoc, JavaDoc-like, Java stack trace, JSON + Web
App Manifest, JSON5, Kotlin + Kotlin Script, Less, Lisp, Lua, Markdown, Markup
templating, PHP, PHPDoc, PHP Extras, PowerShell, .properties, Python, Sass (Sass),
Sass (Scss), Scala, Shell session, SQL, TOML, YAML
* Theme: Tomorrow Night

If you wish to use a different copy of the library, download it from the PrismJS 
website (https://prismjs.com) and replace the files in the 'prism' folder.

== Usage ==

You can use "syntaxhighlight" or "source" elements for code blocks.

The following attributes can be used:
 * lang;        Defines the language
 * inline;      Formats the source code to be inline, as part of a paragraph.
 * class;       Defines extra HTML classes to be added.
 * id;          Defines the id attribute of the resulting HTML output.

== Manual Configuration ==

You may edit the 'extension.js' file to adjust the configuration of the extension, in
the "config" area.

* HighlightTags;    The tags which will be processed for syntax highlighting.
* LangMapping;      Custom mappings of language keys to other language keys.
