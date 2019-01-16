--
-- Setup for the article:
-- https://dbwebb.se/
--


--
-- Table User
--

DELETE FROM User;
INSERT INTO User VALUES
    ("1", "harry", "$2y$10$2J/UpbpkDzb2ugPHIdauKucp/IxM5texbGxL6Ia7epNW9qrTMmoQm", "Harry Potter", "harry@hotmail.com", "https://www.gravatar.com/avatar/0c4cfef9aae14fe22e081aa62234df88?s=100&d=identicon&r=PG" ),
    ("2", "voldemort", "$2y$10$2J/UpbpkDzb2ugPHIdauKucp/IxM5texbGxL6Ia7epNW9qrTMmoQm", "Lord Voldemort", "voldemort@hotmail.com", "https://www.gravatar.com/avatar/01e1ad15376a2e87095521e3a7716cbc?s=100&d=identicon&r=PG" ),
    ("3", "ron", "$2y$10$2J/UpbpkDzb2ugPHIdauKucp/IxM5texbGxL6Ia7epNW9qrTMmoQm", "Ron Weasly", "ron@hotmail.com", "https://www.gravatar.com/avatar/73115bb8de0b44acfabaa7994b02be8a?s=100&d=identicon&r=PG" ),
    ("4", "hermione", "$2y$10$2J/UpbpkDzb2ugPHIdauKucp/IxM5texbGxL6Ia7epNW9qrTMmoQm", "Hermione Granger", "hermione@hotmail.com", "https://www.gravatar.com/avatar/7f0aed29c4c114dcfc1d7dc81f24dc5e?s=100&d=identicon&r=PG" ),
    ("5", "dobby", "$2y$10$2J/UpbpkDzb2ugPHIdauKucp/IxM5texbGxL6Ia7epNW9qrTMmoQm", "Dobby The House Elf", "dobby@hotmail.com", "https://www.gravatar.com/avatar/482a5ff912c8eb2d0bafcec0a5d8a52f?s=100&d=identicon&r=PG" ),
    ("6", "draco", "$2y$10$2J/UpbpkDzb2ugPHIdauKucp/IxM5texbGxL6Ia7epNW9qrTMmoQm", "Draco Malfoy", "draco@hotmail.com", "https://www.gravatar.com/avatar/dcc51f10221eaebb190b5827d786107a?s=100&d=identicon&r=PG" ),
    ("7", "snape", "$2y$10$2J/UpbpkDzb2ugPHIdauKucp/IxM5texbGxL6Ia7epNW9qrTMmoQm", "Severus Snape", "snape@hotmail.com", "https://www.gravatar.com/avatar/snape?s=100&d=identicon&r=PG" ),
    ("8", "dumbledore", "$2y$10$2J/UpbpkDzb2ugPHIdauKucp/IxM5texbGxL6Ia7epNW9qrTMmoQm", "Albus Dumbledore", "dumbledore@hotmail.com", "https://www.gravatar.com/avatar/39282a70dd8fce1bd294ebaa5db3dbba?s=100&d=identicon&r=PG" )
;

DELETE FROM user2question;
INSERT INTO user2question VALUES
    ("1", "8", "1"),
    ("2", "7", "2"),
    ("3", "6", "3"),
    ("4", "5", "4"),
    ("5", "4", "5"),
    ("6", "3", "6"),
    ("7", "2", "7"),
    ("8", "1", "8"),
    ("9", "2", "9"),
    ("10", "1", "10")
;

DELETE FROM user2answer;
INSERT INTO user2answer VALUES
    ("1", "1", "10"),
    ("2", "2", "9"),
    ("3", "3", "8"),
    ("4", "4", "7"),
    ("5", "5", "6"),
    ("6", "6", "5"),
    ("7", "7", "4"),
    ("8", "8", "3"),
    ("9", "1", "2"),
    ("10", "2", "1");

