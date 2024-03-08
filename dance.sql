CREATE TABLE Instructors (
    instructor_id INT AUTO_INCREMENT PRIMARY KEY,
    instructor_name VARCHAR(100) NOT NULL,
    specialization VARCHAR(100) NOT NULL
);

CREATE TABLE Participants (
    participant_id INT AUTO_INCREMENT PRIMARY KEY,
    workshop_id INT,
    participant_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    FOREIGN KEY (workshop_id) REFERENCES Workshops(workshop_id) ON DELETE CASCADE
);

CREATE TABLE Payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    participant_id INT,
    payment_date DATE NOT NULL,
    amount DECIMAL(8, 2) NOT NULL,
    FOREIGN KEY (participant_id) REFERENCES Participants(participant_id) ON DELETE CASCADE
);

CREATE TABLE Workshops (
    workshop_id INT AUTO_INCREMENT PRIMARY KEY,
    workshop_name VARCHAR(100) NOT NULL,
    instructor VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    location VARCHAR(255) NOT NULL,
    price DECIMAL(8, 2) NOT NULL
);


CREATE TABLE WorkshopTypes (
    type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL
);
