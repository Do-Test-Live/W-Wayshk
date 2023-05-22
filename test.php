<?php
if(isset($_POST['formSubmit'])){
// Retrieve the values of dynamically added fields
    $fields = $_POST['field'];

// Process the data as needed
    foreach ($fields as $field) {
        // Do something with each field value
        echo $field.'</br>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Add On fields</title>
</head>
<body>


<form id="myForm" method="post" action="#">
    <div id="fieldsContainer">
        <div class="field">
            <input type="text" name="field[]" />
            <button type="button" class="removeField">Remove</button>
        </div>
    </div>
    <button type="button" id="addField">Add Field</button>
    <button type="submit" name="formSubmit">Submit</button>
</form>


<script>
    window.onload = function () {
        // Get references to necessary elements
        var form = document.getElementById('myForm');
        var addFieldButton = document.getElementById('addField');
        var fieldsContainer = document.getElementById('fieldsContainer');

        // Add event listener to the "Add Field" button
        addFieldButton.addEventListener('click', function () {
            // Create a new field element
            var field = document.createElement('div');
            field.className = 'field';
            field.innerHTML =
                '<input type="text" name="field[]" />' +
                '<button type="button" class="removeField">Remove</button>';

            // Add event listener to the "Remove" button
            var removeButton = field.querySelector('.removeField');
            removeButton.addEventListener('click', function () {
                fieldsContainer.removeChild(field);
            });

            // Append the new field to the container
            fieldsContainer.appendChild(field);
        });

        // Add event listener to the form submission
    };
</script>

</body>
</html>