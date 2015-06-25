<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Html\Element;

/**
 *
 * @author john-vostro
 */
interface AttributeInterface
{

    public function addAttribute($attribute, $value);

    public function addAttributes(array $attributes);

    public function removeAttribute($attribute);
}