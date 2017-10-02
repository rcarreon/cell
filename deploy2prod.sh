#!/bin/bash
### Deploy script para cell city ###
prd_dir="/app/shared/cell/"
dev_dir="/app/shared/devcell/"
cache_dir="/app/shared/cache_dir/"
## otro comentario  mas mamon dev ccity_gdl  scripting2 scripting3
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
		echo -e "Mensaje para commit ?\n"
		read msg
		git commit -m "${msg}"
		echo -e "Empujando a git.."
		echo -e "Esto se hara..."
		git diff 
		git push
		if [[ -d $prd_dir ]];then 
		### syncing dev to prd  
			echo -e "Esto se haria..\n"
			echo -e "`sudo rsync  -avhunP  --exclude .git $dev_dir $prd_dir`\n"
			echo -e "Quieres seguir? y/n\n"
			read ans
			if [[ $ans  == "y" ]];then 
	                	echo -e "`sudo rsync  -avhuP  --exclude .git $dev_dir $prd_dir`\n"
			else 
				echo -e "Saliendo sin hacen el rsync\n"
			fi
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
	echo -e "Saliendo...\n"
	exit 34
fi 
