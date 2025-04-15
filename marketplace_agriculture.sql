
use marketplace_agriculture

-- Table For storing userdata
CREATE TABLE userdata (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL UNIQUE, 
    password VARCHAR(255) NOT NULL,  
    userType ENUM('farmer', 'buyer') NOT NULL, 
    gender ENUM('Male', 'Female', 'Other') NOT NULL,  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (id)
);


-- Table for storing contact messages
CREATE TABLE contact_messages (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- Table forProduct details
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    farmer_id INT NOT NULL, 
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    description TEXT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    FOREIGN KEY (farmer_id) REFERENCES farmers(farmer_id)
);

-- Table for storing farmer details
CREATE TABLE farmers (
    farmer_id INT AUTO_INCREMENT PRIMARY KEY,
    farmer_name VARCHAR(255) NOT NULL
);

-- Table for Crop health analysis
CREATE TABLE crop_health (
    id INT AUTO_INCREMENT PRIMARY KEY,
    farmer_name VARCHAR(100),
    crop_name VARCHAR(100),
    image_path VARCHAR(255),
    analysis_result VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--admin page data table
CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--Query to create admin account
INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES (NULL, 'admin', '1234'), (NULL, 'Priya', 'abc22');

-- Create crops table
CREATE TABLE crops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2),
    image_url VARCHAR(255)
);

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    role VARCHAR(50)
);
