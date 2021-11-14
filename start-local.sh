#!/bin/bash
# Local Docker WP build for OSX
# FusionFrog 2020

Green='\033[0;32m'
Yellow='\033[0;33m'
Red='\033[0;31m'
NC='\033[0m'

echo -e "${Green}Starting Ngrok${NC}"
# kill previous and start ngrok in background
killall ngrok 2> /dev/null 
./ngrok http 80 > /dev/null &

HTTPSURL=""
# wait for user interface
until [[ $HTTPSURL != "" ]]
do
  HTTPSURL=$(curl --silent http://127.0.0.1:4040/api/tunnels | sed -nE 's/.*public_url":"https:..([^"]*).*/\1/p')
done

HTTPSURL="https://${HTTPSURL}"
echo -e "${Green}NGROK started at ${HTTPSURL} ${NC}"

edit_wp_config() {
    PARAM=$1
    quotes="'"
    firstMatch1="$PARAM$quotes,$quotes"
    firstMatch2="$PARAM$quotes"
    sed -i -e 's|\('${firstMatch1}'\).*\('$quotes'\)|'${firstMatch2}','$quotes''${HTTPSURL}''$quotes'|g' public/wp-config-localonly.php && rm public/wp-config-localonly.php-e
}

edit_wp_config "WP_SITEURL"
edit_wp_config "WP_HOME"

echo -e "${Red}Open ${Yellow}${HTTPSURL}/${Red} for wordpress and http://localhost:8080 for phpmyadmin${NC}"

# Change Brave Browser with your preffered browser
open -a "/Applications/Chrome.app" ${HTTPSURL}/wp-admin

echo -e "${Green}Starting local Wordpress environment. Refresh the browser once environment starts.${NC}"
docker-compose up
killall ngrok 2> /dev/null 
