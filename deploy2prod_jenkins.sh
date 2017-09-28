#!/bin/bash
set -x
### Deploy script para cell city ###
### test 3 
prd_dir="/app/shared/cell/"
dev_dir="/app/shared/devcell/"
cache_dir="/tmp/cache_dir/"
echo -e "Deploy de dev para prod..."
sleep 2
echo -e "About to sync $dev_dir > $cache_dir \n want to continue? y/n"

        
if [[ ! -d $cache_dir ]];then
    ### syncing dev to prd  
		echo -e "No hay dir de cache prod, creando... "
	
    	echo -e "Creando directorio cache_temp y synceando"
    	`mkdir $cache_dir && sudo rsync -avhP $dev_dir $cache_dir`
else
                       
    	echo -e "`rsync  -avhuP  --exclude .git $dev_dir $cache_dir`\n"
fi
