use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_cart_LoadByCustomerId`
(
	 IN paramCustomerId INT
)
BEGIN
	SELECT DISTINCT
		`cart`.`Id` AS `Id`,
		`cart`.`CustomerId` AS `CustomerId`,
		`cart`.`CartStatusTypeId` AS `CartStatusTypeId`,
		`cart`.`CreateDate` AS `CreateDate`,
		`cart`.`CheckoutDate` AS `CheckoutDate`
	FROM `cart`
	WHERE 		`cart`.`CustomerId` = paramCustomerId
	AND `cart`.`CheckoutDate` IS NULL;  -- cart has not been checked out yet
END //
DELIMITER ;