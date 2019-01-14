<?php

namespace Edward\Forum;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class AnswerComment extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "VAllAComment";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */

    public $id;
    public $acronym;
    public $comment;
    public $created;
    public $question_id;
}
