<?php

namespace Edward\Profile\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Edward\Profile\Profile;

/**
 * Form to update an item.
 */
class UpdateForm extends FormModel
{
    /**
     * Constructor injects with DI container and the id to update.
     *
     * @param Psr\Container\ContainerInterface $di a service container
     * @param integer             $id to update
     */
    public function __construct(ContainerInterface $di, $id)
    {
        parent::__construct($di);
        $profile = $this->getItemDetails($id);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Update your personal information",
            ],
            [
                "id" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "readonly" => true,
                    "value" => $profile->id,
                ],

                "acronym" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "value" => $profile->acronym,
                ],

                "fullname" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "value" => $profile->fullname,
                ],

                "email" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "value" => $profile->email,
                ],

                "gravatar" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "value" => $profile->gravatar,
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Save",
                    "callback" => [$this, "callbackSubmit"]
                ],

                /*"reset" => [
                    "type"      => "reset",
                ],*/
            ]
        );
    }



    /**
     * Get details on item to load form with.
     *
     * @param integer $id get details on item with id.
     *
     * @return Profile
     */
    public function getItemDetails($id) : object
    {
        $profile = new Profile();
        $profile->setDb($this->di->get("dbqb"));
        $profile->find("id", $id);
        return $profile;
    }


    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return bool true if okey, false if something went wrong.
     */
    public function callbackSubmit() : bool
    {
        $profile = new Profile();
        $profile->setDb($this->di->get("dbqb"));
        $profile->find("id", $this->form->value("id"));
        $profile->acronym  = $this->form->value("acronym");
        $profile->fullname  = $this->form->value("fullname");
        $profile->email  = $this->form->value("email");
        $profile->gravatar  = $this->form->value("gravatar");
        $profile->save();
        return true;
    }



     /**
      * Callback what to do if the form was successfully submitted, this
      * happen when the submit callback method returns true. This method
      * can/should be implemented by the subclass for a different behaviour.
      */
     public function callbackSuccess()
     {
         $this->di->get("response")->redirect("profile")->send();
         //$this->di->get("response")->redirect("profile/update/{$profile->id}");
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
