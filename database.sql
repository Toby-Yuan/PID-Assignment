CREATE database pid DEFAULT character set utf8;

USE pid;

CREATE TABLE member(
    id int not null auto_increment primary key,
    userName varchar(20) not null,
    userPassword varchar(20) not null,
    truthName varchar(10) not null,
    email varchar(40) not null,
    phone varchar(10) not null,
    userAddress varchar(30) not null,
    black int
);

CREATE TABLE webMaster(
    id int not null auto_increment primary key,
    userName varchar(20) not null,
    userPassword varchar(20) not null,
    grade int not null
);

CREATE TABLE order(
    id int not null auto_increment primary key,
    memberId int not null,
    orderDate datetime not null
);

CREATE TABLE orderDetail(
    id int not null auto_increment primary key,
    orderId int not null,
    productId int not null,
    demand int not null
);

CREATE TABLE product(
    id int not null auto_increment primary key,
    productName varchar(10) not null,
    price int not null
);