DELETE FROM Question;
INSERT INTO Question VALUES
    ("1", "What is Minoxidil?", "I do not really what it is...", "2018-03-28 12:05"),
    ("2", "What Age Can I Start Using Minoxidil?", "I am 17 years old and wonder if I can use it.", "2018-03-27 11:05"),
    ("3", "Is Minoxidil Intended for Use on the Face?", "I thought this drug was only for the scalp...", "2018-03-26 10:05"),
    ("4", "Does Minoxidil Have Any Side Effects?", "I am worried to have side effects", "2018-03-25 11:05"),
    ("5", "How Often Should I Apply Minoxidil?", "Is it only once a day or how does it work...", "2018-03-24 12:05"),
    ("6", "How Do I Apply Liquid Minoxidil?", "I bought minoxidil but do not know how to apply it. PLEASE HELP", "2018-03-23 12:05"),
    ("7", "How Long Should I Leave Minoxidil On?", "I feel uncomfortable with it, how long should I leave it?", "2018-03-22 12:05"),
    ("8", "How Long Until I See Results?", "I am two weeks in and I see nothing", "2018-03-21 12:05"),
    ("9", "Can I Go Out in the Sun With Minoxidil Applied?", "I will go to the beach this weekend.", "2018-03-20 12:05"),
    ("10", "Which Brand of Minoxidil Should I Use?", "There are many brands on my local store", "2018-03-19 12:00")
;

DELETE FROM QComment;
INSERT INTO QComment VALUES
    ("1", "Have you heard of Wikipedia?", "2018-04-19 12:05"),
    ("2", "This question has been asked before", "2018-04-19 12:05"),
    ("3", "Who cares? It works!", "2018-04-19 12:05"),
    ("4", "Every second of your life", "2018-04-19 12:05"),
    ("5", "Have you even tried?", "2018-04-19 12:05"),
    ("6", "It will take forever trust me", "2018-04-19 12:05"),
    ("7", "Nooooooo", "2018-04-19 12:05"),
    ("8", "Buy the cheapest they are all the same", "2018-04-19 12:05")
;

DELETE FROM question2comment;
INSERT INTO question2comment VALUES
    ("1", "1", "1"),
    ("3", "2", "2"),
    ("4", "4", "3"),
    ("5", "5", "4"),
    ("8", "6", "6"),
    ("9", "7", "7"),
    ("10", "8", "8")
;

DELETE FROM user2qcomment;
INSERT INTO user2qcomment VALUES
    ("1", "1", "1", "1"),
    ("2", "2", "2", "2"),
    ("3", "3", "3", "3"),
    ("4", "4", "4", "4"),
    ("5", "5", "5", "5"),
    ("6", "6", "6", "6"),
    ("7", "7", "7", "7"),
    ("8", "8", "8", "8")
;

DELETE FROM answer2comment;
INSERT INTO answer2comment VALUES
    ("1", "1", "1"),
    ("2", "3", "2"),
    ("3", "5", "3"),
    ("4", "7", "4"),
    ("5", "9", "5"),
    ("6", "11", "6"),
    ("7", "13", "7"),
    ("8", "15", "8")
;


DELETE FROM user2acomment;
INSERT INTO user2acomment VALUES
    ("1", "8", "1", "1"),
    ("2", "7", "2", "2"),
    ("3", "6", "3", "3"),
    ("4", "5", "4", "4"),
    ("5", "4", "5", "5"),
    ("6", "3", "6", "6"),
    ("7", "2", "7", "7"),
    ("8", "1", "8", "8")
;


DELETE FROM AComment;
INSERT INTO AComment VALUES
   ("1", "Great answer!", "2018-04-06 12:05"),
   ("2", "You just copied some text from google mate", "2018-04-06 12:05"),
   ("3", "Bad answer, kids please do not use this", "2018-04-06 12:05"),
   ("4", "Mmm this should be investigated", "2018-04-06 12:05"),
   ("5", "Source?", "2018-04-06 12:05"),
   ("6", "Are you dumb?", "2018-04-06 12:05"),
   ("7", "YES EXACTLY", "2018-04-06 12:05"),
   ("8", "Please help me out too", "2018-04-06 12:05")
;


