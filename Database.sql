-- Create 'user' table
CREATE TABLE coursework_user (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,  -- User's unique identifier
    name VARCHAR(255),                       -- User's name
    email VARCHAR(255)                       -- User's email address
);

-- Create 'module' table
CREATE TABLE coursework_module (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,  -- Module's unique identifier
    moduleName VARCHAR(255)                  -- Name of the module
);

-- Create 'post' table
CREATE TABLE coursework_post (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,  -- Post's unique identifier
    posttext TEXT,                           -- Content of the post
    postdate DATE,                           -- Date when the post was made
    post_pic VARCHAR(255),                   -- Path or filename of the post's image
    userid INT(11),                          -- Foreign key to 'user' table
    moduleid INT(11),                        -- Foreign key to 'module' table
    FOREIGN KEY (userid) REFERENCES coursework_user(id) ON DELETE CASCADE,  -- Link to the 'user' table
    FOREIGN KEY (moduleid) REFERENCES coursework_module(id) ON DELETE CASCADE -- Link to the 'module' table
);
