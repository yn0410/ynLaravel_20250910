CREATE TABLE `laravel_20250917`.`students` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO
    `students` (`id`, `name`)
VALUES
    (NULL, 'amy'),
    (NULL, 'bob')

INSERT INTO
    `students` (`id`, `name`)
VALUES
    (NULL, 'cat'),
    (NULL, 'dog'),
    (NULL, 'egg')

UPDATE
    `students`
SET
    `name` = 'bob-change'
WHERE
    `students`.`id` = 2


SELECT
    ProductID,
    ProductName,
    CategoryName
FROM
    Products
    INNER JOIN Categories ON Products.CategoryID = Categories.CategoryID;

SELECT
    student.id,
    student.name,
    phones.phone
FROM
    students
    LEFT JOIN phones ON students.id = phones.student_id;



INSERT INTO
    `hobbies` (
        `id`,
        `student_id`,
        `hobby`,
        `created_at`,
        `updated_at`
    )
VALUES
    (NULL, '1', 'PHP', NULL, NULL),
    (NULL, '1', 'JS', NULL, NULL),
    (NULL, '2', 'PHP', NULL, NULL),
    (NULL, '3', 'HTML', NULL, NULL),
    (NULL, '3', 'CSS', NULL, NULL),
    (NULL, '3', 'LARAVEL', NULL, NULL)


SELECT
    students.id,
    students.name,
    hobbies.hobby
FROM
    students
    LEFT JOIN hobbies ON students.id = hobbies.student_id;
