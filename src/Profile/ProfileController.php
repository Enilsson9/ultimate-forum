<?php

namespace Edward\Profile;

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
class ProfileController implements ContainerInjectableInterface
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

    /*public function indexAction() : object
    {
        $page = $this->di->get("page");
        $session = $this->di->get("session");

        $data = $session->get('username');

        $page->add("anax/v2/article/profile", [
            "data" => $data,
        ]);

        return $page->render([
            "title" => "A home page",
        ]);
    }*/

    /**
     * Show all items.
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        $session = $this->di->get("session");
        $data = $session->get('username');

        $page->add("profile/crud/view-all", [
            "items" => $data,
        ]);

        return $page->render([
            "title" => "A collection of items",
        ]);
    }

    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function updateAction(int $id) : object
    {
        $page = $this->di->get("page");
        $form = new UpdateForm($this->di, $id);
        $form->check();

        $page->add("profile/crud/update", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Update an item",
        ]);
    }
}
