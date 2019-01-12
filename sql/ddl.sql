--
-- Creating a User table.
--



--
-- Table User
--
DROP TABLE IF EXISTS User;
CREATE TABLE User (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "acronym" TEXT UNIQUE NOT NULL,
    "password" TEXT,
    "fullname" TEXT,
    "email" TEXT UNIQUE NOT NULL,
    "gravatar" TEXT
);

--
-- Table User
--
DROP TABLE IF EXISTS user2question;
CREATE TABLE user2question (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "user_id" INT,
    "question_id" INT
);

--
-- Table User
--
DROP TABLE IF EXISTS Question;
CREATE TABLE Question (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "content" TEXT NOT NULL
);


--
-- Table User
--
DROP TABLE IF EXISTS question2tag;
CREATE TABLE question2tag (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "user_id" INT,
    "tag_id" INT
);

--
-- Table User
--
DROP TABLE IF EXISTS Tag;
CREATE TABLE Tag (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "content" TEXT NOT NULL
);


--
-- Table User
--
DROP TABLE IF EXISTS question2answer;
CREATE TABLE question2answer (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "question_id" INT,
    "answer_id" INT
);

--
-- Table User
--
DROP TABLE IF EXISTS Answer;
CREATE TABLE Answer (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "content" TEXT NOT NULL
);

--
-- Table User
--
DROP TABLE IF EXISTS answer2comment;
CREATE TABLE answer2comment (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "answer_id" INT,
    "comment_id" INT
);

--
-- Table User
--
DROP TABLE IF EXISTS question2comment;
CREATE TABLE question2comment (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "question_id" INT,
    "comment_id" INT
);


--
-- Table User
--
DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "content" TEXT NOT NULL
);
