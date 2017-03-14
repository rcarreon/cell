#!/bin/bash
prd_dir="/app/shared/cell/"
dev_dir="/app/shared/devcell/"
cache_dir="/app/shared/cache_dir/"
echo -e "Deploy de dev para prod..."
sleep 2 
echo -e "About to sync $dev_dir > $prd_dir \n want to continue? y/n"
read ans

if [[ $ans == y ]];then 
	git status | grep "nothing to commit"
	RES="`echo $?`"
	if [[ $RES == 0 ]];then 
		echo -e "Nothing to commit \n"
	else	
		#set -x
		echo -e "Archivos modificados .."
		echo "`git status | egrep -v 'git|branch'`" 
		git add .
		git diff 
		echo -e "Mensaje para commit ?\n"
		read msg
		git commit -m "${msg}"
		echo -e "Empujando a git.."
		git push
		if [[ -d $prd_dir ]];then 
		### syncing dev to prd  
		echo "`sudo rsync --dry-run -avhP  --exclude .git $dev_dir $prd_dir`"
		else 
			echo -e "No hay dir de prod, quieres crearlo  y sync? "
			read resync
			if [[ $resync == "y" ]];then 
				`sudo mkdir $prd_dir && sudo rsync -avhP $dev_dir $prd_dir`
			else 
				echo -e "Saliendo...\n"
				exit 29
			fi 
		fi
	fi	
else 
	echo "Saliendo...\n"
	exit 34
fi 
