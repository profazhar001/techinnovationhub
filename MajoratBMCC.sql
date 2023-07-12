-- Create the Majors table
CREATE TABLE Majors (
    major_id INT PRIMARY KEY,
    major_name VARCHAR(100)
);

CREATE TABLE Courses (
    course_id INT PRIMARY KEY,
    course_name VARCHAR(100),
    major_id INT,
    credits INT,
    FOREIGN KEY (major_id) REFERENCES Majors(major_id)
);


CREATE TABLE Semester (
    semester_id INT,
    major_id INT,
    course1 INT,
    course2 INT,
    course3 INT,
    course4 INT,
    course5 INT,
    course6 INT,
    total_credits INT,
    PRIMARY KEY (semester_id, major_id),
    FOREIGN KEY (major_id) REFERENCES Majors(major_id),
    FOREIGN KEY (course1) REFERENCES Courses(course_id),
    FOREIGN KEY (course2) REFERENCES Courses(course_id),
    FOREIGN KEY (course3) REFERENCES Courses(course_id),
    FOREIGN KEY (course4) REFERENCES Courses(course_id),
    FOREIGN KEY (course5) REFERENCES Courses(course_id),
    FOREIGN KEY (course6) REFERENCES Courses(course_id)
);

-- Insert data into the Majors table
INSERT INTO Majors (major_id, major_name) VALUES
(1, 'Computer Science'),
(2, 'Computer Information Systems'),
(3, 'Computer Network Technology'),
(4, 'Geographic Information Science');


-- Insert data into the Courses table for the Computer Science major
INSERT INTO Courses (course_id, course_name, major_id, credits) VALUES
(1, 'MAT 206.5 Intermediate Algebra and Precalculus', 1, 4),
(2, 'ENG 101 English Composition', 1, 3),
(3, 'CSC 101 Principles in Information Technology and Computation', 1, 3),
(4, 'XXX xxx Individual and Society', 1, 3),
(5, 'XXX xxx U.S. Experience in Its Diversity', 1, 3),
(6, 'ENG 201 Introduction to Literature', 1, 3),
(7, 'CSC 111 Introduction to Programming', 1, 4),
(8, 'MAT 301 Analytic Geometry and Calculus I', 1, 4),
(9, 'SPE 100 Fundamentals of Public Speaking', 1, 3),
(10, 'PHY 215 University Physics I', 1, 4),
(11, 'MAT 302 Analytic Geometry and Calculus II', 1, 4),
(12, 'CSC 211 Advanced Programming Techniques', 1, 3),
(13, 'CSC231 Discrete Structures and Applications to Computer Science', 1, 4),
(14, 'XXX xxx Program Elective', 1, 3),
(15, 'CSC 215 Fundamentals of Computer Systems', 1, 3),
(16, 'CSC 331 Data Structures', 1, 3),
(17, 'CSC 350 Software Development', 1, 3),
(18, 'XXX xxx World Cultures and Global Issues', 1, 3),
(19, 'XXX xxx Program Elective', 1, 3);

-- Insert data into the Semester table for the Computer Science major
INSERT INTO Semester (semester_id, major_id, course1, course2, course3, course4, course5, course6, total_credits) VALUES
(1, 1, 1, 2, 3, 4, 5, NULL, 16),
(2, 1, 6, 7, 8, 9, NULL, NULL, 14),
(3, 1, 10, 11, 12, 13, 14, NULL, 18),
(4, 1, 15, 16, 17, 18, 19, NULL, 15);


-- Insert data into the Courses table for the Computer Information Systems major
INSERT INTO Courses (course_id, course_name, major_id, credits) VALUES
(20, 'SPE 100 Fundamentals of Public Speaking', 2, 3),
(21, 'ACC 122 Accounting Principles I', 2, 3),
(22, 'ENG 101 English Composition', 2, 3),
(23, 'CSC 101 Principles in Information Technology and Computation', 2, 3),
(24, 'BUS 104 Introduction to Business', 2, 3),
(25, 'ENG 201 Introduction to Literature', 2, 3),
(26, 'AST 110 General Astronomy', 2, 4),
(27, 'MAT 150 Introduction to Statistics', 2, 4),
(28, 'CSC 110 Computer Programming I', 2, 4),
(29, 'CSC 210 Computer Programming II', 2, 3),
(30, 'CIS 395 Database Systems I', 2, 3),
(31, 'CIS 385 Web Programming I', 2, 3),
(32, 'CIS 345 Telecommunication Network I', 2, 3),
(33, 'XXX xxx Program Elective', 2, 3),
(34, 'CIS 440 Unix', 2, 3),
(35, 'CIS 495 Database System II', 2, 3),
(36, 'CIS 485 Web Programming II', 2, 3),
(37, 'XXX xxx Elective', 2, 3),
(38, 'XXX xxx Program Elective', 2, 3);

