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

    public function getPromotionsForUser($uid) {
        $query = $this->db->prepare("
            SELECT * FROM `userTiers`
                LEFT JOIN `promotions2015`
                    ON `userTiers`.`tier` = `promotions2015`.`tier`
                WHERE `userTiers`.`uid` = $uid;
        ");

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPromotionById($pid) {
        $query = $this->db->prepare("
            SELECT * FROM `promotions2015`
                WHERE `id` = $pid;
        ");

        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function setPromotionForUser($promo, $uid) {
        $query = $this->db->prepare("UPDATE users SET `promo`='$promo' WHERE `id`='$uid';");

        try {
            $query->execute();
        } catch(\Exception $e) {
            return false;
        }

        return true;
    }


}