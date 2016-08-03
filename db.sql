create table user_role (
	id tinyint unsigned not null auto_increment,
	name varchar (50) not null,
	sys_name varchar(50) not null unique,
	rank tinyint unsigned default 0,
	created_at timestamp default current_timestamp,
	updated_at timestamp,
	primary key (id)
);

create table user_to_user_role (
	user_id int unsigned not null,
	user_role_id tinyint unsigned not null,
	created_at timestamp default current_timestamp,
	primary key (user_id, user_role_id),
	foreign key (user_id) references user(id) on delete cascade on update cascade,
	foreign key (user_role_id) references user_role(id) on delete cascade on update cascade
);

create table user_profile (
	user_id int unsigned not null,
	firstname varchar (100),
	lastname varchar (100),
	updated_at timestamp default current_timestamp,
	primary key (user_id),
	foreign key (user_id) references user(id) on delete cascade on update cascade
);

create table user_member (
	user_id int unsigned not null,
	mobile varchar (20),
    updated_at timestamp default current_timestamp,
	primary key (user_id),
	foreign key (user_id) references user(id) on delete cascade on update cascade
);

create table user_admin (
	user_id int unsigned not null,
	reg_id varchar(20),
    updated_at timestamp default current_timestamp,
	primary key (user_id),
	foreign key (user_id) references user(id) on delete cascade on update cascade
);

create table product_category (
	id tinyint unsigned not null auto_increment,
	name varchar (50) not null,
	sys_name varchar(50) not null unique,
	rank tinyint unsigned default 0,
	created_at timestamp default current_timestamp,
	updated_at timestamp,
	primary key (id)
);

create table product (
	id int unsigned not null auto_increment,
	product_category_id tinyint unsigned not null,
	price decimal (10, 2) default null,
	created_at timestamp default current_timestamp,
	updated_at timestamp,
	primary key (id),
	foreign key (product_category_id) references product_category(id) on delete cascade on update cascade
);