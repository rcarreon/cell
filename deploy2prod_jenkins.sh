#!/bin/bash
### Deploy script para cell city ###
prd_dir="/app/shared/cell/"
dev_dir="/app/shared/devcell/"
cache_dir="/app/shared/cache_dir/"
echo -e "Deploy de dev para prod..."
sleep 2 
echo -e "About to sync $dev_dir > $cache_dir \n want to continue? y/n"
#read ans

#if [[ $ans == y ]];then 
	git status | grep "nothing to commit"
	RES="`echo $?`"
	if [[ $RES == 0 ]];then 
		echo -e "Nothing to commit \n"
	else	
		#set -x
		echo -e "Archivos modificados .."
		echo "`git status | egrep -v 'git|branch'`" 
		git add .
		echo -e "Mensaje para commit ?\n"
		read msg
		git commit -m "${msg}"
		echo -e "Empujando a git.."
		echo -e "Esto se hara..."
		git diff 
		git push
		if [[ -d $cache_dir ]];then 
		### syncing dev to prd  
			echo -e "Esto se haria..\n"
			echo -e "`sudo rsync  -avhunP  --exclude .git $dev_dir $cache_dir`\n"
	                	echo -e "`sudo rsync  -avhuP  --exclude .git $dev_dir $cache_dir`\n"
		else 
			echo -e "No hay dir de cache prod, creando... "
			echo -e ".\n"
			sleep 1
			echo -e ".\n"
			sleep 1
			echo -e ".\n"
				echo -e "Creando directorio cache_temp y synceando"
				set -x
				`sudo mkdir $cache_dir && sudo rsync -avhP $dev_dir $cache_dir`
		fi
	fi	
