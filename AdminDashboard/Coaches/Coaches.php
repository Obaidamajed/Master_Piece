<?php  include('../Includes/header.php'); ?>

    <nav id="nav-coaches" class="navbar navbar-expand-lg navbar-dark" >
        <a class="navbar-brand" href="Coaches.php">Coaches</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="AddCoach.php" id="Add" onmouseover="AddOver()" onmouseout="AddOut()">Add Coach</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Subscribe/Subscribe.php">Subscribers</a>
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
        $sql = "SELECT * FROM `coaches` ";
        $result = mysqli_query($conn,$sql); 
    ?>


    <h1 id="title-coaches">All Coaches</h1>
    <div class="row">
        <div class="col-sm-12">
            <table id="table-coaches" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Photo</th>
                        <th id="action-coaches" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if(mysqli_num_rows($result) > 0): ?> 
                        <?php $num = 1; ?> 
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Category']; ?></td>
                                <td><img id="img-coach" src="Coache's_Image/<?php echo $row['Photo']; ?>" alt="<?php echo $row['Photo']; ?>"></td>
                                <td id="action-icons-coaches">
                                    <div id="edit-icon-coach">Edit</div><a class="btn btn-info" href="editCoach.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-edit"></i> </a><br><br>
                                    <div id="delete-icon-coach">Delete</div><a class="btn btn-danger" href="deleteCoach.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-close"></i> </a>
                                </td>
                            </tr>
                            <?php ++$num ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php  include('../Includes/footer.php'); ?>

