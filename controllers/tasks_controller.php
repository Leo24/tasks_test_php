<?php
class TasksController {
    public function index() {
        $tasks = Task::all();
        session_start();
        if($_SESSION['login'] == true) {
            require_once('views/tasks/admin/index.php');
        }else{
            require_once('views/tasks/index.php');
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            require_once('views/tasks/create.php');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];

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
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = htmlspecialchars(trim($_GET['task_id']));
            $foo = false;
            $task = Task::getTask($id);
            require_once('views/tasks/admin/edit.php');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];

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