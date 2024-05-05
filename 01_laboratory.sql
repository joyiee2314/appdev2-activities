-- Rieza Joy G. Espejo                                                                LABORATORY #1
-- BSIS-3


-- Creating a Database:
CREATE DATABASE Company;


-- Selecting a Database:
USE Company;


-- Creating a Table:

CREATE TABLE Employees (
EmployeeID INT PRIMARY KEY,
FirstName VARCHAR(20),
LastName VARCHAR(20),
Age INT,
Department VARCHAR(100)
);


-- Inserting Data into the Table:
INSERT INTO employees (EmployeeID, FirstName, Lastname, Age, Department)
VALUES 
(1, "Rieza", "Espejo", 20, "BSIS"),
(2, "Steffanie", "Egloso", 21, "BSIS"),
(3, "Jannah", "Delarosa", 21, "BSIS"),
(4, "Armie", "Miranda", 20, "BSIS"),
(5, "Denise", "Chavez", 21, "BSIS");


-- Viewing Data:
SELECT * FROM employees;


-- Updating Data:
UPDATE employees
SET Department = "Marketing"
WHERE EmployeeID = 2;


-- Deleting Data:
DELETE FROM employees
WHERE EmployeeID = 3;


-- Dropping the Table:
DROP TABLE Employees;