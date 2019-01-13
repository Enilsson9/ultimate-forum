<?php

namespace Edward\Forum;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Route\Exception\NotFoundException;
use Anax\Route\Exception\ForbiddenException;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class ForumController implements ContainerInjectableInterface
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
    //public function loginAction() : object

    public function indexAction() : object
    {
        $page = $this->di->get("page");

        $forum = new Forum();
        $tags = new Tag();

        $forum->setDb($this->di->get("dbqb"));
        $tags->setDb($this->di->get("dbqb"));

        $page->add("anax/v2/article/forum", [
            "questions" => $forum->findAll(),
            "tags" => $tags->findAll(),
        ]);

        return $page->render([
            "title" => "A home page",
        ]);
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

    public function tagsAction(int $id) : object
    {
        $page = $this->di->get("page");

        $forum = new Forum();
        $tags = new Tag();

        $forum->setDb($this->di->get("dbqb"));
        $tags->setDb($this->di->get("dbqb"));

        $tags->select("password")
               ->from("User")
               ->where("acronym = ?")
               ->execute([$acronym])
               ->fetch();


        $page->add("anax/v2/article/tag", [
            "questions" => $forum->findAll(),
            "tags" => $tags->findAll(),
        ]);

        return $page->render([
            "title" => "A home page",
        ]);
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
    //public function loginAction() : object

    public function usersAction(int $id) : object
    {
        $page = $this->di->get("page");

        $forum = new Forum();
        $forum->setDb($this->di->get("dbqb"));

        $page->add("anax/v2/article/forum", [
            "questions" => $forum->findAll(),
        ]);

        return $page->render([
            "title" => "A home page",
        ]);
    }



}
