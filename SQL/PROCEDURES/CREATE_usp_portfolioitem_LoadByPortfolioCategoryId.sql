use applicationtemplate;

DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_portfolioitem_LoadByPortfolioCategoryId`
(
	 IN paramPortfolioCategoryId INT
)
BEGIN
	SELECT
		`portfolioitem`.`Id` AS `Id`,
		`portfolioitem`.`Name` AS `Name`,
		`portfolioitem`.`Description` AS `Description`,
		`portfolioitem`.`ProjectUrl` AS `ProjectUrl`,
		`portfolioitem`.`ImageUrl` AS `ImageUrl`,
		`portfolioitem`.`PortfolioCategoryId` AS `PortfolioCategoryId`,
		`portfolioitem`.`CreateDate` AS `CreateDate`
	FROM `portfolioitem`
	WHERE 		`portfolioitem`.`PortfolioCategoryId` = paramPortfolioCategoryId;
END //
DELIMITER ;