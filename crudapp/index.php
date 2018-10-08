<?php require "config/config.php"; ?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />    
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 flex-container">
                <!-- Show Data Here -->
                <div class="col-lg-8 col-xs-12">
                    <h3>User Data</h3>
                    <hr>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>                        
                             <?php
                                $query = "SELECT * FROM users";
                                $fire = mysqli_query($con,$query) or die("Can not fetch data from database ".mysqli_error($con));
                                //if($fire) echo "We got the data from database.";

                                if(mysqli_num_rows($fire)>0){                           
                                    while($user = mysqli_fetch_assoc($fire)){ ?>                                          
                                <tr>
                                    <td><?php echo $user['username'] ?></td>
                                    <td><?php echo $user['fullname'] ?></td>
                                    <td><?php echo $user['email'] ?></td>                                    
                                    <td>
                                        <a href="config/actions.php?del=<?php echo $user['id'] ?>"
                                           class="btn btn-sm btn-danger">Delete</a>
                                    </td> 
                                    <td>
                                        <a class="btn btn-sm btn-warning"
                                            href="update.php?upd=<?php echo $user['id'] ?>"
                                            >Update</a>
                                    </td>                                                                     
                                </tr>

                                   <?php
                                    }      
                                }
                                else{ ?>
                                    <tr>
                                      <td colspan="3" class="text-center">
                                          <h2 class="text-muted">There is No Data to Show !!</h2>
                                      </td>
                                  </tr>      
                              <?php } ?>
                        </tbody>
                    </table>
                    </div>


                   


                </div>
                <!-- Signup form -->
                <div class="col-lg-4 col-xs-12">
                    <h3>Signup</h3>
                    <hr>
                    <?php
                    if(isset($_GET['msg'])) echo $_GET['msg'];
                    ?>
                    <form name="signup" id="signup" action="config/actions.php" method="POST">
                        <div class="form-group">
                            <label  for="fullname">Fullname</label>
                            <input  name="fullname" id="fullname" type="text" class="form-control" placeholder="fullname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="text" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" id="username" type="text" class="form-control" placeholder="username" >
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" id="password" type="password" class="form-control" placeholder="password" >
                        </div>
                        <div class="form-group">                            
                           <button name="submit" id="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>