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

abstract class AbstractElement implements ElementInterface
{
    protected $tag        = null;
    protected $elements   = null;
    protected $attributes = null;

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

    public function addAttribute($attribute, $value)
    {
        if ($attribute != null) {
            $this->attributes[$attribute] = $value;
        }
        return $this;
    }

    public function hasAttributes()
    {
        return count($this->attributes) > 0;
    }

    public function removeAttribute($attribute)
    {
        if ($this->hasAttribute($attribute)) {
            unset($this->attributes[$attribute]);
        }
        return $this;
    }

    public function getAttribute($attribute)
    {
        if ($this->hasAttribute($attribute)) {
            return $this->attributes[$attribute];
        }

        return null;
    }

    public function getAttributes()
    {
        if ($this->hasAttributes()) {
            return $this->attributes;
        }
        return null;
    }

    public function hasAttribute($attribute)
    {
        return isset($this->attributes[$attribute]);
    }
}