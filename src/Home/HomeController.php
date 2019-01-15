<?php

namespace Edward\Home;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Route\Exception\NotFoundException;
use Anax\Route\Exception\ForbiddenException;
use Edward\User\HTMLForm\UserLoginForm;
use Edward\User\HTMLForm\CreateUserForm;


/**
 * A sample controller to show how a controller class can be implemented.
 */
class HomeController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */

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
            "title" => "Home page",
        ]);
    }


}
