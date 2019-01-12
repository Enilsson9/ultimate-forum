<?php
/**
 * Load the stylechooser as a controller class.
 */

if (isset($_SESSION['username'])) {
    $handler = "\Anax\StyleChooser\StyleChooserController";
} else {
    $handler = "\Edward\User\UserController";
}

return [
    "routes" => [
        [
            "info" => "Style chooser.",
            "mount" => "style",
            "handler" => $handler,
        ],
    ]
];
