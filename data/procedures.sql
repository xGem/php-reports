CREATE  PROCEDURE php_reports_excel
AS

SET NOCOUNT ON

declare @IDRows int

SET @IDRows = (SELECT COUNT(*) FROM php_reports)

IF ISNULL(@IDRows,0) > 0
BEGIN

	SELECT
		'FD' AS GENERAL,
		'TI' AS OUTPUT

	SELECT
		'CompanyA'  AS Company,
		'Process date: ' + CONVERT(varchar,GETDATE(),103) + ' ' + SUBSTRING(CONVERT(varchar,GETDATE(),108),1,5) AS DateTime,
		201701 AS Period

	SELECT
	   ColumnA,
	   ColumnB,
	   ColumnC
	FROM php_reports A
	ORDER BY A.ID ASC

END
ELSE
BEGIN

	SELECT
		'FD' AS GENERAL,
		'ER' AS ERRORS

	SELECT
		'CompanyA'  AS Company,
		'Process date: ' + CONVERT(varchar,GETDATE(),103) + ' ' + SUBSTRING(CONVERT(varchar,GETDATE(),108),1,5) AS DateTime,
		201701 AS Period

	SELECT
	'No Data Found for the selected process' AS Error_Detail

END;
