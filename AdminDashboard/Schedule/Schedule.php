<?php  include('../Includes/header.php'); ?>


    <nav id="nav-Schedule" class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="Schedule.php">Schedule</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="../Coaches/Coaches.php">Coaches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../News/News.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Subscribe/Subscribe.php">Subscribers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Contact_Us/Contact_Us.php">Contact_Us</a>
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
        $sql = "SELECT * FROM `schedule` ";
        $result = mysqli_query($conn,$sql); 
    ?>

    <h1 id="title-Schedule">Exercise Days</h1>
    <div class="row">
        <div class="col-sm-12">
            <table id="table-Schedule" class="table">

                <thead>
                <?php if(mysqli_num_rows($result) > 0): ?> 
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <th scope="col"><?php echo $row['1st_Day']; ?></th>
                        <th scope="col"><?php echo $row['2nd_Day']; ?></th>
                        <th scope="col"><?php echo $row['3rd_Day']; ?></th>
                        <th id="action-Schedule" scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><?php echo $row['1st_Time']; ?></td>
                        <td><?php echo $row['2nd_Time']; ?></td>
                        <td><?php echo $row['3rd_Time']; ?></td>
                        <td id="action-icons-Schedule">
                            <div><div id="edit-icon-Schedule">Edit</div> <a class="btn btn-info" href="editSchedule.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-edit"></i> </a></div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php  include('../Includes/footer.php'); ?>

