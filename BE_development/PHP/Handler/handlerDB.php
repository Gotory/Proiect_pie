<?php
class handlerDB
{

    public static function logVisitor($adresaIP, $brower, $browerVersion, $os)
    {
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $log4Debug->debug_String("^^handlerDB^^->intrat: logVisitor");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("INSERT INTO web_project_pie.ch_visitlog (CH_VISITLOG_IP,CH_VISITLOG_BROWSER,CH_VISITLOG_BROWSER_VER,CH_VISITLOG_OS) VALUES (:ip, :brower, :brower_version, :os)");
        $stmt->bindParam(':ip', $adresaIP, PDO::PARAM_STR);
        $stmt->bindParam(':brower', $brower, PDO::PARAM_STR);
        $stmt->bindParam(':brower_version', $browerVersion, PDO::PARAM_STR);
        $stmt->bindParam(':os', $os, PDO::PARAM_STR);
        $stmt->execute();
        $log4Debug->debug_String("^^handlerDB^^->iesit: logVisitor");
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
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $log4Debug->debug_String("^^handlerDB^^->intrat: checkEmail");
        settype($exist,"boolean");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT * FROM web_project_pie.ch_user WHERE ch_user_email = :email;");
        $stmt->bindParam(':email', $emailUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            $exist= true;
            $log4Debug->debug_StringValue("^^handlerDB^^ Verificare facuta cu mail-ul: ",$emailUser);
        }else{
            $log4Debug->alert_String("^^handlerDB^^ Cont neinregistrat cu acest mail !");
            throw new Exception("Cont neinregistrat cu acest mail !");
        }
        $log4Debug->debug_String("^^handlerDB^^->iesit: checkEmail");
       return $exist;
    }
    public static function checkExistEmail($emailUser)
    {
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $log4Debug->debug_String("^^handlerDB^^->intrat: checkExistEmail");
        settype($exist,"boolean");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT * FROM web_project_pie.ch_user WHERE ch_user_email = :email;");
        $stmt->bindParam(':email', $emailUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            $exist= true;
            $log4Debug->debug_StringValue("^^handlerDB^^ Verificare facuta cu mail-ul: ",$emailUser);
        }else{
            $exist = false;
        }
        $log4Debug->debug_String("^^handlerDB^^->iesit: checkExistEmail");
        return $exist;
    }
    public static function checkNickname($nickNameUser)
    {
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $log4Debug->debug_String("^^handlerDB^^->intrat: checkNickname");
        settype($exist,"boolean");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT * FROM web_project_pie.ch_profile WHERE ch_prf_nickname = :nickname;");
        $stmt->bindParam(':nickname', $nickNameUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            $exist = true;
            $log4Debug->debug_StringValue("^^handlerDB^^ Verificare facuta cu nickname-ul: ",$nickNameUser);
        }else{
            $log4Debug->alert_String("^^handlerDB^^ Cont neinregistrat cu acest nickname !");
            throw new Exception("Cont neinregistrat cu acest nickname !");
        }
        $log4Debug->debug_String("^^handlerDB^^->iesit: checkNickname");
        return $exist;
    }
    public static function checkExistNickname($nickNameUser)
    {
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $log4Debug->debug_String("^^handlerDB^^->intrat: checkExistNickname");
        settype($exist,"boolean");
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("SELECT * FROM web_project_pie.ch_profile WHERE ch_prf_nickname = :nickname;");
        $stmt->bindParam(':nickname', $nickNameUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            $exist = true;
            $log4Debug->debug_StringValue("^^handlerDB^^ Verificare facuta cu nickname-ul: ",$nickNameUser);
        }else{
            $exist = false;
        }
        $log4Debug->debug_String("^^handlerDB^^->iesit : checkExistNickname");
        return $exist;
    }
    public static function checkExistUserNicknameAndPass($nickNameUser, $userPassInput)
    {
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $log4Debug->debug_String("^^handlerDB^^->intrat: checkExistUserNicknameAndPass");
        settype($exist,"boolean");
        $exist=true;
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
        $log4Debug->debug_StringValue("^^handlerDB^^ Verificare facuta cu nickname si pass 1/0 : ",$exist);
        $log4Debug->debug_String("^^handlerDB^^->iesit: checkExistUserNicknameAndPass");
        return $exist;
    }
    public static function checkExistUserEmailAndPass($emailUser, $userPassInput)
    {
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $log4Debug->debug_String("^^handlerDB^^->intrat: checkExistUserEmailAndPass");
        settype($exist,"boolean");
        $exist=true;
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
        $log4Debug->debug_StringValue("^^handlerDB^^ Verificare facuta cu mail si pass 1/0 : ",$exist);
        $log4Debug->debug_String("^^handlerDB^^->iesit: checkExistUserEmailAndPass");
        return $exist;
    }
    public static function registerChatUser($nume,$prenume,$sex,$email,$parola,$ip,$username){
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $log4Debug->debug_String("^^handlerDB^^->intrat: registerChatUser");
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
            $log4Debug->debug_StringValue("^^handlerDB^^ Id-ul contului creat: ",$last_id);
            handlerDB::createProfileUser($last_id,$username);
        }catch(Exception $e){
            $log4Debug->alert_String("^^handlerDB^^ Nu sa putut realiza inregistrarea !");
            throw new Exception("Nu sa putut realiza inregistrarea !");
        }
        $log4Debug->debug_String("^^handlerDB^^->iesit: registerChatUser");
    }
    public static function createProfileUser($id,$username){
        $conn = ConexiuneFactory::getConexiuneObject();
        $stmt = $conn->prepare("INSERT INTO web_project_pie.ch_profile(CH_PRF_ID,CH_PRF_NICKNAME)VALUES(:id, :nickname);");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':nickname', $username, PDO::PARAM_STR);
        $stmt->execute();
        $log4Debug = Log4DebugFactory::getLog4DebugObject();
        $log4Debug->debug_String("^^handlerDB^^  --> crearea profilului.");
        return true;
    }
    public static function getChatUser(){

    }

}


