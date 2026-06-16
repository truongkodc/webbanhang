-- Xóa database cũ nếu đã tồn tại
DROP DATABASE IF EXISTS my_store;

-- Tạo mới database và sử dụng nó
CREATE DATABASE my_store;
USE my_store;

-- Tạo bảng account
CREATE TABLE account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    fullname VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user'
);

-- Tạo bảng danh mục sản phẩm
CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

-- Tạo bảng sản phẩm
CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE
);

-- Tạo bảng đơn hàng
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tạo bảng chi tiết đơn hàng
CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
);

-- Chèn dữ liệu mẫu vào bảng category
INSERT INTO category (name, description) VALUES
    ('Điện thoại', 'Danh mục các loại điện thoại'),
    ('Laptop', 'Danh mục các loại laptop'),
    ('Máy tính bảng', 'Danh mục các loại máy tính bảng'),
    ('Phụ kiện', 'Danh mục phụ kiện điện tử'),
    ('Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro');

-- Tạo index để tối ưu truy vấn
CREATE INDEX idx_product_category ON product(category_id);
CREATE INDEX idx_order_details_order ON order_details(order_id);
CREATE INDEX idx_order_details_product ON order_details(product_id);

INSERT INTO product (name, description, price, image, category_id) VALUES
('iPhone 15 Pro Max', 'Điện thoại Apple chip A17 Pro, camera 48MP, màn hình 6.7 inch Super Retina XDR', 29990000.00, 'uploads/iphone15promax.jpg', 1),
('Samsung Galaxy S24 Ultra', 'Điện thoại Samsung bút S Pen, camera 200MP, RAM 12GB, bộ nhớ 256GB', 26990000.00, 'uploads/s24ultra.jpg', 1),
('MacBook Air M3', 'Laptop Apple chip M3, RAM 8GB, SSD 256GB, màn hình 13.6 inch Liquid Retina', 27990000.00, 'uploads/macbook_air_m3.jpg', 2),
('iPad Pro 12.9 inch', 'Máy tính bảng Apple chip M2, màn hình Liquid Retina XDR, hỗ trợ Apple Pencil 2', 23990000.00, 'uploads/ipad_pro.jpg', 3),
('Sony WH-1000XM5', 'Tai nghe chống ồn chủ động hàng đầu, pin 30 giờ, kết nối Bluetooth 5.2', 7490000.00, 'uploads/sony_wh1000xm5.jpg', 5);