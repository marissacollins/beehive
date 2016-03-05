set root=c:\xampp\htdocs\beehive
set src=C:\beehive\beehive

rmdir /Q /S %root%\
mkdir %root%\web
rem mkdir %root%\css
rem mkdir %root%\images
rem mkdir %root%\js

rem xcopy %src%\css %root%\css /s /e
rem xcopy %src%\js %root%\js /s /e
rem xcopy %src%\images %root%\images /s /e
xcopy %src%\web %root%\web /s /e
copy %src%\*.php %root%\