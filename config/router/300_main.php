<?php

if (isset($_SESSION['username'])) {
    $home = "\Edward\Home\HomeController";
    $profile = "\Edward\Profile\ProfileController";
    $forum = "\Edward\Forum\ForumController";

} else {
    $home = "\Edward\User\UserController";
    $profile = "\Edward\User\UserController";
    $forum = "\Edward\User\UserController";
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
            "handler" => $home,
        ],
        [
            "info" => "Sample controller.",
            "mount" => "forum",
            "handler" => $forum,
        ],
        [
            "info" => "Sample controller.",
            "mount" => "profile",
            "handler" => $profile,
        ],
        [
            "info" => "Just say hi with a string.",
            "path" => "",
            "handler" => $home,
        ],
    ]
];
