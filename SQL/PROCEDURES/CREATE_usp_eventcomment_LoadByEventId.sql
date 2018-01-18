use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_eventcomment_LoadByEventId`
(
	 IN paramEventId INT
)
BEGIN
	SELECT
		`eventcomment`.`Id` AS `Id`,
		`eventcomment`.`Comment` AS `Comment`,
		`eventcomment`.`CustomerId` AS `CustomerId`,
		`eventcomment`.`EventCommentStatusTypeId` AS `EventCommentStatusTypeId`,
		`eventcomment`.`EventId` AS `EventId`,
		`eventcomment`.`CreateDate` AS `CreateDate`,
		`eventcomment`.`EditDate` AS `EditDate`
	FROM `eventcomment`
	WHERE 		`eventcomment`.`EventId` = paramEventId;
END //
DELIMITER ;