<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author john-vostro
 */
namespace Factories;
interface ElementFactoryInterface
{
   public function createElement($name);
   public function canCreateElement($name);
}