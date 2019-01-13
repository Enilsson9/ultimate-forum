<?php

namespace Edward\Forum;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class TagQuestionUser extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "VTagQuestionUser";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $question;
    public $question_id;
    public $tag;
    public $acronym;
    public $created;
    public $answer;
}
