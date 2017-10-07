@echo off

echo "Installing IIS 7.5; it will take a while..."

DISM.EXE /enable-feature /online /all /featureName:IIS-WebServerRole /featureName:IIS-WebServer^
 /featureName:IIS-CommonHttpFeatures /featureName:IIS-StaticContent /featureName:IIS-DefaultDocument^
 /featureName:IIS-DirectoryBrowsing /featureName:IIS-HttpErrors /featureName:IIS-HttpRedirect^
 /featureName:IIS-CGI /featureName:IIS-ISAPIExtensions /featureName:IIS-ISAPIFilter^
 /featureName:IIS-ServerSideIncludes /featureName:IIS-HealthAndDiagnostics^
 /featureName:IIS-HttpLogging /featureName:IIS-LoggingLibraries  /featureName:IIS-RequestMonitor^
 /featureName:IIS-ManagementConsole

echo "Done installing IIS."
