# PHP TW - (Toolkit Web)

###### PHPTW is a POO Style HTML Builder Based on [W3C](http://www.w3.org/TR/html-markup/elements-by-function.html) Elements especification

See the examples:

Build a HTML tag:

```php
<?php
require "./vendor/autoload.php";

error_reporting(E_ALL);
ini_set('display_errors', true);

//HTML Tag
$html = new HTML\Root\HTML();
```

All elements can be placed on another with composite pattern

```php
//HTML Tag
$html = new HTML\Root\HTML();

//Head Tag
$head = new HTML\DocumentMetadata\Head();
$head->addAttribute('data-teste', 'teste');

//Title Tag
$title = new HTML\DocumentMetadata\Title();
$title->addContent("Título");

//Base Tag
$base = new HTML\DocumentMetadata\Base();

//Link Tag
$link = new HTML\DocumentMetadata\Link();
$link->addAttribute('type', 'text/css')
    ->addAttribute('rel', 'stylesheet');
    
//Meta Tag
$meta = new HTML\DocumentMetadata\Meta();
$meta->addAttribute('charset', 'UTF-8');

//Style Tag
$style = new HTML\DocumentMetadata\Style();
$style->addContent("body{background : lightblue;}");

//Script Tag

$script = new \HTML\Scripting\Script();
$script->addContent("alert();")
    ->addAttribute('type', 'javascript');

//Body Tag
$body = new \HTML\Sections\Body();

//Section Tag
$section = new \HTML\Sections\Section();

$head->addElement($base)
    ->addElement($link)
    ->addElement($meta)
    ->addElement($title)
    ->addElement($style)
    ->addElement($script)
;

$body->addElement($section)
    ->addElement(new \HTML\Sections\Nav())
    ->addElement(new \HTML\Sections\Article())
    ->addElement(new \HTML\Sections\Aside())
;

$html->addElement($head)
    ->addElement($body)
;
```


Finally we need to render the elements, every element can be rendered by the default render

```php
$render = new HTML\Render\DefaultElementRender();
echo $render->render($html);
```
this will output 

```html


<html>
    <head data-teste="teste">
        <base>
        <link type="text/css" rel="stylesheet">
        <meta charset="utf-8">
        <title>
            Título
        </title>
        <style>
            body{background : lightblue;}
        </style>
        <script type="javascript">
            alert();
        </script>
    </head>
    <body>
        <section>
        </section>
        <nav>
        </nav>
        <article>
        </article>
        <aside>
        </aside>
    </body>
</html>

```