<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERSONAL DETAILS</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <?php include("DBconnection/update.php"); ?>
</head>

<body>

    <header>UPDATE PERSONAL DETAILS</header>

    <main id="main">
        <form action="" method="post" id="personal">
            <div class="input-container">

                <div class="row d-flex justify-content-center w-100">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Phone No :</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="number" placeholder="Enter Phone No" class="input-box"
                                    value="<?php echo $phoneno;?>" />
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Email :</label>
                            </div>
                            <div class="col-8">
                                <input id="email" type="email" name="email" placeholder="Enter Email" class="input-box"
                                    value="<?php echo $email;?>" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-start w-100">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Name :</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="firstName" placeholder="Enter First Name" class="input-box"
                                    value="<?php echo $name;?>" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <button class="input-button btn-outline-primary" name="update" id="input-btn-update">
                        Update
                    </button>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
        </form>
    </main>



</body>

</html>