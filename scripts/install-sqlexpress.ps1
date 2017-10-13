Write-Host "Installing SQL Express; it will take a while..."

$packageName = "MsSqlServer2014Express"
$tempDir = "c:\vagrant\download"
$fileFullPath = "$tempDir\SQLEXPR.exe"
$extractPath = "$tempDir\SQLEXPR"
$setupPath = "$extractPath\setup.exe"
$silentArgs = "/IACCEPTSQLSERVERLICENSETERMS /Q /ACTION=install /INSTANCEID=SQLEXPRESS /INSTANCENAME=SQLEXPRESS /UPDATEENABLED=FALSE /INDICATEPROGRESS=TRUE"
$url64 = "https://download.microsoft.com/download/2/A/5/2A5260C3-4143-47D8-9823-E91BB0121F94/SQLEXPR_x64_ENU.exe"

# Using the same download location as Install-ChocolateyPackage but need to create the directory first
if (![System.IO.Directory]::Exists($tempDir)) {
  [System.IO.Directory]::CreateDirectory($tempDir) | Out-Null
}
if (!(Test-Path $fileFullPath)) {
  Write-Host "Downloading..."
  Invoke-WebRequest -Uri $url64 -OutFile $fileFullPath
}

if (![System.IO.Directory]::Exists($tempDir)) {
  [System.IO.Directory]::CreateDirectory($tempDir) | Out-Null
}
if (!(Test-Path $extractPath)) {
  Write-Host "Extracting..."
  Start-Process "$fileFullPath" "/Q /x:`"$extractPath`"" -Wait
}

Write-Host "Installing..."
Start-Process -FilePath $setupPath -ArgumentList "$silentArgs" -Wait

Write-Host "SQLEXPRESS DONE!"
