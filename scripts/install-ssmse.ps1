# Set file and folder path for SSMS installer .exe
$folderpath="c:\tmp"
$filepath="$folderpath\SQLManagementStudio_x64_ENU.exe"

#If SSMS not present, download
if (!(Test-Path $filepath)){
write-host "Downloading SQL Server 2014 SSMS..."
$URL = "http://download.microsoft.com/download/E/A/E/EAE6F7FC-767A-4038-A954-49B8B05D04EB/MgmtStudio%2064BIT/SQLManagementStudio_x64_ENU.exe"
$clnt = New-Object System.Net.WebClient
$clnt.DownloadFile($url,$filepath)
Write-Host "SSMS installer download complete" -ForegroundColor Green

}
else {

write-host "Located the SQL SSMS Installer binaries, moving on to install..."
}

# start the SSMS installer
write-host "Beginning SSMS 2014 install..." -nonewline
$Parms = " /IACCEPTSQLSERVERLICENSETERMS /Q /ACTION=install /UPDATEENABLED=FALSE /x:$folderpath/ssmse "
$Prms = $Parms.Split(" ")
& "$filepath" $Prms | Out-Null
Write-Host "SSMS installation complete" -ForegroundColor Green

Write-Host "Removing extracted files..."
rm -r "$folderpath/ssmse"
