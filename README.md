# courierManagmentSystem

	Software requirements:

•	Any browser like chrome or edge

•	Xampp x64 bit

	How to run this system

1.	Setup the Xampp Control Panel 
Then clone this repository and move it in the ‘htdocs’ folder of Xampp (In c drive)

2.	Open Xampp, run Apache server and MySQl

![](Snapshots/xampp.jpg)

Place this URl in your browsers 
‘http://localhost/phpmyadmin/’
 Or you can just click on the MySQL admin button in Xampp it will open PhPMyAdmin

3.	Import Database 

In PhpMyAdmin, create a new database with name ‘cms’ 
 
 ![](Snapshots/CreateDatabase.jpg)

Then import database
 
![](Snapshots/ImportDatabase.jpg)

Click on ‘import’ and navigate to the htdocs>darcel>database>cms.db

![](Snapshots/databaseImported.jpg)
 
That’s all!
Now you can run this application in your browser

User Panel

Simply put http://localhost/darcel/userpanal/login.php in browser

Admin Panel

http://localhost/darcel/Admin /login.php



		How the system works

User panel:

The user of the courier management system will interact with the application through an easy to use log in by use of the web page the home page. The home page contains the dashboard with a clear view of the history of the parcels and branches. Some functions can only be seen by the admin while others the user only. The only part the user cannot see is the total couriers that includes couriers of other users as well. 
The user can only access the parcel, track the parcel and see the reports/status of delivery. 

In this system, Every users has to register themselves first before they can continue.

![](Snapshots/userPanel/New%20user%20registration.jpg)
 

After registration they get a unique id and passwords using which they can login in system 
 
![](Snapshots/userPanel/Login%20page%20of%20user.jpg)

After login they are introduced to a user panel 

![](Snapshots/userPanel/user%20panel.jpg)
 
Here, they can place their couriers and perform other operations like, delete, update and list 

Placing courier 
  
  ![](Snapshots/userPanel/place%20courier0.jpg)

  ![](Snapshots/userPanel/place%20courier1.jpg)
  
Updating courier 
 
![](Snapshots/userPanel/update%20courier%20modal.jpg)

After placing their courier they get a unique number of their courier, that is consignment number, using which they can also track their couriers 

Tracking courier 
 
 ![](Snapshots/userPanel/Tracking%20courier.jpg)

After placing courier a reciept is also provided 

 ![](Snapshots/userPanel/Courier%20reciept.jpg)

So that is all for User panel now lets proceed to Admin panel

	
Admin panel

Administrator of the backend will interact with the application through an easy interface as shown below. The admin can add parcel, update their status and has access to details of every user and courier present in system.

Admin is also given a id and password 
 
![](Snapshots/Admin%20panel/Admin%20login%20page.jpg)

Admin panel
The Backend pulls records that have entered by the user and stored in the database and it display the records for manipulation by an administrator of the backend.

![](Snapshots/Admin%20panel/Admin%20panel.jpg)

 Updating status 
 ![](Snapshots/Admin%20panel/Updating%20status.jpg)
 
When a user places their courier, its left to be approved by the company weather they can pick it or not from the address.
•	In transmit means that the courier is picked and out or delivery
•	Deliverd marks the delivery of project

