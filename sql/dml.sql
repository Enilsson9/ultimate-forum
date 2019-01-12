--
--View all questions with user
--
DROP VIEW IF EXISTS VAllQuestion;
CREATE VIEW VAllQuestion
AS
SELECT
    u.id AS id,
    u.acronym AS acronym,
    q.content AS question
FROM User AS u
    JOIN user2question AS uq
        ON uq.user_id = u.id
    JOIN question AS q
        ON uq.question_id = q.id
ORDER BY ID;
