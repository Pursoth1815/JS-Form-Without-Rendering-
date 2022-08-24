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
    <?php include("connect.php"); ?>
</head>

<body>

    <header>PERSONAL DETAILS</header>

    <main id="main">
        <div class="msg">
        </div>
        <form action="" method="post" name="personal">
            <div id="insertData" class="input-container">

                <div class="row d-flex justify-content-evenly w-100">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Name :</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="firstName" placeholder="Enter First Name" class="input-box"
                                    value="" />
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label class="label">Gender :</label>
                            </div>
                            <div class="col-8 d-flex justify-content-start">
                                <label class="radio-container me-5">Male
                                    <input type="radio" name="gender" value="Male" />
                                </label>
                                <label class="radio-container">Female
                                    <input type="radio" name="gender" value="Female" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center w-100">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Phone No :</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="number" placeholder="Enter Phone No" class="input-box"
                                    value="" />
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
                                    value="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-evenly w-100">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>State :</label>
                            </div>
                            <div class="col-8">
                                <select name="state" class="form-control">
                                    <option value="">--- Select State ---</option>
                                    <?php
                                    require('dbconfig.php');
                                    $sql = "SELECT * FROM state"; 
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                    echo "<option value='".$row['ID']."'>".$row['Name']."</option>";
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>City :</label>
                            </div>
                            <div class="col-8">
                                <select name="city" class="form-control">
                                    <option value="">--- Select City ---</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-evenly w-100">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Address :</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="address" placeholder="Enter Address" class="input-box"
                                    value="" />
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Pincode :</label>
                            </div>
                            <div class="col-8">
                                <input id="code" type="text" name="pincode" placeholder="Enter Pincode"
                                    class="input-box" value="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-start w-100">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Qualification :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="qualification" id="qualification">
                                    <option value="">--- Select Qualification ---</option>
                                    <option value="X">X</option>
                                    <option value="XII">XII</option>
                                    <option value="BSC">BSC</option>
                                    <option value="MCA">MCA</option>
                                    <option value="BE">BE</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <button class="input-button btn-outline-primary" name="submit" id=" input-btn">
                        Save
                    </button>
                </div>
            </div>

            <script>
            $("select[name='state']").change(function() {
                var stateID = $(this).val();
                if (stateID) {
                    $.ajax({
                        url: "ajax.php",
                        dataType: 'Json',
                        data: {
                            'id': stateID
                        },
                        success: function(data) {
                            $('select[name="city"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city"]').append('<option value="' + value +
                                    '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="city"]').empty();
                }
            });
            </script>
        </form>

        <form action="" name="personalEdit">
            <div id="updateData" class="input-container nullData">

                <div class="row d-flex justify-content-center w-100">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Phone No :</label>
                            </div>
                            <div class="col-8">
                                <input id="editNumber" type="text" name="editNumber" placeholder="Enter Phone No"
                                    class="input-box" value="" required />
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label>Email :</label>
                            </div>
                            <div class="col-8">
                                <input id="editEmail" type="email" name="editEmail" placeholder="Enter Email"
                                    class="input-box" value="" required />
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
                                <input id="editFirstName" type="text" name="editFirstName"
                                    placeholder="Enter First Name" class="input-box" value="" required />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <button class="input-button btn-outline-primary" name="update" id="input-btn-update">
                        Update
                    </button>
                </div>
                <input id="editID" type="hidden" name="editID" value="">
            </div>
        </form>

        <div class="mt-5">
            <table id="table" class="table table-info table-hover">
                <thead class="table-active table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody id="tablebody">
                </tbody>

            </table>
            <nav aria-label="Page navigation example">
                <button id="previous" class="btn btn-primary">Previous</button>
                <button id="next" class="btn btn-primary">Next</button>
            </nav>
        </div>

    </main>


    <script src="js/main.js"></script>

</body>

</html>