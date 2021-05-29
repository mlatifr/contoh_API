extract($_POST);
$sql="UPDATE movie set title=? ,homepage=? , overview=? where movie_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("sssd",$title,$homepage,$overview,$movie_id);
$stmt->execute();
if ($stmt->affected_rows > 0) {
$arr=["result"=>"success","id"=>$conn->insert_id];
} else {
$arr=["result"=>"fail","Error"=>$conn->error];
}
echo json_encode($arr);