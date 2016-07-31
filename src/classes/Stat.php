<?php

namespace Bence;

class Stat
{
    private $db;
    private $totalUsers;

    public function __construct($db, $total)
    {
        $this->db = $db;
        $this->totalUsers = $total;
    }

    public function getStatCircle($id, $tier) {

        $values = $this->calculateStatValues($tier);

        $stat = "<div id=\"$id\" class=\"stat\"></div>";

        $stat .= $this->getStatInfo($values['userCount'], $tier);

        $stat .= "<script>";
        $stat .= "$(\"#$id\").circliful({
                animationStep: 5,
                foregroundBorderWidth: 10,
                backgroundBorderWidth: 10,
                percent: " . $values['percent'] . ",
                foregroundColor: '#9A1A31'
            });";
        $stat .= "</script>";

        return $stat;
    }

    private function getStatInfo($count, $tier) {
        return "<div><b>$count</b> customers have completed tier $tier out of
            <b>$this->totalUsers</b> customers</div>";
    }

    private function calculateStatValues($tier) {
        $values = $this->getStatValueForTier($tier);
        $values['percent'] = ($values['userCount'] / $this->totalUsers)*100;
        return $values;
    }

    private function getStatValueForTier($tier) {
        $query = $this->db->prepare("
            SELECT count(users.id) AS 'userCount'
             FROM `users`
             LEFT JOIN `expenses2015` ON users.accNo = expenses2015.accNo
             LEFT JOIN `limits2015` ON users.accNo = limits2015.accNo
                WHERE `expenses2015`.`total` > `limits2015`.`t" . $tier . "limit`;
        ");

        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }

}