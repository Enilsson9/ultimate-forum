<?php

namespace Edward\Forum\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;

/*use Edward\Forum\Question;
use Edward\Forum\User2Question;
use Edward\Forum\Question2Tag;
use Edward\Forum\Tags;*/

use Edward\Forum\Qcomment;
use Edward\Forum\User2Qcomment;
use Edward\Filter\Filter;

/**
 * Form to create an item.
 */
class CommentQuestionForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di)
    {
        parent::__construct($di);


        $this->form->create(
            [
                "id" => __CLASS__,
                //"legend" => "Leave a comment",
            ],
            [
                "comment" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "placeholder" => "Comment question",
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Submit comment",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return bool true if okey, false if something went wrong.
     */
    public function callbackSubmit() : bool
    {
        //insert to Qcomment
        $comment = new Qcomment();
        $comment->setDb($this->di->get("dbqb"));

        // Add content to comment
        $filter = new Filter();
        $markdown = $filter->parse($this->form->value("comment"), ["markdown"]);
        $comment->content = $markdown;
        $comment->created = date('Y-m-d H:i:s');

        //Connect User to Comment
        $user2comment = new User2Qcomment();
        $user2comment->setDb($this->di->get("dbqb"));

        //get user_id from session
        $session = $this->di->get("session");
        $current = $session->get('username');
        $id = $current->id;

        //request route to get question_id
        $request = $this->di->get("request");
        $route = $request->getRouteParts();

        //add values
        $user2comment->user_id = $id;
        $user2comment->comment_id = count($comment->findAll()) + 1;
        $user2comment->question_id = array_values(array_slice($route, -1))[0];;

        //save insert
        $comment->save();
        $user2comment->save();

        return true;
    }



    /**
     * Callback what to do if the form was successfully submitted, this
     * happen when the submit callback method returns true. This method
     * can/should be implemented by the subclass for a different behaviour.
     */
    public function callbackSuccess()
    {
        //$this->di->get("response")->redirect("forum")->send();

        $this->di->get("response")->send();
    }



    // /**
    //  * Callback what to do if the form was unsuccessfully submitted, this
    //  * happen when the submit callback method returns false or if validation
    //  * fails. This method can/should be implemented by the subclass for a
    //  * different behaviour.
    //  */
    // public function callbackFail()
    // {
    //     $this->di->get("response")->redirectSelf()->send();
    // }
}
