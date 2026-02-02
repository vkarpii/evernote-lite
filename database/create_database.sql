CREATE DATABASE IF NOT EXISTS evernote_lite CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE evernote_lite;

-- ===============================
-- Table Users
-- ===============================
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,       
    name VARCHAR(100) NOT NULL,                        
    surname VARCHAR(100) NOT NULL,                    
    icon VARCHAR(255) DEFAULT NULL,                   
    email VARCHAR(255) NOT NULL UNIQUE,               
    password VARCHAR(255) NOT NULL,                   
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,   
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    is_verified BOOLEAN DEFAULT FALSE,                
    last_login_at DATETIME DEFAULT NULL             
);


-- ===============================
-- Table Notes
-- ===============================
CREATE TABLE IF NOT EXISTS notes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    is_archived BOOLEAN DEFAULT FALSE,
    is_deleted BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ===============================
-- Table Folders
-- ===============================
CREATE TABLE IF NOT EXISTS folders (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ===============================
-- Table Tags
-- ===============================
CREATE TABLE IF NOT EXISTS tags (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

-- ===============================
-- Relation Notes ↔ Tags (mant-to-many)
-- ===============================
CREATE TABLE IF NOT EXISTS note_tags (
    note_id INT UNSIGNED NOT NULL,
    tag_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (note_id, tag_id),
    FOREIGN KEY (note_id) REFERENCES notes(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

-- ===============================
-- Relation Notes ↔ Folders (mant-to-many)
-- ===============================
CREATE TABLE IF NOT EXISTS note_folders (
    note_id INT UNSIGNED NOT NULL,
    folder_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (note_id, folder_id),
    FOREIGN KEY (note_id) REFERENCES notes(id) ON DELETE CASCADE,
    FOREIGN KEY (folder_id) REFERENCES folders(id) ON DELETE CASCADE
);