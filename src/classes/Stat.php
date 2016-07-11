<?php

namespace Bence;

class Stat
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getStatCircle($id, $value) { // @todo: $value to be calculated in method
        $stat = "<div id=\"$id\" class=\"stat\"></div>";

        $stat .= "<script>";
        $stat .= "$(\"#$id\").circliful({
                animationStep: 5,
                foregroundBorderWidth: 10,
                backgroundBorderWidth: 10,
                percent: $value,
                foregroundColor: '#9A1A31'
            });";
        $stat .= "</script>";

        return $stat;
    }

    public function getStatInfo() { // @todo needs to be generated dynamically
        return "<b>28</b> customers have completed gold tier and <b>20</b> customers have completed silver teir out of
            <b>100</b> customers overall.";
    }

}