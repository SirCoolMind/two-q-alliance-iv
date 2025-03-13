# Laravel Company App

> ### Example Laravel codebase containing company CRUD featuring authentication
> ### Visit [TwoQAllianceIV](https://twoqallianceiv.hafiz.day) for live demo

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)

Clone the repository

    git clone https://github.com/SirCoolMind/two-q-alliance-iv.git

Switch to the repo folder

    cd two-q-alliance-iv

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Enable storage link for public

    php artisan storage:link

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate && php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Feature

- `Company` - Able to Create, Read, Update, Delete information regarding company

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------
