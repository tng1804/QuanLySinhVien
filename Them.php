<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them</title>
</head>

<body>
    <form action="./Them.php" method="post">
        <table>
            <tr>
                <th>Họ tên: </th>
                <td><input type="text" name="HoTen"></td>
            </tr>
            <tr>
                <th>Ngày sinh: </th>
                <td><input type="date" name="NgaySinh"></td>
            </tr>
            <tr>
                <th>Giới tính: </th>
                <td>
                    <input type="radio" name="GioiTinh" value="1" checked>Nam
                    <input type="radio" name="GioiTinh" value="0" >Nữ
                </td>
            </tr>
            <tr>
                <th>Quê quán: </th>
                <td>
                    <input type="text" name="QueQuan">
                </td>
            </tr>
            <tr>
                <th>Trình độ học vấn: </th>
                <td>
                    <select name="TrinhDoHocVan" id="">
                        <option value="0">Tiến Sĩ</option>
                        <option value="1">Thạc sĩ</option>
                        <option value="2">Kỹ sư</option>
                        <option value="3">Khác</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <button type="submit" name="btnGhi">Ghi</button>
                    <button class="btnThoat">
                        <a href="./index.php">Home</a>
                    </button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    include './Config/connect.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnGhi'])) {
        $HoTen = $_POST['HoTen'];
        $NgaySinh =  $_POST['NgaySinh'];
        $GioiTinh =  $_POST['GioiTinh'];
        $QueQuan =  $_POST['QueQuan'];
        $TrinhDoHocVan =  $_POST['TrinhDoHocVan'];

        $sql = "INSERT INTO tblsinhvien VALUES('','" . $HoTen . "','" . $NgaySinh . "','" . $GioiTinh . "','" . $QueQuan . "','" . $TrinhDoHocVan . "')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo"Thêm dữ liệu không thành công";
        }
        else{
            echo"Thêm dữ liệu thành công";

        }
    }
    ?>

</body>

</html>
