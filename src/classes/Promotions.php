<?php

namespace Bence;


class Promotions
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPromotions($limit = false) {
        $query = $this->db->prepare("SELECT * FROM `promotions2015`");

        if ($limit && is_int($limit)) {
            $query = $this->db->prepare("SELECT * FROM `promotions2015` ORDER BY RAND() LIMIT $limit");
        }

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPromotionsforUser($uid) {
        $query = $this->db->prepare("
            SELECT * FROM `userTiers`
                LEFT JOIN `promotions2015`
                    ON `userTiers`.`tier` = `promotions2015`.`tier`
                WHERE `userTiers`.`uid` = $uid;
        ");

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }


}