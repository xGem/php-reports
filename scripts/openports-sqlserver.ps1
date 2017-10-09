Import-Module "sqlps"
$srvMgmtObj = 'Microsoft.SqlServer.Management.Smo.'
$wmi = new-object ($srvMgmtObj + 'Wmi.ManagedComputer').

# List the object properties, including the instance names.
# $Wmi

# Enable the TCP protocol on the default instance.
$uri = "ManagedComputer[@Name='" + (get-item env:\computername).Value + "']/ServerInstance[@Name='SQLEXPRESS']/ServerProtocol[@Name='Tcp']"
$Tcp = $wmi.GetSmoObject($uri)
$Tcp.IsEnabled = $true
$Tcp.Alter()
$Tcp

Set-ExecutionPolicy -ExecutionPolicy RemoteSigned
#Enabling SQL Server Ports
New-NetFirewallRule -DisplayName "SQL Server" -Direction Inbound -Protocol TCP -LocalPort 1433 -Action allow
New-NetFirewallRule -DisplayName "SQL Admin Connection" -Direction Inbound -Protocol TCP -LocalPort 1434 -Action allow
New-NetFirewallRule -DisplayName "SQL Database Management" -Direction Inbound -Protocol UDP -LocalPort 1434 -Action allow
