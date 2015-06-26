<?php

namespace HTML\Root;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTML
 *
 * @author john-vostro
 */
use HTML\Element\ElementInterface;

class HTML implements ElementInterface
{
    private $tag      = "html";
    private $elements = null;

    public function addElement(ElementInterface $element)
    {
        $this->elements[] = $element;
    }

    public function removeElement(ElementInterface $element)
    {
        if ($this->hasChildren()) {
            foreach ($this->elements as $key => $currentElement) {
                if (\spl_object_hash($element) === \spl_object_hash($currentElement)) {
                    unset($this->elements[$key]);
                }
            }
        }
    }

    public function getName()
    {
        return $this->tag;
    }

    public function hasChildren()
    {
        return (bool) count($this->elements) > 0;
    }

    public function getChildren()
    {
        if ($this->hasChildren()) {
            return $this->elements;
        }
        return null;
    }
}