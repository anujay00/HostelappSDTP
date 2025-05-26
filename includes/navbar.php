<?php
    include "includes/header.php";
?>
 <div class="container">
            <header>
            <div class="navbar">
                <button class="mobile-nav-toggle d-flex d-md-none">
                    <i class="ri-menu-line"></i>
                </button>
                <div class="nav-left d-md-flex d-none align-items-center">
                    <div class="nav-logo d-flex align-items-center">
                        <a class="logo-img" href="index.html">
                            <img src="assets/images/logo.png" alt="logo" width="172" height="45">
                        </a>
                    </div>

                    <nav class="nav-menu">
                        <ul class="menu d-flex">
                            <li class="nav-item ">
                                <a href="index.php" class="menu-link main-menu-link item-title">Home</a>
                            </li>
                            <li class="nav-item ">
                                <a href="properties.php" class="menu-link main-menu-link item-title">Properties</a>
                            </li>
                        </ul>
                    </nav>

                </div>
                <div class="link-reg d-flex">
                    <ul class="menu d-flex align-items-center">
                        <?php 

                        if(!isset($_SESSION['user_id']) || !$_SESSION['user_id']){
                        ?>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li class="line__v">|</li>
                         <li>
                            <a href="sign-up.php">Signup</a>
                        </li>
                        <?php 
                       }else {
                        ?>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                        <?php
                          }
                        ?>

                       
                       <?php 

                        // if(isset($_SESSION['user_id']) && $_SESSION['user_id']){
                        ?>
                       
                         
                        <?php
                    //    }
                       ?>
                    </ul>
                    <?php

                    if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] === 'landlord')){
                    ?>
                    <a href="student-requests.php" class="submit__listing me-2">Student Requests
                    </a>
                    <a href="add-properties.php" class="submit__listing">Add Properties
                    </a>
                    <?php
                    }
                    ?>
                    
                    <?php

                    if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] === 'warden')){
                    ?>
                    <a href="warden-properties.php" class="submit__listing">Posted Properties
                    </a>
                    <?php
                    }
                    ?>

                    <?php

                    if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] === 'admin')){
                    ?>
                    <a href="admin.php" class="submit__listing">Admin
                    </a>
                    <?php
                    }
                    ?>
                </div>
                </div>
            </header>
        </div>