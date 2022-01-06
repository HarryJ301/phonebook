Harry Jackson - U1964301

Advanced Web Programming 2021

Assignment Two

# InterBook V2- The Supercharged online phonebook

This is a descriptive readme file and step by step guide to installing InterBookV2, the Supercharged online phonebook!

# Description
---
The InterBookV2 Online Phonebook is a free to use web application where uses can create an account on and store their contacts securely. Users can store up to 500 to contacts each. These are stored in a secure database along with their account information in two separate tables, 'users' and 'numbers'.

This app utilizes the PHP framework, Laravel, Google's ReCAPTCHA API, Email Authentication and uses an SQL database managed by phpMyAdmin.

A user’s contacts are displayed by accessing the numbers database and only fetching the corresponding contact that are associated with that user. This is then rendered onto the browser using Blade. 

Users can also add, edit and remove numbers as they wish.

 - To create a new contact, the application fetches the current user ID for validation. It then collects the user’s data via input text boxes via Blade. This is then sent to the controller where it then gets sent to the data model which creates a new number. 
- To edit, the application does the same as creating except users can now edit all the attributes of their contact.
- To remove, the application gets the current database instance that has been selected and uses the database model method 'delete()' to remove it.

The attributes list is as follows.

    -First name *
    -Middle name
    -Last name *
    -Maiden name
    -Phone number *
    -Mobile number
    -Address
    -Postcode
    -Birthday
    -Email address
    -Occupation
    -Contacts Website (URL)
    -Other names
    -Notes
    -Is Favourite
    -Is Important
    
NB: Asterisk indicate required fields.

Users can also search their contact database by either the first name or the phone number.
This is then ran and an updated view is show to the user.

# Installation

---

## Prerequisites

- Web server
- Composer
- MySql
- Node.js & npm

### Steps:

1. Create a MySQL.

2. Clone the repo into a directory: git@github.com:hudds-awp2021-cht2520/assignment-02-HarryJ301.git

3. Using a CLI, CD into the directory.

4. Install the PHP dependencies:
```
php composer install
```

5. Install the front-end dependencies:
```
npm install
```

