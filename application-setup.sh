# source /etc/environment
# source /etc/apache2/envvars

clear

echo -e "Hey Dev, \nWelcome to \e[91mDesapegado's \e[39msetup!"

echo -ne 'Updating project dependencies with composer \n'

composer update

echo -ne 'Setup is \e[92mDone! \n'

# Powered by tunnes, gmoraiz and glassesman
# Do not copy non-comedy
