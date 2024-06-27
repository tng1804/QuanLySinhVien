<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa</title>
</head>

<body>
    <?php
    $ID = $_GET['ID'];
    $HoTen = "";
    $NgaySinh =  "";
    $GioiTinh = "";
    $QueQuan =  "";
    $TrinhDoHocVan =  "";

    include './Config/connect.php';
    $sql = "SELECT * FROM tblsinhvien WHERE ID = '" . $ID . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ID = $row['ID'];
            $HoTen = $row['HoTen'];
            $NgaySinh =  $row['NgaySinh'];
            $GioiTinh = $row['GioiTinh'];
            $QueQuan =  $row['QueQuan'];
            $TrinhDoHocVan =  $row['TrinhDoHocVan'];
        }
    }
    ?>
    <form action="" method="POST">
        <table>
            <tr>
                <th>Họ tên: </th>
                <td>
                    <input type="text" name="HoTen" value="<?php echo ($HoTen); ?>">
                </td>
            </tr>
            <tr>
                <th>Ngày sinh: </th>
                <td>
                    <!-- <input type="date" name="NgaySinh" value=""> -->
                    <input type="date" name="NgaySinh" value="<?php echo date('Y-m-d', strtotime($NgaySinh)); ?>">

                </td>
            </tr>
            <tr>
                <th>Giới tính: </th>
                <td>
                    <input type="radio" id="GioiTinh" name="GioiTinh" value="1" <?php
                                                                                if ($GioiTinh == 1)
                                                                                    echo "checked";
                                                                                ?>>Nam
                    <input type="radio" id="GioiTinh" name="GioiTinh" value="0" <?php
                                                                                if ($GioiTinh == 0)
                                                                                    echo "checked";
                                                                                ?>>Nữ


                </td>
            </tr>
            <tr>
                <th>Quê quán: </th>
                <td>
                    <input type="text" name="QueQuan" value="<?php echo ($QueQuan); ?>">
                </td>
            </tr>
            <!-- <tr>
                <th>Trình độ học vấn: </th>
                <td>
                    <select name="TrinhDoHocVan" id="">

                        <option value="0" 
                        <?php
                        if ($TrinhDoHocVan == 0) echo "selected";
                        ?>
                        >Tiến sĩ</option>
                        <option value="1"
                        <?php
                        if ($TrinhDoHocVan == 1) echo "selected";
                        ?>
                        >Thạc sĩ</option>
                        <option value="2"
                        <?php
                        if ($TrinhDoHocVan == 2) echo "selected";
                        ?>
                        >Kỹ sư</option>
                        <option value="3"
                        <?php
                        if ($TrinhDoHocVan == 3) echo "selected";
                        ?>
                        >Khác</option>

                    </select>

                </td>
            </tr> -->
            <tr>
                <th>Trình độ học vấn: </th>
                <td>
                    <select name="TrinhDoHocVan" id="educationLevel">
                        <option value="0">Tiến sĩ</option>
                        <option value="1">Thạc sĩ</option>
                        <option value="2">Kỹ sư</option>
                        <option value="3">Khác</option>
                    </select>
                </td>
            </tr>

            <script>
                // Lấy giá trị $TrinhDoHocVan từ PHP thông qua một cách nào đó, ví dụ: từ input ẩn hoặc API
                var trinhDoHocVan = <?php echo $TrinhDoHocVan; ?>;
                // Lấy phần tử select bằng ID
                var selectElement = document.getElementById('educationLevel');

                // Đặt giá trị đã lấy vào selectElement
                selectElement.value = trinhDoHocVan;
            </script>
            <tr>
                <th></th>
                <td>
                    <button type="submit" name="btnGhi">Ghi</button>
                    <button class="btnThoat">
                        <a href="./View.php">Thoát</a>
                    </button>
                </td>
            </tr>
        </table>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnGhi'])) {
        $HoTen = $_POST['HoTen'];
        $NgaySinh =  $_POST['NgaySinh'];
        $GioiTinh =  $_POST['GioiTinh'];
        $QueQuan =  $_POST['QueQuan'];
        $TrinhDoHocVan =  $_POST['TrinhDoHocVan'];

        $sql = "UPDATE tblsinhvien SET HoTen='" . $HoTen . "',NgaySinh='" . $NgaySinh . "',GioiTinh='" . $GioiTinh . "',QueQuan='" . $QueQuan . "',TrinhDoHocVan='" . $TrinhDoHocVan . "'
                WHERE ID='" . $ID . "'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Cập nhập dữ liệu không thành công.";
        } else {
            echo "Cập nhập dữ liệu thành công.";
            echo "
                    <script>
                    alert('Cập nhập dữ liệu thành công');
                    window.location.href='View.php';
                    </script>
                    ";
        }
    }
    ?>
</body>

</html>