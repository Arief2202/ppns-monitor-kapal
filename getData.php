<?php 
include 'koneksi.php';
header("Content-Type: text/plain");
$sql = "select nama_kapal from kapals";
$query = mysqli_query($koneksi, $sql);
$datas = array();
while($data = mysqli_fetch_object($query)){
    $datas[] = $data->nama_kapal;
}
$datas = array_unique($datas);
foreach($datas as $data){ 
    $sql2 = "select * from kapals where nama_kapal='".$data."' order by created_at DESC;";
    $query2 = mysqli_query($koneksi, $sql2);
    $dataKapal = mysqli_fetch_object($query2);
?>
<div class="carousel-item">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center">
            <div class="alert alert-primary text-center p-1 ps-3 pe-3" style="display: inline-block; border-radius:20px;">
                <h5 class="card-title pt-1"><?=$data?></h5>
            </div>
            </div>
            <p style="font-size:16px; font-weight:20px; padding:0px; margin:0px;"><b>Longitude:</b></p>
            <p style="font-size:16px; font-weight:20px;"><?=$dataKapal->longitude?></p>
            <p style="font-size:16px; font-weight:20px; padding:0px; margin:0px;"><b>Latitude:</b></p>
            <p style="font-size:16px; font-weight:20px;"><?=$dataKapal->latitude?></p>
            <p style="font-size:16px; font-weight:20px; padding:0px; margin:0px;"><b>Yaw:</b></p>
            <p style="font-size:16px; font-weight:20px;"><?=$dataKapal->yaw?></p>
            <p style="font-size:16px; font-weight:20px; padding:0px; margin:0px;"><b>Pitch:</b></p>
            <p style="font-size:16px; font-weight:20px;"><?=$dataKapal->pitch?></p>
            <p style="font-size:16px; font-weight:20px; padding:0px; margin:0px;"><b>Roll:</b></p>
            <p style="font-size:16px; font-weight:20px;"><?=$dataKapal->roll?></p>
        </div>
    </div>
</div>
<?php }?>