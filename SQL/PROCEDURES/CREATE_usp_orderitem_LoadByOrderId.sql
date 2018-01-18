use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_orderitem_LoadByOrderId`
(
	 IN paramOrderId INT
)
BEGIN
	SELECT
		`orderitem`.`Id` AS `Id`,
		`orderitem`.`OrderId` AS `OrderId`,
		`orderitem`.`ItemId` AS `ItemId`,
		`orderitem`.`Quantity` AS `Quantity`,
		`orderitem`.`ItemStartDate` AS `ItemStartDate`,
		`orderitem`.`ItemEndDate` AS `ItemEndDate`,
		`orderitem`.`ItemTypeId` AS `ItemTypeId`
	FROM `orderitem`
	WHERE 		`orderitem`.`OrderId` = paramOrderId;
END //
DELIMITER ;