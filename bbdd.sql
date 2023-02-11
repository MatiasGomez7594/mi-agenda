create database mi_agenda;

CREATE TABLE users(
    Id_user int(11) NOT null AUTO_INCREMENT PRIMARY KEY,
    user_name varchar(60) NOT null,
    user_lastname varchar(100) NOT null,
    user_email varchar(100) NOT null,
    user_password varchar(25) NOT null
);


CREATE TABLE my_contacts(
	id_contact int(11) NOT null AUTO_INCREMENT PRIMARY KEY,
    Id_user int NOT null,
    contact_name varchar(60) NOT null,
    contact_lastname varchar(100)NOT null,
    phone_number varchar(10),
    adress varchar(100),
    email varchar(100),
   FOREIGN KEY (Id_user) REFERENCES users(Id_user)
);