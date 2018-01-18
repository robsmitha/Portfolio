use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_cartitem_LoadOnlineCart`
(
	 IN paramCartId INT
)
BEGIN
	SELECT
		`item`.`Name` AS `ItemName`,
		`item`.`Description` AS `ItemDescription`,
		`item`.`ImgUrl` AS `ImgUrl`,
		`item`.`Price` AS `Price`,
		(SELECT `itemstatustype`.`Name` FROM `itemstatustype` WHERE `itemstatustype`.`Id` = `item`.`ItemStatusTypeId`) AS `ItemStatusType`,
		(SELECT CONCAT(`customer`.`FirstName`, " ", `customer`.`LastName`) FROM `customer` WHERE `customer`.`Id` = `cart`.`CustomerId`) AS `CustomerName`,
		`cartitem`.`Quantity` AS `Quantity`,
		`cartitem`.`ItemStartDate` AS `ItemStartDate`,
		`cartitem`.`ItemEndDate` AS `ItemEndDate`,
		(SELECT `itemtype`.`name` FROM `itemtype` WHERE `itemtype`.`Id` = `item`.`ItemTypeId`) AS `ItemType`,
		`cartitem`.`Id` AS `CartItemId`
	FROM `cartitem`
	JOIN `cart` ON `cart`.`id` = `cartitem`.cartId
	JOIN `item` ON `item`.`Id` = `cartitem`.`ItemId`
	WHERE 		`cartitem`.`cartId` = paramCartId;
END //
DELIMITER ;