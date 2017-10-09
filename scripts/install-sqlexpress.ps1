$packageName = "MsSqlServer2014Express"
$tempDir = "c:\tmp"
$fileFullPath = "$tempDir\SQLEXPR.exe"
$extractPath = "$tempDir\SQLEXPR"
$setupPath = "$extractPath\setup.exe"
$silentArgs = "/IACCEPTSQLSERVERLICENSETERMS /Q /ACTION=install /INSTANCEID=SQLEXPRESS /INSTANCENAME=SQLEXPRESS /UPDATEENABLED=FALSE /INDICATEPROGRESS=TRUE"
$url64 = "https://download.microsoft.com/download/2/A/5/2A5260C3-4143-47D8-9823-E91BB0121F94/SQLEXPR_x64_ENU.exe"

# Using the same download location as Install-ChocolateyPackage but need to create the directory first
if (![System.IO.Directory]::Exists($tempDir)) { [System.IO.Directory]::CreateDirectory($tempDir) | Out-Null }
  Write-Host "Downloading..."
  if (!(Test-Path $fileFullPath)) {
  Invoke-WebRequest -Uri $url64 -OutFile $fileFullPath
}

Write-Host "Extracting..."
Start-Process "$fileFullPath" "/Q /x:`"$extractPath`"" -Wait

Write-Host "Installing..."
Start-Process -FilePath $setupPath -ArgumentList "$silentArgs" -Wait

Write-Host "Removing extracted files..."
rm -r "$extractPath"

Write-Host "SQLEXPRESS DONE!"
