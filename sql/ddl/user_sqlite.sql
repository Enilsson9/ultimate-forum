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
DROP TABLE IF EXISTS Question;
CREATE TABLE Question (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "content" TEXT NOT NULL,
    "tag" TEXT,
    "user" INTEGER,
    "comment" INTEGER,
    "answer" INTEGER,
    FOREIGN KEY(user) REFERENCES User(id),
    FOREIGN KEY(comment) REFERENCES QuestionComment(id),
    FOREIGN KEY(answer) REFERENCES Answer(id)
);

--
-- Table User
--
DROP TABLE IF EXISTS Answer;
CREATE TABLE Answer (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "content" TEXT NOT NULL,
    "user" TEXT,
    "comment" TEXT,
    FOREIGN KEY(user) REFERENCES User(id),
    FOREIGN KEY(comment) REFERENCES AnswerComment(id)
);

--
-- Table User
--
DROP TABLE IF EXISTS QuestionComment;
CREATE TABLE QuestionComment (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "content" TEXT NOT NULL,
    "question" INTEGER,
    "user" TEXT,
    FOREIGN KEY(question) REFERENCES Question(id),
    FOREIGN KEY(user) REFERENCES User(id)
);

--
-- Table User
--
DROP TABLE IF EXISTS AnswerComment;
CREATE TABLE AnswerComment (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "content" TEXT NOT NULL,
    "answer" INTEGER,
    "user" TEXT,
    FOREIGN KEY(answer) REFERENCES Answer(id),
    FOREIGN KEY(user) REFERENCES User(id)
);
