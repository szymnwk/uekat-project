<?php

$id = $_GET["id"];
$db_service = new DBService();
$referer = $_SERVER['HTTP_REFERER'];

try {
    $db_service->query("DELETE FROM lecturers WHERE id = $id");
    $db_service->query("DELETE FROM lecturer_subjects WHERE lecturer_id = $id");
    header("Location: $referer");
} catch (\Exception $e) {
    http_response_code(500);
}