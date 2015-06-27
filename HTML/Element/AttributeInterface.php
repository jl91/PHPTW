<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace HTML\Element;

/**
 *
 * @author john-vostro
 */
interface AttributeInterface
{

    public function addAttribute($attribute, $value);

    public function removeAttribute($attribute);

    public function hasAttribute($attribute);

    public function hasAttributes();

    public function getAttribute($attribute);

    public function getAttributes();
}