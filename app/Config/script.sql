CREATE TABLE `Roles` (
    id int PRIMARY KEY AUTO_INCREMENT,
    title ENUM('Admin', 'Recruiter', 'Candidate')
    
);



CREATE TABLE `Users` (
    id int PRIMARY KEY AUTO_INCREMENT,
    email varchar(100) unique,
    `password` varchar(200),
    created_at Date not null DEFAULT (CURRENT_DATE),
    deleted_at Date default NULL,
    role_id int,
    FOREIGN KEY  (role_id) REFERENCES Roles(id)
);;


CREATE TABLE `Candidates` (
    id int PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(100),
    diplome varchar(100) unique,
    user_id int,
    FOREIGN KEY (user_id) REFERENCES `Users`(id)
);

CREATE TABLE `Recruiters` (
    id int PRIMARY KEY AUTO_INCREMENT,
    `company_name` varchar(100),
    user_id int,
    FOREIGN KEY (user_id) REFERENCES `Users`(id)
);

CREATE TABLE `Categories` (
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(100),
    created_at Date not null DEFAULT (CURRENT_DATE),
    deleted_at Date default NULL
);


CREATE TABLE `Offers` (
    id int PRIMARY KEY AUTO_INCREMENT,
    `position` varchar(100),
    `description` varchar(100),
    `salary` varchar(100),  
    is_archived tinyint,
    created_at Date not null DEFAULT (CURRENT_DATE),
    deleted_at Date default NULL,
    category_id int,
    recruiter_id int,
    FOREIGN KEY (category_id) REFERENCES `Categories`(id),
    FOREIGN KEY (recruiter_id) REFERENCES `Recruiters`(id)
);

CREATE TABLE `Tags` (
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(100),
    created_at Date not null DEFAULT (CURRENT_DATE),
    deleted_at Date default NULL
);

CREATE TABLE `Applies` (
    id int PRIMARY KEY AUTO_INCREMENT,
    offer_id int,
    candidate_id int,
    applying_date Date default (CURRENT_DATE),
    approval_status ENUM('ACCEPTED', 'REJECTED','PENDING') default 'PENDING',
    FOREIGN KEY (offer_id) REFERENCES `Offers`(id),
    FOREIGN KEY (candidate_id) REFERENCES `Candidates`(id)
);

CREATE TABLE `Offer_Tag` (
    tag_id int,
    offer_id int,
    FOREIGN KEY (tag_id) REFERENCES `Tags`(id),
    FOREIGN KEY (offer_id) REFERENCES `Offers`(id)
);


-- Roles
INSERT INTO `Roles` (title) VALUES ('Admin'), ('Recruiter'), ('Candidate');

-- Users
INSERT INTO `Users` (email, `password`, role_id) VALUES
('admin@example.com', '$2y$10$z5hvjVbnx11kyif3UNNtSe73DpyAvCpj5s6oNLJ8GAvPvygqa0AWa', 1),
('recruiter@example.com', '$2y$10$z5hvjVbnx11kyif3UNNtSe73DpyAvCpj5s6oNLJ8GAvPvygqa0AWa', 2),
('candidate@example.com', '$2y$10$z5hvjVbnx11kyif3UNNtSe73DpyAvCpj5s6oNLJ8GAvPvygqa0AWa', 3);

-- Candidates
INSERT INTO `Candidates` (`name`, diplome, user_id) VALUES
('John Doe', 'Bachelor of Science', 3);

-- Recruiters
INSERT INTO `Recruiters` (`company_name`, user_id) VALUES
('TechCorp', 2);

-- Categories
INSERT INTO `Categories` (title) VALUES
('Engineering'),
('Marketing'),
('Sales');

-- Offers
INSERT INTO `Offers` (`position`, `description`, `salary`, is_archived, category_id, recruiter_id) VALUES
('Software Engineer', 'Develop and maintain software.', '70000', 0, 1, 1),
('Marketing Specialist', 'Plan marketing campaigns.', '50000', 0, 2, 1);

-- Tags
INSERT INTO `Tags` (title) VALUES
('Full-Time'),
('Remote'),
('Internship');

-- Offer_Tag
INSERT INTO `Offer_Tag` (tag_id, offer_id) VALUES
(1, 1),
(2, 1),
(3, 2);

-- Applies
INSERT INTO `Applies` (offer_id, candidate_id, approval_status) VALUES
(1, 1, 'PENDING');
