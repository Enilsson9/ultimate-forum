<?php

namespace Edward\Forum\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Edward\Forum\Question;
use Edward\Forum\User2Question;
use Edward\Forum\Question2Tag;
use Edward\Forum\Tags;
use Edward\Filter\Filter;

/**
 * Form to create an item.
 */
class CreateForm extends FormModel
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
        $tag = new Tags();
        $tag->setDb($this->di->get("dbqb"));
        $tags = $tag->findAll();

        foreach ($tags as $tag) {
            $options[$tag->id] = $tag->content;
        }

        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Ask a question",
            ],
            [

                "question" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],

                "description" => [
                    "type" => "textarea",
                    "validation" => ["not_empty"],
                ],



                "selectm" => [
                    "type"        => "select-multiple",
                    "label"       => "Select one or more tags:",
                    //"description" => "Here you can place a description.",
                    "size"        => 6,
                    "options"     => $options,
                    //"validation" => ["not_empty"],
                    //"checked"   => ["potato", "pear"],
                ],



                /*"tag" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],

                "tag" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "placeholder" => "",
                    "description" => "If your tag does not exist,
                    a new one will be created",
                ],*/

                "submit" => [
                    "type" => "submit",
                    "value" => "Submit question",
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
        //insert to Question
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));

        $question->content = $this->form->value("question");

        $filter = new Filter();
        $markdown = $filter->parse($this->form->value("description"), ["markdown"]);
        $question->description = $markdown;

        $question->created = date('Y-m-d H:i:s');

        //Connect User to Question
        $user2question = new User2Question();
        $user2question->setDb($this->di->get("dbqb"));

        $session = $this->di->get("session");
        $current = $session->get('username');
        $id = $current->id;

        $user2question->user_id = $id;
        $user2question->question_id = count($question->findAll()) + 1;

        //var_dump($this->form->value("selectm"));
        //die();

        foreach ($this->form->value("selectm") as $tag) {
            //Connect Question to Tag
            $question2tag = new Question2Tag();
            $question2tag->setDb($this->di->get("dbqb"));
            $question2tag->question_id = count($question->findAll()) + 1;
            $question2tag->tag_id = $tag;
            $question2tag->save();
        }



        $question->save();
        $user2question->save();
        //$question2tag->save();
        return true;
    }



    /**
     * Callback what to do if the form was successfully submitted, this
     * happen when the submit callback method returns true. This method
     * can/should be implemented by the subclass for a different behaviour.
     */
    public function callbackSuccess()
    {
        $this->di->get("response")->redirect("forum")->send();
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
