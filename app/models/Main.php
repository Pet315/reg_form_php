<?php

namespace app\models;

use app\core\Model;

class Main extends Model {
    public function saveForm($formData) {
        $insert = "INSERT INTO users VALUES (NULL, '" . $formData['first_name'] . "', '" . 
            $formData['last_name'] . "', '" . $formData['birthdate'] . "', '" . 
            $formData['report_subject'] . "', '" . $formData['country'] . "', '" . 
            $formData['phone'] . "', '" . $formData['email'] . "', '" . 
            $formData['company'] . "', '" . $formData['position'] . "', '" . 
            $formData['about_me'] . "', '" . $formData['photo'] . "');";
        $result = $this->db->all($insert);
        return $result;
    }
}
