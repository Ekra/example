<?php
/**
 * Created by PhpStorm.
 * User: akirachix
 * Date: 1/30/15
 * Time: 9:52 AM
 */

namespace Acme\Transformers;


class LessonTransformer extends Transformer{

    public    function transform($lesson)
    {

        {

            return[

                'title' => $lesson['title'],
                'body' => $lesson['body'],
                'active' =>(boolean) $lesson['some_bool']
            ];

        }



    }

} 