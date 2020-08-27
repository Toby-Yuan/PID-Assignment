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

INSERT INTO oldProduct (productId, productName, price, changeTime) VALUES
(1, '田園風采', 200, '2020-01-01'), (2, '女巫們的宴會', 180, '2020-01-01'), (3, '少女的酸甜', 230, '2020-01-01'), (4, '梵谷的星空', 150, '2020-01-01'),
(5, '莓好世界', 180, '2020-01-01'), (6, '小紅帽的竹籃', 200, '2020-01-01'), (7, '土星觀測', 250, '2020-01-01'), (8, '大吃莓一口', 120, '2020-01-01'),
(10, '巧克力的誘惑', 160, '2020-01-01'), (17, '義大利的憤怒', 220, '2020-01-01');
