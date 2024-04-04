<?php
class Model
{
    protected PDO $pdo;
    protected array $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    
    protected string $key;

    public function __construct()
    {
        $dbhost = get_cfg_var("dbhost");
        $dbport = get_cfg_var("dbport");
        $dbname = get_cfg_var("dbname");
        $dbuser = get_cfg_var("dbuser");
        $dbpasswword = get_cfg_var("dbpassword");

        $this->key = get_cfg_var("encryption_key");

        try {
            $this->pdo = new PDO("mysql:host={$dbhost};port={$dbport};dbname={$dbname}", $dbuser, $dbpasswword, $this->options);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Erreur: ' . $e->getMessage());
        }
    }

    public function select(string $table, array $columns, string $condition = "", bool $unique = true)
    {
        try {
            $columns = implode(",", $columns);
            $sqlString = "SELECT {$table}.{$columns} FROM {$table}";

            if (!empty($condition)) {
                $sqlString .= " WHERE {$condition}";
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
            exit('Erreur: ' . $e->getMessage());
        }
    }

    public function delete(string $table, string $colname, int $id): void
    {
        try {
            $query = $this->pdo->prepare("DELETE FROM {$table} WHERE {$colname} = :id ;");
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Erreur: ' . $e->getMessage());
        }
    }

    public function insert(string $table, array $data, bool $crypted = false)
    {
        try {
            $i = 1;
            $sqlString = "INSERT INTO stagecatalyst.{$table} (";

            foreach ($data as $header => $value) {
                if ($header === array_key_last($data)) {
                    $sqlString .= $header;
                } else {
                    $sqlString .= $header . ",";
                }
            }
            $sqlString .= ") VALUES (";

            if ($crypted) {
                $val = "";
                foreach ($data as $header => $value) {
                    $valTemp = $data[$header];
                    if ($header !== 'address_id' && $header !== 'first_connection') {
                        $key = get_cfg_var("encryption_key");
                        $val .= "aes_encrypt('{$valTemp}', '{$key}'),";
                    } else {
                        $val .= "{$valTemp},";
                    }
                }
                $sqlString .= $val;
                $sqlString = rtrim($sqlString, ', ');
            } else {
                foreach ($data as $header => $value) {
                    if ($header === array_key_last($data)) {
                        $sqlString .= "?";
                    } else {
                        $sqlString .= "?,";
                    }
                }
            }

            $sqlString .= ");";

            $query = $this->pdo->prepare($sqlString);
            if (!$crypted) {
                foreach ($data as $header => $value) {
                    $query->bindParam($i, $data[$header], gettype($data[$header]) == "int" ? PDO::PARAM_INT : PDO::PARAM_STR);
                    $i++;
                }
            }

            $query->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Erreur: ' . $e->getMessage());
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
            exit('Erreur: ' . $e->getMessage());
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
                $query->bindValue($i, $param);
                $i++;
            }
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit($e->getMessage());
        }
    }
}
