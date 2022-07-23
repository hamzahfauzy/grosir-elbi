CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE role_routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    route_path VARCHAR(100) NOT NULL,
    CONSTRAINT fk_role_routes_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE user_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    CONSTRAINT fk_user_roles_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_user_roles_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE application (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE migrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(100) NOT NULL,
    execute_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE suplier (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    no_hp VARCHAR(100) NOT NULL
);

CREATE TABLE pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    no_hp VARCHAR(100) NOT NULL
);

CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    suplier_id INT(11) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    kategori VARCHAR(100) NOT NULL,
    satuan VARCHAR(100) NOT NULL,
    biaya_pemesanan INT NOT NULL,
    biaya_penyimpanan INT NOT NULL,
    harga INT NOT NULL,
    jumlah_per_satuan INT NOT NULL
);

CREATE TABLE stok (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produk_id INT NOT NULL,
    jumlah INT NOT NULL
);

CREATE TABLE penjualan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice VARCHAR(100) NOT NULL,
    produk_id INT NOT NULL,
    pelanggan VARCHAR(100) NOT NULL,
    jumlah INT NOT NULL,
    total INT NOT NULL,
    tanggal DATETIME NOT NULL
);

CREATE TABLE pemesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produk_id INT NOT NULL,
    jumlah INT NOT NULL,
    status VARCHAR(100) NOT NULL,
    tanggal DATETIME NOT NULL
);

CREATE TABLE penggunaan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produk_id INT NOT NULL,
    jumlah INT NOT NULL,
    tahun INT NOT NULL
);

CREATE TABLE periode (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tahun INT NOT NULL
);