<?php ;ob_start();$page = "register";// -------------------------------------------------------------//		include("include/header.php");	// -------------------------------------------------------------//	// Including the script for registering a user		$error = array();	$success = "";				if(isset($_POST['register'])){						$fname = $_POST['first_name'];			$lname = $_POST['last_name'];			$username = $_POST['username'];			$email = $_POST['email'];			$password = $_POST['password'];			$con_password = $_POST['con_password'];			$gender = $_POST['gender'];			$state = $_POST['state'];			$phone = $_POST['phone'];			$address = $_POST['address'];			$about_me = $_POST['about_me'];						if(				!empty($fname) &&				!empty($lname) &&				!empty($username) &&				!empty($email) &&				!empty($password) &&				!empty($con_password) &&				($gender != "Select") &&				($state != "Select") &&				!empty($phone) &&				!empty($address) &&				!empty($about_me)			){				//Then Check if a username already exists				$sql_check = main_query("SELECT * FROM user WHERE username='".$username."'");				$row_check = mysqli_num_rows($sql_check);					if($row_check === 1){						$error[] = '<strong>Ooops !&nbsp; </strong> Username Already Exists.';					} 									//Then Check if a email already exists				$sql_email = main_query("SELECT * FROM user WHERE email='".$email."'");				$row_email = mysqli_num_rows($sql_email);					if($row_email === 1){						$error[] = '<strong>Ooops !&nbsp; </strong> Email Already Exists.';					}				if($password != $con_password){					$error[] = '<strong>Error !&nbsp; </strong> Password Does Not Match.';				}								// Then insert user data into the database				$sql = main_query("									INSERT INTO user(first_name,identity,last_name,username,password,email,phone,gender,state,address,about_me)									VALUES(										'".$fname."',										'S',										'".$lname."',										'".$username."',										'".$password."',										'".$email."',										'".$phone."',										'".$gender."',										'".$state."',										'".$address."',										'$about_me'									)									");				if($sql){					$success = '<div class="alert alert-success" style="background: #29aafe; color: #fff; font-size: 18px;">								  <strong>&#10004; Success &nbsp; </strong> Registration Successfully.								</div>';					header("Refresh:4; url=login.php");				}	 							}else{				$error[] = '<strong>Ooops !&nbsp; </strong> All fields are required.';			}						}	// -------------------------------------------------------------//	?>				        <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3><?= $reg_page['page_title'] ?></h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="index.php"><?= $home['page_title'] ?></a> </li>                                <li class="active"><?= $reg_page['page_title'] ?></li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>		        <section class="post-job light-blue">            <div class="container">                <div class="row">								                    <div class="col-md-12 col-sm-12 col-xs-12">					                        <div class="box-panel">						                            <div class="Heading-title black">                                <h3>Let's Get Started</h3>								<?php 															foreach($error as $errors){									//echo $errors.'</br>';									echo '<div class="alert alert-danger" style="font-size: 18px;">'										  .$errors.										'</div>';								}																echo $success;														?>							</div>							                            <form class="row" action="" method="POST" style="margin-bottom: 15%;">                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>First Name</label>                                        <input type="text" name="first_name" placeholder="Your First Name" class="form-control" required />                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Last Name</label>                                        <input type="text" name="last_name" placeholder="Your Last Name" class="form-control" required />                                    </div>                                </div>								<div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Username</label>                                        <input type="text" name="username" placeholder="Your Username" class="form-control" required />                                    </div>                                </div>								<div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Email</label>                                        <input type="email" name="email" placeholder="Your Email" class="form-control" required />                                    </div>                                </div>								<div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Password</label>                                        <input type="password" name="password" placeholder="Your Password" class="form-control" required />                                    </div>                                </div>								<div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Confirm Password</label>                                        <input type="password" name="con_password" placeholder="Enter Your Password Again" class="form-control" required />                                    </div>                                </div>                                <div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>Gender</label>										<select class="questions-category form-control" name="gender">											<option value="Select" style="font-weight: bold;">Select</option>											<option value="Male">Male</option>											<option value="Female">Female</option>										</select>                                    </div>                                </div>								<div class="col-md-6 col-sm-6 col-xs-12">                                    <div class="form-group">                                        <label>State Of Origin</label>										<select class="questions-category form-control" name="state" required="required">											<option style="font-weight: bold;" value="Select">Select</option>											 <option value="Abia">Abia</option>											 <option value="Adamawa">Adamawa</option>											 <option value="Anambra">Anambra</option>											 <option value="Akwa Ibom">Akwa Ibom</option>											 <option value="Bauchi">Bauchi</option>											 <option value="Bayelsa">Bayelsa</option>											 <option value="Benue">Benue</option>											 <option value="Borno">Borno</option>											 <option value="Cross River">Cross River</option>											 <option value="Delta">Delta</option>											 <option value="Ebonyi">Ebonyi</option>											 <option value="Enugu">Enugu</option>											 <option value="Edo">Edo</option>											 <option value="Ekiti">Ekiti</option>											 <option value="Gombe">Gombe</option>											 <option value="Imo">Imo</option>											 <option value="Jigawa">Jigawa</option>											 <option value="Kaduna">Kaduna</option>											 <option value="Kano">Kano</option>											 <option value="Katsina">Katsina</option>											 <option value="Kebbi">Kebbi</option>											 <option value="Kogi">Kogi</option>											 <option value="Kwara">Kwara</option>											 <option value="Lagos">Lagos</option>											 <option value="Nasarawa">Nasarawa</option>											 <option value="Niger">Niger</option>											 <option value="Ogun">Ogun</option>											 <option value="Ondo">Ondo</option>											 <option value="Osun">Osun</option>											 <option value="Oyo">Oyo</option>											 <option value="Plateau">Plateau</option>											 <option value="Rivers">Rivers</option>											 <option value="Sokoto">Sokoto</option>											 <option value="Taraba">Taraba</option>											 <option value="Taraba">Yobe</option>											 <option value="Zamfara">Zamfara</option>											 <option value="FCT Abuja">FCT Abuja</option>										</select>                                    </div>                                </div>								<div class="col-md-6 col-sm-6 col-xs-12">									<div class="form-group">										<label>Phone Number</label>										<input type="text" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" placeholder="Your Phone Number" class="form-control" required />									</div>                                </div>								<div class="col-md-6 col-sm-6 col-xs-12">									<div class="form-group">										<label>Address</label>										<input type="text" name="address" placeholder="Your Address" class="form-control" required />									</div>                                </div>								<div class="col-md-12 col-sm-12 col-xs-12">									<div class="form-group">										<label>Tell Us Little about yourself</label>										<textarea name="about_me" placeholder="Tell Us Little about yourself" class="form-control" required ></textarea>									</div>                                </div>                                <div class="col-md-6 col-sm-12 col-xs-12 col-md-push-3">                                     <div class="loginbox-submit">                                    <input type="submit" name="register" class="btn btn-default btn-block" value="Register">                                </div>                                <div class="loginbox-signup" style="margin-top: 4%; font-weight: bold; font-size: 20px;"> Already have account ? Then <a href="login.php" style="color: #29aafe;">Sign in</a> </div>                                </div>                            </form>                        </div>                    </div>                </div>            </div>        </section>						<?php include("include/footer.php"); ?>	