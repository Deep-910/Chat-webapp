<?php
session_start();
include "db.php";

$q = "SELECT * FROM `msg`";
if (mysqli_query($db, $q)) {

    if (mysqli_num_rows($rq) > 0) {
        while ($data = mysqli_fetch_assoc($rq)) {
?>
            <p>
                <span>
                    <? = $data["phone"]?>
                </span>
                <?= $data["msg"]?>
            </p>


<?php
        }
    } else {
        echo "<h3> chat is empty at this moment. </h3>";
    }
}

?>