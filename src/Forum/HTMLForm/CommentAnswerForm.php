<?php

namespace Edward\Forum\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;

/*use Edward\Forum\Question;
use Edward\Forum\User2Question;
use Edward\Forum\Question2Tag;
use Edward\Forum\Tags;*/

use Edward\Forum\Acomment;
use Edward\Forum\User2Acomment;
use Edward\Forum\Answer2Comment;
use Edward\Forum\Answer;

/**
 * Form to create an item.
 */
class CommentAnswerForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di)
    {
        parent::__construct($di);


        //Connect Question to Tag
        $answer = new Answer();
        $answer->setDb($this->di->get("dbqb"));

        $answers = $answer->findAll();

        //request route to get question_id
        $request = $this->di->get("request");
        $route = $request->getRouteParts();


        foreach ($answers as $answer) {
            if ($answer->question_id == array_values(array_slice($route, -1))[0]) {
                $options[$answer->id] = '"' . $answer->answer . '" by ' . $answer->acronym;
            } else {
                $options[0] = "No answer yet";
            }
        }



        $this->form->create(
            [
                "id" => __CLASS__,
                //"legend" => "Leave a comment",
            ],
            [
                /*"answer" => [
                    "type" => "number",
                    "validation" => ["not_empty"],
                    "placeholder" => "Choose answer id",
                ],*/

                "select" => [
                    "type"        => "select",
                    "label"       => "Select answer:",
                    //"description" => "Here you can place a description.",
                    "options"     => $options,
                    //"disabled"    => "potato",
                ],

                "comment" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "placeholder" => "Comment answer",
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
        $comment = new Acomment();
        $comment->setDb($this->di->get("dbqb"));

        // Add content to comment
        $comment->content = $this->form->value("comment");
        $comment->created = date('Y-m-d H:i:s');

        //Connect User to Comment
        $user2comment = new User2Acomment();
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
        $user2comment->question_id = array_values(array_slice($route, -1))[0];

        //Connect Answer to Comment
        $answer2comment = new Answer2Comment();
        $answer2comment->setDb($this->di->get("dbqb"));

        //add values
        $answer2comment->answer_id = $this->form->value("select");
        $answer2comment->comment_id = count($comment->findAll()) + 1;


        //save insert
        $comment->save();
        $user2comment->save();
        $answer2comment->save();

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
