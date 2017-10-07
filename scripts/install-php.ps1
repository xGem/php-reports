
Add-Type -AssemblyName System.IO.Compression.FileSystem
function Unzip
{
    param([string]$zipfile, [string]$outpath)
    [System.IO.Compression.ZipFile]::ExtractToDirectory($zipfile, $outpath)
}

Write-Host "Installing PHP; it will take a while..."

$temp_dir = "C:\tmp"
$PHP_56 = "http://windows.php.net/downloads/releases/php-5.6.31-nts-Win32-VC11-x86.zip"
$PHP_temp = $temp_dir+"\php.zip"
$PHP_dest =  "C:\php"
$PHP_ini = "C:\vagrant\scripts\config\php.ini"
$PHP_cgi = "C:\php\php-cgi.exe"
$PHP_ext = "C:\vagrant\scripts\ext"
$IIS_home = "C:\vagrant\www"
$VisualStudioRedistributableDownloadLocation = "http://download.microsoft.com/download/1/6/B/16B06F60-3B20-4FF2-B699-5E9B7962F9AE/VSU3/vcredist_x86.exe"
$VisualStudioRedistributablePackage = "vcredist_x86.exe"

if (!(Test-Path $temp_dir\$VisualStudioRedistributablePackage)) {
  # Download Visual C++ Redistributable for Visual Studio 2015 x64.
  Invoke-WebRequest -Uri $VisualStudioRedistributableDownloadLocation -OutFile $temp_dir\$VisualStudioRedistributablePackage
}

# Install Visual C++ Redistributable for Visual Studio 2015 x64.
Start-Process -FilePath $temp_dir\$VisualStudioRedistributablePackage -ArgumentList "/q /norestart" -Wait


if (!(Test-Path $PHP_temp)) {
  Write-Host "Downloading... $PHP_56"
  (New-Object Net.WebClient).DownloadFile($PHP_56, $PHP_temp);
  Write-Host "Download DONE!"
}

if (!(Test-Path $PHP_dest)) {
  Write-Host "Unzipping $PHP_temp"
  Unzip $PHP_temp $PHP_dest
  Write-Host "Unzip DONE!"
}

Copy-Item $PHP_ini $PHP_dest -force
Write-Host "Php.ini copied."

# Create a Handler Mapping for PHP.
New-WebHandler -Name "PHPFastCGI" -Path "*.php" -Modules FastCgiModule -ScriptProcessor $PHP_cgi -Verb 'GET,HEAD,POST' -ResourceType Either

# Configure FastCGI Settings for PHP.
Add-WebConfiguration -Filter /system.webServer/fastCgi -PSPath IIS:\ -Value @{fullpath=$PHP_cgi}

Write-Host "Handler $handlerName mapping DONE!"

Add-WebConfiguration -Filter /system.webServer/defaultDocument/files -PSPath IIS:\ -Value @{value="index.php"}
Write-Host "New default document DONE!"

Copy-Item $PHP_ext\*.dll $PHP_dest\ext -force
Write-Host "PHP Extensions copied."

Write-Host "PHP Intalled!"
