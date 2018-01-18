/*
Author:			This code was generated by DALGen version 1.1.0.0 available at https://github.com/H0r53/DALGen
Date:			12/16/2017
Description:	Creates the eventcommentstatustype table and respective stored procedures

*/


USE applicationtemplate;



-- ------------------------------------------------------------
-- Drop existing objects
-- ------------------------------------------------------------

DROP TABLE IF EXISTS `applicationtemplate`.`eventcommentstatustype`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_eventcommentstatustype_Load`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_eventcommentstatustype_LoadAll`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_eventcommentstatustype_Add`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_eventcommentstatustype_Update`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_eventcommentstatustype_Delete`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_eventcommentstatustype_Search`;


-- ------------------------------------------------------------
-- Create table
-- ------------------------------------------------------------



CREATE TABLE `applicationtemplate`.`eventcommentstatustype` (
Id INT AUTO_INCREMENT,
Name VARCHAR(255),
Description VARCHAR(1025),
CONSTRAINT pk_eventcommentstatustype_Id PRIMARY KEY (Id)
);


-- ------------------------------------------------------------
-- Create default SCRUD sprocs for this table
-- ------------------------------------------------------------


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_eventcommentstatustype_Load`
(
	 IN paramId INT
)
BEGIN
	SELECT
		`eventcommentstatustype`.`Id` AS `Id`,
		`eventcommentstatustype`.`Name` AS `Name`,
		`eventcommentstatustype`.`Description` AS `Description`
	FROM `eventcommentstatustype`
	WHERE 		`eventcommentstatustype`.`Id` = paramId;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_eventcommentstatustype_LoadAll`
()
BEGIN
	SELECT
		`eventcommentstatustype`.`Id` AS `Id`,
		`eventcommentstatustype`.`Name` AS `Name`,
		`eventcommentstatustype`.`Description` AS `Description`
	FROM `eventcommentstatustype`;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_eventcommentstatustype_Add`
(
	 IN paramName VARCHAR(255),
	 IN paramDescription VARCHAR(1025)
)
BEGIN
	INSERT INTO `eventcommentstatustype` (Name,Description)
	VALUES (paramName, paramDescription);
	-- Return last inserted ID as result
	SELECT LAST_INSERT_ID() as id;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_eventcommentstatustype_Update`
(
	IN paramId INT,
	IN paramName VARCHAR(255),
	IN paramDescription VARCHAR(1025)
)
BEGIN
	UPDATE `eventcommentstatustype`
	SET Name = paramName
		,Description = paramDescription
	WHERE		`eventcommentstatustype`.`Id` = paramId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_eventcommentstatustype_Delete`
(
	IN paramId INT
)
BEGIN
	DELETE FROM `eventcommentstatustype`
	WHERE		`eventcommentstatustype`.`Id` = paramId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_eventcommentstatustype_Search`
(
	IN paramId INT,
	IN paramName VARCHAR(255),
	IN paramDescription VARCHAR(1025)
)
BEGIN
	SELECT
		`eventcommentstatustype`.`Id` AS `Id`,
		`eventcommentstatustype`.`Name` AS `Name`,
		`eventcommentstatustype`.`Description` AS `Description`
	FROM `eventcommentstatustype`
	WHERE
		COALESCE(eventcommentstatustype.`Id`,0) = COALESCE(paramId,eventcommentstatustype.`Id`,0)
		AND COALESCE(eventcommentstatustype.`Name`,'') = COALESCE(paramName,eventcommentstatustype.`Name`,'')
		AND COALESCE(eventcommentstatustype.`Description`,'') = COALESCE(paramDescription,eventcommentstatustype.`Description`,'');
END //
DELIMITER ;


