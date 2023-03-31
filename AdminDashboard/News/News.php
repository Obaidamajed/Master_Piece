<?php  include('../Includes/header.php'); ?>

    <nav id="nav-news" class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="News.php">News</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="AddNews.php" id="Add" onmouseover="AddOver()" onmouseout="AddOut()">Add News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Coaches/Coaches.php">Coaches</a>
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
        $sql = "SELECT * FROM `news` ";
        $result = mysqli_query($conn,$sql); 
    ?>

    <h1 id="title-news">All News</h1>
    <div class="row">
        <div class="col-sm-12">
            <table id="table-news" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Main_title</th>
                        <th scope="col">Description</th>
                        <th id="action-news" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(mysqli_num_rows($result) > 0): ?> 
                    <?php $num = 1; ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $num; ?></td>
                            <td><img width="200px" src="News's_Image/<?php echo $row['Photo']; ?>" alt="<?php echo $row['Photo']; ?>"></td>
                            <td id="Main-title-news"><?php echo $row['Main_title']; ?></td>
                            <td id="descr-news"  ><?php echo $row['Description']; ?></td>
                            <td id="action-icons-news">
                                <div id="edit-icon-news">Edit</div><a class="btn btn-info" href="editNews.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-edit"></i> </a><br><br>
                                <div id="delete-icon-news">Delete</div><a class="btn btn-danger" href="deleteNews.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-close"></i> </a>
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

