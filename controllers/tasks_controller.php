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
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            require_once('views/tasks/create.php');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            if(!empty($_POST)){

                foreach($_POST as $k => $item){
                    $data[$k] = $item;
                }
                $data['status'] = 0;
                $data['created_at'] = date('Y-m-d');
                $task = Task::create($data);
                if($task){
                    require_once('views/tasks/create.php');
                }
            }
        }



    }
}