use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_order_LoadByCustomerId`
(
	 IN paramCustomerId INT
)
BEGIN
	SELECT
		`order`.`Id` AS `Id`,
		`order`.`CustomerId` AS `CustomerId`,
		`order`.`OrderStatusTypeId` AS `OrderStatusTypeId`,
		`order`.`OrderDate` AS `OrderDate`,
		`order`.`StripeCharge` AS `StripeCharge`,
		`order`.`StripeCustomer` AS `StripeCustomer`,
		`order`.`StripeCard` AS `StripeCard`,
		`order`.`StripeAmount` AS `StripeAmount`
	FROM `order`
	WHERE 		`order`.`CustomerId` = paramCustomerId;
END //
DELIMITER ;