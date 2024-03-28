<?php

class Model
{
    private PDO $pdo;
    private array $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    public function __construct(string $dbname, string $dbhost, int $dbport, string $dbuser, string $dbpasswword)
    {
        try {
            $this->pdo = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname}", $dbuser, $dbpasswword, $this->options);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }

    public function fetch(string $table, array $columns, string $condition = "", bool $unique = true)
    {
        try {
            $columns = implode(",", $columns);
            $sqlString = "SELECT {$columns} FROM {$table}";

            if (!empty($condition)) {
                $sqlString .= " WHERE {$condition};";
            } else {
                $sqlString .= ";";
            }


            $query = $this->pdo->prepare($sqlString);
            $query->execute();
            if ($unique) {
                return $query->fetch(PDO::FETCH_OBJ);
            } else {
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }

    public function delete(string $table, string $colname, int $id): void
    {
        try {
            $query = $this->pdo->prepare("DELETE FROM {$table} WHERE {$colname} = :id ;");
            $query->bindParam("id", $id, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }

    public function insert(string $table, array $data)
    {
        try {
            $sqlString = "INSERT INTO {$table} VALUES (";
            foreach ($data as $header => $value) {
                if ($header === array_key_last($data)) {
                    $sqlString = $sqlString . "?";
                } else {
                    $sqlString = $sqlString . "?,";
                }
            }
            $sqlString = $sqlString . ");";
            $query = $this->pdo->prepare($sqlString);
            $i = 1;
            foreach ($data as $header => $value) {
                $query->bindParam($i, $data[$header], gettype($data[$header]) == "int" ? PDO::PARAM_INT : PDO::PARAM_STR);
                $i++;
            }
            $query->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }

    public function update(string $table, array $values, string $colname, int $id)
    {
        try {
            $sqlString = "UPDATE {$table} SET ";
            foreach ($values as $columnname => $value) {
                if ($columnname === array_key_last($values)) {
                    $sqlString = $sqlString . "{$columnname} = ?";
                } else {
                    $sqlString = $sqlString . "{$columnname} = ?,";
                }
            }
            $sqlString = $sqlString . " WHERE {$colname} = ?";
            $sqlString = $sqlString . ";";
            // TODO : Add where for every primary key
            $query = $this->pdo->prepare($sqlString);
            $i = 1;
            foreach ($values as $columnname => $value) {
                $query->bindParam($i, $values[$columnname], gettype($values[$columnname]) == "int" ? PDO::PARAM_INT : PDO::PARAM_STR);
                $i++;
            }
            $query->bindParam($i, $id, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }

    public function userTypeGet(string $email)
    {
        try {
            $sqlString =
                "SELECT
                CASE
                    WHEN admins.user_id IS NOT NULL THEN 'Admin'
                    WHEN tutors.user_id IS NOT NULL THEN 'Tuteur'
                    WHEN students.user_id IS NOT NULL THEN 'Etudiant'
                    ELSE 'Utilisateur'
                END AS typeUtilisateur
            FROM users
            LEFT JOIN tutors ON users.user_id = tutors.user_id
            LEFT JOIN admins ON users.user_id = admins.user_id
            LEFT JOIN students ON users.user_id = students.user_id
            WHERE users.email = :email;";
            $query = $this->pdo->prepare($sqlString);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }

    public function callProcedure(string $procedureName, array $parameters = [])
    {
        try {
            $sqlString = "CALL {$procedureName}(";
            $paramCount = count($parameters);
            for ($i = 0; $i < $paramCount; $i++) {
                $sqlString .= ($i == $paramCount - 1) ? "?" : "?, ";
            }
            $sqlString .= ");";

            $query = $this->pdo->prepare($sqlString);
            $i = 1;
            foreach ($parameters as $param) {
                $query->bindParam($i, $param);
                $i++;
            }
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }
}
