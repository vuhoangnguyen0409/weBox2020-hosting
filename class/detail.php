<?php

/**
 * Class for working with detail item on site
 *
 * @author NguyeN
 *
 */

class Detail extends Database {
    protected $detailName;
    protected $detailIntro;
    protected $detailKeywords;
    protected $detailDescription;
    protected $detailFeature;
    protected $detailImg;
    protected $detailContent;
    protected $detailDate;
    protected $detailStatus;
    protected $detailCate;
	protected $detailPoster;
    protected $detailLabel;
    protected $labelArray;

    /**
     * Set name for a detail item
     * =========================
     * @param string detailName
     **/
    public function setDetailName($detailName) {
        if (!empty($detailName)) {
            $this->detailName = trim($detailName);
            $this->detailName = strip_tags($detailName);
        }
    }

    /**
     * Get name of a detail item
     * ========================
     * @return string
     **/
    public function getDetailName() {
        return $this->detailName;
    }

    /**
     * Set intro for a detail item
     * =========================
     * @param string detailInto
     **/
    public function setDetailIntro($detailIntro) {
        if (!empty($detailIntro)) {
            $this->detailIntro = trim($detailIntro);
            $this->detailIntro = strip_tags($detailIntro);
        }
    }

    /**
     * Get intro of a detail item
     * ========================
     * @return string
     **/
    public function getDetailIntro() {
        return $this->detailIntro;
    }

    /**
     * Set SEO keywords for a detail item
     * =========================
     * @param string detailKeywords
     **/
    public function setDetailKeywords($detailKeywords) {
        if (!empty($detailKeywords)) {
            $this->detailKeywords = trim($detailKeywords);
            $this->detailKeywords = strip_tags($detailKeywords);
        }
    }

    /**
     * Get SEO Keywords of a detail item
     * ========================
     * @return string
     **/
    public function getDetailKeywords() {
        return $this->detailKeywords;
    }

    /**
     * Set SEO description for a detail item
     * =========================
     * @param string detailDescription
     **/
    public function setDetailDescription($detailDescription) {
        if (!empty($detailDescription)) {
            $this->detailDescription = trim($detailDescription);
            $this->detailDescription = strip_tags($detailDescription);
        }
    }

    /**
     * Get SEO description of a detail item
     * ========================
     * @return string
     **/
    public function getDetailDescription() {
        return $this->detailDescription;
    }

    /**
     * Set detail img for a detail item
     * ===============================
     * @param string detailFeature
     **/
    public function setDetailFeature($detailFeature) {
        if (!empty($detailFeature)) {
            if (function_exists('stripUni') && function_exists('fixUploadname')) {
                $this->detailFeature = stripUni(fixUploadname($detailFeature));
            } else {
                $this->detailFeature = $detailFeature;
            }
        }
    }

    /**
     * Get detail Feature of a detail item
     * ==============================
     * @return string
     **/
    public function getDetailFeature() {
        return $this->detailFeature;
    }

    /**
     * Set detail img for a detail item
     * ===============================
     * @param string detailImg
     **/
    public function setDetailImg($detailImg) {
        if (!empty($detailImg)) {
            if (function_exists('stripUni') && function_exists('fixUploadname')) {
                $this->detailImg = stripUni(fixUploadname($detailImg));
            } else {
                $this->detailImg = $detailImg;
            }
        }
    }

    /**
     * Get detail images of a detail item
     * ==============================
     * @return string
     **/
    public function getDetailImg() {
        return $this->detailImg;
    }

    /**
     * Set detail content for a detail item
     * ================================
     * @param string detailContent
     **/
    public function setDetailContent($detailContent) {
        if (!empty($detailContent)) {
            $this->detailContent = trim($detailContent);
        }
    }

    /**
     * Get detail content of a detail item
     * ===============================
     * @return string
     **/
    public function getDetailContent() {
        return $this->detailContent;
    }

    /**
     * Set date of post for a detail item
     * ================================
     * @param int detailDate
     **/
    public function setDetailDate($detailDate) {
        if (!empty($detailDate)) {
            $this->detailDate = (int)$detailDate;
        }
    }

    /**
     * Get date of poster of a detail item
     * =================================
     * @return int
     **/
    public function getDetailDate() {
        return $this->detailDate;
    }

    /**
     * Set status for a detail item
     * ==========================
     * @param string detailStatus
     **/
    public function setDetailStatus($detailStatus) {
        if (!empty($detailStatus)) {
            $this->detailStatus = trim($detailStatus);
        }
    }

