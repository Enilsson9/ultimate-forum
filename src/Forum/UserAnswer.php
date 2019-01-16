<?php

namespace Edward\Forum;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class UserAnswer extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "VUserAnswer";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
     public $user_id_answer;
     public $created;
     public $answer_created;
     public $answer;
}
