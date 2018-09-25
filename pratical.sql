CREATE TABLE `cars` (
 `ID` int(10) NOT NULL AUTO_INCREMENT,
 `VehicleID` int(10) NOT NULL,
 `InhouseSellerID` int(10) NOT NULL,
 `BuyerID` int(10) NOT NULL,
 `ModelID` int(10) NOT NULL,
 `SaleDate` date NOT NULL,
 `BuyDate` date NOT NULL,
 PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=latin1

CREATE TABLE `buyers` (
 `BuyerId` int(10) NOT NULL,
 `Name` varchar(30) NOT NULL,
 `LastName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1

