<?php

namespace Edward\Forum;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class AnswerUser extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "VAnswerQuestionUser";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $user_id_answer;
    public $question_id;
    public $created;
    public $answer_created;
    public $answer;
    public $question;
}
