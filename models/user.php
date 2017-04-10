<?php
class User {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $username;
    public $password;
    public $email;
    public $role;

    const ADMIN_USER_ROLE = 'admin';

    public function __construct($id, $username, $password, $email, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password= $password;
        $this->email = $email;
        $this->role = $role;
    }

    public static function findUser($email) {
        $list = [];
        $db = Db::getInstance();
        $email = '%'.$email .'%';
        $role = '%'.self::ADMIN_USER_ROLE.'%';
        $sql = 'SELECT * FROM users AS u
                           INNER JOIN roles AS r ON u.role_id = r.id
                           WHERE u.email LIKE :email
                           AND r.name LIKE :role
                           ';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam('role', $role, PDO::PARAM_STR);
        $stmt->execute();

        foreach($stmt->fetchAll() as $user) {
            $list[] = new User($user['id'], $user['username'], $user['password'], $user['email'], $user['name']);
        }

        return $list[0];
    }

}