Add-Type -AssemblyName System.IO.Compression.FileSystem
function Unzip
{
    param([string]$zipfile, [string]$outpath)
    [System.IO.Compression.ZipFile]::ExtractToDirectory($zipfile, $outpath)
}

$packageName = "HeidiSQL 9.4"
$tempDir = ".\tmp"
$fileFullPath = "$tempDir\HeidiSQL_9.4_Portable.zip"
$extractPath = ".\heidi"
$url = "https://www.heidisql.com/downloads/releases/HeidiSQL_9.4_Portable.zip"

# Using the same download location as Install-ChocolateyPackage but need to create the directory first
if (![System.IO.Directory]::Exists($tempDir)) { [System.IO.Directory]::CreateDirectory($tempDir) | Out-Null }
  Write-Host "Downloading Heidi...$url"
  if (!(Test-Path $fileFullPath)) {
  Invoke-WebRequest -Uri $url -OutFile $fileFullPath
}

if (!(Test-Path $extractPath)) {
  Write-Host "Unzipping $fileFullPath"
  Unzip $fileFullPath $extractPath
  Write-Host "Unzip DONE!"
}

Write-Host "SQLEXPRESS DONE!"
