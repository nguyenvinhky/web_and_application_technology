create database glasses_shop;

use glasses_shop;

create table category(
	idcategory int(11) primary key auto_increment,
    title varchar(45),
    slug varchar(45),
    description varchar(45),
    active bool
);

create table user(
	iduser int(11) primary key auto_increment,
    username varchar(45),
    password varchar(45),
    email varchar(45),
    phone_number varchar(45),
    address varchar(45)
);

create table product(
	productcol int(11) primary key auto_increment,
    title varchar(200),
    description varchar(45),
    idcategory int(11),
    price int,
    active bool,
    
    foreign key (idcategory) references category(idcategory)
);

create table variation(
	idvariation int(11) primary key auto_increment,
    idproduct int(11),
    title varchar(45),
    price int,
    sale_price int,
    active bool,
    inventory int,
    
    foreign key (idproduct) references product(productcol)
);

create table cart(
	idcart int(11) primary key auto_increment,
    user int(11),
    created_at datetime,
    update_at datetime
);

create table cartitem(
	idcartitem int(11) primary key auto_increment,
    idcart int,
    idvariation int(11),
    quantity int,
    
    foreign key (idcart) references cart(idcart),
    foreign key (idvariation) references variation(idvariation)
);

create table orders(
	idorder int(11) primary key auto_increment,
    iduser int(11),
    idcart int(11),
    shipping_address varchar(50),
    order_description varchar(50),
    order_total int,
    is_completed bool,
    
    foreign key (iduser) references user(iduser),
    foreign key (idcart) references cart(idcart)
);