<?php
include('db_incl.php');

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

    // Check for an uploaded file:
    if (isset($_FILES['img'])) {

        // Validate the type. Should be JPEG or PNG.
        $allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png',
            'image/x-png');
        if (in_array($_FILES['img']['type'], $allowed)) {

            // Move the file over.
            if (move_uploaded_file($_FILES['img']['tmp_name'], "C:/xampp/htdocs/uploads/{$_FILES['img']['name']}")) {
                echo '<p class="success"><em>The file has been uploaded!</em></p>';
                $sql="INSERT INTO `content` (img)
                       VALUES ('{$_FILES['img']['name']}')";
                if (!mysqli_query($dbc,$sql))
                {
                    die('Error: ' . mysqli_error($dbc));
                }
            } // End of move... IF.
        } else { // Invalid type.
            echo '<p style="font-weight:bold; color:#cc0000; width: 500px">Please upload a JPEG or PNG image.</p>';
        }
    } //End of isset($_FILES['img']) IF.

// Check for an error:
    if ($_FILES['img']['error'] > 0) {
        echo '<p style="font-weight:bold; color:#cc0000; width: 500px">The file could not be uploaded because: <strong>';

        // Print a message based upon the error.
        switch ($_FILES['img']['error']) {
            case 1:
                print 'The file exceeds the upload_max_filesize setting in php.ini.';
                break;
            case 2:
                print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
                break;
            case 3:
                print 'The file was only partially uploaded.';
                break;
            case 4:
                print 'No file was uploaded.';
                break;
            case 5:
                print 'No temporary folder was available.';
                break;
            case 6:
                print 'Unable to write to the disk.';
                break;
            case 7:
                print 'File upload stopped.';
                break;
            default:
                print 'A system error occurred.';
                break;
        } // End of switch.

        print '</strong></p>';
    } // End of error IF.

// Delete the file if it still exists:
    if (file_exists ($_FILES['img']['tmp_name']) && is_file($_FILES['img']['tmp_name'])) {
        unlink ($_FILES['img']['tmp_name']);
    }
} // End of the submitted conditional.
?>
<div class="center">
    <form enctype="multipart/form-data" action="upload_image.php" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
        <fieldset><legend>Select a JPEG or PNG image of 512kb<br> or smaller to be uploaded:</legend>
            <p><b>File:</b><input type="file" name="img"/></p>
        </fieldset>
        <div align="center"><input type="submit" name="submit" value="Submit" /></div>
    </form></div>