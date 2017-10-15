Add-Type -AssemblyName System.IO.Compression.FileSystem
function Unzip
{
    param([string]$zipfile, [string]$outpath)
    [System.IO.Compression.ZipFile]::ExtractToDirectory($zipfile, $outpath)
}

$donwload_dir = "c:\vagrant\download"

Write-Host "Install JDK"
$JDK_exe = "jdk-8u144-windows-x64.exe"

if (!(Test-Path $donwload_dir\$JDK_exe)) {
  # Download Visual C++ Redistributable for Visual Studio 2015 x64.
  #check https://www.java.com/en/download/manual.jsp for windows JRE download links and install
}

Write-Host "Installing $JDK_exe"
#$javax64install = Start-Process -FilePath $donwload_dir\$JDK_exe -ArgumentList "/s REBOOT=ReallySuppress" -Wait -Verbose -PassThru
#$javax64install.waitForExit() #Start-Sleep -s 35
if ($javax64install.ExitCode -eq 0) {
	write-host "Successfully Installed JDK X64"
}
else {
	write-host "Java 64 bit installer exited with exit code $($javax64install.ExitCode)"
}

[Environment]::SetEnvironmentVariable("JAVA_HOME", "C:\Program Files\Java\jdk1.8.0_144", "Machine")
$Env:JAVA_HOME = "C:\Program Files\Java\jdk1.8.0_144"

#install Apache Tomcat 8.0-doc
$TOMCAT_url = "http://apache.dattatec.com/tomcat/tomcat-8/v8.5.23/bin/apache-tomcat-8.5.23-windows-x64.zip"
$TOMCAT_zip = "apache-tomcat-8.5.23-windows-x64.zip"
$TOMCAT_dir = "c:\tomcat"

if (!(Test-Path $donwload_dir\$TOMCAT_zip)) {
  Write-Host "Downloading $TOMCAT_zip..."
  Invoke-WebRequest -Uri $TOMCAT_url -OutFile $donwload_dir\$TOMCAT_zip
}

if (!(Test-Path $TOMCAT_dir)) {
  Write-Host "Unzipping $TOMCAT_zip"
  Unzip $donwload_dir\$TOMCAT_zip $TOMCAT_dir
  Write-Host "Unzip DONE!"
}

#create environment variable %TOMCAT_HOME% for the installation directory.
[Environment]::SetEnvironmentVariable("TOMCAT_HOME", "$TOMCAT_dir\apache-tomcat-8.5.23", "Machine")
[Environment]::SetEnvironmentVariable("CATALINA_HOME", "$TOMCAT_dir\apache-tomcat-8.5.23", "Machine")
$Env:TOMCAT_HOME = "$TOMCAT_dir\apache-tomcat-8.5.23"
$Env:CATALINA_HOME = "$TOMCAT_dir\apache-tomcat-8.5.23"

echo "$TOMCAT_dir\apache-tomcat-8.5.23\bin\service.bat"
#Start service
$tomcatinstall = Start-Process -FilePath "$TOMCAT_dir\apache-tomcat-8.5.23\bin\service.bat" -ArgumentList "install" -Wait -Verbose
$tomcatinstall
if ($tomcatinstall.ExitCode -eq 0) {
	write-host "Successfully Installed Tomcat"
}
else {
	write-host "Tomcat installer exited with exit code $($tomcatinstall.ExitCode)"
}

#Check if http://localhost:8080 does respond with HTTP 200, then...
echo "Starting Service Tomcat8..."
Start-Service "Tomcat8"

echo "Test url..."
(Invoke-WebRequest -Uri "http://localhost:8080").StatusCode

#Stop the service
Stop-Service "Tomcat8"
echo "Stoping Service Tomcat8..."


#install JavaBridge

#donwload JB
$JB_url = "https://razaoinfo.dl.sourceforge.net/project/php-java-bridge/Binary%20package/php-java-bridge_7.1.3/php-java-bridge_7.1.3_documentation.zip"
$JB_zip = "php-java-bridge_7.1.3_documentation.zip"
$JB_tmp = $donwload_dir + "\JB"

if (!(Test-Path $donwload_dir\$JB_zip)) {
  Write-Host "Downloading $JB_zip..."
  Invoke-WebRequest -Uri $TOMCAT_url -OutFile $donwload_dir\$JB_zip
}

#unzip
if (!(Test-Path $JB_tmp)) {
  Write-Host "Unzipping $JB_zip"
  Unzip $donwload_dir\$JB_zip $JB_tmp
  Write-Host "Unzip DONE!"
}

#copy JavaBridge.war %TOMCAT_HOME%/webapps/JavaBridge.war
Copy-Item $JB_tmp"\JavaBridge.war" -Destination $Env:TOMCAT_HOME"\webapps\"
Start-Service "Tomcat8"

#copy %PHP_HOME%/bin/php-cgi.exe %TOMCAT_HOME%\webapps\JavaBridge\WEB-INF\cgi\amd64-windows\
Copy-Item "c:\php\php-cgi.exe" -Destination $Env:TOMCAT_HOME"\webapps\JavaBridge\WEB-INF\cgi\amd64-windows\"
#copy %PHP_HOME%/bin/php5.dll %TOMCAT_HOME%\webapps\JavaBridge\WEB-INF\cgi\amd64-windows\
Copy-Item "c:\php\php5.dll" -Destination $Env:TOMCAT_HOME"\webapps\JavaBridge\WEB-INF\cgi\amd64-windows\"

#Start Tomcat Service (for automatic deployment, tomcat will explode the war file into a physical directory)
#Check for http://localhost:8080/JavaBridge/test.php, if answers back with HTTP 200, then...
#Stop Tomcat Service (the ../webapps/JavaBridge folder was created, now continue with the deployment...)
(Invoke-WebRequest -Uri "http://localhost:8080/JavaBridge/test.php").StatusCode
Stop-Service "Tomcat8"

#Install ASPOSE
#Manual dowload.
  #https://downloads.aspose.com/login.aspx?returnURL=https://downloads.aspose.com/cells/java/new-releases/aspose.cells-for-java-17.9/
$ASPOSE_zip = "aspose-cells-17.9-java.zip"
$ASPOSE_tmp = $donwload_dir + "\ASPOSE"

#Unzip aspose-cells-17.9-java.zip from aspose-cells-17.9-java.zip
if (!(Test-Path $ASPOSE_tmp)) {
  Write-Host "Unzipping $ASPOSE_zip"
  Unzip $donwload_dir\$ASPOSE_zip $ASPOSE_tmp
  Unzip $ASPOSE_tmp"\JDK 1.6\"$ASPOSE_zip $ASPOSE_tmp
  Write-Host "Unzip DONE!"
}

#unzip aspose-cells-17.9-java.zip:lib/aspose-cells-17.9.jar -> %TOMCAT_HOME%/webapps/JavaBridge/WEB-INF/lib/
Copy-Item $ASPOSE_tmp"\lib\aspose-cells-17.9.jar" -Destination $Env:TOMCAT_HOME"\webapps\JavaBridge\WEB-INF\lib"
#unzip aspose-cells-17.9-java.zip:lib/bcprov-jdk16-146.jar -> %TOMCAT_HOME%/webapps/JavaBridge/WEB-INF/lib/
Copy-Item $ASPOSE_tmp"\lib\bcprov-jdk16-146.jar" -Destination $Env:TOMCAT_HOME"\webapps\JavaBridge\WEB-INF\lib"

#start Tomcat service
Start-Service "Tomcat8"

echo "Tomcat + JabaBridge + Aspose DONE!!!"
