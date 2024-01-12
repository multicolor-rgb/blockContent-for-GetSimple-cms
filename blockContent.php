<?php

$thisfile = basename(__FILE__, ".php");

# register plugin
register_plugin(
    $thisfile, //Plugin id
    'blockContent 🧊',     //Plugin name
    '4.0',         //Plugin version
    'Multicolor',  //Plugin author
    'http://www.ko-fi.com/multicolorplugins', //author website
    'New editor wysywig based on editor.js', //Plugin description
    'plugins', //page type - on which admin tab to display
    'blockContentPost'  //main function (administration)
);

# activate filter 
add_action('header', 'script_editor');
add_action('footer', 'footer_editor');


function script_editor()
{
    include(GSPLUGINPATH . '/blockContent/script.php');
}

function footer_editor()
{
    global $SITEURL;
    echo '<script>const uploadurl = "' . $SITEURL . 'plugins/blockContent/upload/upload.php"</script>
    <script src="' . $SITEURL . 'plugins/blockContent/js/scriptBlockColumn.js"></script>';
}
