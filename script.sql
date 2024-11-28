CREATE DATABASE user_app;

USE user_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(150) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES
('hearty', 'alapherwori8g5@gmail.com', '$2y$10$wddy8c2S3xHGXcs5jgucSuZwfiD/Zr2bOZQ1jYWRN4zBh0D/LUShW'), -- password: password123
('Alice Johnson', 'alice@example.com', '$2y$10$eImiTXuWVxfM37uY4JANjQp.JwV0MGa/aqQz/Jp4QWbvD2g62.Bx2'), -- password: password123
('Bob Smith', 'bob@example.com', '$2y$10$TKh8H1.PfQx.C8d.9vPE.uK2cDsPQUFUpG2pzz3hHtUczGPK8k62m'),    -- password: securepass
('Charlie Brown', 'charlie@example.com', '$2y$10$QbbcxkBbhnM0qaeqFpo0pO3MtqEyquoxdjxgi7aZ2aKghkHy9XOim'), -- password: mypassword
('Diana Prince', 'diana@example.com', '$2y$10$F6JeIzC97cJyd.FTYR4mI./rW1Jg06yycq3LFmdOIEFRaUCDOq55u'), -- password: superman123
('Eve Torres', 'eve@example.com', '$2y$10$Kg5Ixx5PSukxmByS/Xd5N.gXztgy.wMXBvcP9nI5owd/ty/z9pi7K');    -- password: 12345678
