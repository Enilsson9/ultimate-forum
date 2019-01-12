<?php

if (isset($_SESSION['username'])) {
    $handler = "\Edward\Home\HomeController";
} else {
    $handler = "\Edward\User\UserController";
}

return [
    // Path where to mount the routes, is added to each route path.
    "mount" => "",

    // All routes in order
    "routes" => [
        [
            "info" => "Sample controller.",
            "mount" => "user",
            "handler" => "\Edward\User\UserController",
        ],
        [
            "info" => "Sample controller.",
            "mount" => "home",
            "handler" => "\Edward\Home\HomeController",
        ],
        [
            "info" => "Just say hi with a string.",
            "path" => "",
            "handler" => $handler,
        ],
    ]
];
