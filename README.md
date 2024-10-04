<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


//BidXSell - README
## Table of Contents
1. [Setup Instructions](#setup-instructions)
   - [Install Dependencies](#install-dependencies)
   - [Set Up the Database](#set-up-the-database)
2. [Running the Application](#running-the-application)
   - [Start the Server](#start-the-server)
   - [Base URL and Port Information](#base-url-and-port-information)
3. [Running Tests](#running-tests)
4. [Other Instructions](#other-instructions)
5. [Assumptions and Decisions](#assumptions-and-decisions)
   - [Scalability and Extensibility](#scalability-and-extensibility)

## Setup Instructions

### Install Dependencies
1. Ensure you have **PHP** (version 8.x or later) and **Composer** installed.
2. Clone the repository:
    ```bash
    git clone <repository-url>
    cd bidxsell-task
    ```
3. Install the project dependencies via **Composer**:
    ```bash
    composer install
    ```
4. Copy the `.env.example` to create a new `.env` file:
    ```bash
    cp .env.example .env
    ```
5. Generate an application key:
    ```bash
    php artisan key:generate
    ```

### Set Up the Database
1. In the `.env` file, configure your database connection details:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ticketing_system
    DB_USERNAME=root
    DB_PASSWORD=
    ```
2. Run the migrations to create the necessary database tables:
    ```bash
    php artisan migrate
    ```


## Running the Application

### Start the Server
To start the Laravel development server, run the following command:
```bash
php artisan serve


### Base URL and Port Information

Once the server starts, you can access the application using the following base URL:
http://localhost:8000

####  to run the tests ----------
php artisan test

### Other Instructions
MAIL_MAILER=smtp
MAIL_HOST=smtp.elasticemail.com
MAIL_PORT=2525
MAIL_USERNAME="omneyaosama99@gmail.com"
MAIL_PASSWORD="D47215CC2AA8559F60A05F5729547DC5EFF6"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="omneyaosama99@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"

-------Set up the scheduled task by running the following command to start the scheduler:
php artisan schedule:work

----------To manually trigger the email reminder task for testing, run:
php artisan send:reminder-emails


### Assumptions and Decisions
Design Decisions
1-Event_Ticket Relationship:

-The system uses a polymorphic relationship to handle different ticket categories (e.g., General Admission, VIP, Group Booking).
-This approach ensures scalability, as new ticket types can easily be added without modifying the core logic of the ticketing system.
2 -Email_Notifications:

-The email notification system is designed to send reminders to customers 6 hours before the event starts.
-This functionality is implemented via a scheduled task that runs every hour to check for events happening within the next 6 hours.
Assumptions
1-Event Timing:

It is assumed that the system's server and the event time are in the same time zone. If different time zones are required, additional configuration will be needed to handle this properly.

2-Ticket Category Polymorphism:

Each ticket type (General, VIP, Group) has its own specific attributes (e.g., seat_preference, backstage_access).
These attributes are dynamically handled using polymorphic relationships to ensure flexibility and maintainability.


### Scalability and Extensibility

- To ensure scalability and extensibility, the following design patterns and architectural principles were applied:
        -Service Container and Singleton Pattern: Singleton services, like the email service, ensure that resources are shared efficiently throughout the system, avoiding unnecessary instantiation of services such as email providers or logging mechanisms.

         -Polymorphic Relationships: The polymorphic relationship allows for easy extension of the system, making it simple to introduce new ticket types without impacting existing functionality.

         -Use of the Command Pattern: The scheduled task for sending email reminders utilizes the command pattern, promoting separation of concerns and enhancing maintainability.

         -Dependency Injection: Laravel's Service Container is leveraged to handle dependencies, allowing new services to be registered and injected where needed without modifying existing code.
