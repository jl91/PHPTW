<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace HTML\Element;

/**
 * Description of AbstractSelfCloseTag
 *
 * @author john-vostro
 */
use \Html\Element\AbstractElement;
use HTML\Element\ElementInterface;
use HTML\Element\ContentInterface;
use HTML\Render\DefaultElementRender;

class AbstractSelfCloseTag extends AbstractElement implements ContentInterface
{
    private $contents = null;

    public function addContent($content)
    {
        $this->contents[] = $content;
        return $this;
    }

    public function getContent()
    {
        return $this->contents;
    }

    public function hasContent()
    {
        return isset($this->contents);
    }
}