CREATE TABLE allCountries (
   GeoNameId int PRIMARY KEY,
   Name nvarchar(200),
   AsciiName nvarchar(200),
   AlternateNames nvarchar(max),
   Latitude float,
   Longitude float,
   FeatureClass char(1),
   FeatureCode varchar(10),
   CountryCode char(2),
   Cc2 varchar(255),
   Admin1Code varchar(20),
   Admin2Code varchar(80),
   Admin3Code varchar(20),
   Admin4Code varchar(20),
   Population bigint,
   Elevation varchar(255),
   Dem int,
   Timezone varchar(40), 
   ModificationDate smalldatetime,
)
