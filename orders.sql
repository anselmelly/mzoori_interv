CREATE TABLE IF NOT EXISTS orders(
id INT(15) AUTO_INCREMENT PRIMARY KEY,
status INT NOT NULL DEFAULT 1,
transaction_id VARCHAR(255) NOT NULL DEFAULT '');

INSERT INTO orders (status,transaction_id) VALUES ('1','3iwex');
INSERT INTO orders (status,transaction_id) VALUES ('1','wps20');
INSERT INTO orders (status,transaction_id) VALUES ('2','ey1ts');
INSERT INTO orders (status,transaction_id) VALUES ('1','2eg7l');
INSERT INTO orders (status,transaction_id) VALUES ('2','p3i22');
INSERT INTO orders (status,transaction_id) VALUES ('1','50avo');
INSERT INTO orders (status,transaction_id) VALUES ('2','31asl');