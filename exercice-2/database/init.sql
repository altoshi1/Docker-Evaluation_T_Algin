-- init.sql
CREATE DATABASE IF NOT EXISTS docker_doc;
CREATE DATABASE IF NOT EXISTS docker_doc_dev;

USE docker_doc;
CREATE TABLE IF NOT EXISTS article (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(32),
    body TEXT
);

USE docker_doc_dev;
CREATE TABLE IF NOT EXISTS article (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(32),
    body TEXT
);

INSERT INTO article (title, body) VALUES
('Docker overview', 'Docker is an open platform for developing, shipping, and running applications. Docker enables you to separate your applications from your infrastructure so you can deliver software quickly'),
('What is a container?', 'Imagine you’re developing a killer web app with multiple components...');
