<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Element
 *
 * @author desenvolvimento-01
 */

namespace Html\Element;

use HTML\Element\ElementInterface;

class Element implements ElementInterface
{
    protected $tag      = null;
    protected $elements = null;

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