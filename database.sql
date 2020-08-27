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

CREATE TABLE memberOrder(
    id int not null auto_increment primary key,
    memberId int not null,
    orderDate varchar(10) not null
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

-- 新增產品資料
INSERT INTO product (productName, price) VALUES
('田園風采', 220), ('女巫們的宴會', 180), ('少女的酸甜', 250), ('梵谷的星空', 150),
('莓好世界', 200), ('小紅帽的竹籃', 180), ('觀察土星', 250), ('大吃莓一口', 120);

-- 歷史資料
CREATE TABLE oldProduct(
    id int not null auto_increment primary key,
    productId int not null,
    productName varchar(10) not null,
    price int not null,
    changeTime varchar(20) not null
);
