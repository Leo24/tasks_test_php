<?php
class Task {

    public $id;
    public $title;
    public $description;
    public $picture;
    public $status;
    public $created_at;
    public $end_date;
    public $user_id;

    public function __construct($id, $title, $description, $picture, $status, $created_at, $end_date, $user_id) {
        $this->id=$id;
        $this->title=$title;
        $this->description=$description;
        $this->picture=$picture;
        $this->status=$status;
        $this->created_at=$created_at;
        $this->end_date=$end_date;
        $this->user_id=$user_id;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT t.id, t.title, t.description, t.picture, t.status, t.created_at, t.end_date, t.username, t.email FROM tasks as t
                           ORDER BY t.id
                          ');

        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $task) {
            $list[] = new Task(
                $task['id'],
                $task['title'],
                $task['description'],
                $task['picture'],
                $task['status'],
                $task['created_at'],
                $task['end_date'],
                $task['username'],
                $task['email']
            );
        }

        return $list;
    }

    public static function create($data)
    {
        $db = Db::getInstance();
        try {
            $sql = $db->prepare("INSERT INTO tasks (title, description, picture, status, created_at, end_date, user_id) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->bindParam(1, $data['title']);
            $sql->bindParam(2, $data['description']);
            $sql->bindParam(3, $data['picture']);
            $sql->bindParam(4, $data['status']);
            $sql->bindParam(5, $data['created_at']);
            $sql->bindParam(6, $data['end_date']);
            $sql->bindParam(7, $data['username']);
            $sql->bindParam(8, $data['email']);
            $sql->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }



    public static function update($id) {

    }

}