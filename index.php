<?php
$link = mysqli_connect('localhost', 'root', '', 'sekolah');
// menguji error:
if(!$link){
    die('ada error' . mysqli_connect_error());
}

/*
    query membuat database
*/
$query = "CREATE DATABASE relaxaja123";

if(mysqli_query($link , $query)){
    echo 'database berhasil dibuat';
}else{
    echo 'database gagal dibuat';
}

/*
    menampilkan dan memilih data
*/
// menfilter data = LIMIT, ORDER BY, WHERE.
// ORDER BY id DESC -> membalikkan data yang terakhir menjadi paling atas.
// WHERE memilih kata spesifik
$query = "SELECT * FROM murid WHERE alamat='bekasi'";
$hasil = mysqli_query($link, $query);
if(mysqli_num_rows($hasil) > 0){
    while($data = mysqli_fetch_assoc($hasil)){
        echo $data['nama'] . " " . $data['alamat'] . "<br/>";
    }
} 

/*
 memasukkan data :
*/
 $query = "INSERT INTO murid (nama, umur, alamat) VALUES ('Wahyu', 24, 'utara');";
// memasukkan data sekaligus:
$query .= "INSERT INTO murid (nama, umur, alamat) VALUES ('Wahyu', 24, 'utara')";

/*
    Delete Data
*/ 
// menghapus dengan "id/pilihan":
$query = "DELETE FROM murid WHERE id=1";
// menghapus data sekaligus menggunakan "WHERE dan IN":
$query = "DELETE FROM murid WHERE id IN (2,3)";
// menghapus data antara menggunakan "BETWEEN, AND":
$query = "DELETE FROM murid WHERE id BETWEEN 4 AND 6";


/*
    Mengubah Data
*/
$query = "UPDATE murid SET nama='muslihat' WHERE id=7";
// mengubah data beberapa kolom data
$query = "UPDATE murid SET nama='ujang',umur = 22 WHERE id=7";


if(mysqli_query($link, $query)){
    echo "Berhasil!";
}


mysqli_close($link);

?>