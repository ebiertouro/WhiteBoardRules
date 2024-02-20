-- Create Teachers table
CREATE TABLE Teachers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- Create Students table
CREATE TABLE Students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    birthday DATE NOT NULL,
    year INT
);

-- Create Classes table
CREATE TABLE Classes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    teacher_id INT,
    class_subject VARCHAR(50) NOT NULL,
    FOREIGN KEY (teacher_id) REFERENCES Teachers(id)
);

-- Create Assignments table
CREATE TABLE Assignments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    teacher_id INT,
    class_id INT,
    assignment_name VARCHAR(50) NOT NULL,
    points_possible INT,
    FOREIGN KEY (teacher_id) REFERENCES Teachers(id),
    FOREIGN KEY (class_id) REFERENCES Classes(id)
);

-- Create Student_Classes table
CREATE TABLE Student_Classes (
    student_id INT,
    class_id INT,
    PRIMARY KEY (student_id, class_id),
    FOREIGN KEY (student_id) REFERENCES Students(id),
    FOREIGN KEY (class_id) REFERENCES Classes(id)
);

-- Create Grades table
CREATE TABLE Grades (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    assignment_id INT,
    grade INT,
    FOREIGN KEY (student_id) REFERENCES Students(id),
    FOREIGN KEY (assignment_id) REFERENCES Assignments(id)
);
