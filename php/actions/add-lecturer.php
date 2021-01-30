<?php

$title = $_POST['title'];
$name = $_POST['name'];
$subjects_ids = [];

foreach ($_POST['subjects'] as $id => $checkbox_value) {
    if ($checkbox_value === 'on') {
        $subjects_ids[] = $id;
    }
}

$db_service = new DBService();
$referer = $_SERVER['HTTP_REFERER'];

try {
    $db_service->query("INSERT INTO lecturers (title, name) VALUES ('$title', '$name')");
    $results = $db_service->query("SELECT LAST_INSERT_ID()");
    $lecturer_id = $results[0]['LAST_INSERT_ID()'];

    foreach ($subjects_ids as $subject_id) {
        $db_service->query("INSERT INTO lecturer_subjects (lecturer_id, subject_id) VALUES ($lecturer_id, $subject_id)");
    }

    header("Location: $referer");
} catch (\Exception $e) {
    http_response_code(500);
}
