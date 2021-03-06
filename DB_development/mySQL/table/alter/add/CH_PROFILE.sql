CREATE TABLE `web_project_pie`.`ch_profile` (
  `CH_PRF_ID` INT NOT NULL AUTO_INCREMENT,
  `CH_PRF_PRIVATE` INT(1) NULL,
  `CH_PRF_STATUS` VARCHAR(15) NULL,
  `CH_PRF_PICTURE` VARCHAR(45) NULL,
  `CH_PRF_MSGNR_SENT` BIGINT NULL,
  `CH_PRF_MSGNR_RECEIVE` BIGINT NULL,
  `CH_PRF_NICKNAME` VARCHAR(45) NULL,
  `CH_PRF_MODIFDATE` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP);
