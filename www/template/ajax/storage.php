<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo STRAGE_HEADER; ?></h1>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="btn-group pull-right">
            <a href="javascript:void(0);" class="btn btn-success" id="store-add-but"><i class="fa fa-plus fa-fw"></i>  <?php echo ADD_LOCATION; ?></a>
            <a href="javascript:void(0);" class="btn btn-success send-req-form" data-form-id="storage-form"><i class="fa fa-check fa-fw"></i>  <?php echo SAVE_CHANGES; ?></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<br>

<form id="storage-form" action="/storage" method="POST">
<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-storage">
            <tbody>
            <?php
                foreach ($locations as $id => $location){
                	$recordTime = intval($location['record_time']);
			$used_storage = intval($location['used_percent']);
                	$days = floor($recordTime / (3600 * 24));
                	$hours = floor(($recordTime % (3600* 24)) / 3600);
                	$minutues = floor(($recordTime % 3600) / 60);
            ?>
            <tr class="table-storage-tr-data">
                <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <label class="control-label"><?php echo LOCATION; ?></label>
                </td>
                <td class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <input class="form-control storage-path" name="path[]" type="text" value="<?php echo $location['path']; ?>" />
                </td>
                <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 align-right">
                    <label class="control-label">Max:</label>
                </td>
                <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="input-group">
                        <input class="form-control" type="text" name="max[]" value='<?php echo intval($location['max_thresh']); ?>' /><span class="input-group-addon">%</span>
                    </div>
                </td>
                <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 align-right">
                    <a href="javascript:void(0);" class="btn btn-warning store-add-del"><i class="fa fa-times fa-fw"></i></a>
                </td>
            </tr>
            <tr class="table-storage-tr-info">
                <td colspan="5">Storage Estimation: <?php echo $days; ?> days <?php echo $hours; ?> hours and <?php echo $minutues; ?> minutues</td>
            </tr>
	    <tr class="table-storage-tr-info">
                <td colspan="5">Storage Used: <?php  echo $used_storage."%"; ?></td>
            </tr>
	    <tr class="table-storage-tr-info">
                <td colspan="5"><div class="alert alert-warning"><i class="fa fa-warning fa-fw"></i> <?php echo "Note 1:  A storage directory is accessible only if the permissions on each of the directories in the path prefix of pathname grant search (i.e., execute) access to the user id that the web server runs as (usually 'www-data').  If any directory  is  inaccessible,  then
       the directory is not readable, even if correct permissions and ownership are set on this directory. This is a frequent issue with automounted external storage like USB drives."; ?></div></td>
            </tr>
	    <tr class="table-storage-tr-info">
                <td colspan="5"><div class="alert alert-warning"><i class="fa fa-warning fa-fw"></i> <?php echo 'Note 2:  Before adding a new folder, ensure that the: <br /> - folder exists <br /> - folder is empty <br /> - folder belongs to user bluecherry, group bluecherry. <br /><br /> To create directory run: "sudo mkdir -p &lt;your path&gt;" <br /> To set permissions run: "sudo chmod 770 &lt;your path&gt; <br /> To set ownership run: "sudo chown -R bluecherry:bluecherry &lt;your path&gt;".'; ?></div></td>
            </tr>
	    <tr class="table-storage-tr-info">
                <td colspan="5"><div class="alert alert-warning"><i class="fa fa-warning fa-fw"></i> <?php echo "Note 3:  It is recommended to mount network storage with sync option and disabled cache (option cache=none for CIFS)."; ?></div></td>
            </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>
</form>

<table id="table-storage-orig" style="display: none;">
    <tr class="table-storage-tr-data" data-id="0">
        <td class="col-lg-1">
            <label class="control-label"><?php echo LOCATION; ?></label>
        </td>
        <td class="col-lg-6">
                <input class="form-control storage-path" name="path[]" type="text" value="" />
        </td>
        <td class="col-lg-1 align-right">
            <label class="control-label">Max:</label>
        </td>
        <td class="col-lg-2">
            <div class="input-group">
                <input class="form-control" type="text" name="max[]" value="94" /><span class="input-group-addon">%</span>
            </div>
        </td>
        <td class="col-lg-2 align-right">
            <a href="" class="btn btn-warning store-add-del"><?php echo L_DELETE; ?></a>
        </td>
    </tr>
    <tr class="table-storage-tr-info" data-id="0">
        <td colspan="5"></td>
    </tr>
</table>
