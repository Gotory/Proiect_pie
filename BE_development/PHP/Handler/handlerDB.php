<?php
class handlerDB
{

    public static function logVisitor($adresaIP, $brower, $browerVersion, $os)
    {
        $conn = (new ConexiuneFactory())->getConexiuneObject();
        $stmt = $conn->prepare("INSERT INTO web_project_pie.ch_visitlog (CH_VISITLOG_IP,CH_VISITLOG_BROWSER,CH_VISITLOG_BROWSER_VER,CH_VISITLOG_OS) VALUES (:ip, :brower, :brower_version, :os)");
        $stmt->bindParam(':ip', $adresaIP, PDO::PARAM_STR);
        $stmt->bindParam(':brower', $brower, PDO::PARAM_STR);
        $stmt->bindParam(':brower_version', $browerVersion, PDO::PARAM_STR);
        $stmt->bindParam(':os', $os, PDO::PARAM_STR);
        $stmt->execute();
        //print "procedure returned $return_value\n";
    }
    public static function numberOfVisitorDay()
    {
        $conn = (new ConexiuneFactory())->getConexiuneObject();
        $stmt = $conn->prepare("SELECT COUNT(CH_VISITLOG_ID) FROM web_project_pie.ch_visitlog WHERE  DATE_FORMAT(CH_VISITLOG_DATE, \"%Y-%m-%d\") like (SELECT CURDATE());");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        return $result[0];
    }
    public static function checkPassword()
    {

    }
    public static function checkEmail($emailUser)
    {
        settype($exist,"boolean");
        $conn = (new ConexiuneFactory())->getConexiuneObject();
        $stmt = $conn->prepare("SELECT count(CH_USER_ID) FROM web_project_pie.ch_user WHERE ch_user_email = :email;");
        $stmt->bindParam(':email', $emailUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        if ($result[0] >= 1){
            $exist= true;
        }else{
            throw new Exception("Cont neinregistrat cu acest mail");
        }
       return $exist;
    }
    public static function getUserWithEmailAndPass($emailUser,$userPassInput)
    {
        $conn = (new ConexiuneFactory())->getConexiuneObject();
        $stmt = $conn->prepare("SELECT CH_USER_PASS FROM web_project_pie.ch_user WHERE ch_user_email = :email;");
        $stmt->bindParam(':email', $emailUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

            $userPassDB = $result[0];
            // The cost parameter can change over time as hardware improves
            $options = array('cost' => 11);
            // Verify stored hash against plain-text password
//            echo $userPassInput."<br>";
//            echo $userPassDB."<br>";
//            echo password_verify($userPassInput, $userPassDB)."<br>";
            if (password_verify($userPassInput, $userPassDB)){
                // Check if a newer hashing algorithm is available
                // or the cost has changed
                if (password_needs_rehash($userPassDB, PASSWORD_DEFAULT,$options)) {
                    // If so, create a new hash, and replace the old one
                }
            }else{
                throw new Exception("Parola incorecta");
            }
    }
    public static function getChatUser(){

    }
    public static function registerChatUser(){

    }
    public static function updateChatUser(){

    }


}


