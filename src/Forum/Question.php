<?php

namespace Edward\Forum;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class Question extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "VUltimate";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $question_id;

    public $question_content;
    public $question_description;

    public $user_question_id;
    public $user_question_acronym;
    public $user_question_created;
    public $user_question_gravatar;

    public $comment_question;
    public $comment_question_user;
    public $comment_question_user_id;
    public $comment_question_created;

    public $answer_content;
    public $answer_user;
    public $answer_user_id;
    public $answer_user_gravatar;
    public $answer_user_created;

    public $comment_answer;
    public $comment_answer_user;
    public $comment_answer_user_id;
    public $comment_answer_created;
}
