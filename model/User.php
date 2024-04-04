<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

class User extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertUser(array $data, string $user)
    {
        try {
            $condition = "email = '{$data['email']}'";
            $email = $this->selectFromUser(['*'], $condition, true);
            if ($email) {
                throw new Exception("Utilisateur déjà présent");
            }

            $condition = "street_name = '{$data['rue']}' AND street_number = '{$data['numero']}'";
            $adresse = $this->select('address', ['*'], $condition, true);

            if ($adresse) {
                $addressId = $adresse->address_id;
            } else {
                $addressData = [
                    'street_name' => $data['rue'],
                    'street_number' => $data['numero']
                ];
                $this->insert('address', $addressData);
                $addressId = $this->pdo->lastInsertId();
            }

            $condition = "city_name = '{$data['ville']}' AND postal_code = '{$data['codePostal']}'";
            $ville = $this->select('cities', ['*'], $condition, true);


            if ($ville) {
                $cityId = $ville->city_id;
                $regionId = $ville->region_id;
            } else {
                $condition = "region_name = '" . $data['region'] . "'";
                $regionId = $this->select('regions', ['*'], $condition, true);
                $villeData = [
                    'city_name' => $data['ville'],
                    'postal_code' => $data['codePostal'],
                    'region_id' => $regionId->region_id
                ];

                $this->insert('cities', $villeData);
                $cityId = $this->pdo->lastInsertId();
            }

            $condition = "address_id = {$addressId}";
            $contains = $this->select('Contains', ['*'], $condition, true);


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
                'name' => $data['nom'],
                'surname' => $data['prenom'],
                'email' => $data['email'],
                'phone_number' => $data['telephone'],
                'birthdate' => $data['dateNaissance'],
                'address_id' => $addressId,
                'first_connection' => 0
            ];

            $this->insert('users', $userData, true);

            $userId = $this->pdo->lastInsertId();
            $campusId = $this->select('campus', ['*'], "campus_name = '{$data['campus']}'");
            $promotionId = $this->select('promotions', ['*'], "promotion_name = '{$data['promotion']}'");

            if ($user == 'Student') {
                $studentData = [
                    'user_id' => $userId,
                    'campus_id' => $campusId->campus_id,
                    'promotion_id' => $promotionId->promotion_id
                ];
                $this->insert('students', $studentData);
                echo "Successful";
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Erreur: ' . $e->getMessage());
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
            exit('Erreur: ' . $e->getMessage());
        }
    }

    public function selectFromUser(array $columns, string $condition = "", bool $unique = true)
    {
        try {
            $decryptedColumns = [
                "users.user_id",
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
            exit('Erreur: ' . $e->getMessage());
        }
    }
}
