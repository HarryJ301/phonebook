Harry Jackson - U1964301

Advanced Web Programming 2021

Assignment One

# InterBook - The online phonebook

This is a descriptive readme file and step by step guide to installing InterBook, the online phonebook!

# Description
The InterBook Online Phonebook is a free to use web application where uses can create an account on and store their phone numbers. Users can store up to 100 to numbers. These are stored in a secure database along with their account information in two separate tables, 'users' and 'numbers'. 

This app utilizes the PHP framework, Laravel, and uses an SQL database managed by phpMyAdmin.

A users numbers are displayed by accessing the numbers database and only fetching the corresponding numbers that are associated with that users user ID. This is then rendered onto the browser using Blade. 

Users can also add, edit and remove numbers as they wish.

 - To create a new number, the application fetches the current user ID to inject into the statement. It then collects the users data via input text boxes via Blade. This is then sent to the controller where it then gets sent to the data model which creates an new number. 
- To edit, the application does the same as creating except instead it takes the current number and displays it on the screen for the user to see. This is so the user know what the number was before in case they change their minds. 
- To remove, the application gets the current database instance that has been selected and uses the database model method 'delete()' to remove it.

# Installation
You can use XAMPP to host this application.

XAMPP download - https://www.apachefriends.org/index.html
Download for Windows and run the setup, leaving all settings at default and un-check 'bitnami install'. It is recommended that you install XAMPP at the root of your C drive i.e., 'C:\xampp'.

After, download the application package and extract it in to the 'htdocs' folder within the 'xampp' folder. 

Run XAMPP and start the Apache and MySQL services.
Then, open up the shell and type in the following command:
- cd C:\xampp\htdocs\assignment_01

This will tell XAMPP's shell where to execute commands. 

We now need to create a database environment for the application to use.

From XAMPP, click the services Admin button on the MYSQL service. This will launch PHPMyAdmin, which is a GUI, web based management tool for MySQL.

Click ‘User Accounts’ from the tabs on the right and ‘Add user account’. Add a user account with the following settings:
-	Username: phonebook
-	Password: mysecurepassword
-	Create database with same name and grant all privileges: true

In the XAMPP terminal, execute the following commands in order:  
  
1. mysql -u phonebook -p phonebook  

2. \c

4. php artisan migrate

Now, we need to create dummy data. To do this, we need to execute the following command:

- php artisan db:seed

We should now see data in the database in both the users table and the numbers table. Go to PHPMyAdmin to see what has been created and note down an email address of a random user. We will need this to login to the application. 

Now, execute the following command in the XAMPP shell:

- php artisan serve

This creates a web space for the application.
Open your browser and navigate to http://127.0.0.1:8000/. 
This will display the Laravel welcome screen. In the top right corner, you will see two buttons, login and register. Click login.

This will then take you to the login page of the online phonebook. 

Enter the email of the random user and use 'password' as the password.

You will then be taken to the dashboard where you can view, add, edit and delete your numbers.

*Note: Due to the database seed being random, there is a small possibility that the user you choose does not have any numbers attached to them. This means that when you click 'numbers', nothing will show. If this happens, go back to PHPMyAdmin and pick another user to login in with.* 

# Usage
To access the application, you can either use a pre-made user or register yourself. To do this, simply open up the welcome screen by navigating to http://127.0.0.1:8000/. Then at the top right, click register.
Fill in your details and clock register. This will then take you to the dashboard of the application.

![Dashboard](https://i.ibb.co/sm466Vq/dashboard.png)
Above is an image of what the dashboard looks like.
You can see your numbers by clicking 'Numbers', add new ones by clicking 'Add Number' and log out by clicking you name in the top right of the web page. 

![Numbers Page](https://i.ibb.co/25MPtHf/numbers.png)

Above is where your numbers are displayed. In this instance, we are using a brand new account therefore we need to add some numbers. To do so, click 'Add number'.

![Add Numbers Page](https://i.ibb.co/RYbR7Xw/add-numbers.png)

In this page, we can add numbers to our account. You can attach a name to your number to make it easily identifiable. The User ID field cannot be edited but is displayed here for database purposes.
In this case we are going to add John Doe's number, '0123456789'. 

![Added Number](https://i.ibb.co/gwxjmLC/number-added.png)

Once the number has been created, the application will take you back to the numbers view. Here, we can see that John Doe has been added successfully. 

We can also edit the number and change the name attached to a number. To do this, we click 'Edit'.

 ![Edit Number](https://i.ibb.co/S6JSndn/edit-number.png)

The application tells us the previous number and name for reference. We can then click 'Update' when we are happy with the edit. In this instance, we are changing the name to 'Jane Doe' and the number to '0987654321'. 

![Updated Number](https://i.ibb.co/qd7W0YJ/updated-number.png)

We can also delete an entry. This will remove the number from the database entirely. 

After all the numbers have been added, we can revert back to the dashboard by clicking 'Home'. 

![Logout](https://i.ibb.co/47y0rZM/logout.png)

We can then click our name at the top right corner of the page and click 'Log Out'. 

# Testing

There are tests that are provided with this application to test the login methods and database calls for creating and editing numbers. To run these tests simply execute the following command in the XAMPP shell:

- php artisan test

This is a good way to check if the database and the application have been set up correctly.

Common errors:
You may see this error:

	PDOException: SQLSTATE[HY000] [1049] Unknown database

This means that the application cannot access the database 'phonebook'.

Solution:
Go to PHPMyAdmin and check that the database 'phonebook' exist and that all tables are present and correct.

# Appendix

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
