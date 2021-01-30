<?php

$db_service = new DBService();
$lecturers = $db_service->query('SELECT * FROM lecturers');
$subjects = $db_service->query('SELECT * FROM subjects');
$lecturer_subjects = $db_service->query('SELECT * FROM lecturer_subjects');

foreach ($lecturers as $i => $lecturer) {
    $lecturers[$i]['subjects'] = [];
}

foreach ($lecturer_subjects as $lecturer_subject) {
    $found_lecturer = null;
    $found_subject = null;

    foreach ($lecturers as $lecturer) {
        if ($lecturer['id'] === $lecturer_subject['lecturer_id']) {
            $found_lecturer = $lecturer;
        }
    }

    foreach ($subjects as $subject) {
        if ($subject['id'] === $lecturer_subject['subject_id']) {
            $found_subject = $subject;
        }
    }

    $found_lecturer['subjects'][] = $found_subject;

    foreach ($lecturers as $i => $lecturer) {
        if (isset($found_lecturer['id']) && $lecturer['id'] === $found_lecturer['id']) {
            $lecturers[$i] = $found_lecturer;
        }
    }
}

require __DIR__ . '/../../html/index.php';