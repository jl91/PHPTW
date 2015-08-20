<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractElementFactory
 *
 * @author john-vostro
 */

namespace Factories;

use Factories\ElementFactoryInterface;

class DefaultElementFactory implements ElementFactoryInterface
{
    private $namespaces = [
        'HTML\\DocumentMetadata',
        'HTML\\Edits',
        'HTML\\EmbeddedContent',
        'HTML\\Forms',
        'HTML\\GroupingContent',
        'HTML\\InteractiveElements',
        'HTML\\Root',
        'HTML\\Scripting',
        'HTML\\Sections',
        'HTML\\Table',
        'HTML\\TextLevelSemantics',
    ];
    private $element    = null;

    public function createElement($name)
    {
        if ($this->canCreateElement($name)) {
            return new $this->element();
        }
    }

    public function canCreateElement($name)
    {
        $return = false;
        if (is_string($name)) {
            $name = strtolower($name);
            $name = ucfirst($name);

            foreach ($this->namespaces as $namespace) {
                $element = $namespace.'\\'.$name;
                if (\class_exists($element)) {
                    $this->element = $element;
                    return true;
                }
            }
        }

        return $return;
    }
}