$sql = "SELECT * FROM genre ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$data=[];
if ($result->num_rows > 0) {
while($r=mysqli_fetch_assoc($result))
{
array_push($data,$r);
}
$arr=["result"=>"success","data"=>$data];
} else {
$arr= ["result"=>"error","message"=>"sql error: $sql"];
}
echo json_encode($arr);