SET SQL_SAFE_UPDATES = 0;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS tbl_logs;
DROP TABLE IF EXISTS tbl_scores;
DROP TABLE IF EXISTS tbl_judge;
DROP TABLE IF EXISTS tbl_contestants;
DROP TABLE IF EXISTS tbl_criteria;
DROP TABLE IF EXISTS tbl_category;
DROP TABLE IF EXISTS tbl_users;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE tbl_users (
  user_id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(255) NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  role ENUM('admin','organizer','judge') NOT NULL,
  img_path VARCHAR(255) NOT NULL DEFAULT 'imagespvs/user.png',
  otp INT(6) DEFAULT NULL,
  status ENUM('Active','Pending','Inactive') NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (user_id),
  UNIQUE KEY uq_tbl_users_username (username),
  UNIQUE KEY uq_tbl_users_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE tbl_category (
  category_id INT NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(100) NOT NULL,
  PRIMARY KEY (category_id),
  UNIQUE KEY uq_tbl_category_name (category_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE tbl_criteria (
  criteria_id INT NOT NULL AUTO_INCREMENT,
  criteria_name VARCHAR(100) NOT NULL,
  criteria_weight DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (criteria_id),
  UNIQUE KEY uq_tbl_criteria_name (criteria_name),
  CONSTRAINT chk_tbl_criteria_weight CHECK (criteria_weight > 0 AND criteria_weight <= 100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE tbl_contestants (
  contestant_id INT NOT NULL AUTO_INCREMENT,
  category_id INT NOT NULL,
  contestant_name VARCHAR(100) NOT NULL,
  contestant_image VARCHAR(100) NOT NULL DEFAULT 'contestant.png',
  contestant_location VARCHAR(100) NOT NULL,
  PRIMARY KEY (contestant_id),
  KEY idx_tbl_contestants_category_id (category_id),
  CONSTRAINT fk_tbl_contestants_category FOREIGN KEY (category_id)
    REFERENCES tbl_category(category_id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE tbl_judge (
  judge_id INT NOT NULL AUTO_INCREMENT,
  judge_name VARCHAR(100) NOT NULL,
  contact_information VARCHAR(100) NOT NULL,
  user_id INT DEFAULT NULL,
  PRIMARY KEY (judge_id),
  UNIQUE KEY uq_tbl_judge_user_id (user_id),
  KEY idx_tbl_judge_contact (contact_information),
  CONSTRAINT fk_tbl_judge_user FOREIGN KEY (user_id)
    REFERENCES tbl_users(user_id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tbl_scores` (
  score_id INT NOT NULL AUTO_INCREMENT,
  judge_id INT NOT NULL,
  contestant_id INT NOT NULL,
  criteria_id INT NOT NULL,
  score_value DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (score_id),
  UNIQUE KEY uq_tbl_scores_judge_contestant_criteria (judge_id, contestant_id, criteria_id),
  KEY idx_tbl_scores_judge_id (judge_id),
  KEY idx_tbl_scores_contestant_id (contestant_id),
  KEY idx_tbl_scores_criteria_id (criteria_id),
  CONSTRAINT fk_tbl_scores_judge FOREIGN KEY (judge_id)
    REFERENCES tbl_judge(judge_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_tbl_scores_contestant FOREIGN KEY (contestant_id)
    REFERENCES tbl_contestants(contestant_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_tbl_scores_criteria FOREIGN KEY (criteria_id)
    REFERENCES tbl_criteria(criteria_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT chk_tbl_scores_value CHECK (score_value BETWEEN 1 AND 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE tbl_logs (
  log_id INT NOT NULL AUTO_INCREMENT,
  user_id INT DEFAULT NULL,
  fullname VARCHAR(100) NOT NULL,
  email VARCHAR(100) DEFAULT NULL,
  action VARCHAR(255) NOT NULL,
  log_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (log_id),
  KEY idx_tbl_logs_user_id (user_id),
  KEY idx_tbl_logs_log_date (log_date),
  CONSTRAINT fk_tbl_logs_user FOREIGN KEY (user_id)
    REFERENCES tbl_users(user_id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_users (fullname, username, password, email, role, img_path, otp, status) VALUES
('Admin Demo', 'admin', '$2y$10$bmf8z/nWT53gBKCFkrPNOOEb1s4afMTkRPCWh0F76ONdv/WV79AZi', 'admin.demo@crownvote.local', 'admin', 'imagespvs/admin.png', NULL, 'Active'),
('Organizer Demo', 'organizer', '$2y$10$mezLg79BOahoOG5VXbox8.NFhpBK/Av47fuZdBjdOK2sofux1sWN2', 'organizer.demo@crownvote.local', 'organizer', 'imagespvs/user.png', NULL, 'Active'),
('Judge Demo', 'judge', '$2y$10$dorgJwX.UGf5GMXo.EeGyu0wfImgg8SkfptuR9LU1.kb8h.sE0bQy', 'judge.demo@crownvote.local', 'judge', 'imagespvs/judge.png', NULL, 'Active');

INSERT INTO tbl_category (category_id, category_name) VALUES
(1, 'Miss'),
(2, 'Mister'),
(3, 'Forces of Nature');

INSERT INTO tbl_criteria (criteria_id, criteria_name, criteria_weight) VALUES
(1, 'Poise and Stage Presence', 30.00),
(2, 'Thematic Interpretation and Creativity', 40.00),
(3, 'Overall Grooming and Aesthetic Appeal', 15.00),
(4, 'Audience Impact and Charisma', 15.00);

INSERT INTO tbl_contestants (contestant_id, category_id, contestant_name, contestant_image, contestant_location) VALUES
(1, 1, 'Isabella Rossi', 'ms_contestant1.png', 'Angeles City, Pampanga'),
(2, 1, 'Cassandra Montesclaros', 'ms_contestant2.png', 'Cebu City, Cebu'),
(3, 1, 'Sofia Villafuerte', 'ms_contestant3.png', 'Davao City, Davao del Sur'),
(4, 1, 'Adrianna Silva', 'ms_contestant4.png', 'Lipa City, Batangas'),
(5, 1, 'Natalia Montenegro', 'ms_contestant5.png', 'Puerto Princesa City, Palawan'),
(6, 1, 'Genevieve Santillan', 'ms_contestant6.png', 'Baguio City, Benguet'),
(7, 1, 'Victoria Valdez', 'ms_contestant7.png', 'Calamba City, Laguna'),
(8, 1, 'Julianna Gracia', 'ms_contestant8.png', 'Iloilo City, Iloilo'),
(9, 1, 'Alessandra Pineda', 'ms_contestant9.png', 'Malolos City, Bulacan'),
(10, 2, 'Sebastian Thorne', 'mr_contestant1.png', 'Antipolo City, Rizal'),
(11, 2, 'Julian Alcantara', 'mr_contestant2.png', 'Naga City, Camarines Sur'),
(12, 2, 'Dominic Sterling', 'mr_contestant3.png', 'Tagbilaran City, Bohol'),
(13, 2, 'Nathaniel Evangelista', 'mr_contestant4.png', 'San Fernando City, La Union'),
(14, 2, 'Gabriel Moretti', 'mr_contestant5.png', 'Bacolod City, Negros Occidental'),
(15, 2, 'Alexander Villareal', 'mr_contestant6.png', 'General Santos City, South Cotabato'),
(16, 2, 'Christian Vanguardia', 'mr_contestant7.png', 'Tacloban City, Leyte'),
(17, 2, 'Tristan Soler', 'mr_contestant8.png', 'Tagaytay City, Cavite'),
(18, 2, 'Adrian Leon', 'mr_contestant9.png', 'Zamboanga City, Zamboanga del Sur'),
(19, 3, 'Silas Thorne & Elena Veda', 'nature_contestant1.png', 'Vigan City, Ilocos Sur'),
(20, 3, 'Caspian Reed & Marina Solis', 'nature_contestant2.png', 'Dumaguete City, Negros Oriental'),
(21, 3, 'Jasper Stone & Aurora Sierra', 'nature_contestant3.png', 'Lucena City, Quezon'),
(22, 3, 'Kai Rivers & Luna Frost', 'nature_contestant4.png', 'Surigao City, Surigao del Norte'),
(23, 3, 'Orion Clay & Iris Gaia', 'nature_contestant5.png', 'Marilao City, Bulacan'),
(24, 3, 'Maximilian Guerrero & Seraphina Castiglione', 'nature_contestant6.png', 'Tarlac City, Tarlac');

INSERT INTO tbl_judge (judge_name, contact_information, user_id) VALUES
('Judge Demo', 'judge.demo@crownvote.local', 3);

SET SQL_SAFE_UPDATES = 1;
