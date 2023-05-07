<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();

function get_teachers($link) {
    $sql = "SELECT teacher.id_teacher, person.last_name, person.first_name, person.patronymic, teacher.discipline, teacher.experience 
            FROM `teacher` 
            INNER JOIN `person` 
            ON teacher.id_person=person.id_person;";
    $result = mysqli_query($link, $sql);
    if(!$result) {
        die("Произошла ошибка при выполнении запроса"); 
    }
    $teachers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $teachers;
}

function get_ratings($link, $year) {
    $sql = "SELECT teacher.id_teacher, person.last_name, person.first_name, person.patronymic, teacher.discipline, department.name, teacher.experience, 
    AVG(CASE WHEN YEAR(rating.completion_date) = $year THEN rating.part_a ELSE 0 END) AS a_year,
    AVG(CASE WHEN YEAR(rating.completion_date) = $year THEN rating.part_b ELSE 0 END) AS b_year, 
    AVG(CASE WHEN YEAR(rating.completion_date) = $year THEN rating.part_c ELSE 0 END) AS c_year, 
    AVG(rating.part_a) AS a_full,
    AVG(rating.part_b) AS b_full,
    AVG(rating.part_c) AS c_full 
    FROM `rating`, `questionnaire`, `teacher`, `person`, `department` 
    WHERE rating.id_questionnaire = questionnaire.id_questionnaire 
    AND questionnaire.id_teacher = teacher.id_teacher 
    AND teacher.id_person = person.id_person 
    AND person.department = department.id_department
    GROUP BY 1, 2, 3, 4, 5;";
    $result = mysqli_query($link, $sql);
    if(!$result) {
        die("Произошла ошибка при выполнении запроса"); 
    }
    $ratings = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $ratings;
}

function get_years($link) {
    $sql = "SELECT DISTINCT YEAR(rating.completion_date) AS 'year' FROM `rating` ORDER BY 1;";
    $result = mysqli_query($link, $sql);
    if(!$result) {
        die("Произошла ошибка при выполнении запроса"); 
    }
    $years = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $years;
}

function get_departments($link) {
    $sql = "SELECT name, id_department FROM `department`;";
    $result = mysqli_query($link, $sql);
    if(!$result) {
        die("Произошла ошибка при выполнении запроса"); 
    }
    $departments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $departments;
}

function get_person($link) {
    $sql = "SELECT person.last_name, person.first_name, person.patronymic, department.name, admin.office, admin.email, admin.phone, admin.hide
            FROM `admin`
            INNER JOIN `person`
            ON admin.id_person=person.id_person
            INNER JOIN `department`
            ON person.department=department.id_department
            WHERE admin.id_admin='".$_SESSION['id_admin']['id']."';";
    $result = mysqli_query($link, $sql);
    if(!$result) {
        die("Произошла ошибка при выполнении запроса"); 
    }
    $person = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $person;
}

function get_admins($link) {
    $sql = "SELECT person.last_name, person.first_name, person.patronymic, department.name, admin.office, admin.id_admin, admin.photo,
            CASE WHEN admin.hide=1 THEN '---' ELSE admin.email END AS email,
            CASE WHEN admin.hide=2 THEN '---' ELSE admin.phone END AS phone
            FROM `admin`
            INNER JOIN `person`
            ON admin.id_person=person.id_person
            INNER JOIN `department`
            ON person.department=department.id_department
            WHERE admin.role=2;";
    $result = mysqli_query($link, $sql);
    if(!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
    $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $admins;
}

function get_moderators($link) {
    $sql = "SELECT person.last_name, person.first_name, person.patronymic, admin.office, admin.id_admin,
            CASE WHEN admin.hide=1 THEN '---' ELSE admin.email END AS email,
            CASE WHEN admin.hide=2 THEN '---' ELSE admin.phone END AS phone
            FROM `admin`
            INNER JOIN `person`
            ON admin.id_person=person.id_person
            WHERE admin.role=0;";
    $result = mysqli_query($link, $sql);
    if(!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
    $moderators = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $moderators;
}

function get_codes($link) {
    $sql = "SELECT questionnaire.id_questionnaire, questionnaire.code, questionnaire.usages, questionnaire.creation_date, person.last_name, person.first_name, person.patronymic, teacher.discipline
            FROM `questionnaire`
            INNER JOIN `teacher` ON questionnaire.id_teacher=teacher.id_teacher
            INNER JOIN `person` ON teacher.id_person=person.id_person
            WHERE questionnaire.usages>0;";
    $result = mysqli_query($link, $sql);
    if(!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
    $codes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $codes;
}