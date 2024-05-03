_now=$(date +"%Y_%m_%d-%H_%M")
_file="db_data/data.sql"
docker compose exec db sh -c 'exec mysqldump "$MYSQL_DATABASE" -uroot -p"$MYSQL_ROOT_PASSWORD"' > $_file
sed '1d' $_file > tmpfile; mv tmpfile $_file # Removes the password warning from the file