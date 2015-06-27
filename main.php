<?php
require "./vendor/autoload.php";

error_reporting(E_ALL);
ini_set('display_errors', true);


$html   = new HTML\Root\HTML();
$head  = new HTML\DocumentMetadata\Head();
$head->addAttribute('Teste', 'teste');
$html->addElement($head);
$render = new HTML\Render\DefaultElementRender();
$render->render($html);
