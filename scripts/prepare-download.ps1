$download_dir = "..\download"

$VisualStudioRedistributablePackage = "vcredist_x86.exe"
$VisualStudioRedistributableDownloadLocation = "http://download.microsoft.com/download/1/6/B/16B06F60-3B20-4FF2-B699-5E9B7962F9AE/VSU3/vcredist_x86.exe"
Write-Host "Donwloading $VisualStudioRedistributablePackage..."
Invoke-WebRequest -Uri $VisualStudioRedistributableDownloadLocation -OutFile $download_dir\$VisualStudioRedistributablePackage

$PHP_zip = "php.zip"
$PHP_56 = "http://windows.php.net/downloads/releases/php-5.6.31-nts-Win32-VC11-x86.zip"
Write-Host "Donwloading $PHP_zip..."
Invoke-WebRequest -Uri $PHP_56 -OutFile $download_dir\$PHP_zip

$ODBC_msi = "msodbcsql.msi"
$ODBC_url = "https://download.microsoft.com/download/5/7/2/57249A3A-19D6-4901-ACCE-80924ABEB267/ENU/x64/msodbcsql.msi"
Write-Host "Donwloading $ODBC_msi..."
Invoke-WebRequest -Uri $ODBC_url -OutFile $download_dir\$ODBC_msi

$file = "SQLEXPR.exe"
$url64 = "https://download.microsoft.com/download/2/A/5/2A5260C3-4143-47D8-9823-E91BB0121F94/SQLEXPR_x64_ENU.exe"
Write-Host "Donwloading $file..."
Invoke-WebRequest -Uri $url64 -OutFile $download_dir\$file
