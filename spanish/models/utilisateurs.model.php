<?php

class utilisateursModel
{
    private $email;
    private $name;
    private $password;
    private $isEmailConfirmed;
    private $token;
    private $image;

    //getters
    public function getimage()
    {
        return $this->image;
    }

    public function setimage($value)
    {
        $this->image = $value;

    }

    public static function email_non_confirmed_existe($email, $token)
    {
        include 'fyipanel/views/connect.php';
        $sql = $con->prepare("SELECT email FROM utilisateurs WHERE email='$email' AND token='$token' AND isEmailConfirmed=0");
        $sql->execute();
        $pass = $sql->fetchColumn();
        return $pass;
    }

    public static function get_nb_rss_source()
    {
        include 'fyipanel/views/connect.php';
        $sql = $con->prepare("SELECT count(*) FROM rss_sources ");
        $sql->execute();
        $pass = $sql->fetchColumn();
        return $pass;
    }

    public static function nb_sources_not_checked($email)
    {
        include 'fyipanel/views/connect.php';
        $sql = $con->prepare("SELECT count(*) FROM user_sources WHERE email='$email' ");
        $sql->execute();
        $pass = $sql->fetchColumn();
        return $pass;
    }

    public static function check_source($email, $id)
    {
        include 'fyipanel/views/connect.php';
        $sql = $con->prepare("SELECT email FROM user_sources WHERE email='$email' AND id='$id' ");
        $sql->execute();
        $pass = $sql->fetchColumn();
        return $pass;
    }

    public static function get_id_rss_source($country, $source, $type)
    {
        include 'fyipanel/views/connect.php';
        $sql = $con->prepare("SELECT id FROM rss_sources WHERE country='$country' AND source='$source' AND type='$type' ");
        $sql->execute();
        $pass = $sql->fetchColumn();
        return $pass;
    }

    /* setters 	*/

    public static function add_user_sources($email, $id)
    {
        include("fyipanel/views/connect.php");
        $con->exec('INSERT INTO user_sources VALUES ("' . $email . '","' . $id . '")');
    }

    public static function delete_user_sources($email, $id)
    {
        include("fyipanel/views/connect.php");
        $con->exec("DELETE FROM user_sources WHERE email='$email' AND id='$id' ");
    }

