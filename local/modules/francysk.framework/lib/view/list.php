<?php

namespace Francysk\Framework\View;

if ( !defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true )
    die();

class ListGoods extends Base
{
    protected $aItem;
    
    public function __construct($aItem) {
        parent::__construct($aItem);
    }
    
    
}