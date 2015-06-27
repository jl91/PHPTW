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
interface ContentInterface
{

    public function addContent($content);

    public function getContent();

    public function hasContent();
}