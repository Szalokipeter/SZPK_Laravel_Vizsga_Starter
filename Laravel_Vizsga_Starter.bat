@echo off
cd /d "%~dp0"
powershell "Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))"
set "PHPINI_FOLDER=C:\Users\%USERNAME%\.config\herd-lite\bin"
set "PHPINI_PATH=%PHPINI_FOLDER%\php.ini"
powershell -Command "(Get-Content -LiteralPath '%PHPINI_PATH%') -replace 'variables_order = \"EGPCS\"', 'variables_order = \"GPCS\"' | Set-Content -LiteralPath '%PHPINI_PATH%'"
set "PATH=%PATH%;%PHPINI_FOLDER%"
echo Laravel has been configured for development.
echo Press any button to continue...
pause >nul
echo l
echo l
REM echo Wait for the job to finish, if the other console closed already, that only means the project has been created, you still need to wait for the Models and Controllers creation.
echo l    DO NOT CLOSE THIS CMD UNTIL IT TELLS YOU TO
echo l
echo l
powershell -ExecutionPolicy Bypass -File "%CD%\starter.ps1"
echo Job finished, press any button to close this.
pause >nul