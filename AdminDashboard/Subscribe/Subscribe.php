<?php  include('../Includes/header.php'); ?>

    <nav id="nav-Subscribe" class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="Subscribe.php">Subscribers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="AddSubscriber.php" id="Add" onmouseover="AddOver()" onmouseout="AddOut()">Add Subscriber</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Coaches/Coaches.php">Coaches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../News/News.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Contact_Us/Contact_Us.php">Contact_Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Schedule/Schedule.php">Schedule</a>
                </li>
                <li class="nav-item">
                    <a style="color: #9C4B00" class="nav-link" href="../../PublicDashboard/index.php">Public_Dashboard</a>
                </li>
            
            </ul>
        </div>
    </nav>

<div class="container-fluid">
    <?php  
        // Read From DataBase
        $sql = "SELECT * FROM `subscribe` ";
        $result = mysqli_query($conn,$sql); 
    ?>

    <h1 id="title-Subscribe">All Subscribers</h1>
    <div class="row">
        <div class="col-sm-12">
            <table id="table-Subscribe" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full_Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Email</th>
                        <th scope="col">Size</th>
                        <th id="action-subscribe" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(mysqli_num_rows($result) > 0): ?> 
                    <?php $num = 1; ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $num;?></td>
                            <td><?php echo $row['Full_Name']; ?></td>
                            <td><?php echo $row['Phone']; ?></td>
                            <td><?php echo $row['Day'] . "\\" .  $row['Month'] . "\\" .  $row['Year']; ?></td>
                            <td><?php echo $row['Email']; ?></td>
                            <!-- <td style="max-width:2em; overflow-y: hidden"><?php echo $row['Month']; ?></td>
                            <td style="max-width:2em; overflow-y: hidden"><?php echo $row['Year']; ?></td> -->
                            <td><?php echo $row['Size']; ?></td>
                            <!-- <td style="max-width:300px;"><?php echo $row['Message']; ?></td> -->
                            <td id="action-icons-subscriber">
                                <div id="edit-icon-subscriber">Edit</div><a class="btn btn-info" href="editSubscriber.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-edit"></i> </a><br><br>
                                <div id="delete-icon-subscriber">Delete</div><a class="btn btn-danger" href="deleteSubscriber.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-close"></i> </a>
                            </td>
                        </tr>
                        <?php $num++ ?>
                    <?php endwhile; ?>
                <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php  include('../Includes/footer.php'); ?>

