<?php

include 'filesLogic.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload and Download Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <h3>Upload Files</h3>
                <input type="file" name="myfile"><br>
                <button type="submit" name="save">Upload</button>
            </form>
        </div>
        <div class="row">
            <table>
                <thead>
                    <th>ID</th>
                    <th>FileName</th>
                    <th>Size (in MB)</th>
                    <th>Downloads</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                       foreach($files as $file): ?>
                          <tr>
                             <td>
                                    <?php
                                       echo $file['id'];  
                                    ?> 
                             </td>
                             <td>
                                    <?php
                                       echo $file['name'];  
                                    ?> 
                             </td>
                             <td>
                                    <?php
                                       echo $file['size'] / 1000 . "KB";  
                                    ?> 
                             </td>
                             <td>
                                    <?php
                                       echo $file['downloads'];  
                                    ?> 
                             </td>
                             <td>
                                    <a href="index.php?file_id=<?php
                                    $file['id'];?>">Download</a>
                             </td>
                          </tr>
                          <?php
                              endforeach;
                          ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>