<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

class Contact extends Database {
    protected $contactName;
    protected $contactEmail;
    protected $contactTel;

    public function setContactName($contactName) {
        if (!empty($contactName)) {
            $this->contactName = trim($contactName);
            $this->contactName = strip_tags($contactName);
        }
    }

    public function setContactEmail($contactEmail) {
        if (!empty($contactEmail)) {
            $this->contactEmail = trim($contactEmail);
            $this->contactEmail = strip_tags($contactEmail);
        }
    }

    public function setContactTel($contactTel) {
        if (!empty($contactTel)) {
            $this->contactTel = trim($contactTel);
            $this->contactTel = strip_tags($contactTel);
        }
    }

    public function addContact() {
        $sql = 'insert into contact(contact_name, contact_tel, contact_email, contact_content) values("' .$this->contactName. '", "' .$this->contactTel. '", "' .$this->contactEmail. '", "Thêm bởi admin")';
        $this->query($sql);
    }

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
