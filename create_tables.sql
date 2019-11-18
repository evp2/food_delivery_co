CREATE TABLE customers ( 
customerid INT(8) NOT NULL AUTO_INCREMENT , 
address VARCHAR(255) NOT NULL , 
firstName VARCHAR(255) NOT NULL , 
lastName VARCHAR(255) NOT NULL , 
phoneNumber VARCHAR(255) NOT NULL , 
email VARCHAR(255) NOT NULL , 
password VARCHAR(255) NOT NULL , 
PRIMARY KEY (customerid)
); 
CREATE TABLE drivers ( 
driverid INT(8) NOT NULL AUTO_INCREMENT , 
firstName VARCHAR(255) NOT NULL , 
lastName VARCHAR(255) NOT NULL , 
phoneNumber VARCHAR(20) NOT NULL , 
email VARCHAR(255) NOT NULL , 
password VARCHAR(255) NOT NULL , 
driversLicenseInfo VARCHAR(255) NOT NULL , 
PRIMARY KEY (driverid)
); 
CREATE TABLE orders (
orderid INT(8) NOT NULL AUTO_INCREMENT , 
orderDate DATE NOT NULL , 
orderTime TIME NOT NULL , 
orderStatus VARCHAR(255) NOT NULL , 
orderLineItem VARCHAR(255) NOT NULL , 
orderLineQuantity INT(8) NOT NULL , 
orderTotal INT(10) NOT NULL ,
customerid  INT(8),
driverid  INT(8),
PRIMARY KEY (orderid), 
FOREIGN KEY (customerid) 
	REFERENCES customers(customerid),
FOREIGN KEY (driverid)
	REFERENCES drivers(driverid)
);

CREATE TABLE restaurants (
restaurantID INT(8) NOT NULL AUTO_INCREMENT,
restaurantName VARCHAR(255) NOT NULL,
rating INT(1) NULL,
address VARCHAR(255) NOT NULL,
service VARCHAR(255) NOT NULL,
foodType VARCHAR (255) NOT NULL,
PRIMARY KEY (restaurantID)
   );
CREATE TABLE menus (
menuID INT(8) NOT NULL,
menuLineItem VARCHAR(255) NOT NULL,
description VARCHAR (255) NOT NULL,
price FLOAT NOT NULL,
restaurantID INT(8),
PRIMARY KEY (menuID),
FOREIGN KEY (restaurantID) REFERENCES restaurants(restaurantID)
);
