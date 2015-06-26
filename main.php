<?php
require "./vendor/autoload.php";

error_reporting(E_ALL);
ini_set('display_errors', true);


$html   = new HTML\Root\HTML();
$html2  = new HTML\DocumentMetadata\Head();
$html->addElement($html2);
$render = new HTML\Render\DefaultElementRender();
$render->render($html);
