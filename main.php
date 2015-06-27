<?php
require "./vendor/autoload.php";

error_reporting(E_ALL);
ini_set('display_errors', true);

use HTML;

$html  = new HTML\Root\HTML();
$head  = new HTML\DocumentMetadata\Head();
$head->addAttribute('data-teste', 'teste');
$title = (new HTML\DocumentMetadata\Title())
    ->addContent("Título");
$head
    ->addElement($title);

$base = new HTML\DocumentMetadata\Base();

$html->addElement($head)
    ->addElement($base);

$render = new HTML\Render\DefaultElementRender();
$render->render($html);
