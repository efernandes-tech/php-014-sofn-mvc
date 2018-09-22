<?php

//initilize the page
require_once("../public/templates/tpl_smartadmin/inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("../public/templates/tpl_smartadmin/inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Blank";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
// $page_css[] = "your_style.css";
include("../public/templates/tpl_smartadmin/inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["blank"]["active"] = true;
include("../public/templates/tpl_smartadmin/inc/nav.php");

?>

<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
    <?php
        //configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
        //$breadcrumbs["New Crumb"] => "http://url.com"
        include("../public/templates/tpl_smartadmin/inc/ribbon.php");
    ?>

    <!-- MAIN CONTENT -->
    <div id="content">

        <?php echo $this->content(); ?>

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
    include("../public/templates/tpl_smartadmin/inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php
    //include required scripts
    include("../public/templates/tpl_smartadmin/inc/scripts.php");
?>

<!-- PAGE RELATED PLUGIN(S)
<script src="..."></script>-->

<script>


</script>

<?php
    //include footer
    include("../public/templates/tpl_smartadmin/inc/google-analytics.php");
?>