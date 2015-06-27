<?php
require "./vendor/autoload.php";

error_reporting(E_ALL);
ini_set('display_errors', true);

use HTML;

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

$head->addElement($base)
    ->addElement($link)
    ->addElement($meta)
    ->addElement($title)
;


$html->addElement($head);

$render = new HTML\Render\DefaultElementRender();
$render->render($html);
