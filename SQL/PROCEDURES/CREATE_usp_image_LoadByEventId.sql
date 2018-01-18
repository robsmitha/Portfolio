use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_image_LoadByEventId`
(
	 IN paramId INT
)
BEGIN
	SELECT
		`image`.`Id` AS `Id`,
		`image`.`Name` AS `Name`,
		`image`.`Description` AS `Description`,
		`image`.`ImgUrl` AS `ImgUrl`,
		`image`.`EventId` AS `EventId`,
		`image`.`Views` AS `Views`,
		`image`.`IsFeaturedImage` AS `IsFeaturedImage`
	FROM `image`
	WHERE 		`image`.`EventId` = paramId;
END //
DELIMITER ;