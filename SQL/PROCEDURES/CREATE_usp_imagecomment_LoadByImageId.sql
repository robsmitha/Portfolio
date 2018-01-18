use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_imagecomment_LoadByImageId`
(
	 IN paramImageId INT
)
BEGIN
	SELECT
		`imagecomment`.`Id` AS `Id`,
		`imagecomment`.`Comment` AS `Comment`,
		`imagecomment`.`CustomerId` AS `CustomerId`,
		`imagecomment`.`ImageCommentStatusTypeId` AS `ImageCommentStatusTypeId`,
		`imagecomment`.`ImageId` AS `ImageId`,
		`imagecomment`.`CreateDate` AS `CreateDate`,
		`imagecomment`.`EditDate` AS `EditDate`
	FROM `imagecomment`
	WHERE 		`imagecomment`.`ImageId` = paramImageId;
END //
DELIMITER ;