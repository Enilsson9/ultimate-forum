sqlite3 data/db.sqlite < sql/ddl/user_sqlite.sql

sqlite3 --column --header data/db.sqlite "SELECT * FROM User;"
