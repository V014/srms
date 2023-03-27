<?php
// custom functions 
// Wanga kanjala
// 2020 - 2021 

// setting up date and time function for the system
date_default_timezone_set("Africa/Blantyre");
$Date = date("Y-m-d");
$Time = date("h:i:s");

// this function escapes user input with dangerous code
function esctxt($connection, $string) {
	$result = mysqli_real_escape_string($connection, $string);
	return $result;
}
// this function redirects the user to a different page
function redirect_to($new_location) {
	header("Location: ". $new_location);
	exit();
}
// this function deletes a row, takes in an ID and a table name.
function deleteinfo($id, $tableName) {
	$deleteStmt = "DELETE FROM $tableName WHERE `Id` = $id"; 
	return $deleteStmt;
}
// this function selects info, takes in an array and table name
function insertinfo($fields, $tableName) {
	$columns = implode(', ', array_keys($fields));
	$values = implode(', ', array_values($fields)); 
	$stmt = "INSERT INTO $tableName VALUES ($values)";
	return $stmt;
}
// this function updates info, takes in an arrat and table name
function multiUpdatetable($field, $string, $tableName, $id) {
	$columns = implode(', ', array_values($field));
	$text = implode(', ', array_values($string));
	$stmt = "UPDATE $tableName SET $columns = $text WHERE Id = $id";
	return $stmt;
}

// this function updates info, takes in an arrat and table name
function updatetable($tableName, $column, $string, $id) {
	$stmt = "UPDATE $tableName SET $column = '$string' WHERE ID = $id";
	return $stmt;
}

function select($column, $tableName, $condition, $constraint) {
	$stmt = "SELECT $column FROM $tableName WHERE $condition = $constraint";
	return $stmt;
}

// this function selects from a table, takes multiple values
function multiselect($columns, $tableName, $condition, $constraint) {
	$values = implode(', ', array_values($columns));
	$stmt = "SELECT $values FROM $tableName WHERE $condition = $constraint";
	return $stmt;
}

// this function specifies the select
function midselect($fields, $tableName, $condition, $interest) {
	$values = implode(', ', array_values($fields));
	$rules = implode(', ', array_values($condition));
	$stmt = "SELECT $fields FROM $tableName WHERE $condition = $interest";
	return $stmt;
}

// this function specifies multiple selects
function fullselect($fields, $tableName, $condition1, $condition2, $interest) {
	$values = implode(', ', array_values($fields));
	$stmt = "SELECT $fields FROM $tableName WHERE $condition1 AND $condition2 = $interest";
	return $stmt;
}

// datetime customization
function cleandate($date) {
	// split date-time values
    $Log = explode(" ", $date);
    // reformat date
    $cleandate = date("M-d-Y", strtotime($Log[0]));
    return $cleandate;
}

function cleantime($time) {
	// split date-time values
    $Log = explode(" ", $time);
	// remove seconds
    $cleantime = substr($Log[1], 0, -3);
    return $cleantime;
}

?>