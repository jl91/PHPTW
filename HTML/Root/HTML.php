<?php
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
    private $type = "html";
    public function addAttribute($attribute, $value)
    {
        
    }
    public function addAttributes(array $attributes)
    {
        ;
    }
    public function removeAttribute($attribute)
    {
        ;
    }
  
}