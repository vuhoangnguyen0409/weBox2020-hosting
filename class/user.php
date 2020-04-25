<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

class User extends Database {
    protected $username;
    protected $password;
    protected $level;
    protected $email;
    protected $tel;
    protected $birthday;
    protected $address;
    protected $gender;
    protected $avatar;

    public function __construct($username=null, $password=null, $level=null, $gender=null, $email=null, $tel=null, $birthday=null, $address=null, $avatar=null) {
        parent::__construct();
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setLevel($level);
        $this->setGender($level);
        $this->setEmail($email);
        $this->setTel($tel);
        $this->setBirthday($birthday);
        $this->setAddress($address);
        $this->setAvatar($avatar);
    }

    public function setUsername($username) {
        if (!empty($username)) {
            $this->username = $username;
        }
    }

    public function getUsername() {
        return $this->username;
    }

    public function setPassword($password) {
        if (!empty($password)) {
            $this->password = md5($password);
        }
    }

    public function getPassword() {
        return $this->password;
    }

    public function setLevel($level) {
        if (!empty($level)) {
            $this->level = (int)$level;
        }
    }

    public function getLevel() {
        return $this->level;
    }

    public function setGender($gender) {
        if (!empty($gender)) {
            $this->gender = (int)$gender;
        }
    }

    public function getGender() {
        return $this->gender;
    }

    public function setEmail($email) {
        if (!empty($email)) {
            $this->email = $email;
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function setTel($tel) {
        if (!empty($tel)) {
            $this->tel = $tel;
        }
    }

    public function getTel() {
        return $this->tel;
    }

    public function setBirthday($birthday) {
        if (!empty($birthday)) {
            $this->birthday = $birthday;
        }
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function setAddress($address) {
        if (!empty($address)) {
            $this->address = $address;
        }
    }

    public function getAddress() {
        return $this->address;
    }

    /**
     * Set Avatar for a user
     * ===============================
     * @param string avatar
     **/
    public function setAvatar($avatar) {
        if (!empty($avatar)) {
            if (function_exists('stripUni') && function_exists('fixUploadname')) {
                $this->avatar = stripUni(fixUploadname($avatar));
            } else {
                $this->avatar = $avatar;
            }
        }
    }

    /**
     * Get Avatar of a user item
     * ==============================
     * @return string
     **/
    public function getAvatar() {
        return $this->avatar;
    }

    public function checkLogin() {
        global $prefix;
        $sql = 'select * from user where tel="'.$this->tel.'" and password="' .$this->password. '"';
        $this->query($sql);
        if ($this->numrows() == 0) {
            return false;
        } else {
            $data = $this->fetch();
            $_SESSION[$prefix."username"] = $data["username"];
            $_SESSION[$prefix."tel"] = $data["tel"];
            $_SESSION[$prefix."level"] = $data["level"];
            $_SESSION[$prefix."userid"] = $data["userid"];
            return true;
        }
    }

    static public function isLogined() {
        global $prefix;
        if (!isset($_SESSION[$prefix."level"])) {
            return false;
        } else {
            return true;
        }
    }

    static public function isAdmin() {
        global $prefix, $siteURL;
        if (!self::isLogined() || $_SESSION[$prefix."level"] != 1) {
            return false;
        } else {
            // Nếu đã đănng nhập đúng admin, cho phép sử dụng KCFinder
            $_SESSION['KCFINDER'] = array(
                'disabled' => false,
                'uploadURL' => $siteURL.'data', // Không có dấu / cuối cùng
                'uploadDir' => ""
            );
            return true;
        }
    }

    public function listAllUser($limit=null) {
        $sql = 'select * from user order by userid DESC';
        if (!empty($limit)) {
            $sql .= ' '.$limit;
        }
        $this->query($sql);
        $data = array();
        while ($row = $this->fetch()) {
            $data[] = $row;
        }
        return $data;
    }

    public function existsUser() {
        $sql = 'select userid from user where tel="' .$this->tel. '"';
        $this->query($sql);
        if ($this->numrows() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function existsEmail() {
        $sql = 'select userid from user where email="' .$this->email. '"';
        $this->query($sql);
        if ($this->numrows() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function addUser() {
            //$sql = 'insert into user(username, password, level, gender, email, tel, birthday, address) values("' .$this->username. '", "' .$this->password. '", ' .$this->level. ', ' .$this->gender. ', "' .$this->email. '", "' .$this->tel. '", "' .$this->birthday. '", "' .$this->address. '")';
            $sql = 'insert into user(username, password, level, gender, email, tel, birthday, address, avatar) values("' .$this->username. '", "' .$this->password. '", ' .$this->level. ', ' .$this->gender. ', "' .$this->email. '", "' .$this->tel. '", "' .$this->birthday. '", "' .$this->address. '", "' .$this->avatar. '")';
            $this->query($sql);
    }

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

    public function uploadAvatar($formElementName) {
        if ($_FILES[$formElementName]["error"] != 0 || empty($this->avatar)) {
            return false;
        } else {
            move_uploaded_file($_FILES[$formElementName]["tmp_name"], '../data/user_img/'.$this->avatar);
            return true;
        }
    }

    public function getUserInfoById($id) {
        $sql = 'select * from user where userid='.$id;
        $this->query($sql);
        $data = $this->fetch();
        $this->username = $data["username"];
        $this->password = $data["password"];
        $this->level = $data["level"];
        $this->gender = $data["gender"];
        $this->email = $data["email"];
        $this->tel = $data["tel"];
        $this->birthday = $data["birthday"];
        $this->address = $data["address"];
        $this->avatar = $data["avatar"];
    }

    public function checkDelPermission($id) {
        global $prefix;
        $this->getUserInfoById($id);
        /** Kiểm tra quyền xóa. Có 2 trường hợp cấm xóa
         * 1. Xóa super admin (có khóa chính là 1)
         * 2. Đăng nhập không phải là super admin mà xóa admin
         **/
        if (($id == 1) || ($_SESSION[$prefix."userid"] != 1 && $this->level == 1)) {
            return false;
        } else {
            return true;
        }
    }

    public function editMyself($id) {
        global $prefix;
        if ($_SESSION[$prefix."userid"] == $id) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEditPermission($id) {
        global $prefix;
        $this->getUserInfoById($id);
        if ($_SESSION[$prefix."userid"] != 1 && $this->level == 1 && !$this->editMyself($id)) {
            return false;
        } else {
            return true;
        }
    }

    public function delUser($id) {
        if ($this->checkDelPermission($id)) {
            $sql = 'delete from user where userid='.$id;
            $this->query($sql);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete detail image of a detail item
     * ================================
     **/
    public function delAvatar() {
        if (file_exists('../data/user_img/'.$this->avatar)) {
            unlink('../data/user_img/'.$this->avatar);
        }
    }

    public function editUser($id) {
        $sql = 'update user set password="' .$this->password. '", level=' .$this->level. ', gender=' .$this->gender. ', email="' .$this->email. '", tel="' .$this->tel. '", birthday="' .$this->birthday. '", address="' .$this->address. '", avatar="' .$this->avatar. '"  where userid='.$id;
        $this->query($sql);
    }

    public function totalUser() {
        $sql = 'select count(userid) as total_user from user';
        $this->query($sql);
        $data = $this->fetch();
        return $data["total_user"];
    }
}

?>
