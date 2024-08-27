CREATE TABLE user (  
    id INT AUTO_INCREMENT PRIMARY KEY ,
    email VARCHAR(140) UNIQUE not NULL,
    password VARCHAR (120) NOT NULL,
    role VARCHAR (140) not NULL
);
DROP table if EXISTS user;
    