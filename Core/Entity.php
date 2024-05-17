<?php

namespace Core;

class Entity
{
    public function __construct(array $attributs)
    {
        foreach ($attributs as $key => $value) {
            // Création dynamique des attributs publics
            $this->{$key} = $value;
        }
    }
}
