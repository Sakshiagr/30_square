

USE thirtysquaredb;

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(255) NOT NULL,
    contact_number VARCHAR(15) NOT NULL,
    organization_name VARCHAR(255) NOT NULL,
    event_type ENUM('Cultural Fest', 'College Program', 'Religious Ceremony') NOT NULL,
    stalls_required INT NOT NULL,
    event_time DATETIME NOT NULL
);

CREATE TABLE vendors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(255) NOT NULL,
    food_or_item VARCHAR(255) NOT NULL,
    vendor_name VARCHAR(255) NOT NULL,
    contact_number VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL,
    brand_name VARCHAR(255) NOT NULL
);
