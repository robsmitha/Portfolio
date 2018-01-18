use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_event_LoadAll`
()
BEGIN
	SELECT
		`event`.`Id` AS `Id`,
		`event`.`Name` AS `Name`,
		`event`.`Description` AS `Description`,
		`event`.`ImgUrl` AS `ImgUrl`,
		`event`.`StartDate` AS `StartDate`,
		`event`.`EndDate` AS `EndDate`,
		`event`.`Location` AS `Location`,
		`event`.`EventTypeId` AS `EventTypeId`,
		`event`.`TicketLink` AS `TicketLink`
	FROM `event`
	AND `event`.`EndDate` > NOW();
END //
DELIMITER ;