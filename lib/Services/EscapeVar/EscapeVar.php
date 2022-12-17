<?php

namespace Plugo\Services\EscapeVar;

class EscapeVar
{
    public function secure_template($data = array()) {
        if (!is_array($data) || !count($data)) {
            return array();
        }

        foreach ($data as $k => $v) {
            if (!is_array($v) && !is_object($v)) {
                $data[$k] = htmlspecialchars(trim($v));
            }
            if (is_array($v)) {
                $data[$k] = $this->secure_template($v);
            }
        }

        return $data;
    }
}