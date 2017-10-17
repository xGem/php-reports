# php-reports
by [xGem](http://www.xgem.com.ar)

## Requirements

- VirtualBox 5.1.8 [link](https://www.virtualbox.org/wiki/Downloads)
- Vagrant 2.0.0 [link](https://www.vagrantup.com/downloads.html)

## Setup

- Clone, with one of these two options:
  ```
  git clone git@github.com:xGem/php-reports.git
  git clone https://github.com/xGem/php-reports
  ```
- Add this record on host file. (ex. c:\windows\drivers\etc\host)
```
192.168.33.10 php-reports.dev
```
- Manual download and copy this file in /download folder.
  - asponse-cells-17.9-java.zip (https://downloads.aspose.com/login.aspx?returnURL=https://downloads.aspose.com/cells/java/new-releases/aspose.cells-for-java-17.9/)
  - jdk-8u144-windows-x64.exe
  (http://www.oracle.com/technetwork/java/javase/downloads/index.html)
- Vagrant up.
note: Vagrant provision scripts details [link](vagrant.md)
- Access provisioned computer with vagrant/vagrant.
- Import example datasets from /data directory.

## Testing Installation

- Open http://php-reports.dev/php-reports

&copy; xGem 2017
