<?php

header("Content-Type: application/json");

require "notes.php";

$method = $_SERVER["REQUEST_METHOD"];

$id = $_GET["id"] ?? 0;

$data = json_decode(
    file_get_contents("php://input"),
    true
);

switch ($method) {

    case "GET":

        if ($id) {
            echo json_encode(getNote($id));
        } else {
            echo json_encode(getNotes());
        }

        break;

    case "POST":

        addNote(
            $data["title"],
            $data["content"]
        );

        echo json_encode("Нотатку додано");

        break;

    case "PUT":

        updateNote(
            $id,
            $data["title"],
            $data["content"]
        );

        echo json_encode("Нотатку оновлено");

        break;

    case "DELETE":

        deleteNote($id);

        echo json_encode("Нотатку видалено");

        break;

    default:

        echo json_encode("Помилка");
}
