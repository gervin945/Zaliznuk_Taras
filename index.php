<?php

require "db.php";

function getNotes()
{
    global $conn;

    $result = mysqli_query($conn, "SELECT * FROM notes");

    $notes = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $notes[] = $row;
    }

    return $notes;
}

function getNote($id)
{
    global $conn;

    $result = mysqli_query(
        $conn,
        "SELECT * FROM notes WHERE id=$id"
    );

    return mysqli_fetch_assoc($result);
}

function addNote($title, $content)
{
    global $conn;

    mysqli_query(
        $conn,
        "INSERT INTO notes(title,content)
         VALUES('$title','$content')"
    );
}

function updateNote($id, $title, $content)
{
    global $conn;

    mysqli_query(
        $conn,
        "UPDATE notes
         SET title='$title',
         content='$content'
         WHERE id=$id"
    );
}

function deleteNote($id)
{
    global $conn;

    mysqli_query(
        $conn,
        "DELETE FROM notes
         WHERE id=$id"
    );
}
