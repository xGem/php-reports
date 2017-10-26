[String]$dbname = "php-reports";
$tables_sql = "c:\vagrant\data\tables.sql"
$procedures_sql = "c:\vagrant\data\procedures.sql"
$data_sql = "c:\vagrant\data\data.sql"

# Open ADO.NET Connection with Windows authentification to local SQLEXPRESS.
$con = New-Object Data.SqlClient.SqlConnection;
$con.ConnectionString = "Data Source=.\SQLEXPRESS;Initial Catalog=$dbname;Integrated Security=True;";
$con.Open();

# Create Table
$sql = Get-Content $tables_sql
$cmd = New-Object Data.SqlClient.SqlCommand $sql, $con;
$cmd.ExecuteNonQuery();
Write-Host "Tables created!";

# Create SP
$sql = Get-Content $procedures_sql
$cmd = New-Object Data.SqlClient.SqlCommand $sql, $con;
$cmd.ExecuteNonQuery();
Write-Host "Procedures created!";

# Populate Data
$sql = Get-Content $data_sql
$cmd = New-Object Data.SqlClient.SqlCommand $sql, $con;
$cmd.ExecuteNonQuery();
Write-Host "Data Populated!";
