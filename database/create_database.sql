CREATE DATABASE IF NOT EXISTS evernote_lite CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE evernote_lite;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,       -- id користувача
    name VARCHAR(100) NOT NULL,                        -- ім'я
    surname VARCHAR(100) NOT NULL,                     -- прізвище
    icon VARCHAR(255) DEFAULT NULL,                    -- аватарка / іконка
    email VARCHAR(255) NOT NULL UNIQUE,               -- email (унікальний)
    password VARCHAR(255) NOT NULL,                   -- пароль (пізніше хеш)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,    -- дата створення
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- дата оновлення
    is_verified BOOLEAN DEFAULT FALSE,                -- чи підтверджений email
    last_login_at DATETIME DEFAULT NULL               -- останній вхід
);
