--
--View all questions with user and created CURRENT_TIMESTAMP
--
DROP VIEW IF EXISTS VAllQuestion;
CREATE VIEW VAllQuestion
AS
SELECT
    u.id AS user_id,
    q.id AS question_id,
    u.acronym AS acronym,
    q.content AS question,
    q.description AS description,
    q.created AS created,
    a.content AS answer,
    u.gravatar AS gravatar
FROM User AS u
    JOIN user2question AS uq
        ON uq.user_id = u.id
    JOIN Question AS q
        ON uq.question_id = q.id
    JOIN user2answer AS ua
        ON ua.answer_id = u.id
    JOIN Answer AS a
        ON ua.answer_id = a.id
ORDER BY user_id;

--
--View all answers with user
--
DROP VIEW IF EXISTS VAllAnswer;
CREATE VIEW VAllAnswer
AS
SELECT

    a.id AS id,
    q.id AS question_id,
    u.acronym AS acronym,
    a.content AS answer,
    a.created AS created,
    u.gravatar AS gravatar,
    u.id AS user_id
FROM Question AS q
    JOIN question2answer AS qa
        ON qa.question_id = q.id
    JOIN Answer AS a
        ON qa.answer_id = a.id
    JOIN user2answer AS ua
        ON ua.answer_id = a.id
    JOIN User AS u
        ON ua.user_id = u.id


ORDER BY ID;

--
--View all comments with user
--
DROP VIEW IF EXISTS VAllComment;
CREATE VIEW VAllComment
AS
SELECT
    u.id AS id,
    u.acronym AS acronym,
    c.content AS comment,
    c.created AS created,
    q.content AS question
FROM User AS u
    JOIN user2comment AS uc
        ON uc.user_id = u.id
    JOIN Comment AS c
        ON uc.comment_id = c.id
    JOIN question2comment AS qa
        ON qa.comment_id = c.id
    JOIN Question AS q
        ON qa.question_id = q.id
ORDER BY ID;



--
--View question and tag
--
DROP VIEW IF EXISTS VQuestionTag;
CREATE VIEW VQuestionTag
AS
SELECT
    q.id AS id,
    t.id AS tag_id,
    q.content AS question,
    t.content AS tag
FROM Question AS q
    JOIN question2tag AS qt
        ON qt.question_id = q.id
    JOIN Tag AS t
        ON qt.tag_id = t.id
ORDER BY id;


--
--View question and tag with user
--
DROP VIEW IF EXISTS VTagQuestionUser;
CREATE VIEW VTagQuestionUser
AS
SELECT
    t.id AS id,
    q.id AS question_id,
    q.content AS question,
    t.content AS tag,
    vaq.acronym AS acronym,
    vaq.created AS created,
    vaq.answer AS answer
FROM Question AS q
    JOIN question2tag AS qt
        ON qt.question_id = q.id
    JOIN Tag AS t
        ON qt.tag_id = t.id
    JOIN VAllQuestion AS vaq
        ON vaq.question = q.content
ORDER BY id;



--
--View all answers with user
--
DROP VIEW IF EXISTS VAnswerQuestionUser;
CREATE VIEW VAnswerQuestionUser
AS
SELECT
    u.id AS user_id_answer,
    a.content AS answer,
    q.id AS question_id,
    q.content AS question,
    a.created AS answer_created
FROM User AS u
    JOIN user2answer AS ua
        ON ua.user_id = u.id
    JOIN Answer AS a
        ON ua.answer_id = a.id
    JOIN user2question AS uq
        ON uq.user_id = u.id
    JOIN question AS q
        ON uq.question_id = q.id
ORDER BY user_id_answer;




--
--View all answers with user
--
DROP VIEW IF EXISTS VAllQComment;
CREATE VIEW VAllQComment
AS
SELECT
    u.id AS id,
    u.acronym AS acronym,
    qc.content AS comment,
    qc.created AS created,
    uq.question_id AS question_id
FROM User AS u
    JOIN user2qcomment AS uq
        ON uq.user_id = u.id
    JOIN QComment AS qc
        ON uq.comment_id = qc.id
ORDER BY ID;

--
--View all answers with user
--
DROP VIEW IF EXISTS VAllAComment;
CREATE VIEW VAllAComment
AS
SELECT
    u.id AS id,
    u.acronym AS acronym,
    ac.content AS comment,
    ac.created AS created,
    ua.question_id AS question_id
FROM User AS u
    JOIN user2acomment AS ua
        ON ua.user_id = u.id
    JOIN AComment AS ac
        ON ua.comment_id = ac.id
ORDER BY ID;


--
--View all answers with user
--
DROP VIEW IF EXISTS VUltimate;
CREATE VIEW VUltimate
AS
SELECT
    q.id AS question_id,

    q.content AS question_content
    --q.description AS question_description,

    --vaq.user_id AS user_question_id,
    --vaq.acronym AS user_question_acronym,
    --vaq.created AS user_question_created,
    --vaq.gravatar AS user_question_gravatar,

    --vqc.comment AS comment_question,
    --vqc.acronym AS comment_question_user,
    --vqc.id AS comment_question_user_id,
    --vqc.created AS comment_question_created,

    --vaa.answer AS answer_content,
    --vaa.acronym AS answer_user,
    --vaa.id AS answer_user_id
    --vaa.gravatar AS answer_user_gravatar,
    --vaa.created AS answer_user_created,

    --vac.comment AS comment_answer,
    --vac.acronym AS comment_answer_user,
    --vac.id AS comment_answer_user_id,
    --vac.created AS comment_answer_created

FROM Question AS q
    JOIN VAllQuestion AS vaq
        ON vaq.question_id = q.id

    JOIN VAllQComment AS vqc
        ON vqc.question_id = q.id

    JOIN VAllAnswer AS vaa
        ON vaa.id = q.id

    JOIN VAllAComment AS vac
        ON vac.question_id = q.id


ORDER BY question_id;
