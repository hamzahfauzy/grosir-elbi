INSERT INTO roles (name) VALUES ('suplier');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'default/*');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'crud/index?table=pemesanan');
INSERT INTO role_routes (role_id,route_path) VALUES (2,'crud/edit?table=pemesanan');