#!/bin/bash
service docker start
docker start repargonew_db_1
docker start repargonew_phpmyadmin_1
cd ~/repargo-new/ && php artisan serve
