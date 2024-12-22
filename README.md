# RESTful API with CRUD Operations in PHP

## 📜 Project Description
This project demonstrates the creation of RESTful APIs in PHP to perform CRUD operations on a database with three related tables: **Students**, **Courses**, and **Enrollments**. The project is organized following a structured folder hierarchy and includes appropriate error handling and validation.

---

## 🗂️ Folder Structure
```
project/
│
├── config/
│   └── config.php
│
├── model/
│   ├── student_model.php
│   ├── course_model.php
│   └── enrollment_model.php
│
├── students/
│   ├── create.php
│   └── read.php
│
├── courses/
│   ├── create.php
│   └── update.php
│
├── enrollment/
│   ├── create.php
│   └── delete.php
│
└── README.md
```



---

## 🛠️ Setup Instructions

### 1. Clone the Repository
git clone https://github.com/Ashupaldeora/php_exam
git cd php_exam


### 2. Database Setup
- Import the provided `student_management.sql` file into your MySQL database.
- Ensure your database credentials in `config/Database.php` match your local setup:
-
 ```
 -- Create Students table
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Create Courses table
CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Enrollments table
CREATE TABLE enrollments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);
```



### 4. Testing the APIs
Use Postman or any API testing tool to test the following endpoints:

#### Students
| Endpoint                 | Method | Description                  |
|--------------------------|--------|------------------------------|
| `/students/create.php`   | POST   | Add a new student            |
| `/students/read.php`     | GET    | Retrieve all students        |

#### Courses
| Endpoint                 | Method | Description                       |
|--------------------------|--------|-----------------------------------|
| `/courses/create.php`    | POST   | Add a new course                  |
| `/courses/update.php`    | PUT    | Update a course description       |

#### Enrollments
| Endpoint                 | Method | Description                         |
|--------------------------|--------|-------------------------------------|
| `/enrollment/create.php`| POST   | Enroll a student in a course        |
| `/enrollment/delete.php`| DELETE | Delete an enrollment by its ID      |

---

## 📽️ Project Demo
# files video


https://github.com/user-attachments/assets/8e8c2f73-15d3-4676-b7db-700b8f6fcea5



# PostMan video


https://github.com/user-attachments/assets/2f18e165-a5bc-4e6c-9547-b426c55666a2


---

## ⚙️ Features
- Fully functional CRUD APIs for three related tables.
- Proper error handling for invalid requests and missing inputs.
- Use of HTTP methods: `GET`, `POST`, `PUT`, `DELETE`.
- JSON responses for easy integration with other systems.


