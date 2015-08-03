#!/usr/bin/env bash
# DROP = ejecte si la table conference existe deja
echo "DROP DATABASE IF EXISTS conference" | mysql --user=root --password=

echo "CREATE DATABASE conference DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci" | mysql --user=root --password=

#user exist?
echo 'DELETE FROM mysql.user WHERE user='choub' and host='choub'

# create user for conference database
# donne tout les privièges sur les tables de la BDD conference , à l'utilisateur

echo "GRANT ALL PRIVILEGES ON conference.* to 'choub'@localhost IDENTIFIED BY 'choub' WITH GRANT OPTION" | mysql --user=root --password=


composer install

php artisan migrate --seed

php artisan serve