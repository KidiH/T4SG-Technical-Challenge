# T4SG Technical Challenge
This folder holds Kidist Alemu's work for T4SG technical challenge. 

The files in this folder are 
- user register, 
- login, 
- autheticated homepage, and 
- image upload webpages. 
# Setup

To run the website, 

Step one : 
- Download and install xampp : https://www.apachefriends.org/index.html
- After installing, navigate to the htdoc folder and save this project
- Open the xampp control unit (search xampp in your computer) and start the Apache and mysql

Step two : 
- Navigate to http://localhost/phpmyadmin/index.php
- Create database "projects"
- Inside that database, create two tables defined as
	- users (  
id int,  
username varchar(255),  
email varchar(255),  
password varchar(255));
	- users-info (  
id int,  
user.id int(255),  
profile_img varchar(255),  
bio varchar(255));

Step three :
- Finally, open a browser and navigate to the registration page at http://localhost/project/register.php 

