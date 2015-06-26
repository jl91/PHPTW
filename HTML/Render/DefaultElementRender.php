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

    public function render(ElementInterface $element)
    {
        echo $this->openTag($element);
        if ($element->hasChildren()) {
            foreach ($element->getChildren() as $key => $child) {
                $this->render($child);
            }
        }
        echo $this->closeTag($element);
    }

    private function openTag(ElementInterface $element)
    {
        echo htmlspecialchars_decode(Enum::OPEN_TAG.$element->getName().Enum::CLOSE_TAG,
            ENT_HTML5);
    }

    private function closeTag(ElementInterface $element)
    {
        echo htmlspecialchars_decode(\PHP_EOL.Enum::OPEN_TAG.'/'.$element->getName().Enum::CLOSE_TAG,
            ENT_HTML5);
    }
}