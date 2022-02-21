<?php

function db_query(string $sql, array $parameters = []) : \PDOStatement {
    global $PDO;

    $statement = $PDO->prepare($sql);
    $statement->execute($parameters);

    return $statement;
}

function db_fetch_all(string $table_name, array $select = [], array $filter = []) : array|false {
    $params = [];

    // составление фрагментов sql строки SELECT по заданым параметрам

    // устанавлием поля, которые будут выбираться (массив $select)
    $sql_select = '*';
    if(!empty($select)) {
        foreach($select as $field) {
            $params[] = $field;
        }

        $sql_select = implode(", ", array_fill(0, count($select), '?'));
    }

    // устанавливаем фильтрацию выбора элементов по полям (массив $filter)
    $sql_where = '';
    if(!empty($filter)) {
        $sql_where = [];

        foreach($filter as $field => $value) {
            $sql_where[] = $field . '=?';

            $params[] = $value;
        }

        $sql_where = ' WHERE ' . implode("AND ", $sql_where);
    }

    // собираем sql строку
    $sql = 'SELECT ' . $sql_select . ' FROM ' . $table_name . $sql_where;

    return db_query($sql, $params)->fetchAll();
}

function db_fetch_row(string $table_name, array $select = [], string $filter_name = 'id', $filter_value = 0) : array|false {
    $params = [];

    $sql_select = '*';
    if(!empty($select)) {
        foreach($select as $field) {
            $params[] = $field;
        }

        $sql_select = implode(", ", array_fill(0, count($select), '?'));
    }


    $params[] = $filter_value;
    $sql_where = ' WHERE ' . $filter_name . '=?';

    $sql = 'SELECT ' . $sql_select . ' FROM ' . $table_name . $sql_where;

    return db_query($sql, $params)->fetch();
}

function db_push_row(string $table_name, array $fields = []) {
    $params = [];

    foreach($fields as $field => $value) {
        $sql_insert[] = $field . '=?';

        $params[] = $value;
    }

    $sql_insert = implode(",", $sql_insert);

    $sql = 'INSERT INTO ' . $table_name . ' SET ' . $sql_insert;

    db_query($sql, $params);
}