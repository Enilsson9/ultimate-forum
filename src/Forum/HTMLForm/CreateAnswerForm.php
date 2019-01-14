<?php

namespace Edward\Forum\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;

use Edward\Forum\InsertAnswer;
use Edward\Forum\User2Answer;
use Edward\Forum\Question2Answer;

//use Edward\Forum\Qcomment;
//use Edward\Forum\User2Qcomment;

/**
 * Form to create an item.
 */
class CreateAnswerForm extends FormModel
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
                "legend" => "Answer question",
            ],
            [
                "answer" => [
                    "type" => "textarea",
                    "validation" => ["not_empty"]
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Submit answer",
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
        //insert to Answer
        $answer = new InsertAnswer();
        $answer->setDb($this->di->get("dbqb"));

        // Add content to answer
        $answer->content = $this->form->value("answer");
        $answer->created = date('Y-m-d H:i:s');

        //Connect User to Comment
        $user2answer = new User2Answer();
        $user2answer->setDb($this->di->get("dbqb"));

        //get user_id from session
        $session = $this->di->get("session");
        $current = $session->get('username');
        $id = $current->id;

        //add values to user2answer
        $user2answer->user_id = $id;
        $user2answer->answer_id = count($answer->findAll()) + 1;

        //Connect question to answer
        $question2answer = new Question2Answer();
        $question2answer->setDb($this->di->get("dbqb"));

        //request route to get question_id
        $request = $this->di->get("request");
        $route = $request->getRouteParts();

        //add values to user2answer
        $question2answer->question_id = array_values(array_slice($route, -1))[0];;
        $question2answer->answer_id = count($answer->findAll()) + 1;

        //save insert
        $answer->save();
        $user2answer->save();
        $question2answer->save();

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
