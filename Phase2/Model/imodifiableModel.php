<?php

interface ImodifiableModel {

    function add();
    function remove();
    function edit();
    function read();
    static function view_all();
}

?>