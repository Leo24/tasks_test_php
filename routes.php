<?php
function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');
    switch($controller) {
        case 'tasks':
            require_once('models/task.php');
            $controller = new TasksController();
            break;
        case 'pages':
            $controller = new PagesController();
            break;
        case 'login':
            // we need the model to query the database later in the controller
            require_once('models/user.php');
            $controller = new LoginController();
            break;
    }

    $controller->{ $action }();
}

// we're adding an entry for the new controller and its actions
$controllers = array(
    'login' => ['login', 'logout'],
    'tasks' => ['index', 'create', 'edit', 'admin'],
    'pages' => ['home', 'error'],
    );

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}