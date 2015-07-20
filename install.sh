#!/usr/bin/env bash
# DROP = ejecte si la table student existe deja
echo "DROP DATABASE IF EXISTS ecole" | mysql --user=root --password=

echo "CREATE DATABASE ecole DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci" | mysql --user=root --password=

#user choub exist?
echo 'DELETE FROM mysql.user WHERE user='choub' and host='choub'

# create user for student database
# donne tout les privièges sur les tables de la BDD student , à l'utilisateur
echo "GRANT ALL PRIVILEGES ON ecole.* to 'choub'@localhost IDENTIFIED BY 'choub' WITH GRANT OPTION" | mysql --user=root --password=

# php artisan make:migration create_student_table --create_students

