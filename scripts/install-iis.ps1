
Write-Host "Installing IIS 7.5; it will take a while..."

import-module servermanager
add-windowsfeature Web-Server, Web-WebServer, Web-Common-Http, Web-Static-Content, Web-Default-Doc,
Web-Http-Errors, Web-Dir-Browsing, Web-Http-Redirect, Web-CGI, Web-ISAPI-Ext, Web-ISAPI-Filter,
Web-Includes, Web-Health, Web-Http-Logging, Web-Log-Libraries, Web-Request-Monitor, Web-Mgmt-Console

Write-Host "Done installing IIS."