DELETE FROM Answer;
INSERT INTO Answer VALUES
    ("1", "Minoxidil is a generic medication used for hair regrowth.
    It was originally developed for treating hypertension (high blood pressure) as an oral medication,
    and prescribed under the name Loniten", "2019-01-01 12:05"),
    ("2", "Just google it bro!!!", "2019-01-01 12:05"),
    ("3", "It is the best thing that ever happened to me :D", "2019-01-01 12:05"),


    ("4", "There's no set age, but we advise no one younger than 18 to use it. If you're young, see what you can grow before using minox.
         You may know somebody who is 16 years old with a full beard; this is an exception", "2019-01-01 12:05"),
    ("5", "Just go for it pussy!", "2019-01-01 12:05"),
    ("6", "I am 5 years old and I use it lol", "2019-01-01 12:05"),


    ("7", "No. The FDA in the United States of America has approved minoxidil only for use on the scalp.
        Because of this, the product directions instruct users to apply it only there. ", "2019-01-01 12:05"),
    ("8", "No, but it works!", "2019-01-01 12:05"),
    ("9", "It has, however, been tested in Thailand", "2019-01-01 12:05"),


    ("10", "Of course. It is a drug, after all. Although, most of the common side effects are fairly minor.", "2019-01-01 12:05"),

    ("11", "Twice a day is recommended; once in the morning and once in the evening, roughly twelve hours apart.", "2019-01-01 12:05"),
    ("12", "Since the human body can only metabolize a certain amount of minoxidil within a 24-hour period, more frequent applications
        than two per day is unnecessary. Although twice per day is recommended, it is not obligatory.", "2019-01-01 12:05"),

    ("13", "With a dropper!", "2019-01-01 12:05"),


    ("14", "Whether foam or liquid, it should stay on for at least 4 hours. Tests have shown 50% is absorbed in the first hour, and 75% by hour four.", "2019-01-01 12:05"),

    ("15", "According to Rogaine, a clinical trial has shown some people may see results as early as 8 weeks (based on the scalp, of course).
     They go on to point out that it can take up to 16 weeks to see results. Just bear in mind, results will vary from person to person, so you should be patient.", "2019-01-01 12:05"),


    ("16", "Generally speaking, it is not recommended. While rare and not necessarily documented, there may be rare cases of photosensitivity of the skin due to the minox. ", "2019-01-01 12:05"),


    ("17", "Many use Kirkland Signature as it is the cheapest, but any brand containing 5% minoxidil is fine.
         More than 5% may be a health issue, and less seems to yield less results. There is some efficacy to 10%
          being useful for those that are not responding well to minoxidil, but it needs to be a mixture without DHT blockers.  ", "2019-01-01 12:05")

    ;



DELETE FROM question2answer;
INSERT INTO question2answer VALUES
    ("1", "1", "1"),
    ("2", "1", "2"),
    ("3", "1", "3"),
    ("4", "2", "4"),
    ("5", "2", "5"),
    ("6", "2", "6"),
    ("7", "3", "7"),
    ("8", "3", "8"),
    ("9", "3", "9"),
    ("10", "4", "10"),
    ("11", "5", "11"),
    ("12", "5", "12"),
    ("13", "6", "13"),
    ("14", "7", "14"),
    ("15", "8", "15"),
    ("16", "9", "16"),
    ("17", "10", "17")
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
    ("9", "4", "3"),
    ("10", "4", "4"),
    ("11", "4", "5"),
    ("12", "5", "6"),
    ("13", "5", "1"),
    ("14", "6", "2"),
    ("15", "6", "3"),
    ("16", "7", "4"),
    ("17", "8", "5"),
    ("18", "8", "6"),
    ("19", "9", "1"),
    ("20", "9", "2"),
    ("21", "10", "3")
;

DELETE FROM Tag;
INSERT INTO Tag VALUES
    ("1", "beard", "All questions releated to beard growth"),
    ("2", "brands", "Minoxidil brands all over the world can get confusing."),
    ("3", "grooming", "Oils for maintenance and grooming"),
    ("4", "supplements", "Anything else than Minoxidil that can help with beard growth"),
    ("5", "business", "If you want to start a minoxidil business."),
    ("6", "random", "Ask whatever you feel like asking!")
;
