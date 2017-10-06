@echo off

echo "Installing IIS 7.5; it will take a while..."

DISM.EXE /enable-feature /online /all /featureName:IIS-CGI /featureName:IIS-ManagementConsole 

echo "Done installing IIS."
