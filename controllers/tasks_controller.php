<?php
class TasksController {
    public function index() {
// we store all the posts in a variable
        $tasks = Task::all();
        require_once('views/tasks/index.php');
    }

    public function show() {
// we expect a url of form ?controller=posts&action=show&id=x
// without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id']))
            return call('tasks', 'error');

// we use the given id to get the right post
        $post = Post::find($_GET['id']);
        require_once('views/posts/show.php');
    }

    public function create()
    {
        $data = [];
        if(!empty($_POST)){

            foreach($_POST as $item){
                $data[] = $item;
            }
        }
        $task = Task::create($data);
    }
}