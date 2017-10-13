Write-Host "Installing ODBC..."

$temp_dir = "C:\vagrant\download"
$ODBC_msi = "msodbcsql.msi"
$ODBC_url = "https://download.microsoft.com/download/5/7/2/57249A3A-19D6-4901-ACCE-80924ABEB267/ENU/x64/msodbcsql.msi"
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

if (!(Test-Path $temp_dir\$ODBC_msi)) {
  # Download Visual C++ Redistributable for Visual Studio 2015 x64.
  Write-Host "Downloading $ODBC_msi..."
  Invoke-WebRequest -Uri $ODBC_url -OutFile $temp_dir\$ODBC_msi
}

$result = (Start-Process "msiexec.exe" -ArgumentList $MSIArguments -Wait -NoNewWindow -Passthru).ExitCode

if ($result -eq 0) {
  Write-Host "ODBC installed"
}
else
{
  Write-Host "ODBC ERROR!!!"
  $ODBC_log
}
