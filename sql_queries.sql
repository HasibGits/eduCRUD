/*1*/ 
UPDATE Products SET price = price * 1.20 WHERE category = 'Electronics';

/*2*/ 
SELECT MAX(salary) AS second_highest_salary FROM Salaries WHERE salary < (SELECT MAX(salary) FROM Salaries);

/*3*/ 
SELECT e.name FROM Employees e
JOIN (
    SELECT department_id, AVG(salary) AS avg_salary
    FROM Employees
    GROUP BY department_id
) AS dept_avg ON e.department_id = dept_avg.department_id
WHERE e.salary > dept_avg.avg_salary;


/*4*/ 
SELECT c.name AS customer_name, COUNT(o.order_id) AS order_count
FROM Customers c
JOIN Orders o ON c.customer_id = o.customer_id
GROUP BY c.name;
