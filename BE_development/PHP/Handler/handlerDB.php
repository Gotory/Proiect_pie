<?php
class handlerDB
{

    public static function logVisitor($adresaIP, $brower, $browerVersion, $os)
    {
        $conn = ConexiuneFactory::getConexiuneObject();
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
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT COUNT(CH_VISITLOG_ID) FROM web_project_pie.ch_visitlog WHERE  DATE_FORMAT(CH_VISITLOG_DATE, \"%Y-%m-%d\") like (SELECT CURDATE());");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        return $result[0];
    }
    public static function checkEmail($emailUser)
    {
        settype($exist,"boolean");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT * FROM web_project_pie.ch_user WHERE ch_user_email = :email;");
        $stmt->bindParam(':email', $emailUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            $exist= true;
            $log4Debug = Log4DebugFactory::getLog4DebugObject();
            $log4Debug->debug_StringValue("Check made with E-mail for: ",$emailUser);
        }else{
            throw new Exception("Cont neinregistrat cu acest mail");
        }
       return $exist;
    }
    public static function checkExistEmail($emailUser)
    {
        settype($exist,"boolean");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT * FROM web_project_pie.ch_user WHERE ch_user_email = :email;");
        $stmt->bindParam(':email', $emailUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            $exist= true;
            $log4Debug = Log4DebugFactory::getLog4DebugObject();
            $log4Debug->debug_StringValue("Check made with E-mail for: ",$emailUser);
        }else{
            $exist = false;
        }
        return $exist;
    }
    public static function checkNickname($nickNameUser)
    {
        settype($exist,"boolean");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT * FROM web_project_pie.ch_profile WHERE ch_prf_nickname = :nickname;");
        $stmt->bindParam(':nickname', $nickNameUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            $exist = true;
            $log4Debug = Log4DebugFactory::getLog4DebugObject();
            $log4Debug->debug_StringValue("Check made with Nickname for: ",$nickNameUser);
        }else{
            throw new Exception("Cont neinregistrat cu acest nickname");
        }
        return $exist;
    }
    public static function checkExistNickname($nickNameUser)
    {
        settype($exist,"boolean");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT * FROM web_project_pie.ch_profile WHERE ch_prf_nickname = :nickname;");
        $stmt->bindParam(':nickname', $nickNameUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            $exist = true;
            $log4Debug = Log4DebugFactory::getLog4DebugObject();
            $log4Debug->debug_StringValue("Check made with Nickname for: ",$nickNameUser);
        }else{
            $exist = false;
        }
        return $exist;
    }
    public static function checkExistUserNicknameAndPass($nickNameUser, $userPassInput)
    {
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        settype($exist,"boolean");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT CH_USER_PASS FROM  web_project_pie.ch_user, web_project_pie.ch_profile WHERE CH_USER_ID=CH_PRF_ID AND CH_PRF_NICKNAME=:nickname;");
        $stmt->bindParam(':nickname', $nickNameUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        $userPassDB = $result[0];
        $options = array('cost' => 11);                                                // The cost parameter can change over time as hardware improves
        if (password_verify($userPassInput, $userPassDB)){                             // Verify stored hash against plain-text password
            if (password_needs_rehash($userPassDB, PASSWORD_DEFAULT,$options)) { // Check if a newer hashing algorithm is available or the cost has changed
                // If so, create a new hash, and replace the old one
            }
        }else{
            $exist = false;
        }
        $log4Debug->debug_StringValue("Check made with nickname and pass 1/0 : ",$exist);
        return $exist;
    }
    public static function checkExistUserEmailAndPass($emailUser, $userPassInput)
    {
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        settype($exist,"boolean");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT CH_USER_PASS FROM web_project_pie.ch_user WHERE ch_user_email = :email;");
        $stmt->bindParam(':email', $emailUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
            $userPassDB = $result[0];
            $options = array('cost' => 11);                                                // The cost parameter can change over time as hardware improves
            if (password_verify($userPassInput, $userPassDB)){                             // Verify stored hash against plain-text password
                if (password_needs_rehash($userPassDB, PASSWORD_DEFAULT,$options)) { // Check if a newer hashing algorithm is available or the cost has changed
                    // If so, create a new hash, and replace the old one
                }
            }else{
                $exist = false;
            }
             $log4Debug->debug_StringValue("Check made with nickname and pass 1/0 : ",$exist);
            return $exist;
    }
    public static function registerChatUser($nume,$prenume,$sex,$email,$parola,$ip,$username){

        try{
            $conn = ConexiuneFactory::getConexiuneObject();
            $stmt = $conn->prepare("INSERT INTO web_project_pie.ch_user(CH_USER_NAME,CH_USER_SURNAME,CH_USER_SEX,CH_USER_EMAIL,CH_USER_PASS,CH_USER_IP)VALUES(:nume, :prenume, :sex, :email, :pass, :ip);");
            $stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
            $stmt->bindParam(':prenume', $prenume, PDO::PARAM_STR);
            $stmt->bindParam(':sex', $sex, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':pass', $parola, PDO::PARAM_STR);
            $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
            $stmt->execute();
            $last_id = $conn->lastInsertId();
            $log4Debug = Log4DebugFactory::getLog4DebugObject();
            $log4Debug->debug_StringValue("Id-ul contului creat: ",$last_id);
            handlerDB::createProfileUser($last_id,$username);
        }catch(Exception $e){
            throw new Exception("Nu sa putut realiza inregistrarea");
        }



    }
    public static function createProfileUser($id,$username){
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("INSERT INTO web_project_pie.ch_profile(CH_PRF_ID,CH_PRF_NICKNAME)VALUES(:id, :nickname);");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':nickname', $username, PDO::PARAM_STR);
        $stmt->execute();
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $log4Debug->debug_String("->crearea profilului.");
        return true;
    }
    public static function getChatUser(){

    }

}


