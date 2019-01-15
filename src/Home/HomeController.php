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

        $activeUsers = new ActiveUsers();
        $activeUsers->setDb($this->di->get("dbqb"));

        $popularTags = new PopularTags();
        $popularTags->setDb($this->di->get("dbqb"));

        $latestQuestions = new LatestQuestions();
        $latestQuestions->setDb($this->di->get("dbqb"));

        $page->add("anax/v2/article/home", [
            "users" => $activeUsers->findAll(),
            "tags" => $popularTags->findAll(),
            "questions" => $latestQuestions->findAll(),
        ]);

        return $page->render([
            "title" => "A home page",
        ]);
    }


}
