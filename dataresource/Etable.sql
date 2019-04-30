CREATE  TABLE if not exists users
(
userid int NOT NULL AUTO_INCREMENT,
username varchar(255) NOT NULL,
password varchar(255),
email varchar(255),
mobile varchar(20),
address varchar(255),
state varchar(255),
city varchar(255),
zip int(20),
admin boolean DEFAULT FALSE,
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (userid)
);

CREATE TABLE if not exists product
(
  itemid int NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `price` float NOT NULL,
  `release_date` date NOT NULL,
  `href` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `company` varchar(30) NOT NULL,
  `rating` varchar(5) NOT NULL,
  category varchar(30),
  `description` varchar(1000) NOT NULL,
  `screenshots1` varchar(255) NOT NULL,
  `screenshots2` varchar(255) NOT NULL,
  `screenshots3` varchar(255) NOT NULL,
  display boolean DEFAULT TRUE,
  last_update_username varchar(255),
  last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (itemid)
);

CREATE TABLE  if not exists catagory
(

cname varchar(30),
description varchar(255) NOT NULL,
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (cname)
);

CREATE TABLE if not exists orders
(
orderid int NOT NULL AUTO_INCREMENT,
itemid int,
userid int,
n_purchased int,
totalprice float,
orderdate datetime DEFAULT CURRENT_TIMESTAMP,
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (orderid)
);

CREATE TABLE if not exists cart
(
rowid int NOT NULL AUTO_INCREMENT,
userid int NOT NULL,
pid int,
quantity int(255),
totalprice float,
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (rowid)
);

ALTER TABLE users
  MODIFY userid int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
ALTER TABLE orders
  MODIFY orderid int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7000;



ALTER TABLE orders
  ADD FOREIGN KEY (itemid) REFERENCES product(itemid),
  ADD FOREIGN KEY (userid) REFERENCES users(userid);
ALTER TABLE cart
  ADD FOREIGN KEY (pid) REFERENCES product(itemid),
  ADD FOREIGN KEY (userid) REFERENCES users(userid);

alter table product
  ADD FOREIGN KEY (category) REFERENCES catagory(cname);

/*After insert into product update catagory*/



   

