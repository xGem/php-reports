
$ODBC_msi = "c:\vagrant\scripts\msi\msodbcsql.msi"
$ODBC_log = "C:\tmp\msiodbc.log"

$MSIArguments = @(
    "/quiet"
    "/passive"
    "/qn"
    "/i"
    $ODBC_msi
    "/L*v!"
    $ODBC_log
    "IACCEPTMSODBCSQLLICENSETERMS=YES"
    "ADDLOCAL=ALL"
)

$result = (Start-Process "msiexec.exe" -ArgumentList $MSIArguments -Wait -NoNewWindow -Passthru).ExitCode

if ($result -eq 0) {
  Write-Host "ODBC installed"
}
else
{
  Write-Host "ODBC ERROR!!!"
  $ODBC_log
}
