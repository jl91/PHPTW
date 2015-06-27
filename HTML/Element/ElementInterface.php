<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ElementInterface
 *
 * @author john-vostro
 */

namespace HTML\Element;

use HTML\Element\AttributeInterface;

interface ElementInterface extends AttributeInterface
{

    public function getName();

    public function addElement(ElementInterface $element);

    public function removeElement(ElementInterface $element);

    public function hasChildren();

    public function getChildren();

    public function hasAttributes();

    
}