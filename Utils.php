<?php


class Utils
{
    static public function fetchCol($arr, $column) {
        $data = [];
        foreach ($arr as $row) {
            $data[] = $row[$column];
        }
        return $data;
    }
}