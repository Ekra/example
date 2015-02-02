<?php

class TagsController extends ApiController {


    protected $tagTransformer;

    function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;

    }



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($lessonId = null)
	{
        $tags = $this->getTags($lessonId);

        return $this->respond([

            'data' => $this->tagTransformer->transformerCollection($tags->all())
        ]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    /**
     * @param $lessonId
     * @return mixed
     */
    public function getTags($lessonId)
    {
       return  $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();

    }


}
