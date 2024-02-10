# Change directory to your Git repository
cd "C:\xampp\htdocs\portfolio"

# Add all changes
git add .

# Commit with a common message
git commit -m "Auto commit at $(Get-Date)"

# Push changes to remote repository
git push origin main
