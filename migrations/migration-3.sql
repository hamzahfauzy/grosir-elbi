ALTER TABLE pelanggan ADD COLUMN user_id INT DEFAULT NULL;

INSERT INTO roles (name) VALUES ('kustomer');
INSERT INTO role_routes (role_id,route_path) VALUES (3,'default/*');
INSERT INTO role_routes (role_id,route_path) VALUES (3,'penjualan/index');
INSERT INTO role_routes (role_id,route_path) VALUES (3,'penjualan/create');