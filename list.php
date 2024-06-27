<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>

    <style>
        table, th, td{
            border: 1px solid #000;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php
    include './Config/connect.php';
    $sql = "SELECT * FROM tblsinhvien";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Danh sách lớp";
        echo "
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Quê quán</th>
                <th>Trình độ học vấn</th>
                
            </tr>
            </thead>
            <tbody>
        ";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td> " . $row['ID'] . "</td>";
            echo "<td> " . $row['HoTen'] . "</td>";
            // echo"<td> ".$row['NgaySinh']."</td>";
            echo "<td>";
            // $d = $row['NgaySinh'];
            echo date("d-m-Y", strtotime($row['NgaySinh']));
            echo "</td>";
            if ($row['GioiTinh'] == '1') {
                echo "<td>Nam</td>";
            } else if ($row['GioiTinh'] == 0) {
                echo "<td>Nữ</td>";
            }
            echo "<td> " . $row['QueQuan'] . "</td>";

            switch ($row['TrinhDoHocVan']) {
                case 0:
                    echo "<td> Tiến sĩ</td>";
                    break;
                case 1:
                    echo "<td> Thạc sĩ</td>";
                    break;
                case 2:
                    echo "<td> Kỹ sư</td>";
                    break;
                case 3:
                    echo "<td> Khác</td>";
                    break;
            }


            echo "</tr>";
        }
        echo "
                </tbody>
                </table>
                ";
    }
    else{
        echo"Không có bản ghi";
    }

    ?>
</body>

</html>