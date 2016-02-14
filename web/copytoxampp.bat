set root=c:\xampp\htdocs\beehive
set src=c:\beehive\beehive\web

rem cleanout previous version from web htdocs folder
rem so that any old code is removed
rmdir /Q /S %root%\
mkdir %root%\css
mkdir %root%\images
mkdir %root%\js

rem copy all the source to the htdocs
xcopy %src%\css %root%\css /s /e
xcopy %src%\js %root%\js /s /e
xcopy %src%\images %root%\images /s /e
copy %src%\*.php %root%\
