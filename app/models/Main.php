<?php

namespace app\models;

use app\core\Model;

class Main extends Model {
    public function saveForm($formData, $isStep1=true, $photo='') {
        if ($isStep1) {
            $insert = "INSERT INTO users VALUES (NULL, '" . $formData['first_name'] . "', '" . 
            $formData['last_name'] . "', '" . $formData['birthdate'] . "', '" . 
            $formData['report_subject'] . "', '" . $formData['country'] . "', '" . 
            $formData['phone'] . "', '" . $formData['email'] . "', NULL, NULL, NULL, NULL);";
        } else {
            $insert = "INSERT INTO users VALUES (NULL, '" . $formData['first_name'] . "', '" . 
            $formData['last_name'] . "', '" . $formData['birthdate'] . "', '" . 
            $formData['report_subject'] . "', '" . $formData['country'] . "', '" . 
            $formData['phone'] . "', '" . $formData['email'] . "', '" . 
            $formData['company'] . "', '" . $formData['position'] . "', '" . 
            $formData['about_me'] . "', '" . $photo . "');";
        }
        $result = $this->db->all($insert);
        return $result;
    }

    public function checkField($field, $name) {
        return $this->db->all("SELECT COUNT(*) FROM users WHERE ". $name ." = '". $field ."';");
    }

    public function deleteByEmailAndPhone($email, $phone) {
        // $uploadDir = 'public/img/';
        // $photo = $this->db->all("SELECT photo FROM users WHERE email = '". $email ."' AND phone = '". $phone ."';")[0][0];
        // echo $photo;
        // if ($photo !== '') {
        //     $targetFile = $uploadDir . $photo;
        //     unlink($targetFile);
        // }
        return $this->db->all("DELETE FROM users WHERE email = '". $email ."' AND phone = '". $phone ."';");
    }

    public function recordsNumber() {
        return $this->db->all("SELECT COUNT(*) FROM users;");
    }

    public function showData() {
        return $this->db->all("SELECT * FROM users;");
    }
}
