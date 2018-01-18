use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_cartitem_LoadByCartId`
(
	 IN paramCartId INT
)
BEGIN
	SELECT
		`cartitem`.`Id` AS `Id`,
		`cartitem`.`CartId` AS `CartId`,
		`cartitem`.`ItemId` AS `ItemId`,
		`cartitem`.`AddDate` AS `AddDate`,
		`cartitem`.`Quantity` AS `Quantity`,
		`cartitem`.`ItemStartDate` AS `ItemStartDate`,
		`cartitem`.`ItemEndDate` AS `ItemEndDate`,
		`cartitem`.`ItemTypeId` AS `ItemTypeId`
	FROM `cartitem`
	WHERE 		`cartitem`.`CartId` = paramCartId;
END //
DELIMITER ;