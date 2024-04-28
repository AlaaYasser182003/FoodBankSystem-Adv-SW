<?php

interface ImodifiableModel {

    function add();
    static function remove($id);
    function edit();
    function read();
    function getById($ID);
    static function view_all();
}
