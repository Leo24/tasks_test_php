<?php
class Task {

    public $id;
    public $title;
    public $description;
    public $picture;
    public $status;
    public $created_at;
    public $end_date;
    public $username;
    public $email;

    public function __construct($id, $title, $description, $picture, $status, $created_at, $end_date, $username, $email) {
        $this->id=$id;
        $this->title=$title;
        $this->description=$description;
        $this->picture=$picture;
        $this->status=$status;
        $this->created_at=$created_at;
        $this->end_date=$end_date;
        $this->username=$username;
        $this->email=$email;
    }

    public static function all()
    {
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

    public static function getTask($id)
    {
        $list = [];
        $db = Db::getInstance();
        try {
            $sql = 'SELECT t.id, t.title, t.description, t.picture, t.status, t.created_at, t.end_date, t.username, t.email FROM tasks as t
                           WHERE t.id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        foreach($stmt->fetchAll() as $task) {
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

        return $list[0];
    }

    public static function create($data)
    {
        $db = Db::getInstance();
        try {
            $sql = "INSERT INTO tasks (title, description, picture, status, created_at, end_date, username, email)
                                            VALUES (:title, :description, :picture, :status, :created, :enddate, :username, :email)";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
            $stmt->bindParam(':picture', $data['picture'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $data['status'], PDO::PARAM_BOOL);
            $stmt->bindParam(':created', $data['created_at'], PDO::PARAM_STR);
            $stmt->bindParam(':enddate', $data['end_date'], PDO::PARAM_STR);
            $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
            if($stmt->execute()){
                echo 'Task created successfully!';
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }



    public static function update($data) {
        $db = Db::getInstance();
        try {
            $sql = "UPDATE tasks SET description = :description, status = :status  
            WHERE id = :id";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $data['id'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $data['status'], PDO::PARAM_BOOL);
            if($stmt->execute()){
                echo 'Task updated successfully!';
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}