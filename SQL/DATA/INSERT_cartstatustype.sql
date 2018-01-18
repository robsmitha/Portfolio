use applicationtemplate;

INSERT INTO `cartstatustype` (`Id`, `Name`, `Description`) VALUES (1, 'Active Cart', 'Cart has not been checkout and is recognized as active. We will not delete any active carts.');
INSERT INTO `cartstatustype` (`Id`, `Name`, `Description`) VALUES (2, 'Inactive Cart', 'Cart has been checked out or abandoned.');