-- Insert data into the Semester table for the Computer Information Systems major
INSERT INTO Semester (semester_id, major_id, course1, course2, course3, course4, course5, course6, total_credits) VALUES
(1, 2, 24, 20, 21, 22, 23, NULL, 15),
(2, 2, 19, 25, 26, 27, NULL, NULL, 15),
(3, 2, 28, 29, 30, 31, 32, NULL, 15),
(4, 2, 33, 34, 35, 36, 37, 38, 15);

-- Insert data into the Courses table for the Computer Network Technology major
INSERT INTO Courses (course_id, course_name, major_id, credits) VALUES
(39, 'ENG 101 English Composition', 3, 3),
(40, 'BUS 104 Introduction to Business', 3, 3),
(41, 'ACC 122 Accounting Principles I', 3, 3),
(42, 'CSC 101 Principles in Information Technology and Computation', 3, 3),
(43, 'MAT 150 Introduction to Statistics', 3, 4),
(44, 'ENG 201 Introduction to Literature', 3, 3),
(45, 'XXX xxx Program Elective', 3, 3),
(46, 'SPE 100 Fundamentals of Public Speaking', 3, 3),
(47, 'CSC 110 Computer Programming I', 3, 4),
(48, 'CIS 165 Introduction to Operating Systems', 3, 3),
(49, 'AST 110 General Astronomy', 3, 4),
(50, 'XXX xxx Elective', 3, 3),
(51, 'CIS 345 Telecommunication Network I', 3, 3),
(52, 'CIS 255 Computer Software', 3, 3),
(53, 'CIS 445 Telecommunication Network II', 3, 3),
(54, 'XXX xxx Elective', 3, 3),
(55, 'CIS 440 Unix', 3, 3),
(56, 'CIS 455 Network Security', 3, 3),
(57, 'XXX xxx Elective', 3, 3);

-- Insert data into the Semester table for the Computer Network Technology major
INSERT INTO Semester (semester_id, major_id, course1, course2, course3, course4, course5, course6, total_credits) VALUES
(1, 3, 39, 40, 41, 42, 43, NULL, 16),
(2, 3, 44, 45, 46, 47, 48, NULL, 16),
(3, 3, 49, 50, 51, 52, 54, NULL, 16),
(4, 3, 53, 55, 56, 57, NULL, NULL, 12);

-- Insert data into the Courses table for the Geographic Information Science major
INSERT INTO Courses (course_id, course_name, major_id, credits) VALUES
(58, 'ENG 101 English Composition', 4, 3),
(59, 'GEO 100 Introduction to Human Geography', 4, 3),
(60, 'GLY 210 Geology I', 4, 4),
(61, 'MAT 206.5 Intermediate Algebra and Precalculus', 4, 4),
(62, 'CSC 101 Principles in Information Technology and Computation', 4, 3),
(63, 'CSC 110 Computer Programming I', 4, 4),
(64, 'MAT 209 Statistics', 4, 4),
(65, 'GIS 201 Introduction to Geographic Methods', 4, 4),
(66, 'ENG 201 Introduction to Literature', 4, 3),
(67, 'CIS 395 Database Systems I', 4, 3),
(68, 'SPE 100 Fundamentals of Public Speaking', 4, 3),
(69, 'AFL 161 Health Problems in the Urban Community', 4, 3),
(70, 'GIS 261 Introduction to Geographic Information Science', 4, 3),
(71, 'GEO 226 Environmental Conservation-Resource Management', 4, 3),
(72, 'GIS 361 Advanced Geographic Information Science', 4, 3),
(73, 'XXX xxx Creative Expression', 4, 3),
(74, 'XXX xxx U.S. Experience in Its Diversity', 4, 3),
(75, 'XXX xxx Individual and Society', 4, 3),
(76, 'GEO 241 Population Geography', 4, 3);

-- Insert data into the Semester table for the Geographic Information Science major
INSERT INTO Semester (semester_id, major_id, course1, course2, course3, course4, course5, course6, total_credits) VALUES
(1, 4, 58, 59, 60, 61, 62, NULL, 17),
(2, 4, 63, 64, 65, 66, NULL, NULL, 15),
(3, 4, 67, 68, 69, 70, 71, NULL, 15),
(4, 4, 72, 73, 74, 75, 76, NULL, 15);

