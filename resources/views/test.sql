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