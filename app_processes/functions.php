<?php

function insert($conn, $table_name, $col_name, $col_value){
    $column_name = implode(",",$col_name);
    $column_value = implode(",",$col_value);
    $query = "INSERT INTO $table_name ($column_name) VALUES $column_value";

    return $query;
}