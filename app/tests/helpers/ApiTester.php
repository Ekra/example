<?php
/**
 * Created by PhpStorm.
 * User: akirachix
 * Date: 2/1/15
 * Time: 11:12 AM
 */


use Faker\Factory as Faker;

abstract class ApiTester extends  TestCase {

    protected  $fake;

    function __construct($faker)
    {
        $this->faker = Faker::create();
    }

    public  function  setUp()
    {
        parent::setUp();

        $this->app['artisan']->call('migrate');


    }


    protected function  getJson($uri, $method = 'GET', $parameters = [])

    {

        return json_decode($this->call($method, $uri,$parameters )->getContent());
    }

    protected function  assertObjectHasAttributes()
    {
        $args = func_get_args();
        $object = array_shift($args);

        foreach ($args as $attribute) {
            $this->assertObjectHasAttribute($attribute, $object);
        }
    }


} 