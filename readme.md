
# Blood Bank Management

## Overview

This is a blood bank management system. The website is implemented in php with mysql as the database.

## User Functionalities
* users can create an account
* users can login to the system
* users can request/donate blood_donation
* users can view their transaction History
* users can view the current blood stock

## Admin Functionalities
* Admins can view all the current pending reqeusts
* Admins can view the statistics of the system (total blood count,transactions, etc...)
* Admins can view the blood stock
* Admins can view user details
* Admins can delete users from the database

## Configuration
* PHP Version: 7.4.3
* MySQL Versions: 8.0.27
* Apache Version: 2.4.29


## Installation
* User needs to edit root and password in the database.php file for his/her mysql database.
* User neeeds to create database named blood_bank in mysql database.
* User needs to create tables in the database.(just copy and paste contents in sql/bbm.sql file)
* Run development server in the terminal.(php -S localhost:8000)


## Commands
    php -S 127.0.0.1:8000

