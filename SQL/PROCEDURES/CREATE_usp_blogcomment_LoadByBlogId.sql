use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_blogcomment_LoadByBlogId`
(
	 IN paramBlogId INT
)
BEGIN
	SELECT
		`blogcomment`.`Id` AS `Id`,
		`blogcomment`.`Comment` AS `Comment`,
		`blogcomment`.`CustomerId` AS `CustomerId`,
		`blogcomment`.`BlogCommentStatusTypeId` AS `BlogCommentStatusTypeId`,
		`blogcomment`.`BlogId` AS `BlogId`,
		`blogcomment`.`CreateDate` AS `CreateDate`,
		`blogcomment`.`EditDate` AS `EditDate`
	FROM `blogcomment`
	WHERE 		`blogcomment`.`BlogId` = paramBlogId;
END //
DELIMITER ;