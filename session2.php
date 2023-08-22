<?php
session_start();

if (isset($student1)) {
    echo $_SESSION['name'];
} else {
    echo "session variable is not set";
}
