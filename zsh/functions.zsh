
function gitdelete() {
    git push origin --delete $1
    git branch -D $1
}

function gitrenamebranchlocal() {
    git branch -m $1
}

function gitrenamebranch() {
    git branch -m $1 # rename local
    git push origin -u $1 # push remote
    git push origin --delete $1 # delete old branch
}

function gitdeletefile() {
    git rm -r --cached $1
    git filter-branch --index-filter "git rm -rf --cached --ignore-unmatch $1" HEAD
    echo "now git push --force or ggpush -f to reflect on remote"
}

# Open the Pull Request URL for your current directory's branch (base branch defaults to master)
function openpr() {
  github_branch=${1:-develop}
  github_url=`git remote -v | awk '/fetch/{print $2}' | sed -Ee 's#(git@|git://)#https://#' -e 's@com:@com/@' -e 's%\.git$%%' | awk '/github/'`;
  branch_name=`git symbolic-ref HEAD | cut -d"/" -f 3,4`;
  pr_url=$github_url"/compare/"$github_branch"..."$branch_name
  open $pr_url;
}