    /**
     * Get status of a detail item
     * =========================
     * @return string
     **/
    public function getDetailStatus() {
        return $this->detailStatus;
    }

    /**
     * Set category id for a detail item
     * ===============================
     * @param int detailCate
     **/
    public function setDetailCate($detailCate) {
        if (!empty($detailCate)) {
            $this->detailCate = (int)$detailCate;
        }
    }

    /**
     * Get category id of a detail item
     * ==============================
     * @return int
     **/
    public function getDetailCate() {
        return $this->detailCate;
    }

    /**
     * Set poster id for a detail item
     * =============================
     * @param int detailPoster
     **/
    public function setDetailPoster($detailPoster) {
        if (!empty($detailPoster)) {
            $this->detailPoster = (int)$detailPoster;
        }
    }

    /**
     * Get poster id of a detail item
     * ============================
     * @return string
     **/
    public function getDetailPoster() {
        return $this->detailPoster;
    }

    /**
     * Set label id for a detail item
     * =============================
     * @param string detailLabel
     **/
    public function setDetailLabel($detailLabel) {
        if (!empty($detailLabel)) {
            $this->detailLabel = $detailLabel;
        }
    }

    /**
     * Get label id of a detail item
     * ============================
     * @return string
     **/
    public function getDetailLabel() {
        return $this->detailLabel;
    }

    /**
     * Set Label Array for a detail item
     * =========================
     * @param string labelArray
     **/
    public function setLabelArray($labelArray) {
        if (!empty($labelArray)) {
            $this->labelArray = trim($labelArray);
            $this->labelArray = strip_tags($labelArray);
        }
    }

    /**
     * Get Label Array of a detail item
     * ========================
     * @return string
     **/
    public function getLabelArray() {
        return $this->labelArray;
    }

    /**
     * Count total detail in database
     * ============================
     * @return int
     **/
    public function totalDetail() {
        $sql = 'select count(detailid) as total_detail from detail';
        $this->query($sql);
        $data = $this->fetch();
        return (int)$data["total_detail"];
    }

