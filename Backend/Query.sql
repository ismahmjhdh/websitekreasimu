-- Active: 1763383163407@@127.0.0.1@3306


GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
CREATE DATABASE kreasiku;

USE kreasiku;


CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE berita (

	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    youtube_link VARCHAR(255),
    image_url VARCHAR(255),
    video_url VARCHAR(255),
    created_by INT NOT NULL,
    status ENUM('draft', 'published') DEFAULT 'published',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES admins(id)
);

CREATE TABLE materi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    file_url VARCHAR(255),
    access_password VARCHAR(255) NOT NULL, 
    related_news_id INT NULL,              
    created_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (related_news_id) REFERENCES berita(id),
    FOREIGN KEY (created_by) REFERENCES admins(id)
);