    public static function update_token_pass_user($email, $newpass)
    {
        //spanish
        include("fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');
        //en
        include("../fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');
        //ar
        include("../arabic/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');
        //tr
        include("../turkish/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');
        //chinese
        include("../chinese/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');
        //russian
        include("../russian/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');
        //french
        include("../french/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');

        include("../indian/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');

        include("../urdu/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');

        include("../hebrew/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');

        include("../german/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');

        include("../japanese/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '",isEmailConfirmed=1 WHERE email = "' . $email . '"');
    }

    public static function update_token_pass_whitout_conf_user($email, $newpass)
    {
        include("fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');
        //en
        include("../fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');
        //ar
        include("../arabic/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');
        //tr
        include("../turkish/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');
        //chinese
        include("../chinese/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');
        //russian
        include("../russian/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');
        //french
        include("../french/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');

        include("../indian/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');

        include("../urdu/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');

        include("../hebrew/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');

        include("../german/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');

        include("../japanese/fyipanel/views/connect.php");
        $con->exec('UPDATE users SET token="", Password="' . $newpass . '" WHERE email = "' . $email . '"');
    }

    public static function confirm_email($email)
    {
        //spanish
        include 'fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");
        $con->exec("INSERT INTO language_users SELECT * from utilisateurs WHERE email='" . $email . "'");
        //english
        include '../fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");
        //arabic
        include '../arabic/fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");
        //tr
        include '../turkish/fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");
        //chinese
        include '../chinese/fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");
        //russian
        include '../russian/fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");
        //french
        include '../french/fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");

        include '../indian/fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");

        include '../urdu/fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");

        include '../hebrew/fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");

        include '../german/fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");

        include '../japanese/fyipanel/views/connect.php';
        $con->exec("UPDATE utilisateurs SET isEmailConfirmed=1,token='' WHERE email='" . $email . "'");
    }

    public static function update_token($email, $token)
    {
        //spanish
        include("fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');
        //english
        include("../fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');
        //arabic
        include("../arabic/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');
        //tr
        include("../turkish/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');
        //chinese
        include("../chinese/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');
        //russian
        include("../russian/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');
        //french
        include("../french/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');

        include("../indian/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');

        include("../urdu/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');

        include("../hebrew/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');

        include("../german/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');

        include("../japanese/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  token="' . $token . '"   WHERE email = "' . $email . '"');
    }


    //v2check

    public static function update_token_pass($email, $newpass)
    {
        //sp
        include("fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');
        //en 
        include("../fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');
        //ar 
        include("../arabic/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');
        //tr 
        include("../turkish/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');
        //chinese 
        include("../chinese/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');
        //russian 
        include("../russian/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');
        //french 
        include("../french/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');

        include("../indian/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');

        include("../urdu/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');

        include("../hebrew/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');

        include("../german/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');

        include("../japanese/fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET token="", password="' . $newpass . '" WHERE email = "' . $email . '"');
    }

    public static function delete_user_And_His_comments($id_c)
    {
        $c = false;
        //es
        include("../views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }
        //ar
        include("../../../arabic/fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }

        //en
        include("../../../fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }
        //tr
        include("../../../turkish/fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }
        //chinese
        include("../../../chinese/fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }
        //russian
        include("../../../russian/fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }
        //french
        include("../../../french/fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }

        include("../../../indian/fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }

        include("../../../urdu/fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }

        include("../../../hebrew/fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }

        include("../../../german/fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }

        include("../../../japanese/fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT count(*) FROM utilisateurs  where email="' . $id_c . '"');
        $requete->execute();
        $nbr_user = $requete->fetchColumn();
        if ($nbr_user > 0) {
            $con->exec('DELETE FROM  utilisateurs  where email="' . $id_c . '"');
            $c = true;
        }


        return $c;
    }


    //v2

    public static function user_token_existe($email, $token)
    {
        include 'fyipanel/views/connect.php';
        $sql = $con->prepare("SELECT email FROM utilisateurs WHERE email='$email'
                   AND token='$token' AND  isEmailConfirmed=0");
        $sql->execute();
        $pass = $sql->fetchColumn();
        return $pass;
    }

    public static function getLink($at)
    {
        include 'fyipanel/views/connect.php';
        $requete = $con->prepare('select ' . $at . ' from links where id=1');
        $requete->execute();
        return $requete->fetchColumn();
    }

    public static function info($at)
    {
        include 'fyipanel/views/connect.php';
        $requete = $con->prepare('select ' . $at . ' from account where id=1');
        $requete->execute();
        return $requete->fetchColumn();
    }

    public static function info2($at)
    {
        include '../views/connect.php';
        $requete = $con->prepare('select ' . $at . ' from account where id=1');
        $requete->execute();
        return $requete->fetchColumn();
    }

    public static function type($word)
    {
        $source = "";
        if ($word == "News") $source = "Noticias";
        else if ($word == "Sports") $source = "Deportes";
        else if ($word == "Technology") $source = "Tecnología";
        else if ($word == "Arts") $source = "Artes";
        else if ($word == "General Culture" || $word == "Culture") $source = "Cultura general";
        return $source;
    }

    public static function getUserName($email)
    {
        include("fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT  name FROM utilisateurs where email="' . $email . '"');
        $requete->execute();
        $name = $requete->fetchColumn();
        return $name;
    }

    public static function get_source_status($source, $type)
    {
        include("fyipanel/views/connect.php");
        $requete = $con->prepare('SELECT  status FROM rss_sources where source="' . $source . '" and type="' . $type . '" ');
        $requete->execute();
        $name = $requete->fetchColumn();
        return $name;
    }

    public static function generateNewString()
    {
        $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
        $token = str_shuffle($token);
        $token = substr($token, 0, 10);
        return $token;
    }

    public static function generateNewpass()
    {
        $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
        $token = str_shuffle($token);
        $token = substr($token, 0, 10);
        return $token;
    }

    public static function email_exist($email)
    {
        include("fyipanel/views/connect.php");
        $requete = $con->prepare("SELECT count(*) FROM utilisateurs  where  email  = '" . $email . "' ");
        $requete->execute();
        $pass = $requete->fetchColumn();
        if ($pass > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function email_token_exist($email, $token)
    {
        include("fyipanel/views/connect.php");
        $requete = $con->prepare("SELECT count(*) FROM utilisateurs  where  email  = '" . $email . "' AND token='" . $token . "'");
        $requete->execute();
        $pass = $requete->fetchColumn();
        if ($pass > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function acount_is_confirmed($email)
    {
        include("fyipanel/views/connect.php");
        $requete = $con->prepare("SELECT count(*) FROM utilisateurs  where isEmailConfirmed=1 and email  = '" . $email . "' ");
        $requete->execute();
        $pass = $requete->fetchColumn();
        if ($pass > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function acount_is_non_confirmed($email)
    {
        include("fyipanel/views/connect.php");
        $requete = $con->prepare("SELECT count(*) FROM utilisateurs  where isEmailConfirmed=0 and email  = '" . $email . "' ");
        $requete->execute();
        $pass = $requete->fetchColumn();
        if ($pass > 0) {
            return true;
        } else {
            return false;
        }
    }

    //active_status

    public static function islogged()
    {
        $c = false;
        include("fyipanel/views/connect.php");
        if (isset($_COOKIE['fyiuser_email']) && isset($_COOKIE['fyiuser_pass'])
            && !empty($_COOKIE['fyiuser_pass']) && !empty($_COOKIE['fyiuser_email'])) {
            $requete = $con->prepare('SELECT count(*) FROM utilisateurs where email="' . $_COOKIE['fyiuser_email'] . '" and password="' . $_COOKIE['fyiuser_pass'] . '"');
            $requete->execute();
            $nb = $requete->fetchColumn();
            if ($nb > 0) {
                $c = true;
            }
        }


        if (isset($_SESSION['user_auth']['user_email']) && isset($_SESSION['user_auth']['user_pass'])
            && !empty($_SESSION['user_auth']['user_pass']) && !empty($_SESSION['user_auth']['user_email'])) {
            $requete = $con->prepare('SELECT count(*) FROM utilisateurs where email="' . $_SESSION['user_auth']['user_email'] . '" and password="' . $_SESSION['user_auth']['user_pass'] . '"');
            $requete->execute();
            $nb = $requete->fetchColumn();
            if ($nb > 0) {
                $c = true;
            }
        }

        return $c;
    }

    //delete employee

    public static function find_search($searchq)
    {
        include("fyipanel/views/connect.php");
        $tab = array();
        $query = $con->query(" select * from  news_published where title LIKE '%$searchq%' OR description LIKE '%$searchq%' OR pubDate LIKE '%$searchq%' ");
        while ($data = $query->fetch()) {
            $tab[] = $data;
        }
        return $tab;
    }

    public function getname()
    {
        return $this->name;
    }

    public function setname($value)
    {
        $this->name = $value;
    }

    public function getisEmailConfirmed()
    {
        return $this->isEmailConfirmed;
    }

    public function setisEmailConfirmed($value)
    {
        $this->isEmailConfirmed = $value;
    }

    // all users

    public function gettoken()
    {
        return $this->token;
    }

    public function settoken($value)
    {
        $this->token = $value;
    }

    public function get_countries()
    {
        include("fyipanel/views/connect.php");
        $tab = array();
        $query = $con->query('select  distinct country from rss_sources ');
        while ($data = $query->fetch()) {
            $tab[] = $data;
        }
        return $tab;
    }

    //update pass

    public function get_sources_of_country($country)
    {
        include("fyipanel/views/connect.php");
        $tab = array();
        $query = $con->query('select  distinct source from rss_sources where country = "' . $country . '"');
        while ($data = $query->fetch()) {
            $tab[] = $data;
        }
        return $tab;
    }


    // user exist or not

    public function get_types_of_country_and_source($country, $source)
    {
        include("fyipanel/views/connect.php");
        $tab = array();
        $query = $con->query('select * from rss_sources WHERE country= "' . $country . '"
             AND source="' . $source . '"');
        while ($data = $query->fetch()) {
            $tab[] = $data;
        }
        return $tab;
    }

    // user exist or not

    public function add_utilisateur($pass)
    {
        // spanish
        include("fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');
        //english
        include("../fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');
        //arabic
        include("../arabic/fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');
        //tr
        include("../turkish/fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');
        //chinese
        include("../chinese/fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');
        //russian
        include("../russian/fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');
        //french
        include("../french/fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');

        include("../indian/fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');

        include("../urdu/fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');

        include("../hebrew/fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');

        include("../german/fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');

        include("../japanese/fyipanel/views/connect.php");
        $con->exec('INSERT INTO utilisateurs VALUES (null, "' . $this->email . '","' . $this->name . '","' .
            $pass . '",0,' . $this->isEmailConfirmed . ',"' . $this->token . '", "", "")');
    }

    // user exist or not

    public function active_status($email)
    {
        //es
        include('fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');
        //ar
        include('../arabic/fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');
        //en
        include('../fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');
        //tr
        include('../turkish/fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');
        //chinese
        include('../chinese/fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');
        //russian
        include('../russian/fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');
        //french
        include('../french/fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');

        include('../indian/fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');

        include('../urdu/fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');

        include('../hebrew/fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');

        include('../german/fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');

        include('../japanese/fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=1 where email="' . $email . '"');

    }


    //disactive_status

    public function utilisateurs()
    {
        include("../views/connect.php");
        $tab = array();
        $query = $con->query('select * from utilisateurs');
        while ($data = $query->fetch()) {
            $tab[] = $data;
        }
        return $tab;
    }

    // total males

    public function update_user($email)
    {
        include("fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET  name="' . $this->name . '",password="' . $this->password . '"  WHERE email = "' . $email . '"');
    }

    public function update_pass($email, $newpass)
    {
        include("fyipanel/views/connect.php");
        $con->exec('UPDATE utilisateurs SET password="' . $newpass . '" WHERE email = "' . $email . '"');
    }

    public function userexist($email)
    {
        include("fyipanel/views/connect.php");
        $sql = 'select * from utilisateurs where email="' . $email . '"';
        $query = $con->query($sql);
        if ($data = $query->fetch()) {
            $this->email = $data['email'];
            $this->name = $data['name'];
            $this->password = $data['password'];
            if ($this->getemail() != null) {
                return $this;
            } else {
                return null;
            }
        }
    }

    public function getemail()
    {
        return $this->email;
    }

    public function setemail($value)
    {
        $this->email = $value;

    }

    public function Function_userexist($email, $pass)
    {
        include('fyipanel/views/connect.php');
        $sql = 'select * from utilisateurs where email="' . $email . '" and password="' . $pass . '"';
        $query = $con->query($sql);
        if ($data = $query->fetch()) {
            $this->email = $data['email'];
            $this->name = $data['name'];
            $this->password = $data['password'];
            if ($this->getemail() != null && $this->getpassword() != null) {
                return $this;
            } else {
                return null;
            }
        }
    }

    // currentpass

    public function getpassword()
    {
        return $this->password;
    }

    public function setpassword($value)
    {
        $this->password = $value;
    }

    public function Function_userexist2($email)
    {
        include('fyipanel/views/connect.php');
        $sql = 'select * from utilisateurs where email="' . $email . '"';
        $query = $con->query($sql);
        if ($data = $query->fetch()) {
            $this->email = $data['email'];
            $this->name = $data['name'];
            $this->password = $data['password'];
            if ($this->getemail() != null && $this->getpassword() != null) {
                return $this;
            } else {
                return null;
            }
        }
    }

    //islogged

    public function disactive_status($email)
    {
        include('fyipanel/views/connect.php');
        $con->exec('update utilisateurs  set status=0 where email="' . $email . '"');
    }

    public function get_current_pass($email)
    {
        include("fyipanel/views/connect.php");
        $requete = $con->prepare("SELECT password FROM utilisateurs  where email  = '" . $email . "'");
        $requete->execute();
        $pass = $requete->fetchColumn();
        return $pass;
    }

    public static function get_user_by_email($email)
    {
        include("fyipanel/views/connect.php");
        $stmt = $con->prepare("select * from utilisateurs where email = '$email'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function get_source_row($source)
    {
        include("fyipanel/views/connect.php");
        $stmt = $con->prepare("select * from rss_sources where source = '$source'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function get_source_twitter($source)
    {
        include("fyipanel/views/connect.php");
        $stmt = $con->prepare("select * from rss_sources where source = '$source' and twitter != ''");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}

?>
		
		
		