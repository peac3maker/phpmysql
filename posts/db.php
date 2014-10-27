<?php
$db = null;
function openConnection() {
        try {
                $pdo = new PDO(connection, user, password);
                if (DEBUGGING == true && $pdo != null) {
                        echo 'Connection to DB established ..';
                }
                return $pdo;
        } catch(PDOException $ex) {
                die ('Could not open connection to '.connection);
        }
}

function getDb() {
        global $db;
        if ($db == null) {
                $db = openConnection();
        }
        return $db;
}


function prepareSql($sql) {
        $pquery = getDb()->prepare($sql);
        return $pquery;
}

function executeSql($query, $fieldValueMap) {
        $query->execute($fieldValueMap);        
        return $query;
}

?>