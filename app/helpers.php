<?php

function link_to_route_sort_by($route, $column, $body, array $params=array()){
    $params['sortBy']=$column;
    $params['direction']=!$params['direction'];
    return link_to_route($route, $body, $params);
}