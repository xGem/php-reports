$v = [System.Reflection.Assembly]::LoadWithPartialName('Microsoft.SqlServer.SMO')

# Connect to the instance using SMO
$s = new-object ('Microsoft.SqlServer.Management.Smo.Server') '.\SQLEXPRESS'
[string]$nm = $s.Name
[string]$mode = $s.Settings.LoginMode

write-output "Instance Name: $nm"
write-output "Login Mode: $mode"

#Change to Mixed Mode
$s.Settings.LoginMode = [Microsoft.SqlServer.Management.SMO.ServerLoginMode]::Mixed
# Make the changes
$s.Alter()

[String]$dbname = "php-reports";

# Open ADO.NET Connection with Windows authentification to local SQLEXPRESS.
$con = New-Object Data.SqlClient.SqlConnection;
$con.ConnectionString = "Data Source=.\SQLEXPRESS;Initial Catalog=master;Integrated Security=True;";
$con.Open();

$sql = "ALTER LOGIN sa ENABLE; ALTER LOGIN sa WITH PASSWORD = 'fjlk3232!qrADFFDS';"

$cmd = New-Object Data.SqlClient.SqlCommand $sql, $con;
$cmd.ExecuteNonQuery();
Write-Host "User created!";

# Close & Clear all objects.
$cmd.Dispose();
$con.Close();
$con.Dispose();
