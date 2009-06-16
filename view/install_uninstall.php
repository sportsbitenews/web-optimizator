<h4>Web Optimizer <span><?php echo $version ?>/<b><?php echo $version_new ?></b></span></h4>
</div>
<p><sub><a href="javascript:history.back(1)" title="<?php echo _WEBO_SPLASH1_BACK ?>"></a></sub></p>
<div class="c">
<b></b><i></i><del></del><ins></ins>
<?php if(!empty($message)) { ?><p class="m"><?php echo $message ?></p><?php } ?>
<h2><?php echo _WEBO_SPLASH1_UNINSTALL_TITLE ?></h2>
<div class="d l">
<p><?php echo _WEBO_SPLASH1_UNINSTALL_THANKS . $_SERVER['HTTP_HOST'] . $paths['relative']['current_directory'] . _WEBO_SPLASH1_UNINSTALL_THANKS2 ?></p>
<p><?php echo _WEBO_SPLASH1_UNINSTALL_VISIT ?></p>
<p><?php echo _WEBO_SPLASH1_UNINSTALL_BACK . $paths['relative']['document_root'] . _WEBO_SPLASH1_UNINSTALL_BACK2 ?></p>
<b></b><i></i><del></del><ins></ins>
</div>