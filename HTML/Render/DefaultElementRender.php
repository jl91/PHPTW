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
        $this->string .= $this->openTag($element);

        if ($element->hasChildren()) {
            foreach ($element->getChildren() as $key => $child) {
                $this->string .= $this->render($child);
            }
        }
        $this->string .= $this->closeTag($element);

        echo $this->string;
    }

    private function openTag(ElementInterface $element)
    {
        $attributes = null;

        if ($element->hasAttributes()) {
            foreach ($element->getAttributes() as $attribute => $value) {
                $attributes .= " {$attribute}=\"{$value}\"";
            }
        }

        echo htmlspecialchars_decode(Enum::OPEN_TAG.$element->getName().$attributes.Enum::CLOSE_TAG,
            ENT_HTML5)."\r\n";
    }

    private function closeTag(ElementInterface $element)
    {
        echo htmlspecialchars_decode(Enum::OPEN_TAG.'/'.$element->getName().Enum::CLOSE_TAG,
            ENT_HTML5)."\r\n";
    }
}