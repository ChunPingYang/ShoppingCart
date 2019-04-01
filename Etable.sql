CREATE TABLE users
(
userid int NOT NULL AUTO_INCREMENT,
username varchar(255) NOT NULL,
password varchar(255),
email varchar(255),
mobile int(20),
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (userid)
);

CREATE TABLE product
(
itemid int NOT NULL AUTO_INCREMENT,
cid int,
pname varchar(255),
price double,
n_sold int,
n_instock int,
image varchar(255),
description varchar(255),
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (itemid)
);

CREATE TABLE catagory
(
cid int NOT NULL AUTO_INCREMENT,
cname varchar(255),
description varchar(255),
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (cid)
);

CREATE TABLE orders
(
orderid int NOT NULL AUTO_INCREMENT,
itemid int,
userid int,
n_purchased int,
totalprice double,
orderdate datetime DEFAULT CURRENT_TIMESTAMP,
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (orderid)
);

CREATE TABLE cart
(
userid int NOT NULL,
pid int,
quantity int(255),
totalprice double,
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (userid)
);

ALTER TABLE users
  MODIFY userid int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
ALTER TABLE catagory
  MODIFY cid int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
ALTER TABLE orders
  MODIFY orderid int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7000;


ALTER TABLE product
  ADD FOREIGN KEY (cid) REFERENCES catagory(cid);
ALTER TABLE orders
  ADD FOREIGN KEY (itemid) REFERENCES product(itemid),
  ADD FOREIGN KEY (userid) REFERENCES users(userid);
ALTER TABLE cart
  ADD FOREIGN KEY (pid) REFERENCES product(itemid),
  ADD FOREIGN KEY (userid) REFERENCES users(userid);