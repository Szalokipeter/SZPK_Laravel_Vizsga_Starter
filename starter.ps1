$ErrorActionPreference = "Stop"

try {
    $projectName = Read-Host "Enter the project name"
    $dbname = Read-Host "Enter the database name"
    $singleSideModel = Read-Host "Enter the singleSideModel name"
    $manySideModel = Read-Host "Enter the ManySideModel name"


    $laravelProcess = Start-Process -FilePath "laravel" -ArgumentList "new $projectName --no-interaction" -PassThru -ErrorAction Stop

    $laravelProcess.WaitForExit()
    
    if ($laravelProcess.ExitCode -ne 0) {
        Write-Error "Laravel process exited with error code: $($laravelProcess.ExitCode)"
        exit $laravelProcess.ExitCode
    }

    cd $projectName

    

    if (-not $dbname) {
        $dbname = "laravel"
    }

    (Get-Content .env) |
        ForEach-Object {
            $_ -replace 'DB_CONNECTION=sqlite', 'DB_CONNECTION=mysql' `
               -replace '# DB_HOST=127.0.0.1', 'DB_HOST=127.0.0.1' `
               -replace '# DB_PORT=3306', 'DB_PORT=3306' `
               -replace '# DB_DATABASE=laravel', "DB_DATABASE=$dbname" `
               -replace '# DB_USERNAME=root', 'DB_USERNAME=root' `
               -replace '# DB_PASSWORD=', 'DB_PASSWORD='
        } | Set-Content .env -ErrorAction Stop

    php artisan install:api -q
    if($singleSideModel -and $manySideModel){
        php artisan make:model $singleSideModel -c
        php artisan make:model $manySideModel -c
    }

} catch {
    Write-Error "An error occurred: $_"
    exit 1
}
