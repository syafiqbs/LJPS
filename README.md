# LJPS

The LJPS: Learning Journey Progress System, is used for users to track courses that they have signed up for in the LMS system, to ensure that they are learning the relevant courses that can fufil the skills needed to be able to do certain job roles

# Language

The first iteration of the LJPS is built using HTML and PHP. 


# Folders

Code is separated into the Frontend, Backend, and Tests folders. 

# Running the App

To run the app, simply clone this repository into your localhost folder. Import the populate.sql, which can be found in the backend folder, and go to localhost/LJPS/frontend/index.html
To log in, simply select any of the users emails in the LJPS staff database, examples include:
- john.sim<span>@</span>allinone.come.sg for an admin role that has the HR function
- Michael.Ng<span>@</span>allinone.com.sg for a normal staff that has basic features

# Unit Testing
As the website uses PHP, we will be using the PHPUnit Library for testing
Simply follow the steps below to perform the Unit Tests
1.  Install composer on your local device 
2.  In VSC or your preferred CLI, path to the main project folder
3.  Run the command "composer require phpunit/phpunit ^9"
4.  After the vendor folder is installed/updated, run the command "./vendor/bin/phpunit" to run the unit tests
