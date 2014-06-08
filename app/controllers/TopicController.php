<?php
class TopicController extends BaseController
{
    public function control_index()
    {
        //$posts = Topic::all();
        //return View::make('topic.index', ['topics' => $posts]);
        return View::make('topic.control_index');
    }

/*
    public function show($id)
    {
        $post = Topic::findOrFail($id);
        return View::make('topic.show', ['topic' => $post]);
    }
*/
}
