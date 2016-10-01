<?php define('BASE','../');

require(BASE."conf/auth-config.php");
require(BASE."conf/fn-utils.php");

securedAccess($userid, $bptDao, 'eventsmanager');

$mode = 'normal';
$eventid=0;
$errorMessage = null;
$infoMessage = null;

if (isset($_GET['edit'])) {
    $mode='edit';
    $eventid = $_GET['edit'];
    $editedevent = $bptDao->getEventById($eventid);

    if ($editedevent == null) {
        header('HTTP/1.0 500 Internal Server Error', true, 500);
        echo 'Wrong parameters !';
        exit();
    }

} else if (isset($_GET['new'])) {
    $mode='create';
} else if (isset($_GET['del'])) {
    $eventid = $_GET['del'];
    $bptDao->deleteEvent($eventid);
}

if (isset($_POST['bt_submit'])) {
   if ($_POST['eventid'] == "0") {
        // CREATE EVENT
        $bptDao->insertEvent($_POST['date'], $_POST['subject'], $_POST['summary'], $userid);
        $infoMessage = "L'événement a bien été créé !";
   } else {
        // UPDATE EVENT
        $bptDao->updateEvent($_POST['eventid'], $_POST['date'], $_POST['subject'], $_POST['summary'], $userid);
        $infoMessage = "L'événement bien été mis a jour !";
   }
}
?>

<!doctype html>
<html>
    <head>
		<title>
			burningphoenixteam.fr
		</title>

		<?php include ("../parts/meta-css.php"); ?>
        <link rel="stylesheet" href="<?= BASE ?>lib/jquery-ui/themes/smoothness/jquery-ui.min.css" >
        <link rel="stylesheet" href="<?= BASE ?>css/admin.css" >
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php include ("../parts/header.php"); ?>

            <div class="management-content">
                <h1>Gestion des événements calendrier</h1>

                <ul>
                    <?php
                        $allevents = $bptDao->getAllEvents(0);
                        foreach ($allevents as $eventitem) {
                            echo "<li>".$eventitem['date']." - <a href='eventsmanagement.php?edit=".$eventitem['id']."'>".$eventitem['subject']."</a>"
                                    ." <span class='glyphicon glyphicon-trash delete-event' id='".$eventitem['id']."'></span></li>";
                        }
                    ?>
                </ul>
                <span class="glyphicon glyphicon-plus-sign"></span> <a href="eventsmanagement.php?new=0">Créer une nouvel événement</a>

                <?php if ($infoMessage != null) { ?>
                <div class="alert alert-success"><?=$infoMessage?></div>
                <?php }
                if ($errorMessage != null) { ?>
                <div class="alert alert-danger"><?=$errorMessage?></div>
                <?php } ?>

                <?php if ($mode == 'edit' || $mode == 'create') { ?>

                <form action="eventsmanagement.php" method="post" class="form-horizontal" name="eventsmgmt" id="eventsmgmt" enctype="multipart/form-data">
                    <fieldset id="fs_general">
                        <legend><?php if ($mode == 'edit') { echo $editedevent['subject']; } else { echo "Créer un événement"; } ?></legend>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="date">Date : </label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" name="date" id="date" required value="<?php if ($mode == 'edit') { echo (new DateTime($editedevent['date']))->format('Y-m-d\TH:i'); } ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="subject">Nom : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subject" id="subject" maxlength="120"
                                       placeholder="Nom de l'événement" required value="<?php if ($mode == 'edit') { echo $editedevent['subject']; } ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="summary">Description : </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="summary" id="summary" maxlength="255"
                                    placeholder="Description de l'événement" required><?php if ($mode == 'edit') { echo $editedevent['summary']; } ?></textarea>
                            </div>
                        </div>

                    </fieldset>
                    <fieldset id="fs_buttons">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <input type="hidden" name="eventid" id="eventid" value="<?= $eventid ?>" />
                                <input type="reset" class="btn btn-warning" id="bt_reset" name="bt_reset" value="Reset" />
                                <input type="submit" class="btn btn-primary" id="bt_submit" name="bt_submit" value="Send" />
                            </div>
                        </div>
                    </fieldset>
                </form>
                <?php } ?>
            </div>
			 <?php include ("../parts/footer.php"); ?>
		</div>
        <div id="dialog-confirm" title="Sure to delete this event ?">
          <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This event will be permanently deleted and cannot be recovered. Are you sure?</p>
        </div>
        <?php include ("../parts/js-script.php"); ?>
        <script type="text/javascript" src="<?= BASE ?>lib/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= BASE ?>js/management.js"></script>
	</body>

</html>
