<?php

namespace Edward\Home;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Route\Exception\NotFoundException;
use Anax\Route\Exception\ForbiddenException;
use Edward\User\HTMLForm\UserLoginForm;
use Edward\User\HTMLForm\CreateUserForm;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class HomeController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var $data description
     */
    private $data;



    /**
    * The initialize method is optional and will always be called before the
    * target method/action. This is a convienient method where you could
    * setup internal properties that are commonly used by several methods.
    *
    * @return void
    */
    public function initialize() : void
    {
        /*$session = $this->di->get("session");
        if (!$session->has('username')) {
            throw new ForbiddenException("Detailed error message.");
        };*/
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */

    /*
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");

        $page->add("anax/v2/article/default", [
            "content" => "An index page",
        ]);

        return $page->render([
            "title" => "A index page",
        ]);
    }*/



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    //public function loginAction() : object

    public function indexAction() : object
    {
        $page = $this->di->get("page");

        $page->add("anax/v2/article/default", [
            "content" => "home here",
        ]);

        return $page->render([
            "title" => "A home page",
        ]);
    }

    public function aboutAction() : object
    {
        $page = $this->di->get("page");

        $page->add("anax/v2/article/default", [
            "content" => "About",
        ]);

        return $page->render([
            "title" => "About page",
        ]);
    }


    /**
     * Add internal routes for 403, 404 and 500 that provides a page with
     * error information, using the default page layout.
     *
     * @param string $message with details.
     *
     * @throws Anax\Route\Exception\NotFoundException

     * @return object as the response.
     */
    public function catchAll(...$args) : object
    {
        $title = " | Anax";
        $pages = [
            "403" => [
                "Anax 403: Forbidden",
                "You are not permitted to do this."
            ],
            "404" => [
                "Anax 404: Not Found",
                "The page you are looking for is not here."
            ],
            "500" => [
                "Anax 500: Internal Server Error",
                "An unexpected condition was encountered."
            ],
        ];

        $path = $this->di->get("router")->getMatchedPath();
        if (!array_key_exists($path, $pages)) {
            throw new NotFoundException("Internal route for '$path' is not found.");
        }

        $page = $this->di->get("page");
        $page->add(
            "anax/v2/error/default",
            [
                "header" => $pages[$path][0],
                "text" => $pages[$path][1],
            ]
        );

        return $page->render([
            "title" => $pages[$path][0] . $title
        ], $path);
    }
}
