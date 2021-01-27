<?php

$db_service = new DBService();
$lecturers = $db_service->query('SELECT * FROM lecturers');
$subjects = $db_service->query('SELECT * FROM subjects');
$lecturer_subjects = $db_service->query('SELECT * FROM lecturer_subjects');

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

    if (empty($found_lecturer['subjects'])) {
        $found_lecturer['subjects'] = [];
    }

    $found_lecturer['subjects'][] = $found_subject;

    foreach ($lecturers as $i => $lecturer) {
        if ($lecturer['id'] === $found_lecturer['id']) {
            $lecturers[$i] = $found_lecturer;
        }
    }
}

foreach ($lecturers as $i => $lecturer) {
    $lecturers[$i]['id'] = substr(md5($lecturer['id']), 0, 16);
}

sleep(2);

header('Content-Type: application/json');
echo json_encode($lecturers);
