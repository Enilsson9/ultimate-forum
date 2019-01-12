<?php

namespace Edward\User\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;

/**
 * Example of FormModel implementation.
 */
class CreateUserForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di)
    {
        parent::__construct($di);
        /*$this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Legend",
            ],
            [
                "text" => [
                    "type"        => "text",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "password" => [
                    "type"        => "password",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "hidden" => [
                    "type"        => "hidden",
                    "value"       => "secret value",
                ],

                "file" => [
                    "type"        => "file",
                    "description" => "Here you can place a description.",
                ],

                "textarea" => [
                    "type"        => "textarea",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "radio" => [
                    "type"        => "radio",
                    "label"       => "What is your preferred choice of fruite?",
                    "description" => "Here you can place a description.",
                    "values"      => [
                        "tomato",
                        "potato",
                        "apple",
                        "pear",
                        "banana"
                    ],
                    "checked"     => "potato",
                ],

                "checkbox" => [
                    "type"        => "checkbox",
                    "description" => "Here you can place a description.",
                ],

                "select" => [
                    "type"        => "select",
                    "label"       => "Select your fruite:",
                    "description" => "Here you can place a description.",
                    "options"     => [
                        "tomato" => "tomato",
                        "potato" => "potato",
                        "apple"  => "apple",
                        "pear"   => "pear",
                        "banana" => "banana",
                    ],
                    "value"    => "potato",
                ],

                "selectm" => [
                    "type"        => "select-multiple",
                    "label"       => "Select one or more fruite:",
                    "description" => "Here you can place a description.",
                    "size"        => 6,
                    "options"     => [
                        "tomato" => "tomato",
                        "potato" => "potato",
                        "apple"  => "apple",
                        "pear"   => "pear",
                        "banana" => "banana",
                    ],
                    "checked"   => ["potato", "pear"],
                ],

                "color" => [
                    "type"        => "color",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "date" => [
                    "type"        => "date",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "datetime" => [
                    "type"        => "datetime",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "datetime-local" => [
                    "type"        => "datetime-local",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "time" => [
                    "type"        => "time",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "week" => [
                    "type"        => "week",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "month" => [
                    "type"        => "month",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "number" => [
                    "type"        => "number",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "range" => [
                    "type"        => "range",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                    "value"       => 42,
                    "min"         => 0,
                    "max"         => 100,
                    "step"        => 2,
                ],

                "search" => [
                    "type"        => "search",
                    "label"       => "Search:",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "tel" => [
                    "type"        => "tel",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "email" => [
                    "type"        => "email",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "url" => [
                    "type"        => "url",
                    "description" => "Here you can place a description.",
                    "placeholder" => "Here is a placeholder",
                ],

                "file-multiple" => [
                    "type"        => "file-multiple",
                    "description" => "Here you can place a description.",
                ],

                "reset" => [
                    "type"      => "reset",
                ],

                "button" => [
                    "type"      => "button",
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Submit",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );*/

        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Create user",
            ],
            [
                "fullname" => [
                    "type"        => "text",
                ],
                "email" => [
                    "type"        => "email",
                ],
                "acronym" => [
                    "type"        => "text",
                ],

                "password" => [
                    "type"        => "password",
                ],

                "password-again" => [
                    "type"        => "password",
                    "validation" => [
                        "match" => "password"
                    ],
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Create user",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        // These return a single value
        // Type checkbox returns true if checked
        /*$elements = [
            // HTML401.
            "text", "password", "hidden", "file", "textarea", "select",
            "radio", "checkbox",
            // HTML5
            "color", "date", "datetime", "datetime-local", "time",
            "week", "month", "number", "range", "search", "tel",
            "email", "url", "file-multiple",
        ];
        foreach ($elements as $name) {
            $this->form->addOutput(
                "$name has value: "
                . $this->form->value($name)
                . "</br>"
            );
        }

        // Select multiple returns an array
        $elements = [
            "selectm",
        ];
        foreach ($elements as $name) {
            $this->form->addOutput(
                "$name has value: "
                . implode($this->form->value($name), ", ")
                . "</br>"
            );
        }

        // Remember values during resubmit, useful when failing (retunr false)
        // and asking the user to resubmit the form.
        $this->form->rememberValues();

        return true;
        */


        // Get values from the submitted form
        $fullname      = $this->form->value("fullname");
        $email         = $this->form->value("email");
        $acronym       = $this->form->value("acronym");
        $password      = $this->form->value("password");
        $passwordAgain = $this->form->value("password-again");

        //Gravatar
        $gravatar = $this->getGravatar($email);


        // Check password matches
        if ($password !== $passwordAgain ) {
            $this->form->rememberValues();
            $this->form->addOutput("Password did not match.");
            return false;
        }

        // Save to database
        $db = $this->di->get("dbqb");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $db->connect()
           ->insert("User", ["acronym", "fullname", "email", "password", "gravatar"])
           ->execute([$acronym, $fullname, $email, $password, $gravatar]);

        $this->form->addOutput("User was created.");
        return true;
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boole $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source https://gravatar.com/site/implement/images/php/
     */
    public function getGravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() )
    {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
}
