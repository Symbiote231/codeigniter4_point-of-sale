-- Create database if it doesn't already exist
CREATE DATABASE IF NOT EXISTS point_of_sale;
USE point_of_sale;

-- Create the users table with utf8mb4 charset
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- Hashed password
    name VARCHAR(100) NOT NULL, -- Full name of the user
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Optional index creation
-- Create the stored procedure
DELIMITER //

CREATE PROCEDURE CreateIndexIfNotExists()
BEGIN
    -- Check if the index exists
    IF NOT EXISTS (
        SELECT 1
        FROM information_schema.statistics
        WHERE table_schema = 'point_of_sale'
          AND table_name = 'users'
          AND index_name = 'idx_user_name'
    ) THEN
        -- If it doesn't exist, create the index
        CREATE INDEX idx_user_name ON users(username);
    END IF;
END //

DELIMITER ;

-- Call the stored procedure to check and create the index
CALL CreateIndexIfNotExists();

-- Drop the stored procedure after execution
DROP PROCEDURE IF EXISTS CreateIndexIfNotExists;

-- Insert admin user into the users table
-- Password can be genrated with: php -r "echo password_hash('123456', PASSWORD_DEFAULT);"
INSERT INTO users (username, password, name, email)
VALUES ('admin', '$2y$10$hashedpasswordhere', 'Admin User', 'admin@example.com');

-- Create the point_of_sale_user and grant necessary privileges
CREATE USER IF NOT EXISTS 'point_of_sale_user'@'localhost' IDENTIFIED BY 'PointOfSale';
GRANT SELECT, INSERT, UPDATE, DELETE ON point_of_sale.* TO 'point_of_sale_user'@'localhost';
FLUSH PRIVILEGES;
