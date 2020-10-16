<?php


function db_insert($table_name, $data)
{
    $db_filed = implode(', ', array_keys($data));
    $cutom_value = "'" . implode("', '", array_values($data)) . "'";
    $sql = "INSERT INTO $table_name ($db_filed) VALUES ($cutom_value)";
    global $conn;
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
