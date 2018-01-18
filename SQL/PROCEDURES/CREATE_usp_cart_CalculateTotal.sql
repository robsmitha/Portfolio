use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_cartitem_CalculateTotal`
(
	 IN paramCartId INT
)
BEGIN
	SELECT
		SUM(`item`.`Price`) AS 'TotalPrice'
	FROM `cartitem`
	JOIN `item` ON `item`.`Id` = `cartitem`.`ItemId`
	WHERE 		`cartitem`.`cartId` = paramCartId;
END //
DELIMITER ;