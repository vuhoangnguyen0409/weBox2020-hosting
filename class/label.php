<?php

/**
 * Class for working with label on site
 *
 * @author Jackie Do
 * @copyright 2014
 * @version 1.0
 */

class Label extends Database {
    protected $labelName;

    /**
     * Set name for a label
     * =======================
     * @param string labelName
     **/
    public function __construct($labelName=null) {
        parent::__construct();
        $this->setLabelName($labelName);
    }

    /**
     * Set name for a label
     * =======================
     * @param string labelName
     **/
    public function setLabelName($labelName) {
        if (!empty($labelName)) {
            $this->labelName = trim($labelName);
            $this->labelName = strip_tags($labelName);
        }
    }

    /**
     * Get name of an label
     * =======================
     * @return string
     **/
    public function getLabelName() {
        return $this->labelName;
    }

    /**
     * List all label on site
     * =========================
     * @return array
     **/
    public function listAllLabel($limit=null) {
        $sql = 'select label.labelid, label_name, count(detailid) as total_detail from label left join detail on label.labelid=detail.labelid group by label_name order by label.labelid DESC';
        if (!empty($limit)) {
            $sql .= ' '.$limit;
        }
        $this->query($sql);
        $data = array();
        while ($row = $this->fetch()) {
            $data[] = $row;
        };
        return $data;
    }

    /**
     * Check if exists label in database
     * ====================================
     * @return boolean
     **/
    public function checkExistsLabel() {
        $sql = 'select * from label where label_name="' .addslashes($this->labelName). '"';
        $this->query($sql);
        if ($this->numrows() == 0) {
            return false;
        }
        return true;
    }

    /**
     * Insert label information into DBMS
     * =====================================
     * @return boolean
     **/
    public function addLabel() {
        if (!is_null($this->labelName) && !$this->checkExistsLabel()) {
            $sql = 'insert into label(label_name) values("' .addslashes($this->labelName). '")';
            $this->query($sql);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get label info from database by id
     * =====================================
     * @param int id
     **/
    public function getLabelInfoById($id) {
        $sql = 'select * from label where labelid='.$id;
        $this->query($sql);
        $data = $this->fetch();
        $this->labelName = $data["label_name"];
    }

    /**
     * Delete label in database
     * ===========================
     * @param int id
     **/
    public function delLabel($id) {
        $sql = 'delete from label where labelid='.$id;
        $this->query($sql);
    }

    /**
     * Edit label information in database
     * =====================================
     * @param int id
     * @return boolean
     **/
    public function editLabel($id) {
        if (!$this->checkExistsLabel()) {
            $sql = 'update label set label_name="' .addslashes($this->labelName). '" where labelid='.$id;
            $this->query($sql);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Count total label in database
     * ================================
     * @return int
     **/
    public function totalLabel() {
        $sql = 'select count(labelid) as total_label from label';
        $this->query($sql);
        $data = $this->fetch();
        return (int)$data["total_label"];
    }
}

?>
