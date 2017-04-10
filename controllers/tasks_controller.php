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

        if (!empty($POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];

                foreach($_POST as $k => $item){
                    $data[$k] = $item;
                }
                $data['status'] = 0;
                $data['created_at'] = date('Y-m-d');

            $file = $_FILES['picture'];
            $fileName = $file['name'];
            $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . basename($fileName);

            if (move_uploaded_file($file['tmp_name'], $path)) {
                $data['picture'] = "/uploads/" . basename($fileName);
            } else {
                echo 'Move failed. Possible duplicate?';
            }
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
            $task = Task::getTask($id);
            require_once('views/tasks/admin/edit.php');
        }

        if (!empty($POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            foreach($_POST as $k => $item){
                $data[$k] = $item;
            }
            $task = Task::update($data);
        }
    }
}