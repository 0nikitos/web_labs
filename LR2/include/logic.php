<?php

// connection to db
try {
    $pdo = new PDO('mysql:' . 'dbname=sklad1;' . 'host=localhost;'." charset=UTF8;", 'root', null);
} catch (PDOException $except) {
    die($except->getMessage());
}


function db_fetch_array(string $sql_request, array $sql_params = NULL) : array
{
    global $pdo;

    $statement = $pdo->prepare($sql_request);
    $statement->execute($sql_params);
    
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
function db_select_item(): array
{
    $sql = [
        'request'=>'',
        'params'=>[]
        ];


    $sql['request']= "SELECT\n"
            ."items.img_path AS img_path, \n"
            ."items.name AS name, \n"
            ."providers.name AS provider_name, \n"
            ."items.description AS description, \n"
            ."items.cost AS cost  \n"
            ."FROM items INNER JOIN providers \n"
            ."ON items.id_provider=providers.id";


    if (isset($_GET['apply'])) {
        // concatenate WHERE statement to sql request

        $sql['request'] .= "\nWHERE\n";

        if (!empty($_GET['name'])) {
            $sql['request'] .= "items.name LIKE :name";
            $sql['request'] .= "\nAND\n";

            $sql['params'][':name'] = "%{$_GET['name']}%";
        }

        if (!empty($_GET['prov_name'])) {
            $sql['request'] .= "providers.name = :prov_name";
            $sql['request'] .= "\nAND\n";

            $sql['params'][':prov_name'] = $_GET['prov_name'];
        }

        if (!empty($_GET['description'])) {
            $sql['request'] .= "items.description LIKE :description";
            $sql['request'] .= "\nAND\n";

            $sql['params'][':description'] = "%{$_GET['description']}%";
        }

        if (!empty($_GET['cost_from']) and !empty($_GET['cost_to'])) {
            $sql['request'] .= "items.cost BETWEEN :cost_from AND :cost_to";
            $sql['request'] .= "\nAND\n";

            $sql['params'][':cost_from'] = $_GET['cost_from'];
            $sql['params'][':cost_to'] = $_GET['cost_to'];
        } else if (!empty($_GET['cost_from'])) {
            $sql['request'] .= "items.cost >= :cost_from";
            $sql['request'] .= "\nAND\n";

            $sql['params'][':cost_from'] = $_GET['cost_from'];

        } else if (!empty($_GET['cost_to'])) {
            $sql['request'] .= "items.cost <= :cost_to";
            $sql['request'] .= "\nAND\n";

            $sql['params'][':cost_to'] = $_GET['cost_to'];
        }
    }

    // убираем WHERE в конце запроса
    if (str_ends_with($sql['request'], "\nWHERE\n")) {
        $sql['request'] = str_replace("\nWHERE\n", '', $sql['request']);
    }

    // убираем and в конце запроса
    if (str_ends_with($sql['request'], "\nAND\n")) {
        $sql['request'] = substr_replace($sql['request'], '', -1 * strlen("\nAND\n"));
    }

    return db_fetch_array($sql['request'], $sql['params']);
}


function db_select_providers() : array
{
    $request ="SELECT name FROM providers";

    return db_fetch_array($request);
}

