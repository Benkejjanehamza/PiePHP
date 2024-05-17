<?php

namespace Core;

class Request
{
    private $params;

    public function __construct()
    {
        $this->params = $this->buildParams();
    }

    public function buildParams()
    {
        $params = array_merge($_GET, $_POST);
        foreach ($params as $key => $value) {
            $params[$key] = $this->cleanInput($value);
        }
        return $params;
    }

    private function cleanInput($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->cleanInput($value);
            }
        } else {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }
        return $data;
    }

    public function getParam($key)
    {
        return $this->params[$key] ?? null;
    }

    public function getAllParams()
    {
        return $this->params;
    }
}
