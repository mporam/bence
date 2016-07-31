<?php

namespace Bence;


class Limits
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function getAvailableTiersForUser($accNo) {
        $userLimits = $this->getLimitsForUser($accNo);
        $userTotal = $this->getTotalForUser($accNo);
        $availableTiers = [];

        $availableTiers[1] = ($userTotal[0]['total'] >= $userLimits[0]['t1limit'] ? 1 : 0);
        $availableTiers[2] = ($userTotal[0]['total'] >= $userLimits[0]['t2limit'] ? 1 : 0);
        $availableTiers[3] = ($userTotal[0]['total'] >= $userLimits[0]['t3limit'] ? 1 : 0);
        $availableTiers[4] = ($userTotal[0]['total'] >= $userLimits[0]['t4limit'] ? 1 : 0);

        return $availableTiers;
    }

    private function getLimitsForUser($accNo) {
        $query = $this->db->prepare(
            "SELECT
              t1limit,
              t2limit,
              t3limit,
              t4limit
            FROM `limits2015`
            WHERE AccNo = $accNo"
        );

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function getTotalForUser($accNo) {
        $query = $this->db->prepare(
            "SELECT
              total 
            FROM `expenses2015`
            WHERE AccNo = $accNo;"
        );

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }


}