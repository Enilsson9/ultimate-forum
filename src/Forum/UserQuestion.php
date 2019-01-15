<?php

namespace Edward\Forum;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class UserQuestion extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "VUserQuestion";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $user_id;
    public $question_id;
    public $acronym;
    public $question;
    public $created;
    public $gravatar;
    public $description;
}
