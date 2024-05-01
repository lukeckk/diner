<?php
// Check if @SESSION.language is set and is an array
if(isset($_SESSION['language']) && is_array($_SESSION['language'])) {
    // Initialize an empty string to store mailing lists
    $mailingLists = '';

    // Loop through each selected language and concatenate it with a comma
    foreach($_SESSION['language'] as $language) {
        $mailingLists .= htmlspecialchars($language) . ', ';
    }

    // Remove the trailing comma and space
    $mailingLists = rtrim($mailingLists, ', ');
} else {
    $mailingLists = "No mailing lists selected.";
}
?>