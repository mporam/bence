<?php

$output = '';
if (!empty($data['breadcrumbs'])) {

    $output .= '<div class="bottom-border crumb">';

    $i = 0;
    foreach($data['breadcrumbs'] as $url => $crumb) {
        $i++;

        if ($i == count($data['breadcrumbs'])) {
            $output .= "<span>$crumb</span>";
        } else {
            $output .= '<a href="' . $url . '">' . $crumb . ' > </a>';
        }
    }

    $output .= "<div class=\"pull-right\"><a href='#' onclick='window.history.back();'>< Back</a></div></div>";
}

echo $output;