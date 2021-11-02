DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS car;
DROP TABLE IF EXISTS employees;
DROP TABLE IF EXISTS reasons;

CREATE TABLE users (
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (username)
);

CREATE TABLE employees (
    id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE reasons (
    id INT NOT NULL,
    description VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE car (
    id INT NOT NULL,
    ondate DATETIME,
    offdate DATETIME,
    ackbyid INT,
    disbyid INT,
    reasonid INT,
    PRIMARY KEY (id),
    FOREIGN KEY (reasonid) REFERENCES reasons(id),
    FOREIGN KEY (ackbyid) REFERENCES employees(id),
    FOREIGN KEY (disbyid) REFERENCES employees(id)
);

INSERT INTO users (username, password) VALUES ('admin', 'admin');

INSERT INTO employees (id, name) VALUES (1, 'John Doe');
INSERT INTO employees (id, name) VALUES (2, 'Jane Doe');
INSERT INTO employees (id, name) VALUES (3, 'Jack Doe');
INSERT INTO employees (id, name) VALUES (4, 'Jill Doe');
INSERT INTO employees (id, name) VALUES (5, 'Jenny Doe');
INSERT INTO employees (id, name) VALUES (6, 'Agus');
INSERT INTO employees (id, name) VALUES (7, 'Bagus');
INSERT INTO employees (id, name) VALUES (8, 'Caca');
INSERT INTO employees (id, name) VALUES (9, 'Doni');
INSERT INTO employees (id, name) VALUES (10, 'Dini');
INSERT INTO employees (id, name) VALUES (11, 'Eka');
INSERT INTO employees (id, name) VALUES (12, 'Fika');
INSERT INTO employees (id, name) VALUES (13, 'Gaga');
INSERT INTO employees (id, name) VALUES (14, 'Hani');
INSERT INTO employees (id, name) VALUES (15, 'Ika');
INSERT INTO employees (id, name) VALUES (16, 'Jani');
INSERT INTO employees (id, name) VALUES (17, 'Kiki');

INSERT INTO reasons (id, description) VALUES (1, 'Interlock Hose Reel Front');
INSERT INTO reasons (id, description) VALUES (2, 'Interlock Hose Reel Rear');
INSERT INTO reasons (id, description) VALUES (3, 'Interlock Input Coupler Stow');
INSERT INTO reasons (id, description) VALUES (4, 'Interlock Input Hose Boom Stow');
INSERT INTO reasons (id, description) VALUES (5, 'Interlock Platform Stow');
INSERT INTO reasons (id, description) VALUES (6, 'Interlock Platform Nozzle Left');
INSERT INTO reasons (id, description) VALUES (7, 'Interlock Platform Nozzle Right');
INSERT INTO reasons (id, description) VALUES (8, 'Interlock Boom Stow');
INSERT INTO reasons (id, description) VALUES (9, 'Interlock Bonding Static Reel Front');
INSERT INTO reasons (id, description) VALUES (10, 'Interlock Bonding Static Reel Rear');
INSERT INTO reasons (id, description) VALUES (11, 'Interlock Bottom Loading');
INSERT INTO reasons (id, description) VALUES (12, 'Interlock Handrail');
INSERT INTO reasons (id, description) VALUES (13, 'PTO');
INSERT INTO reasons (id, description) VALUES (14, 'Preventive Maintenance');
INSERT INTO reasons (id, description) VALUES (15, 'Interlock System Fault');
INSERT INTO reasons (id, description) VALUES (16, 'Breakdown');

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (1, '2020-01-01 00:00:00', '2020-01-01 00:00:00', 1, 1, 1);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (2, '2020-03-03 03:43:12', '2020-03-11 10:11:00', 3, 3, 1);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (7, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 4, 5, 1);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (8, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 1);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (9, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 12, 2);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (10, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 11, 2);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (11, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 3, 6, 2);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (12, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 8, 2, 3);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (13, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 4, 5, 3);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (14, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 4);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (15, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 4);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (16, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 4);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (3, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 12, 5);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (4, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 11, 5);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (5, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 3, 6, 5);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (6, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 8, 2, 5);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (17, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 4, 5, 6);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (18, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 7);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (19, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 7);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (20, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 12, 8);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (21, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 11, 8);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (22, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 3, 6, 8);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (23, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 8, 2, 8);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (24, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 4, 5, 8);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (25, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 9);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (26, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 9);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (27, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 9);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (28, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 12, 10);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (29, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 11, 10);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (30, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 3, 6, 11);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (31, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 8, 2, 12);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (32, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 4, 5, 12);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (33, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 12);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (34, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 12);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (35, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 12, 13);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (36, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 11, 13);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (37, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 3, 6, 14);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (38, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 8, 2, 14);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (39, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 4, 5, 14);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (40, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 15);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (41, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 7, 3, 15);

INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (42, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 12, 16);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (43, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 5, 11, 16);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (44, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 3, 6, 16);
INSERT INTO car (id, ondate, offdate, ackbyid, disbyid, reasonid) VALUES (45, '2021-09-23 16:23:00', '2021-09-24 15:44:42', 8, 2, 16);