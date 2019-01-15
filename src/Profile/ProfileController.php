<?php

namespace Edward\Profile;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Route\Exception\NotFoundException;
use Anax\Route\Exception\ForbiddenException;
use Edward\Profile\HTMLForm\UpdateForm;



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
     * Show all items.
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        $session = $this->di->get("session");
        $request = $this->di->get("request");
        $current = $session->get('username');
        $id = $current->id;

        $profile = new Profile();
        $profile->setDb($this->di->get("dbqb"));

        $item = $profile->findAll();
        $item = $item[$id - 1];

        if (isset($_GET['logout'])) {
            $session->destroy();
        }

        $page->add("profile/crud/view-all", [
            //"items" => $profile->findAll(),
            "item" => $item,
            //"item" => $profile->find("id", $id),
            //"item" => $profile->findAll(),
            //"session" => $id,
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
    public function updateAction() : object
    {
        $page = $this->di->get("page");
        $session = $this->di->get("session");
        $current = $session->get('username');
        $id = $current->id;

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
