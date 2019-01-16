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
    ("1", "What?", "Description 1", "2018-03-28 12:05"),
    ("2", "How?", "Description 2", "2018-03-28 12:05"),
    ("3", "When?", "Description 3", "2018-03-28 12:05")
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
    ("1", "random", "Here you can do random stuff"),
    ("2", "other", "Here you can do random other"),
    ("3", "dark", "Here you can do random dark"),
    ("4", "tech", "Here you can do random tech"),
    ("5", "business", "Here you can do random business"),
    ("6", "whatever", "Here you can do random whatever")
;

DELETE FROM question2answer;
INSERT INTO question2answer VALUES
    ("1", "1", "1"),
    ("2", "1", "2"),
    ("3", "1", "3")
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

DELETE FROM QComment;
INSERT INTO QComment VALUES
    ("1", "Question comment 1", "2018-04-19 12:05"),
    ("2", "Question comment 2", "2018-04-19 12:05"),
    ("3", "Question comment 3", "2018-04-19 12:05")
;

DELETE FROM AComment;
INSERT INTO AComment VALUES
    ("1", "Answer comment 1", "2018-04-06 12:05"),
    ("2", "Answer comment 2", "2018-04-06 12:05"),
    ("3", "Answer comment 3", "2018-04-06 12:05")
;

DELETE FROM user2qcomment;
INSERT INTO user2qcomment VALUES
    ("1", "1", "1", "1"),
    ("2", "2", "2", "2"),
    ("3", "3", "3", "3")
;

DELETE FROM user2acomment;
INSERT INTO user2acomment VALUES
    ("1", "1", "1", "1"),
    ("2", "2", "2", "2"),
    ("3", "3", "3", "3")
;
