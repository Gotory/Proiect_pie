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

}