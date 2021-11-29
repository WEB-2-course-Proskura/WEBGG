-- CREATE TABLE `channel` (
--   `Id` int NOT NULL,
--   `Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
--   PRIMARY KEY (`Id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- CREATE TABLE `type` (
--   `Id` int NOT NULL,
--   `TypeName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
--   PRIMARY KEY (`Id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- CREATE TABLE `product` (
--   `Id` int NOT NULL,
--   `Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
--   `Type` int DEFAULT NULL,
--   PRIMARY KEY (`Id`),
--   KEY `FK__Product__Type` (`Type`),
--   CONSTRAINT `FK__Product__Typetvprogramm` FOREIGN KEY (`Type`) REFERENCES `type` (`Id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tvprogramm` (
  `Id` int NOT NULL,
  `ChannelId` int NOT NULL,
  `ProductId` int NOT NULL,
  `Time` datetime(6) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK__TVProgram__Chann` (`ChannelId`),
  KEY `FK__TVProgram__Produ` (`ProductId`),
  CONSTRAINT `FK__TVProgram__Chann` FOREIGN KEY (`ChannelId`) REFERENCES `channel` (`Id`),
  CONSTRAINT `FK__TVProgram__Produ` FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



