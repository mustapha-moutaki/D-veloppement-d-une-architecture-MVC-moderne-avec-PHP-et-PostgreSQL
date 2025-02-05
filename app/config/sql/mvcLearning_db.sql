CREATE DATABASE mvcLearning_db;

SELECT current_database();--like <<use>> query in mysql

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
    -- role_id INT NOT NULL,
    -- created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE articles (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


-- First, insert some users to reference in the articles table
INSERT INTO users (id, username, email, password) VALUES
(1, 'John Doe', 'john@example.com',1234),
(2, 'Jane Smith', 'jane@example.com',121);

-- Insert articles with references to existing users
INSERT INTO articles (title, content, user_id) VALUES
('Introduction to MVC', 'This article explains the MVC architecture in web development.', 1),
('Understanding PostgreSQL', 'A guide on how to use PostgreSQL efficiently.', 2),
('Blade Templating in Laravel', 'This article covers the basics of Blade templating engine in Laravel.', 1),
('PHP OOP Concepts', 'Learn the fundamental Object-Oriented Programming concepts in PHP.', 2);
