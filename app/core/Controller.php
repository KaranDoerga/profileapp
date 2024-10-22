<?php

namespace core;
class Controller
{

    // Functie om een model te laden
    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // Functie om een view te laden en optionele data mee te geven
    protected function view($view, $data = [])
    {
        extract($data);
        require_once '../app/views/' . $view . '.php';
    }
}