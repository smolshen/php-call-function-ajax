<?php
// PHP function 
function getServerMessage() {
    return json_encode(['message' => 'Hello, this is data from the server!']);
}

// Check if the request is a POST and includes the 'action' parameter
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'getData') { // Check if the 'action' parameter value is 'getData'
        echo getServerMessage(); // Call the PHP function directly
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <button id="call-function">Call PHP Function</button>
    <div id="result"></div>

    <script>
        document.getElementById('call-function').addEventListener('click', function () {
            $.ajax({
                url: '', // Empty because the PHP code is in this file
                type: 'POST',
                data: { action: 'getData' }, // action parameter is getData
                success: function (response) {
                    const data = JSON.parse(response); // convert into JS object

                    // Display the message in the result div
                    document.getElementById('result').innerHTML = data.message; // output = Hello, this is data from the server!
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>
</body>
</html>