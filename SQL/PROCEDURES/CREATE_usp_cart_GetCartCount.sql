use applicationtemplate;
DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_cartitem_GetCartCount`
(
	 IN paramCartId INT
)
BEGIN
	SELECT
		COUNT(*) AS 'NumberOfItems'
	FROM `cartitem`
	WHERE 		`cartitem`.`cartId` = paramCartId;
END //
DELIMITER ;