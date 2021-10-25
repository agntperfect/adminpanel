<?php
include 'PHP/connection.inc.php';
include 'PHP/function.inc.php';

// header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
// header( "refresh:5;url=wherever.php" ); It will redirct to URI in 5 sec
// 301 Moved Permanently
// header("Location: /foo.php",TRUE,301);
// 302 Found
// header("Location: /foo.php",TRUE,302);
// header("Location: /foo.php");
// 303 See Other
// header("Location: /foo.php",TRUE,303);
// 307 Temporary Redirect
// header("Location: /foo.php",TRUE,307);

if (!isset($_SESSION['admin'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.A.B Store: Admin Panel</title>
    <link rel="stylesheet" href="assets/css/admin.css?">
    <style>
        .piechart {
            background: radial-gradient(circle closest-side, transparent 99%, #fff 0),
                conic-gradient(from 180deg,
                    #ee5253 0,
                    #ee5253 35%,
                    #ff9f43 0,
                    #ff9f43 60%,
                    #f368e0 0,
                    #f368e0 75%,
                    #10ac84 0,
                    #10ac84 100%);
            background: -moz-radial-gradient(circle closest-side, transparent 99%, #000 0),
                -moz-conic-gradient(from 180deg,
                    #ee5253 0,
                    #ee5253 35%,
                    #ff9f43 0,
                    #ff9f43 60%,
                    #f368e0 0,
                    #f368e0 89%,
                    #10ac84 0,
                    #10ac84 100%);
            background: -webkit-radial-gradient(circle closest-side, transparent 99%, #000 0),
                -webkit-conic-gradient(from 180deg,
                    #ee5253 0,
                    #ee5253 35%,
                    #ff9f43 0,
                    #ff9f43 60%,
                    #f368e0 0,
                    #f368e0 89%,
                    #10ac84 0,
                    #10ac84 100%);
            background: -ms-radial-gradient(circle closest-side, transparent 99%, #000 0),
                -ms-conic-gradient(from 180deg,
                    #ee5253 0,
                    #ee5253 35%,
                    #ff9f43 0,
                    #ff9f43 60%,
                    #f368e0 0,
                    #f368e0 89%,
                    #10ac84 0,
                    #10ac84 100%);
            background: -o-radial-gradient(circle closest-side, transparent 99%, #000 0),
                -o-conic-gradient(from 180deg,
                    #ee5253 0,
                    #ee5253 35%,
                    #ff9f43 0,
                    #ff9f43 60%,
                    #f368e0 0,
                    #f368e0 89%,
                    #10ac84 0,
                    #10ac84 100%);
        }

        .client table,
        .customer table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-right: 5px;
        }

        .client td,
        .client th,
        .customer td,
        .customer th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        #clientid {
            width: 30px;
        }


        .client tr:nth-child(even),
        .customer tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <script src="assets/js/main.js"></script>
    <script>
        // const xhr = new XMLHttpRequest();
        const method = "POST";
        const url = "<?= "api/v1/?status=online&id=".$_SESSION['ID'] ?>";
        xhr.open(method, url);
        // xhr.ResponseType = 'json'
        xhr.onload = () => {
            console.log("The request has been completed successfully");
        }
        xhr.send();
    </script>
</head>
<body>
    <div class="head" id="head">
        <span>K.A.B Store</span>
    </div>
    <div class="navbar" id="navbar">
    <script>
    </script>
        <button class="navbar-btn" onclick="dash()" id="navbar-home">Dashboard</button>
        <button class="navbar-btn" id="navbar-client" onclick="client();">Client</button>
        <button class="navbar-btn" id="navbar-customer" onclick="customer()">Customer</button>
        <div class="dropdown-content drop-customer">
            <button class="drop-btn" id="">View Customer</button>
            <button class="drop-btn">Update/Delete Customer</button>
        </div>
        <button class="navbar-btn dropbtn" id="navbar-order" onclick="list()">Order List</button>
        <button class="navbar-btn" id="navbar-insert" onclick="ins()">Manage Item</button>
        <div class="dropdown-content drop-insertItem">
            <button class="drop-btn" id="insertItem">Insert Item</button>
            <button class="drop-btn">Update/Delete Item</button>
            <!-- <button class="drop-btn" id="insertItem">Insert Item</button> -->
            <button class="drop-btn">Update Stock</button>
        </div>
        <button class="navbar-btn" id="navbar-setting" onclick="setting();">Setting</button>
        <button class="navbar-btn" id="navbar-logout" onclick="window.location.replace('logout.php')">Log Out</button>

    </div>
    <div class="container">
        <div class="Welcome-page container-box">
            <div class="title">Welcome to K.A.B Store</div>
            <div class="subtitle">Admin Panel</div>
        </div>
        <div class="dashboard" style="margin: 0; display: none;">
            <div class="box box1">
                <div class="row">
                    <?php
                    $usersql = 'SELECT * FROM `admin_user` ORDER BY ID DESC LIMIT 1';
                    $productsql = 'SELECT * FROM `product` ORDER BY ID DESC LIMIT 1';
                    $customersql = 'SELECT * FROM `customer` ORDER BY ID DESC LIMIT 1';
                    $ordersql = 'SELECT * FROM `orderlist` ORDER BY ID DESC LIMIT 1';

                    $userquery = mysqli_query($conn, $usersql);
                    $productquery = mysqli_query($conn, $productsql);
                    $customerquery = mysqli_query($conn, $customersql);
                    $orderquery = mysqli_query($conn, $ordersql);

                    if (mysqli_num_rows($productquery) == 0) {
                        $product = 0;
                    } else {
                        $product = mysqli_fetch_array($productquery)['ID'];
                    }
                    if (mysqli_num_rows($customerquery) == 0) {
                        $customer = 0;
                    } else {
                        $customer = mysqli_fetch_array($customerquery)['ID'];
                    }
                    if (mysqli_num_rows($orderquery) == 0) {
                        $order = 0;
                    } else {
                        $order = mysqli_fetch_array($orderquery)['ID'];
                    }

                    if (mysqli_num_rows($userquery) == 0) {
                        $Developers = 0;
                    } else {
                        $Developers = mysqli_fetch_array($userquery)['ID'];
                    }
                    ?>
                    <div class="column">
                        <div class="card">
                            <p><i class="fa fa-user"></i></p>
                            <h3><?= $product ?></h3>
                            <p>Items</p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <p><i class="fa fa-check"></i></p>
                            <h3><?= $order ?></h3>
                            <p>Orders</p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <p><i class="fa fa-smile-o"></i></p>
                            <h3><?= $Developers ?></h3>
                            <p>Developers</p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                            <p><i class="fa fa-coffee"></i></p>
                            <h3><?= $customer ?></h3>
                            <p>Customer</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="pie-open" id="pie-open">Open Pie Chart</button>
                    <!-- <div class="center-div" style="display: none;">
                        <h2>Piechart</h2>
                        <button class='pie-close-btn' onclick="document.getElementsByClassName('pie-open')[0].innerHTML = 'Open Pie Chart';document.getElementsByClassName('center-div')[0].style.display = 'none'; document.getElementsByClassName('row')[0].style.cssText = 'filter: blur(0px)';" style="background: transparent; border: none;outline: none; "><span class="pie-close" id="pie-close"></span></button>
                        <div class="piechart"></div>
                        <div class="pie-index">
                        </div>
                    </div> -->
                </div>
                <div class="main-div">
                    <div class="center-div" style="display: none;">
                        <h2>Piechart</h2>
                        <button class='pie-close-btn' onclick="document.getElementsByClassName('pie-open')[0].innerHTML = 'Open Pie Chart';document.getElementsByClassName('center-div')[0].style.display = 'none'; document.getElementsByClassName('row')[0].style.cssText = 'filter: blur(0px)';" style="background: transparent; border: none;outline: none; "><span class="pie-close" id="pie-close"></span></button>
                        <div class="piechart"></div>
                        <div class="pie-index">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="client container-box" style="display: none;">
            <table border='1px'>
                <tr>
                    <th>Client ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>User Mode</th>
                    <th>status</th>
                </tr>
                <?php
                $sql = "SELECT * FROM admin_user WHERE 1";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {
                    $clientid = $row['ID'];
                    $username = $row['Username'];
                    $email = $row['Email'];
                    $usermode = $row['user_mode'];
                ?>
                    <script>
                        var URI = 'http://localhost/adminpanel/api/v1/?id=' + <?= $clientid ?>;
                        fetchDataAsync(URI);
                    </script>
                    <tr id="data">
                        <td id="clientid"><?= $clientid ?></td>
                        <td><?= $username ?></td>
                        <td><?= $email ?></td>
                        <td><?= $usermode ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="customer container-box" id="customer" style="display: none;">
            <table border='1px'>

                <tr>
                    <th>Client ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>IP address</th>
                    <th>Login Attempt</th>
                    <th>Status</th>
                </tr>
                <?php
                $sql = "SELECT * FROM customer";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {
                    $clientid = $row['ID'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $dob = $row['dob'];
                    $phone = $row['phone'];
                    $ipaddress = $row['ipaddress'];
                    $status = $row['status'];
                    $l_a = $row['login_attempt'];
                ?>

                    <tr id="data">
                        <td id="clientid"><?= $clientid ?></td>
                        <td><?= $username ?></td>
                        <td><?= $email ?></td>
                        <td><?=$phone ?></td>
                        <td><?=$dob ?></td>
                        <td><?=$phone ?></td>
                        <td><?= $l_a ?></td>
                        <td><?=$status ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="insertItem container-box" id="insertItem" style='display: none;'>

            <div class="input-group"><label for="ins">Item Name</label><br>
                <input type="text" name="itemname" class="ins" placeholder=" Item Name" required><br>
            </div>
            <div class="input-group">
                <label for="ins">Type of Product</label><br>
                <input type="text" name="itemtype" class="ins" placeholder="Type of Product (E.g: rice, dal, pulses, biscuit,etc)" required><br>
            </div>
            <div class="input-group">
                <label for="ins">Size of Product</label><br>
                <input type="number" name="itemsize" class="ins" placeholder="Size of Product (E.g: 1, 2, 5, 10, 20, 25,30, 50)" required><br>
                <label for="ins">Unit of Product</label><br>
                <select name="unit" class="unit" class="ins">
                    <option value="">SI unit</option>
                    <option value="gm">gm</option>
                    <option value="kg">kg</option>
                    <option value="ml">ml</option>
                    <option value="l">l</option>
                </select>
            </div>
            <div class="input-group">
                <label for="ins">Quality of Product</label><br>
                <textarea type="text" cols="75" rows="10" name="itemquality" class="ins textarea" placeholder="Quality of Product
Example:
1. Hygienically packed arhar dal.
2. Dals are sorted to deliver consistent quality of grains"></textarea><br>
            </div>
            <div class="input-group">
                <label for="price">Price</label><br>
                <input type="number" name="itemprice" id="price" placeholder="Price of Product" required><br>
            </div>
            <div class="input-group" style="position: relative; margin: 0;">
                <div class="file-input"><label for="file"><strong>Choose a file</strong></label></div>
                <img id="output" width="200" /><br>
                <span class="file-name"></span>
                <!-- <input type="file" name="file" class="file" required><br> -->
                <input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />

                <script>
                    document.getElementById('file').onchange = function(event) {
                        var image = document.getElementById('output');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
                    const file = document.querySelector('#file');
                    file.addEventListener('change', (e) => {
                        // Get the selected file
                        const [file] = e.target.files;
                        // Get the file name and size
                        const {
                            name: fileName,
                            size
                        } = file;
                        // Convert size in bytes to kilo bytes
                        const fileSize = (size / 1000).toFixed(2);
                        // Set the text content
                        const fileNameAndSize = `File name: ${fileName} <br> File size: ${fileSize}KB`;
                        document.querySelector('.file-name').innerHTML = fileNameAndSize;
                    });
                </script>
                <?php
                if (isset($_POST['sub'])) {
                    $user = $_SESSION['admin'];
                    $ins = mysqli_real_escape_string($conn, $_POST['itemname']);
                    $type = mysqli_real_escape_string($conn, $_POST['itemtype']);
                    $size = mysqli_real_escape_string($conn, $_POST['itemsize']);
                    $quality = mysqli_real_escape_string($conn, $_POST['itemquality']);
                    $price = mysqli_real_escape_string($conn, $_POST['itemprice']);
                    // $inssql= "SELECT * FROM searchitem WHERE ItemName = '$ins '";
                    // $query = mysqli_query($conn, $inssql);
                    // $ins_rows = mysqli_num_rows($query);

                    // if($ins_rows == 1){
                    //     echo "Search query already Exist";
                    // } else{
                    $file = $_FILES['file'];
                    $fileName = $file['name'];
                    $fileType = $file['type'];
                    $fileTmpName = $file['tmp_name'];
                    $fileError = $file['error'];
                    $fileSize = $file['size'];
                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));

                    $allowed = array('jpeg', 'jpg', 'png', 'gif');
                    if (in_array($fileActualExt, $allowed)) {
                        if ($fileError === 0) {
                            $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                            $dir = "../images/" . $fileNameNew;

                            $type = pathinfo($fileTmpName, PATHINFO_EXTENSION);
                            $data = file_get_contents($fileTmpName);
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            // $insert_sql = "INSERT INTO searchitem (Username,ItemName, ItemType, ItemSize, ItemQuality, ItemPrice, ItemPicture) VALUES ('$user','$ins','$type','$size','$quality','$price','$base64')";
                            // $iquery = mysqli_query($conn, $insert_sql);

                        } else {
                            echo "The was an error uploading your image";
                        }
                    } else {
                        echo "Please check the file type";
                    }
                }

                // }
                ?>


            </div>
            <button type="submit" name="sub" onclick="insertItem()">Insert</button>

            <div class="confirm-box center-div">

                <button class='pie-close-btn' onclick="document.getElementsByClassName('center-div')[1].style.display = 'none';"><span class="pie-close" id="pie-close"></span></button>
                <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <?php
                    if (isset($base64)) {
                        echo "<img src=" . $base64 . " alt=" . $ins . " height='75%' width='75%'>";
                        echo "<div class='text'>Product Name: " . $ins;
                        echo "</div><div class='text'>Product type: " . $type;
                        echo "</div><div class='text>Product size: " . $size;
                        echo "</div><div class='text'>Product Description: " . $quality;
                        echo "</div><div class='text'>Product price: " . $price . "</div>";
                    }


                    ?>
                    <div class="center">
                        <button type="submit" class="confirm-btn" id="confirm-btn" name="confirm">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="setting container-box" id="setting" style="display: none;">
            <div class="checkbox-group">
                <span class="text">Maintenance Mode</span>
                <span class="input-right">
                    <label class="switch">
                        <form action="" method="post">
                            <script>
                                vMaint();
                            </script>
                            <input type="checkbox" class="checkbox" id="chkbx" onclick="maint()">
                            <span class="slider round"></span>
                        </form>
                    </label>
                </span>
            </div>
        </div>
        </div>

    </div>
    <!-- <script>
        if (document.getElementsByClassName('insertItem')[0].style.display == 'block') {
            var element = document.getElementById("myDIV");
            element.classList.toggle("mystyle");
        }
    </script> -->
</body>
</html>