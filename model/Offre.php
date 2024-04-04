<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

class Offre extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertOffer(array $data)
    {
        try {
            $condition = "firm_name = '{$data['entreprise']}'";
            $entreprise = $this->select('firms', ['*'], $condition, true);

            if (!$entreprise) {
                http_response_code(400);
                throw new Exception("Entreprise n'existe pas");
            }

            $entrepriseId = $entreprise->firm_id;

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


            $offerData = [
                'description_offer' => $data['description'],
                'title' => $data['nom'],
                'duration' => $data['duree'],
                'remuneration' => $data['remuneration'],
                'start_date' => $data['date-debut'],
                'available_places' => $data['dateNaissance'],
                'closed' => 0,
                'address_id' => $addressId,
                'firm_id' => $entrepriseId
            ];
            $this->insert('offers', $offerData);
            $offerId = $this->pdo->lastInsertId();

            foreach ($data['promotions'] as $promotion) {
                $concernsData = [
                    'offer_id' => $offerId,
                    'promotion_id' => $promotion
                ];
                $this->insert('Concerns', $concernsData);
            }

            foreach ($data['competences'] as $competence) {
                $looksForData = [
                    'offer_id' => $offerId,
                    'promotion_id' => $competence
                ];
                $this->insert('Looks_for', $looksForData);
            }
            http_response_code(200);
        } catch (Exception $e) {
            error_log($e->getMessage());
            http_response_code(400);
            exit('Erreur: ' . $e->getMessage());
        }
    }

    public function deleteOffer(int $id)
    {
        try {
            $condition = "offer_id = {$id}";
            $offer = $this->select('offers', ['*'], $condition);
            if ($offer) {
                $dataOffer = [
                    'closed' => 1
                ];
                $this->update('offers', $dataOffer, 'offer_id', $id);
                http_response_code(200);
            } else {
                http_response_code(400);
                throw new Exception("Offre n'existe pas");
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            http_response_code(400);
            exit('Erreur: ' . $e->getMessage());
        }
    }
}
