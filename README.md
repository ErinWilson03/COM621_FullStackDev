# Powershell Script for batch installing Visual Studio Code extensions
$module_profile = "PHP"
$extensions = @(
"formulahendry.auto-close-tag",
"formulahendry.auto-rename-tag",
"zobo.php-intellisense",
"devsense.phptools-vscode",
"devsense.composer-php-vscode",
"mikestead.dotenv",
"shufo.vscode-blade-formatter",
"onecentlin.laravel-blade",
"onecentlin.laravel5-snippets",
"amiralizadeh9480.laravel-extra-intellisense",
"codingyu.laravel-goto-view",
"pkief.material-icon-theme",
"bmewburn.vscode-intelephense-client",
"mehedidracula.php-namespace-resolver",
"bradlc.vscode-tailwindcss",
"liamhammett.temphpest"
)
$cmd = "code --list-extensions"
Invoke-Expression $cmd -OutVariable output | Out-Null
$installed = $output -split "\s"
code --profile $module_profile
$confirm = Read-Host "Enter y to confirm installation:"
if ($confirm -eq "Y" -or $confirm -eq "y") {
foreach ($ext in $extensions) {
if ($installed.Contains($ext)) {
Write-Host $ext "already installed." -ForegroundColor Gray
} else {
Write-Host "Installing" $ext "..." -ForegroundColor White
code --profile $module_profile --install-extension $ext --force
}
}
Write-Host "Extensions installed.."
} else {
Write-Host "Extensions not installed.."
}
