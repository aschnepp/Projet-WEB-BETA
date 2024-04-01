<?php
class Model
{
    private PDO $pdo;
    private array $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    private string $key;

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
            exit('Something bad happened');
        }
    }

    public function select(string $table, array $columns, string $condition = "", bool $unique = true)
    {
        try {
            $columns = implode(",", $columns);
            $sqlString = "SELECT {$table}.{$columns} FROM {$table}";

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
            WHERE users.email = aes_encrypt('{$email}', '{$this->key}');";

            $query = $this->pdo->prepare($sqlString);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }


    public function selectFromUser(string $table, array $columns, string $condition = "", bool $unique = true)
    {
        try {
            $decryptedColumns = [
                "users.user_id",
                "CONVERT(aes_decrypt(users.username, '{$this->key}') USING utf8) AS username",
                "CONVERT(aes_decrypt(users.password, '{$this->key}') USING utf8) AS password",
                "CONVERT(aes_decrypt(users.email, '{$this->key}') USING utf8) AS email",
                "CONVERT(aes_decrypt(users.surname, '{$this->key}') USING utf8) AS surname",
                "CONVERT(aes_decrypt(users.name, '{$this->key}') USING utf8) AS name",
                "CONVERT(aes_decrypt(users.phone_number, '{$this->key}') USING utf8) AS phone_number",
                "CONVERT(aes_decrypt(users.birthdate, '{$this->key}') USING utf8) AS birthdate",
                "CONVERT(aes_decrypt(users.picture, '{$this->key}') USING utf8) AS picture",
                "users.address_id",
                "users.first_connection"
            ];

            $decryptedColumns = implode(",", $decryptedColumns);
            $columns = implode(",", $columns);
            $sqlString = "SELECT {$columns} FROM (SELECT {$decryptedColumns} FROM {$table}) AS resultat";

            if (!empty($condition)) {
                $sqlString .= " WHERE resultat.{$condition};";
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
}