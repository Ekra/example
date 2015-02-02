<?php

class LessonsTest extends ApiTester {

    use Factory;

	/**
	 * A basic functional test example.
     *
     * Fetch a lesson
	 *
	 * @return void
	 */
	public function it_fetches_lessons()
	{
        //arrange

        $this->make('Lesson');

        //act
        $this->getJson('api/v1/lessons');

        //assert
        $this->assertResponseOk();

	}

    /*@Find a single lesson and make a request should be 200 and able find the attributes*/

    public function  it_fetches_a_single_lesson()
    {
        $this->make('Lesson');

        $lesson = $this->getJson('api/v1/lessons/1')->data;

        $this->assertResponseOk();

        $this->assertObjectHasAttributes( $lesson, 'body', 'active');


    }

    /*When trying to request a lesson that does not exist 404 should be returned*/

    public function it_404s_if_a_lesson_is_not_found()
    {
        $json =  $this->getJson('api/v1/lessons/1/x');


        $this->assertResponseStatus(404);

        $this->assertObjectHasAttributes($json,'error');

    }

    /*Below is test post or test store that also tests lessons POST  if it works then should get 201 created*/


    public  function  it_creates_a_new_lesson_given_valid_parameters()
    {
        $this->getJson('api/v1/lessons', 'POST', $this->getStub());

        $this->assertResponseStatus(201);

    }
    /*if the request fails validation*/

    public  function  it_throws_a_422_if_a_new_lesson_request_fails_validation()
    {
        $this->getJson('api/v1/lessons', 'POST');

        $this->assertResponseStatus(422);


    }

    /*How a lesson is constructed*/

    protected   function  getStub()
    {
        return[
            'title' => $this->fake->sentence,
            'body' => $this->fake->paragraph,
            'some_bool' => $this->fake->boolean,
        ];


    }



}
