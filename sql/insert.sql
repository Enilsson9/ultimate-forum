--
-- Setup for the article:
-- https://dbwebb.se/
--


--
-- Table User
--

DELETE FROM User;
INSERT INTO User VALUES
    ("1", "admin", "admin", "admin admin", "admin@admin.com", "https://www.gravatar.com/avatar/4b4fe6df3838d2de444a35098a22477a?s=100&d=mp&r=g" ),
    ("2", "doe", "doe", "doe doe", "doe@doe.com", "https://www.gravatar.com/avatar/4b4fe6df3838d2de444a35098a22477a?s=100&d=mp&r=g" ),
    ("3", "edward", "edward", "edward edward", "edward@edward.com", "https://www.gravatar.com/avatar/4b4fe6df3838d2de444a35098a22477a?s=100&d=mp&r=g" )
;

DELETE FROM user2question;
INSERT INTO user2question VALUES
    ("1", "1", "1"),
    ("2", "2", "2"),
    ("3", "3", "3")
;

DELETE FROM Question;
INSERT INTO Question VALUES
    ("1", "What?"),
    ("2", "How?"),
    ("3", "When?")
;

DELETE FROM question2tag;
INSERT INTO question2tag VALUES
    ("1", "1", "1"),
    ("2", "2", "2"),
    ("3", "3", "3")
;

DELETE FROM Tag;
INSERT INTO Tag VALUES
    ("1", "random"),
    ("2", "other"),
    ("3", "dark")
;

DELETE FROM question2answer;
INSERT INTO question2answer VALUES
    ("1", "1", "1"),
    ("2", "2", "2"),
    ("3", "3", "3")
;

DELETE FROM Answer;
INSERT INTO Answer VALUES
    ("1", "Your mom"),
    ("2", "From behind"),
    ("3", "Tonight?")
;

DELETE FROM answer2comment;
INSERT INTO answer2comment VALUES
    ("1", "1", "1"),
    ("2", "2", "2"),
    ("3", "3", "3")
;

DELETE FROM question2comment;
INSERT INTO question2comment VALUES
    ("1", "1", "1"),
    ("2", "2", "2"),
    ("3", "3", "3")
;

DELETE FROM Comment;
INSERT INTO Comment VALUES
    ("1", "This is a comment"),
    ("2", "This is also a comment"),
    ("3", "I am a comment")
;
