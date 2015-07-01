<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace HTML\Render;

/**
 * Description of DefaultElementRender
 *
 * @author john-vostro
 */
use HTML\Render\ElementRenderInterface;
use HTML\Element\ElementInterface;
use HTML\Element\Enum;

class DefaultElementRender implements ElementRenderInterface
{
    private $string = null;

    public function render(ElementInterface $element)
    {
        $this->openTag($element);

        if (
            $element instanceof \HTML\Element\ContentInterface &&
            $element->hasContent()
        ) {
            foreach ($element->getContent() as $content) {
                if ($content instanceof ElementInterface) {
                    $this->render($content);
                } else {
                    $this->string .= $content;
                }
            }
        }

        if ($element->hasChildren()) {
            foreach ($element->getChildren() as $child) {
                $this->render($child);
            }
        }

        if (!$element->isSelfClosingTag()) {
            $this->closeTag($element);
        }

        return $this;
    }

    private function openTag(ElementInterface $element)
    {
        $attributes = null;

        if ($element->hasAttributes()) {
            foreach ($element->getAttributes() as $attribute => $value) {
                $attributes .= " {$attribute}=\"{$value}\"";
            }
        }

        $this->string .= Enum::OPEN_TAG.$element->getName().\strtolower($attributes).Enum::CLOSE_TAG."\r\n";
    }

    private function closeTag(ElementInterface $element)
    {
        $this->string .= Enum::OPEN_TAG.'/'.$element->getName().Enum::CLOSE_TAG."\r\n";
    }

    public function getString()
    {
        return $this->string;
    }

    public function __toString()
    {
        return htmlspecialchars_decode($this->string, ENT_HTML5);
    }
}