    /**
     * List all detail item on site
     * ==========================
     * @return array
     **/
    public function listAllDetail($limit=null) {
        //$sql = 'select detailid, detail_name, detail_intro, status, detail_date, username, cate_name, label_name from detail left join category on detail.cateid=category.cateid left join user on detail.userid=user.userid left join label on detail.labelid=label.labelid order by detailid DESC';
        //$sql = 'select detailid, detail_name, detail_intro, status, detail_date, username, cate_name, label_name from detail left join user on detail.userid=user.userid left join category on detail.cateid=category.cateid left join label on detail.labelid=label.labelid order by detailid DESC';
        $sql = 'select detailid, detail_name, detail_intro, status, detail_date, label_array, username, cate_name from detail left join user on detail.userid=user.userid left join category on detail.cateid=category.cateid order by detailid DESC';
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
     * Check accept upload detail images
     * ===============================
     * @param string fileName
     **/
    static public function acceptUpload($fileName) {
        global $accept_upload_ext;
        // Kiểm tra xem hàm lấy phần mở rộng của tập tin đã có chưa
        if (function_exists('getExt')) {
            if (!in_array(getExt($fileName), $accept_upload_ext)) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
    * Upload an images to site through form
    * =====================================
    * @param string formElementName
    **/
    public function uploadFeatureImg($formElementName) {
        if ($_FILES[$formElementName]["error"] != 0 || empty($this->detailFeature)) {
            return false;
        } else {
            move_uploaded_file($_FILES[$formElementName]["tmp_name"], '../data/detail_img/'.$this->detailFeature);
            return true;
        }
    }

    public function uploadDetailImg($formElementName) {
        if ($_FILES[$formElementName]["error"] != 0 || empty($this->detailImg)) {
            return false;
        } else {
            move_uploaded_file($_FILES[$formElementName]["tmp_name"], '../data/detail_img/'.$this->detailImg);
            return true;
        }
    }

    /**
     * Insert detail item information into DBMS
     * ======================================
     **/
    public function addDetail() {
        global $siteURL;
        $name = addslashes($this->detailName);
        $intro = addslashes($this->detailIntro);
        $keywords = addslashes($this->detailKeywords);
        $description = addslashes($this->detailDescription);
        $content = addslashes(str_replace($siteURL, '{$siteURL}', $this->detailContent));
        //$sql = 'insert into detail(detail_name, detail_intro, SEO_keywords, SEO_description, detail_img, detail_content, detail_date, status, userid, cateid, labelid) values("' .$name. '", "' .$intro. '", "' .$keywords. '", "' .$description. '", "' .$this->detailImg. '", "' .$content. '", ' .$this->detailDate. ', "' .$this->detailStatus. '", ' .$this->detailPoster. ', 2, 1)';
        //$sql = 'insert into detail(detail_name, detail_intro, SEO_keywords, SEO_description, detail_feature, detail_img, detail_content, detail_date, status, userid, cateid, labelid, label_array) values("' .$name. '", "' .$intro. '", "' .$keywords. '", "' .$description. '", "' .$this->detailFeature. '", "' .$this->detailImg. '", "' .$content. '", ' .$this->detailDate. ', "' .$this->detailStatus. '", ' .$this->detailPoster. ', ' .$this->detailCate. ',  ' .$this->detailLabel.', "' .$name. '")';
        $sql = 'insert into detail(detail_name, detail_intro, SEO_keywords, SEO_description, detail_feature, detail_img, detail_content, detail_date, status, userid, cateid, label_array) values("' .$name. '", "' .$intro. '", "' .$keywords. '", "' .$description. '", "' .$this->detailFeature. '", "' .$this->detailImg. '", "' .$content. '", ' .$this->detailDate. ', "' .$this->detailStatus. '", ' .$this->detailPoster. ', ' .$this->detailCate. ', "' .$this->labelArray. '")';
        $this->query($sql);
    }

    /**
     * Get detail item from database by id
     * ======================================
     * @param int id
     **/
    public function getDetailInfoById($id) {
        $sql = 'select * from detail where detailid='.$id;
        $this->query($sql);
        $data = $this->fetch();
        $this->detailName = $data["detail_name"];
        $this->detailIntro = $data["detail_intro"];
        $this->detailKeywords = $data["SEO_keywords"];
        $this->detailDescription = $data["SEO_description"];
        $this->detailFeature = $data["detail_feature"];
        $this->detailImg = $data["detail_img"];
        $this->detailContent = $data["detail_content"];
        $this->detailDate = $data["detail_date"];
        $this->detailStatus = $data["status"];
        $this->detailPoster = $data["userid"];
        $this->detailCate = $data["cateid"];
        $this->detailLabel = $data["labelid"];
        $this->labelArray = $data["label_array"];
    }

    /**
     * Delete detail image of a detail item
     * ================================
     **/
    public function delDetailImage() {
        if (file_exists('../data/detail_img/'.$this->detailImg)) {
            unlink('../data/detail_img/'.$this->detailImg);
        }
    }

    /**
     * Delete detail item in database
     * ============================
     * @param int id
     **/
    public function delDetail($id) {
        $sql = 'delete from detail where detailid='.$id;
        $this->query($sql);
        $this->delDetailImage();
    }

    /**
     * Edit detail item information in database
     * ======================================
     * @param int id
     **/
    public function editDetail($id) {
        global $siteURL;
        $name = addslashes($this->detailName);
        $intro = addslashes($this->detailIntro);
        $keywords = addslashes($this->detailKeywords);
        $descritption = addslashes($this->detailDescription);
        $content = addslashes(str_replace($siteURL, '{$siteURL}', $this->detailContent));
        //$sql = 'update detail set detail_name="' .$name. '", detail_intro="' .$intro. '", SEO_keywords="' .$keywords. '", SEO_description="' .$descritption. '", detail_img="' .$this->detailImg. '", detail_content="' .$content. '", status="' .$this->detailStatus. '", cateid=' .$this->detailCate. ', labelid=' .$this->detaillabel. ' where detailid='.$id;
        //$sql = 'update detail set detail_name="' .$name. '", detail_intro="' .$intro. '", SEO_keywords="' .$keywords. '", SEO_description="' .$descritption. '", detail_feature="' .$this->detailFeature. '", detail_img="' .$this->detailImg. '", detail_content="' .$content. '", status="' .$this->detailStatus. '" , cateid=' .$this->detailCate. ', labelid=' .$this->detailLabel. ' where detailid='.$id;
        $sql = 'update detail set detail_name="' .$name. '", detail_intro="' .$intro. '", SEO_keywords="' .$keywords. '", SEO_description="' .$descritption. '", detail_feature="' .$this->detailFeature. '", detail_img="' .$this->detailImg. '", detail_content="' .$content. '", status="' .$this->detailStatus. '" , cateid=' .$this->detailCate. ', label_array="' .$this->labelArray. '"   where detailid='.$id;
        $this->query($sql);
    }

}

?>
