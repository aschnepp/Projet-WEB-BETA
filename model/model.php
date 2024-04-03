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
            exit('Something bad happened');
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

    public function insertUser(array $data, string $user)
    {
        // try {
        //     $condition = "city_name = {$data['ville']} postal_code = {$data['code_postal']}'";
        //     $ville = $this->select('cities', ['city_id'], $condition, true);

        //     if ($ville) {
        //         $villeId = $ville->city_id;
        //         $regionId = $ville->region_id;
        //     } else {
        //         $regionId = $this->select("regions", ["region_id"], "region_name = {$data['region']}", true);

        //         $sqlString = "INSERT INTO cities (city_name, street_number, region_id)
        //     VALUES (:city_name, :street_number, :region_id);";
        //         $query = $this->pdo->prepare($sqlString);
        //         $query->bindParam(':street_name', $data['rue'], PDO::PARAM_STR);
        //         $query->bindParam(':street_number', $data['numero'], PDO::PARAM_STR);
        //         $query->bindParam(':region_id', $regionId, PDO::PARAM_INT);
        //         $query->execute();
        //         $villeId = $this->pdo->lastInsertId();
        //     }

        //     $sqlString = "INSERT INTO address (street_name, postal_code)
        //     VALUES (:street_name, :street_number);";
        //     $query = $this->pdo->prepare($sqlString);
        //     $query->bindParam(':street_name', $data['rue'], PDO::PARAM_STR);
        //     $query->bindParam(':street_number', $data['numero'], PDO::PARAM_INT);
        //     $query->execute();

        //     $adresseId = $this->pdo->lastInsertId();

        //     $sqlString = "INSERT INTO Contains (address_id, city_id)
        //     VALUES (:address_id, :city_id);";
        //     $query = $this->pdo->prepare($sqlString);
        //     $query->bindParam(":address_id", $adresseId);
        //     $query->bindParam(":city_id", $villeId);
        //     $query->execute();

        //     $bytes = random_bytes(10);
        //     $password = bin2hex($bytes);

        //     $sqlString = "INSERT INTO users 
        //     (username, password, email, surname, name, phone_number, birthdate, adress_id, first_connection)
        //     VALUES ({$password}, {$data['email']},{$data['prenom']},{$data['telephone']},
        //     {$data['date_naissance']}, {$adresseId}, 0);";
        //     $query = $this->pdo->prepare($sqlString);
        //     $query->execute();

        //     $userId = $this->pdo->lastInsertId();
        //     $campusId = $this->select('campus', ['campus_id'], "campus_name = {$data['campus']}");
        //     $promotionId = $this->select('regions', ['region_id'], "region_name = {$data['promotion']}");

        //     if ($user == "student") {
        //         require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Student.php");
        //         $student = new Student($userId, $campusId, $promotionId);
        //         $student->InsertForStudent($student);
        //     } else {
        //     }
        // } catch (Exception $e) {
        //     error_log($e->getMessage());
        //     exit('Something bad happened');
        // }


        try {
            $condition = "email = '{$data['email']}'";
            $email = $this->selectFromUser(['*'], $condition, true);
            if ($email) {
                exit('Email déjà utilisé');
            }

            $condition = "street_name = '{$data['rue']}' AND street_number = '{$data['numero']}'";
            $adresse = $this->select('address', ['address_id'], $condition, true);

            if ($adresse) {
                $addressId = $adresse->address_id;
            } else {
                $addressData = [
                    'streetName' => $data['rue'],
                    'postalCode' => $data['numero']
                ];
                $this->insert('address', $addressData);
                $addressId = $this->pdo->lastInsertId();
            }

            $condition = "city_name = '{$data['ville']}' AND postal_code = {$data['code_postal']}";
            $ville = $this->select('cities', ['city_id'], $condition, true);

            if ($ville) {
                $cityId = $ville->city_id;
                $regionId = $ville->region_id;
            } else {
                $condition = "region_name = '" . $data['region'] . "'";
                $regionId = $this->select('regions', ['region_id'], $condition, true);
                $villeData = [
                    'cityName' => $data['ville'],
                    'postalCode' => $data['codePostal'],
                    'regionId' => $regionId
                ];
                $this->insert('cities', $villeData);
                $cityId = $this->pdo->lastInsertId();
            }

            $condition = "address_id = {$addressId}";
            $contains = $this->select('cities', ['city_id'], $condition, true);

            if (!$contains) {
                $containsData = [
                    'address_id' => $addressId,
                    'city_id' => $cityId
                ];
                $this->insert('Contains', $containsData);
            }


            $password = bin2hex(random_bytes(10));
            $userData = [
                'password' => $password,
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'dateNaissance' => $data['date_naissance'],
                'adress_id' => $addressId,
                'first_connection' => 0
            ];

            $this->insert('users', $userData);

            $userId = $this->pdo->lastInsertId();
            $campusId = $this->select('campus', ['campus_id'], "campus_name = '{$data['campus']}'");
            $promotionId = $this->select('regions', ['region_id'], "region_name = '{$data['promotion']}'");

            $students = [
                
            ]
            if ($user == "student") {
                $this->insert('students', );
            }
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

    public function userTypeGet(int $id)
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
            WHERE users.user_id = :userId;";

            $query = $this->pdo->prepare($sqlString);
            $query->bindParam(':userId', $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }


    public function selectFromUser(array $columns, string $condition = "", bool $unique = true)
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
                "users.address_id",
                "users.first_connection"
            ];

            $decryptedColumns = implode(",", $decryptedColumns);
            $columns = implode(",", $columns);
            $sqlString = "SELECT {$columns} FROM (SELECT {$decryptedColumns} FROM users) AS resultat";

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