#!/bin/sh
clear
echo ""
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - -"
echo ""
if [ "$#" -eq  "0" ]
   then
     branch="dev"
     dir="dev"
     server="dev"
else
     branch=$1
     dir=$2
     server=$3
fi
if [ "$dir" =  "" ]
    then
      dir="dev"
fi
if [ "$server" =  "" ]
    then
      server="dev"
fi
echo "Processing ${branch} branch on directory ${dir} in ${server} server..."
echo ""
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - -"
echo ""
git checkout ${branch}
git pull origin ${branch}
git status
git push origin ${branch}
echo "\n\n\n"
echo "Dev server deployment initiated..."
echo "\n\n\n"
~/.composer/vendor/bin/envoy run deploy_dev --server=${server} --branch=${branch} --dir=${dir}
