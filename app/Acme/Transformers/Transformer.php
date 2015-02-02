<?php
/**
 * Created by PhpStorm.
 * User: akirachix
 * Date: 1/30/15
 * Time: 9:45 AM
 */

namespace Acme\Transformers;


abstract class Transformer {

    public  function transformCollection(array $items)
    {

        return array_map([$this, 'transform'], $items);

    }


    public abstract function transform($item);



} 