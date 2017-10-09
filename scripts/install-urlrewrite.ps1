$wpi = "http://download.microsoft.com/download/F/4/2/F42AB12D-C935-4E65-9D98-4E56F9ACBC8E/wpilauncher.exe"
Invoke-WebRequest -URI $wpi -OutFile "c:\tmp\wpilauncher.exe"

$install = Start-Process -FilePath "c:\tmp\wpilauncher.exe"

Start-Sleep -Seconds 25

Get-Process WebPlatformInstaller | Stop-Process -Force

$WebPICMD = 'C:\Program Files\Microsoft\Web Platform Installer\WebpiCmd-x64.exe'
Start-Process -wait -FilePath $WebPICMD -ArgumentList "/install /Products:UrlRewrite2 /AcceptEula /OptInMU /SuppressPostFinish"
