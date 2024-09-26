# Getting started with XAMPP Portable

The following explains how to install XAMPP (Cross-platform(X), Apache(A),Mysql/MariaDB(M), PHP\(P\), Perl\(P\))

Installing and getting up and running with XAMPP is easy but you need to make sure you download the correct version. You need to make sure you are using a PHP version that is 8.2 or greater. **MAKE SURE YOU DOWNLOAD THE ZIP AND NOT THE .EXE**.

Open a browser and go to https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/

Download *xampp-portable-windows-x64-8.2.12-0-VS16.zip*. Unzip the resulting file into the **root** of your USB drive. It might take a bit of time.

> What do I mean by the root of the USB? When you view the files on the USB there should be a folder called XAMPP. You shouldn't have to click into any other folders first. When you go into the XAMPP folder there should be a file called xampp-control.exe. So the following would be correct D:\xampp\control.exe, and this would be incorrect D:\xampp-portable-windows-x64-8.2.12-0-VS16.zip\xampp\control.exe.

* Navigate to this folder and click on xampp-control.exe.
* You might need to select a language
* A control panel should open
* Start the Apache web server
* Start MySQL
* Open a web browser and point it at http://localhost. You should see the xampp homepage.

## What to do if it doesn't work
Check the following:
1. You have downloaded the correct version. MAKE SURE YOU USE THE .zip. DON'T USE THE .exe.
2. You have unzipped the folder into the root of you USB drive. Do not put it in a sub-folder.

## Where do I put my HTML, CSS and PHP files?
Your web applications are run from the *htdocs* folder.
* Navigate to the *htdocs* folder
* Create a new folder e.g. CHT2520
* Create a simple php page e.g. *test.php* and save it in the *CHT2520* folder
* Navigate to http://localhost/CHT2520/test.php to check it works.

## What can go wrong?
* You have to remember to stop Apache and MySQL before ejecting the USB.
* It's also worth checking on the taskbar under hidden items to make sure you haven't got multiple instances of XAMPP running.

## Important
* It is your responsibility to look after your USB stick. You will probably 
* Back-up your work regularly. It's very easy to leave it in a machine by accident, lose it, damage it, so make sure you back-up reguarly. 