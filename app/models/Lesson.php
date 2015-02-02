<?php

class Lesson extends \Eloquent {

    protected  $fillable = ['title', 'body', 'some_bool'];

    protected $hidden = ['password'];


    public function tags()
    {

        return $this->belongsToMany('Tag');
    }
}