6. Open the .env file in the root of the directory and add your database details. 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mydb
DB_USERNAME=myuser
DB_PASSWORD=mypassword
```

7. Add the application key to the environment:
```
php artisan key:generate
```

8. Run the database migrations:
```
php artisan migrate
```

9. Seed the database with dummy data:
```
php artisan db:seed
```

We should now see data in the database in both the users table and the numbers table. Go to PhpMyAdmin to see what has been created.

For testing purposes, a generic admin account has been created.

- Email: admin@email.com
- Password: password

10. Finally, configure a virtual host in your dev webserver, pointing to the `/public` directory.


This will display the Laravel welcome screen. In the top right corner, you will see two buttons, login and register. Click login.

This will then take you to the login page of the online phonebook. 

Enter the admin login details stated above.

You will then be taken to the dashboard where you can view, add, edit and delete your contacts.

The admin account has 20 contacts.


# Usage
To access the application, you can either use a pre-made user or register yourself. To do this, simply open the welcome screen by navigating to the host space URL. Then at the top right, click register.
Fill in your details and clock register. This will then take you to the dashboard of the application.

![Dashboard](https://i.ibb.co/RYWscwq/dashboard.png)
Above is an image of what the dashboard looks like.
You can see your numbers by clicking 'Numbers', add new ones by clicking 'Add Number' and log out by clicking you name in the top right of the web page. 

![Contacts Page](https://i.ibb.co/3prBVRL/contacts.png)

Above is where your numbers are displayed. In this instance, we are using a brand-new account therefore we need to add some numbers. To do so, click 'Add number'.

![Add Contacts Page](https://i.ibb.co/th2Tjmh/add-contact.png)

In this page, we can add contacts to your account. The attributes list is posted in the introduction of the readme.

We can also edit the number and change the name attached to a number.

![Booleans](https://i.ibb.co/sgGkwKD/boolean-attributes.png)

Users can also decide whether a certain contacts should be a favourite or an important.
If the contact is a favourite, a small heart will appear at the bottom of the contacts details.
If the contact is important, three exclamation marks will appear. (!!!)

![Search&Export](https://i.ibb.co/5Tj7qPT/search-and-export.png)

The application can also search individual contacts by first name or number.

![Search Results](https://i.ibb.co/DDnZ5H1/search-result.png)

This is the result when we search for Marion.

![Search Results](https://i.ibb.co/VSfQCbN/download.png)

You can also download your contacts as a .csv file that you can view and transfer or print.

![Login Captcha](https://i.ibb.co/Z8LytNC/login-with-captcha.png)

This is the login page with the extra security of Google's ReCAPTCHA. This will try to stop automated bots making too many requests. The same ReCAPTCHA is on the register form also.

![Register Captcha](https://i.ibb.co/jfwF9xd/register-with-captcha.png)


# Testing

There are tests that are provided with this application to test the login methods and database calls for creating and editing numbers. To run these tests simply execute the following command in a CLI shell that has is CD in the root of the directory:

- php artisan test

This is a good way to check if the database and the application have been set up correctly.

Common errors:
You may see this error:

	PDOException: SQLSTATE[HY000] [1049] Unknown database

This means that the application cannot access the database.


Solution:
Go to PhpMyAdmin and check that the database exists and that all tables are present and correct.
You might need to run the migration and seed commands again.

# Reflective analysis

During development, numerous concerns arise when implementing new attributes like users’ emails and birthdays. These are sensitive pieces of information that must be stored securely. Laravel is much more secure than standard PHP however, certain measures and security features must be added to enhance this. One implementation that contributes to this is the use of Google's ReCAPTCHA for login and register.

ReCAPTCHA is a security function that prompts users to check a box before they login or register. Another name for ReCAPTCHA is the 'human test'. Users must move their mouse and check the box. This security feature is designed to stop automated bots from making too many login requests or making dummy accounts and overloading the web servers and database servers. The ultimate malicious goal of the automated bots is to slow down or terminate the service of the website. This can also expose certain security flaws of the application. Google ReCAPTCHA tries to prevent this. 

In my implementation, I have included it every time a user logs in or registers. The function was relatively easy to implement in Laravel. I started by researching how Google authenticates ReCAPTCHA requests. There are two keys that are used, an API key and a secret key. Both can be obtained by creating a paid account on Google's cloud service. However, Google offer a set of development keys. These are defined in the .env file of the project.

Within the source code, the ReCAPTCHA function is present in a Validator class where each request is made by a 'client' i.e., the user. This is then verified with the keys and sent to a Google URL. This then fetches the code that displays the ReCAPTCHA.

Then, in the apps requests classes, there is a 'LoginRequest.PHP' class. This is where the rules are defined for what the application needs for a successful login. The same is present in the Register Request rules.
```
'g-recaptcha-response' => 'required|recaptcha'
```
The above snippet of code indicates that ReCAPTCHA is required.
If the user is successful, the login page will accept the request and log the user in.
If the user fails to check the CAPTCH, the login or register form will prompt the user to complete ReCAPTCHA and will not log the user in, thus protecting the system from malicious attacks from automated bots.

Other major features were implemented like the search feature, however, I felt that ReCAPTCHA is the most important one due to its security benefits.  

# Appendix

Google ReCAPTCHA requires an API key and Secret Key. For testing purposes, the keys are development keys and are placed in the .env file of the project.
If ReCAPTCHA fails, check the .env file that the keys are present.
See screenshots for more details on ReCAPTCHA.

References:

 - 'CRUD actions throughout MVC', Andrew Flannery, 2021.
 - 'Writing Tests', Andrew Flannery, 2021.
 - 'Current User ID', codewall.co.uk, 2020.
 - 'Using Blade' https://laravel.com/docs/master/blade.
- 'Query Builder using Laravel', https://laravel.com/docs/8.x/queries.
- https://laracasts.com/

Technical data:
Developed using HTML, PHP, CSS with the Laravel Framework. 
Laravel v8.68.1 (PHP v8.0.12)
Google ReCAPTCHA API
