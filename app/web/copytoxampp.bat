set root=c:\xampp\htdocs\beehive
set src=C:\Users\hmill\OneDrive\Documents\Beehive\beehive\web

rmdir /Q /S %root%\
mkdir %root%\css
mkdir %root%\images
mkdir %root%\js

xcopy %src%\css %root%\css /s /e
xcopy %src%\js %root%\js /s /e
xcopy %src%\images %root%\images /s /e
copy %src%\*.php %root%\