CREATE TABLE users
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

CREATE TABLE product
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

CREATE TABLE catagory
(
cid int NOT NULL AUTO_INCREMENT,
cname varchar(30),
description varchar(255) NOT NULL,
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
totalprice float,
orderdate datetime DEFAULT CURRENT_TIMESTAMP,
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (orderid)
);

CREATE TABLE cart
(
rowid int NOT NULL AUTO_INCREMENT,
userid int NOT NULL,
pid int,
quantity int(255),
totalprice float,
last_update_username varchar(255),
last_update_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (cartid)
);

ALTER TABLE users
  MODIFY userid int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
ALTER TABLE catagory
  MODIFY cid int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
ALTER TABLE orders
  MODIFY orderid int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7000;



ALTER TABLE orders
  ADD FOREIGN KEY (itemid) REFERENCES product(itemid),
  ADD FOREIGN KEY (userid) REFERENCES users(userid);
ALTER TABLE cart
  ADD FOREIGN KEY (pid) REFERENCES product(itemid),
  ADD FOREIGN KEY (userid) REFERENCES users(userid);

/*ALTER TABLE product
  ADD FOREIGN KEY (category) REFERENCES catagory(cname);*/

/*After insert into product update catagory*/
INSERT INTO catagory(cname)
SELECT DISTINCT category
FROM   product;


/*trigger wrong
CREATE TRIGGER `Addcate` AFTER INSERT ON `product`
 FOR EACH ROW BEGIN
       INSERT INTO catagory (cname) VALUES (NEW.category);
   END
   */


/*Insert Data*/
/*Category*/
INSERT INTO catagory (cname, description, last_update_username) 
VALUES ('Action','Browse the newest, top selling and discounted Action products on Steam','admin');
INSERT INTO catagory (cname, description, last_update_username) 
VALUES ('Adventure','Browse the newest, top selling and discounted Adventure products on Steam','admin');
INSERT INTO catagory (cname, description, last_update_username) 
VALUES ('Racing','Browse the newest, top selling and discounted Racing products on Steam','admin');

/*Product*/
/*cid 100*/
INSERT INTO product (cid, pname, price, n_sold, n_instock, image, release_date, description, last_update_username) 
VALUES (100, 'Data 2',0,3,97,'imgs/samsung.jpg','Mar 28, 2019',
'Every day, millions of players worldwide enter battle as one of over a hundred Dota heroes. And no matter if it''s their 10th hour of play or 1,000th, there''s always something new to discover.'
,'admin');
INSERT INTO product (cid, pname, price, n_sold, n_instock, image, release_date, description, last_update_username) 
VALUES (100, 'Grand Theft Auto V',29.99,10,90,'imgs/samsung.jpg','May 06, 2019',
'Los Santos is a city of bright lights, long nights and dirty secrets, and they don’t come brighter, longer or dirtier than in GTA Online'
,'admin');
INSERT INTO product (cid, pname, price, n_sold, n_instock, image, release_date, description, last_update_username) 
VALUES (100, 'Risk of Rain 2',19.99,20,80,'imgs/samsung.jpg','April 10, 2019',
'The classic multiplayer roguelike, Risk of Rain, returns with an extra dimension and more challenging action'
,'admin');

/*cid 101*/
INSERT INTO product (cid, pname, price, n_sold, n_instock, image, release_date, description, last_update_username) 
VALUES (101, 'ARK: Survival Evolved',0,3,97,'imgs/samsung.jpg','February 28, 2019',
'Stranded on the shores of a mysterious island, you must learn to survive. 
Use your cunning to kill or tame the primeval creatures roaming the land, 
and encounter other players to survive, dominate... and escape!'
,'admin');
INSERT INTO product (cid, pname, price, n_sold, n_instock, image, release_date, description, last_update_username) 
VALUES (101, 'MONSTER HUNTER: WORLD',0,3,97,'imgs/samsung.jpg','January 28, 2019',
'Welcome to a new world! In Monster Hunter: World, the latest installment in the series, 
you can enjoy the ultimate hunting experience, using everything at your disposal to hunt monsters in a new world teeming with surprises and excitement'
,'admin');
INSERT INTO product (cid, pname, price, n_sold, n_instock, image, release_date, description, last_update_username) 
VALUES (101, 'Fallout 4',0,3,97,'imgs/samsung.jpg','January 16, 2019',
'Bethesda Game Studios, the award-winning creators of Fallout 3 and The Elder Scrolls V: 
Skyrim, welcome you to the world of Fallout 4 – their most ambitious game ever, 
and the next generation of open-world gaming'
,'admin');

/*cid 102*/
INSERT INTO product (cid, pname, price, n_sold, n_instock, image, release_date, description, last_update_username) 
VALUES (102, 'BeamNG.drive',29.99,3,97,'imgs/samsung.jpg','March 05, 2019',
'A dynamic soft-body physics vehicle simulator capable of doing just about anything.'
,'admin');
INSERT INTO product (cid, pname, price, n_sold, n_instock, image, release_date, description, last_update_username) 
VALUES (102, 'Classic Racers',19.99,3,97,'imgs/samsung.jpg','June 05, 2019',
'Taste the feelings of vintage driving in this game with its wondeful graphics and its realistic physics engine. 
Cross the finish line at the top off the hill as fast as possible'
,'admin');
INSERT INTO product (cid, pname, price, n_sold, n_instock, image, release_date, description, last_update_username) 
VALUES (102, 'Draw Rider 2',10.99,3,97,'imgs/samsung.jpg','October 05, 2019',
'Draw Rider is back! Meet the long awaited continuation of the legendary hardcore racing'
,'admin');



