sqlite3 data/db.sqlite < sql/ddl.sql

sqlite3 data/db.sqlite < sql/insert.sql

sqlite3 data/db.sqlite < sql/dml.sql

sqlite3 --column --header data/db.sqlite "SELECT * FROM VAllQuestion;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM Question;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM Answer;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM QuestionComment;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM AnswerComment;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM Tag;"
