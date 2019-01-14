#sqlite3 data/db.sqlite < sql/ddl.sql

#sqlite3 data/db.sqlite < sql/insert.sql

sqlite3 data/db.sqlite < sql/dml.sql

#sqlite3 --column --header data/db.sqlite "SELECT * FROM VAllQuestion;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM Question;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM Answer;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM QuestionComment;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM AnswerComment;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM Tag;"

#sqlite3 --column --header data/db.sqlite "SELECT * FROM VAllQuestion;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM VAllAnswer;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM VAllComment;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM VQuestionTag;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM VTagQuestionUser;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM VAnswerQuestionUser;"


#sqlite3 --column --header data/db.sqlite "SELECT * FROM VUltimate;"
#sqlite3 --column --header data/db.sqlite "SELECT * FROM VAllQComment;"

#sqlite3 --column --header data/db.sqlite "SELECT last_insert_rowid();"
