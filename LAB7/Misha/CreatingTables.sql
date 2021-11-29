CREATE TABLE Channel(
    Id int IDENTITY(1,1) PRIMARY KEY,
    "Name" NVARCHAR(50) NOT NULL
)

CREATE TABLE Product(
    Id int IDENTITY(1,1) PRIMARY KEY,
    "Name" NVARCHAR(100) NOT NULL,
    "Type" int NULL
);

CREATE TABLE TVProgramm(
    Id int IDENTITY(1,1) PRIMARY KEY,
    ChannelId int not null,
    ProductId int not null,
    "Time" DATETIME not null
)

CREATE TABLE "Type"(
    Id int IDENTITY(1,1) PRIMARY KEY,
    "TypeName" NVARCHAR(30) Not null
)
