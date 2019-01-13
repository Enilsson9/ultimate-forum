--
-- Setup for the article:
-- https://dbwebb.se/
--


--
-- Table User
--

DELETE FROM User;
INSERT INTO User VALUES
    ("1", "admin", "$2y$10$6W4pfTK/uIFuyw8VQpXvkOMz/kxtmVqsNBTTV98voCQK.SGWJQxmC", "admin admin", "admin@admin.com", "https://www.gravatar.com/avatar/4b4fe6df3838d2de444a35098a22477a?s=100&d=mp&r=g" ),
    ("2", "doe", "$2y$10$9r9EEktcijNkTziUBv.VW.i5Uyl.qrqUyqrH0i3gbhuiYI3DHVTAW", "doe doe", "doe@doe.com", "https://www.gravatar.com/avatar/4b4fe6df3838d2de444a35098a22477a?s=100&d=mp&r=g" ),
    ("3", "edward", "$2y$10$ODtLGp820yNivAhamYleluHxRoJ53bzFfuhzNHQC80mVMswkvIN.O", "edward edward", "edward@edward.com", "https://www.gravatar.com/avatar/4b4fe6df3838d2de444a35098a22477a?s=100&d=mp&r=g" )
;

DELETE FROM user2question;
INSERT INTO user2question VALUES
    ("1", "1", "1"),
    ("2", "2", "2"),
    ("3", "3", "3")
;

DELETE FROM user2answer;
INSERT INTO user2answer VALUES
    ("1", "1", "1"),
    ("2", "2", "2"),
    ("3", "3", "3")
;

DELETE FROM Question;
INSERT INTO Question VALUES
    ("1", "What?", "2018-03-28 12:05"),
    ("2", "How?", "2018-03-28 12:05"),
    ("3", "When?", "2018-03-28 12:05")
;

DELETE FROM question2tag;
INSERT INTO question2tag VALUES
    ("1", "1", "1"),
    ("2", "1", "2"),
    ("3", "1", "3"),
    ("4", "2", "4"),
    ("5", "2", "5"),
    ("6", "2", "6"),
    ("7", "3", "1"),
    ("8", "3", "2"),
    ("9", "3", "3")
;

DELETE FROM Tag;
INSERT INTO Tag VALUES
    ("1", "random"),
    ("2", "other"),
    ("3", "dark"),
    ("4", "tech"),
    ("5", "business"),
    ("6", "whatever")
;

DELETE FROM question2answer;
INSERT INTO question2answer VALUES
    ("1", "1", "1"),
    ("2", "2", "2"),
    ("3", "3", "3")
;

DELETE FROM Answer;
INSERT INTO Answer VALUES
    ("1", "Your mom", "2018-11-08 12:05"),
    ("2", "From behind", "2018-11-08 12:05"),
    ("3", "Tonight", "2018-11-08 12:05")
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
    ("1", "This is a comment", "2018-04-19 12:05"),
    ("2", "This is also a comment", "2018-04-19 12:05"),
    ("3", "I am a comment", "2018-04-19 12:05")
;

DELETE FROM user2comment;
INSERT INTO user2comment VALUES
    ("1", "1", "1"),
    ("2", "2", "2"),
    ("3", "3", "3")
;
