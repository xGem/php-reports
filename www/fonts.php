<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>

<DIV class="container-fluid">
  <DIV class="row col-sm-8">
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
      <h2 id="sub1">Fonts - Example 1</h2>
      <p><em>
        Generate a file applying multiple fonts format, size and colors.
      </em></p><br/>

      <h4>PHP</h4>
      <pre>
        <code id="phpcode">
$x = 5 /* + 15 */ + 5;
echo $x;
</code>
        <button class="btn" data-clipboard-target="#phpcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
        <br/>
      </code>
      </pre>
        <h4>SQL</h4>
        <pre>
          <code id="sqlcode">create database BAES_PHP_REPORTE
go

use BAES_PHP_REPORTE
go

create table PHP_REPORTE
(
ID int identity (1,1),
ColumnaA int,
ColumnaB float,
ColumnaC varchar(10),
ColumnaD datetime
)
go

declare @Contador int = 1

while @contador<1000
    begin

    insert into PHP_REPORTE (ColumnaA,ColumnaB,ColumnaC,ColumnaD)
    values (convert(int,round(rand()*1000,0)),
	   rand()*1000,
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0)))+
	   char(convert(int,round(rand()*10+65,0))),
	   dateadd(DAY,-1*convert(int,round(rand()*10,0)),getdate()))

    set @Contador=@Contador+1

    end
go

CREATE  PROCEDURE REPO_PHP_EXCEL
AS

SET NOCOUNT ON

declare @IDRegistros int

SET @IDRegistros = (SELECT COUNT(*) FROM PHP_REPORTE)

IF ISNULL(@IDRegistros,0) > 0
BEGIN

	SELECT
		'FD' AS DATOS_GENERALES,
		'TI' AS SALIDA_FACTORES

	SELECT
		'BAES'  AS Empresa,
		'Fecha Procesamiento: ' + CONVERT(varchar,GETDATE(),103) + ' ' + SUBSTRING(CONVERT(varchar,GETDATE(),108),1,5) AS FechaHora,
		201701 AS Periodo

	SELECT
	   ColumnaA,
	   ColumnaB,
	   ColumnaC,
	   ColumnaD
	FROM PHP_REPORTE A
	ORDER BY A.ID ASC

END
ELSE
BEGIN

	SELECT
		'FD' AS DATOS_GENERALES,
		'ER' AS DATOS_ERROR

	SELECT
		'BAES'  AS Empresa,
		'Fecha Procesamiento: ' + CONVERT(varchar,GETDATE(),103) + ' ' + SUBSTRING(CONVERT(varchar,GETDATE(),108),1,5) AS FechaHora,
		201701 AS Periodo

	SELECT
	'No hay Datos para el proceso seleccionado' AS Detalle_Error

END
go

exec REPO_PHP_EXCEL
go
          </code>
          <button class="btn" data-clipboard-target="#sqlcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
          <br/>

      <button class="btn btn-lg" type="submit">Run Example</button><br/>

    </main>
  </DIV>
</DIV>
<?php include "includes/footer.php" ?>
