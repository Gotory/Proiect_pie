ALTER TABLE `web_project_pie`.`ch_user` 
ADD COLUMN `CH_USER_SURNAME` VARCHAR(20) NOT NULL AFTER `CH_USER_NAME`,
ADD COLUMN `CH_USER_NICKNAME` VARCHAR(20) NULL AFTER `CH_USER_SURNAME`;