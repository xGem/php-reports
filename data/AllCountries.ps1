[String]$dbname = "php-reports";
$DB_table = "AllCountries"
$DB_sql = "c:\vagrant\data\$DB_table.sql"
$DB_csv = "c:\vagrant\data\$DB_table.txt"

# Open ADO.NET Connection with Windows authentification to local SQLEXPRESS.
$con = New-Object Data.SqlClient.SqlConnection;
$con.ConnectionString = "Data Source=.\SQLEXPRESS;Initial Catalog=$dbname;Integrated Security=True;";
$con.Open();

# Create Example Table
$sql = Get-Content $DB_sql
$cmd = New-Object Data.SqlClient.SqlCommand $sql, $con;
$cmd.ExecuteNonQuery();
Write-Host "Table seedAllStates is created!";

# Populate Example Table
$command = ".\Import-CSVtoSQL.ps1 -sqlserver '.\SQLEXPRESS' -database '$dbname' -table '$DB_table' -csvfile $DB_csv -FirstRowColumnNames"
Invoke-Expression $command
