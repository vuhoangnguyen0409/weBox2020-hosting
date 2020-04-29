<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

class Contact extends Database {

    public function listAllContact() {
        $sql = 'select contact_name, contact_tel, contact_email, contact_content from contact order by contactid DESC';
        $this->query($sql);
        $data = array();
        while ($row = $this->fetch()) {
            $data[] = $row;
        }
        //var_dump($data);
        //die();
        return $data;
    }

    public function delContact($id) {
        $sql = 'delete from contact where contactid='.$id;
        $this->query($sql);
        return true;
    }

    public function totalContact() {
        $sql = 'select count(contactid) as total_contact from contact';
        $this->query($sql);
        $data = $this->fetch();
        return $data["total_contact"];
    }
}

?>
