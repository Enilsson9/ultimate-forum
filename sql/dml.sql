--
--View all questions with user and created CURRENT_TIMESTAMP
--
DROP VIEW IF EXISTS VAllQuestion;
CREATE VIEW VAllQuestion
AS
SELECT
    u.id AS id,
    u.acronym AS acronym,
    q.content AS question,
    q.created AS created,
    a.content AS answer
FROM User AS u
    JOIN user2question AS uq
        ON uq.user_id = u.id
    JOIN Question AS q
        ON uq.question_id = q.id
    JOIN user2answer AS ua
        ON ua.answer_id = u.id
    JOIN Answer AS a
        ON ua.answer_id = a.id
ORDER BY ID;

--
--View all answers with user
--
DROP VIEW IF EXISTS VAllAnswer;
CREATE VIEW VAllAnswer
AS
SELECT
    u.id AS id,
    u.acronym AS acronym,
    a.content AS answer,
    a.created AS created
FROM User AS u
    JOIN user2answer AS ua
        ON ua.answer_id = u.id
    JOIN Answer AS a
        ON ua.answer_id = a.id
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
    q.content AS question,
    t.content AS tag
FROM Question AS q
    JOIN question2tag AS qt
        ON qt.question_id = q.id
    JOIN Tag AS t
        ON qt.tag_id = t.id
ORDER BY ID;
