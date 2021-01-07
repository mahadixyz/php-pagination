<?php
    // require Main.php class to this file and create object from it
    require_once 'class/Main.php';
    $user = new Main;
    
    // Get page index from url, if nothing found, set it to 1
     if(isset($_GET['page']))
     {
         $page = $_GET['page'];
     }
     else
     {
         $page = 1;
     }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Data with pagination</title>
</head>

<body>

    <div class="container overflow-hidden">
        <div class="row g-3">
            <div class="col-8 mt-5 mx-auto">
                <div class="border p-3">
                <?php    
                    // If any error message set into session, show it as an alert!
                    if(isset($_SESSION['err']))
                    {
                        echo '<div class="alert alert-danger">'.$_SESSION['err'].'</div>';
                        
                        // Unset the error message from session, after displaying
                        unset($_SESSION['err']);
                    }
                ?>

                    <!-- Data from the Database -->
                    <h2 class="display-5 text-center text-primary mb-3">View Registered Users</h2>
                    <table class="table">                        
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                            </tr>
                        </thead>
                        <tbody>

                <?php
                    // Call the viewUsers() method to display data from the database
                    $result = $user->viewUsers($page);

                    // Call the totalPage() method to find total page on pagination
                    $totalPage = $user->totalPage();
                    
                    // If result is not empty, means if any records found on database show it
                    if($result != false)
                    {
                        foreach($result as $data)
                        {                                      
                ?>
                            <tr>
                                <th scope="row"><?=$data->user_id?></th>
                                <td><?=$data->user_name?></td>
                                <td><?=$data->user_email?></td>
                                <td><?=$data->user_phone?></td>
                            </tr>
                <?php                                                            
                        }
                    }
                    else
                    {
                ?>
                            <!-- If $result = false, means No records found on database -->
                            <tr>
                                <td colspan="4">No Data Found</td>
                            </tr>
                <?php
                    }
                    
                ?>                           
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <!-- $page is the page number of pagination. if it is 1 or less, disable the Previous button  -->
                            <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                                <a class="page-link" href="index.php?page=<?=$page-1?>">Previous</a>
                            </li>
                            <?php
                                for($i = 1; $i <= $totalPage; $i++)
                                {
                                    ?>
                                    <!-- Add active effect if page number on URL is equal to current page link  -->
                                    <li class="page-item <?php if($i == $page){echo 'active';}?>"> 
                                        <a class="page-link" href="index.php?page=<?=$i?>"><?=$i?></a>
                                    </li>
                                    <?php
                                }
                            ?>
                        
                            <!-- $page is the page number of pagination. if it is Equal to last page, disable the Next button  -->
                            <li class="page-item <?php if($page >= $totalPage){ echo 'disabled'; } ?>"> 
                                <a class="page-link" href="index.php?page=<?=$page+1?>">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>