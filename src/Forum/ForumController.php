<?php

namespace Edward\Forum;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Route\Exception\NotFoundException;
use Anax\Route\Exception\ForbiddenException;
use Edward\Forum\HTMLForm\CreateForm;

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

        $tagQuestionUser = new TagQuestionUser();

        $tagQuestionUser->setDb($this->di->get("dbqb"));

        $page->add("anax/v2/article/tag", [
            "questions" => $tagQuestionUser->findAll(),
            "id" => $id,
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

        $answers = new AnswerUser();
        $answers->setDb($this->di->get("dbqb"));

        $page->add("anax/v2/article/user", [
            "questions" => $forum->findAll(),
            "answers" => $answers->findAll(),
            "id" => $id,
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


    public function questionsAction(int $id) : object
    {
        $page = $this->di->get("page");

        $question = new Forum();
        $question->setDb($this->di->get("dbqb"));

        $answer = new Answer();
        $answer->setDb($this->di->get("dbqb"));

        $questionComment = new QuestionComment();
        $questionComment->setDb($this->di->get("dbqb"));

        $answerComment = new AnswerComment();
        $answerComment->setDb($this->di->get("dbqb"));

        $page->add("anax/v2/article/finalquestion", [
            "questions" => $question->findAll(),
            "answers" => $answer->findAll(),
            "Qcomments" => $questionComment->findAll(),
            "Acomments" => $answerComment->findAll(),
            "id" => $id,
        ]);

        return $page->render([
            "title" => "Ultimate forum",
        ]);
    }


    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function askAction() : object
    {
        $page = $this->di->get("page");
        $session = $this->di->get("session");
        $current = $session->get('username');
        $id = $current->id;

        $form = new CreateForm($this->di);
        $form->check();

        $page->add("profile/crud/create", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Update an item",
        ]);
    }



}
