<?php

namespace app\models;

use app\core\Model;

class Main extends Model {
    public function saveForm($formData, $isStep1 = true, $photo = '') {
        $formData = array_values($formData);
        $insert = "INSERT INTO members VALUES (NULL";
        for ($i = 0; $i < 7; $i++) {
            $insert .= ", '" . $formData[$i] . "'";
        }
        if (!$isStep1) {
            for ($i = 7; $i < 10; $i++) {
                $insert .= ", '" . $formData[$i] . "'";
            }

            $insert .= ", '" . $photo . "'";
        } else {
            $insert .= ", NULL, NULL, NULL, NULL";
        }
        $insert .= ");";

        $result = $this->db->all($insert);
        return $result;
    }

    public function checkField($field, $name) {
        return $this->db->all("SELECT COUNT(*) FROM members WHERE ". $name ." = '". $field ."';");
    }

    public function deleteByEmailAndPhone($email, $phone) {
        return $this->db->all("DELETE FROM members WHERE email = '". $email ."' AND phone = '". $phone ."';");
    }

    public function recordsNumber() {
        return $this->db->all("SELECT COUNT(*) FROM members;");
    }

    public function showData() {
        return $this->db->all("SELECT * FROM members;");
    }
}
