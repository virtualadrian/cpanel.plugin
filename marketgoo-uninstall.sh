#!/bin/sh
##############################################################################
#                         _        _
#                        | |      | |
#    _ __ ___   __ _ _ __| | _____| |_ __ _  ___   ___
#   | '_ ` _ \ / _` | '__| |/ / _ \ __/ _` |/ _ \ / _ \
#   | | | | | | (_| | |  |   <  __/ || (_| | (_) | (_) |
#   |_| |_| |_|\__,_|_|  |_|\_\___|\__\__, |\___/ \___/
#                                      __/ |
#   MarketGoo Plug-in for cPanel      |___/
#
#
#   UNISTALLER
#
#   Download and execute this file in your shell:
#   $ curl -LO http://raw.github.com/marketgoo/cpanel.plugin/master/marketgoo-uninstall.sh
#   $ /bin/sh ./marketgoo-install.sh
#
#   Execute installer directly from GitHub
#   $ curl -Lks http://git.io/marketgoo.cpanel.uninstall | sh
#
##############################################################################

WHITE=$(tput setaf 7 ; tput bold)
RED=$(tput setaf 1 ; tput bold)
GREEN=$(tput setaf 2 ; tput bold)
CYAN=$(tput setaf 6 ; tput bold)
RESET=$(tput sgr0)
WHMROOT=/usr/local/cpanel/whostmgr
TEMPDIR=$(mktemp -d marketgooplugin.XXXXXXXXX)
REMOTE_REPOSITORY=http://github.com/marketgoo/cpanel.plugin
SRCDIR=${TEMPDIR}/cpanel.plugin-master
CPVERSION=$(cat 2>/dev/null /usr/local/cpanel/version)
MKTGOODIR=/var/cpanel/marketgoo
THEMEDIR=/usr/local/cpanel/base/frontend/
THEMES=`find $THEMEDIR -maxdepth 1 -type d -exec basename {} \; | tail -n +2`

cleanup()
{
    local rc=$?
    trap - EXIT

    rm -rf $TEMPDIR
    exit $rc
}

uninstall_whm_addon()
{
    echo "${WHITE}Uninstalling WHM AddOn${RESET}"

    # First, unregister addon thru AppConfig
    if [ -x /usr/local/cpanel/bin/unregister_appconfig ]; then
        /usr/local/cpanel/bin/unregister_appconfig marketgoo >/dev/null 2>&1
    fi

    # Then delete all, WHM all versions
    rm -rf $WHMROOT/docroot/cgi/addons/marketgoo/ >/dev/null 2>&1
    rm -rf $WHMROOT/docroot/marketgoo/ >/dev/null 2>&1
    rm -rf $WHMROOT/docroot/cgi/addon_marketgoo.cgi >/dev/null 2>&1
    rm -rf $WHMROOT/docroot/themes/x/icons/marketgoo.gif >/dev/null 2>&1
    rm -rf $MKTGOODIR
}

uninstall_cpanel_plugin()
{
    $MKTGOODIR/uninstall_plugins.sh
    for i in $THEMES; do
        rm -rf $THEMEDIR/$i/marketgoo/ >/dev/null 2>&1
        rm -rf $THEMEDIR/$i/dynamicui/dynamicui_marketgoo* >/dev/null 2>&1
    done
    rm -rf $MKTGOODIR
}


trap cleanup HUP PIPE INT QUIT TERM EXIT

if [ ! -f /usr/local/cpanel/version ]; then
    echo
    echo "${RED}***** Cpanel not found *****${RESET}"
    echo "${WHITE}Are you sure you're running this on a Cpanel server?${RESET}"
    echo
    exit
fi

if [ ! -f /usr/local/cpanel/Cpanel/LiveAPI.pm ]; then
    echo
    echo "${RED}***** Cpanel::LiveAPI not found. *****${RESET}"
    echo "${WHITE}MarketGoo Plugin requires Cpanel::LiveAPI.${RESET}"
    echo "Please ensure you are running at least Cpanel version 11.32.2."
    echo "(current Cpanel version: $CPVERSION)"
    echo
    exit
fi

if [ ! -f $MKTGOODIR/uninstall_plugins.sh ]; then
    echo
    echo "${WHITE}MarketGoo plug-in for cPanel/WHM already unistalled!${RESET}"
    echo "${GREEN}*** DONE ***${RESET}"
    echo
else
    echo
    echo "${CYAN}Uninstalling MarketGoo plug-in for cPanel/WHM${RESET}"
    uninstall_cpanel_plugin && uninstall_whm_addon
    echo "${GREEN}*** DONE ***${RESET}"
    echo
fi
