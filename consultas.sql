CREATE TABLE IF NOT EXISTS `Users` (
    `ID_USER` INTEGER NOT NULL AUTO_INCREMENT,
    `Username` TEXT NOT NULL,
    `Password` TEXT NOT NULL,
    `Name` TEXT NOT NULL,
    `Surname` TEXT NOT NULL,
    `Email` TEXT NOT NULL,
    PRIMARY KEY(`ID_USER`)
);

CREATE TABLE IF NOT EXISTS `APIs` (
    ID_API INTEGER NOT NULL AUTO_INCREMENT,
    API_Name TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `Saved` (
    `ID_SAV` INTEGER NOT NULL AUTO_INCREMENT,
    `Localizador` INTEGER NOT NULL,
    `ID_USER` INTEGER NOT NULL,
    `ID_API` INTEGER NOT NULL,
    PRIMARY KEY(`ID_SAV`),
    CONSTRAINT FK_Saved_Users FOREIGN KEY (`ID_USER`) REFERENCES `Users` (`ID_USER`),
    CONSTRAINT FK_Saved_APIs FOREIGN KEY (`ID_API`) REFERENCES `APIs` (`ID_API`)
);