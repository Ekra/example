<?php
/**
 * Created by PhpStorm.
 * User: akirachix
 * Date: 2/1/15
 * Time: 9:47 AM
 */

namespace Acme\Transformers;


class TagTransformer extends Transformer{

    public    function transform($tag)
    {

        {

            return[

                'name' => $tag['name']
            ];

        }



    }

}