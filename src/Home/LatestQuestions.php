<?php

namespace Edward\Home;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class LatestQuestions extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "VLatestQuestions";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */

    public $question_id;
    public $acronym;
    public $question;
    public $created;
    public $user_id;

}
