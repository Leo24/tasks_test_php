<?php
function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');
$foo= false;
    switch($controller) {
        case 'tasks':
            require_once('models/task.php');
            $controller = new TasksController();
            break;
        case 'pages':
            $controller = new PagesController();
            break;
        case 'posts':
            // we need the model to query the database later in the controller
            require_once('models/post.php');
            $controller = new PostsController();
            break;
    }

    $controller->{ $action }();
}

// we're adding an entry for the new controller and its actions
$controllers = array('pages' => ['home', 'error'],
    'posts' => ['index', 'show'],
    'tasks' => ['index', 'show', 'create', 'edit'],
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