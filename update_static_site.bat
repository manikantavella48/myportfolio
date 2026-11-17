@echo off
echo ========================================================
echo   Updating Static Portfolio for GitHub Pages
echo ========================================================
echo.
"C:\xampp\php\php.exe" "%~dp0scratch\build_static.php"
echo.
echo ========================================================
echo   Done! index.html has been refreshed with latest data.
echo   Open GitHub Desktop to push your changes!
echo ========================================================
pause
