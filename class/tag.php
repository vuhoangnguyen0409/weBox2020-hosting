<?php

/**
 * Class for working with tag on site
 *
 * @author Jackie Do
 * @copyright 2014
 * @version 1.0
 */

class Tag extends Database {
    protected $tagName;

    /**
     * Set name for a Tag
     * =======================
     * @param string tagName
     **/
    public function __construct($tagName=null) {
        parent::__construct();
        $this->setTagName($tagName);
    }

    /**
     * Set name for a tag
     * =======================
     * @param string tagName
     **/
    public function setTagName($tagName) {
        if (!empty($tagName)) {
            $this->tagName = trim($tagName);
            $this->tagName = strip_tags($tagName);
        }
    }

    /**
     * Get name of an tag
     * =======================
     * @return string
     **/
    public function getTagName() {
        return $this->tagName;
    }

    /**
     * List all tag on site
     * =========================
     * @return array
     **/
    public function listAllTag($limit=null) {
        $sql = 'select tag.tagid, tag_name, count(detailid) as total_detail from tag left join detail on tag.tagid=detail.tagid group by tag_name order by tag.tagid DESC';
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
     * Check if exists Tag in database
     * ====================================
     * @return boolean
     **/
    public function checkExistsTag() {
        $sql = 'select * from tag where tag_name="' .addslashes($this->tagName). '"';
        $this->query($sql);
        if ($this->numrows() == 0) {
            return false;
        }
        return true;
    }

    /**
     * Insert tag information into DBMS
     * =====================================
     * @return boolean
     **/
    public function addTag() {
        if (!is_null($this->tagName) && !$this->checkExistsTag()) {
            $sql = 'insert into tag(tag_name) values("' .addslashes($this->tagName). '")';
            $this->query($sql);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get tag info from database by id
     * =====================================
     * @param int id
     **/
    public function getTagInfoById($id) {
        $sql = 'select * from tag where tagid='.$id;
        $this->query($sql);
        $data = $this->fetch();
        $this->tagName = $data["tag_name"];
    }

    /**
     * Delete tag in database
     * ===========================
     * @param int id
     **/
    public function delTag($id) {
        $sql = 'delete from tag where tagid='.$id;
        $this->query($sql);
    }

    /**
     * Edit tag information in database
     * =====================================
     * @param int id
     * @return boolean
     **/
    public function editTag($id) {
        if (!$this->checkExistsTag()) {
            $sql = 'update tag set tag_name="' .addslashes($this->tagName). '" where tagid='.$id;
            $this->query($sql);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Count total tag in database
     * ================================
     * @return int
     **/
    public function totalTag() {
        $sql = 'select count(tagid) as total_tag from tag';
        $this->query($sql);
        $data = $this->fetch();
        return (int)$data["total_tag"];
    }
}

?>
