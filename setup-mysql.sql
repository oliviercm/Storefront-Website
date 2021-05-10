-- WARNING: This script is destructive! Running this script will destroy and recreate databases and tables for the storefront app.
CREATE DATABASE IF NOT EXISTS storefront;
USE storefront;
DROP TABLE IF EXISTS products;
CREATE TABLE products(
    product_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_json JSON
);