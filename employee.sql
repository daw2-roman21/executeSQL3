CREATE TABLE employee(
	id SERIAL PRIMARY KEY NOT NULL,
	user_id INT,
	emp_name VARCHAR(128),
	designation_id INT,
	department_id INT,
	staff_type INT
);