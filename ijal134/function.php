<?php
//session_start(); //munculin pernah login/gk

$conn = mysqli_connect("localhost","root","","basdat");

// register
if(isset($_POST['register'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
  

    $addtotable = mysqli_query ($conn, "insert into user (email, password) values('$email','$password')");
    if($addtotable){
        header('location: login.php');
    }else{
        echo 'gagal';
        header('location:login.php');
    }
};




//menambah data baru
if(isset($_POST['addnewdata'])){
    $namatim = $_POST['namatim'];
    $hari = $_POST['hari'];
    $lapangan = $_POST['lapangan'];
    $jam = $_POST['jam'];

    $addtotable = mysqli_query ($conn, "insert into stock (namatim, hari, lapangan, jam) values('$namatim','$hari','$lapangan', '$jam')");
    if($addtotable){
        header('location: index.php');
    }else{
        echo 'gagal';
        header('location:index.php');
    }
};


//menambah data bayar
if(isset($_POST['databayar'])){
    $datanya = $_POST['datanya'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];
    //$qty = $_POST['qty'];
    $lapangan = $_POST['lapangan'];

    $cekstocksekarang = mysqli_query($conn, "select  * from stock where idtim='$datanya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
   // $tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;
   $tambahkanstocksekarangdenganquantity = $stocksekarang=$lapangan;

    $addtomasuk = mysqli_query($conn,"insert into bayar (idtim, harga, keterangan) values('$datanya','$harga','$keterangan')");
    $updatestockmasuk = mysqli_query($conn,"update stock set lapangan='$tambahkanstocksekarangdenganquantity' where idtim='$barangnya'");
    if($addtomasuk&&$updatestockmasuk){
        header('location:bayar.php');
    } else {
        echo 'gagal';
        header('location:bayar.php');
    }

}

//menambah data status
if(isset($_POST['datastatus'])){
    $datanya = $_POST['datanya'];
    $deskripsi = $_POST['deskripsi'];
    //$qty = $_POST['qty'];
    $lapangan = $_POST['lapangan'];

    $cekstocksekarang = mysqli_query($conn, "select  * from stock where idtim='$datanya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    //$tambahkanstocksekarangdenganquantity = $stocksekarang-$qty;
    $tambahkanstocksekarangdenganquantity = $stocksekarang-$lapangan;

    $addtostatus = mysqli_query($conn,"insert into status (idtim, deskripsi) values('$datanya','$deskripsi')");
    $updatestockmasuk = mysqli_query($conn,"update stock set lapangan='$tambahkanstocksekarangdenganquantity' where idtim='$datanyanya'");
    if($addtostatus&&$updatestockmasuk){
        header('location:status.php');
    } else {
        echo 'gagal';
        header('location:status.php');
    }

}

//menambah data lapangan
if(isset($_POST['datalapangan'])){
    $datanya = $_POST['datanya'];
    $tanggal = $_POST['tanggal'];
    $komentar = $_POST['komentar'];
    $lapangan = $_POST['lapangan'];

    $cekstocksekarang = mysqli_query($conn, "select  * from stock where idtim='$datanya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
   
   $tambahkanstocksekarangdenganquantity = $stocksekarang=$lapangan;

    $addtomasuk = mysqli_query($conn,"insert into lapangan (idtim, tanggal, komentar) values('$datanya','$tanggal','$komentar')");
    $updatestockmasuk = mysqli_query($conn,"update stock set lapangan='$tambahkanstocksekarangdenganquantity' where idtim='$barangnya'");
    if($addtomasuk&&$updatestockmasuk){
        header('location:lapangan.php');
    } else {
        echo 'gagal';
        header('location:lapangan.php');
    }

}

//menambah data member
if(isset($_POST['tambahmember'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];

    $addtotable = mysqli_query ($conn, "insert into member (nama, email, alamat, nohp) values('$nama','$email','$alamat', '$nohp')");
    if($addtotable){
        header('location: member.php');
    }else{
        echo 'gagal';
        header('location:member.php');
    }
};

//menambah data member
if(isset($_POST['tambahpenilaian'])){
    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];
    $komentar = $_POST['komentar'];

    $addtotable = mysqli_query ($conn, "insert into penilaian (nama, nilai, komentar) values('$nama','$nilai','$komentar')");
    if($addtotable){
        header('location: penilaian.php');
    }else{
        echo 'gagal';
        header('location:penilaian.php');
    }
};

//edit data
if(isset($_POST['editdata'])){
    $idbm = $_POST['idtim'];
    $namatim = $_POST['namatim'];
    $hari = $_POST['hari'];

    $update = mysqli_query($conn,"update stock set namatim='$namatim', hari='$hari' where idtim='$idbm'");
    if($update){
        header('location:index.php');
    } else {
        echo 'gagal';
        header('location:index.php');
    }
}

//hapus data
if(isset($_POST['hapusdata'])){
    $idbm = $_POST['idtim'];

    $hapus = mysqli_query($conn, "delete from stock where idtim='$idbm'");
    if($hapus){
        header('location:index.php');
    } else {
        echo 'gagal';
        header('location:index.php');
    }
};

//edit data bayar
if(isset($_POST['editbayar'])){
   
    $idm = $_POST['idbayar'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($conn,"update bayar set harga='$harga', keterangan='$keterangan' where idbayar='$idm'");
    if($update){
        header('location:bayar.php');
    } else {
        echo 'gagal';
        header('location:bayar.php');
    }
}

//edit bayar
if(isset($_POST['editbayar'])){
    $idb = $_POST['idtim'];
    $idm = $_POST['idbayar'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['keterangan'];
    //$qty = $_POST['qty'];
    $lapangan = $_POST['lapangan'];

    $lihatstock = mysqli_query($conn, "select * from stock where idtim='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $lpskrg = mysqli_query($conn, "select * from bayar where idbayar='$idm'");
    $lpnya = mysqli_fetch_array($lpskrg);
    $lpskrg = $lpnya['lapangan'];

    if($harga>$hrgskrg){
        $selisih = $lapangan=$lpskrg;
        $kurangi = $stockskrg=$selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set lapangan='$kurangi' where idtim='$idb'");
        $updatenya = mysqli_query($conn,"update bayar set harga='$harga', keterangan='$deskripsi' where idbayar='$idm'");
        
        if($kurangistocknya&&$updatenya){
            header('location:bayar.php');
        } else {
            echo 'gagal';
            header('location:bayar.php');
        }
    } else {
        $selisih = $lpskrg=$lapangan;
        $kurangi = $stockskrg-$selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set lapangan='$kurangi' where idtim='$idb'");
        $updatenya = mysqli_query($conn,"update masuk set harga='$harga', keterangan='$keterangan' where idbayar='$idm'");
        
        if($kurangistocknya&&$updatenya){
            header('location:bayar.php');
        } else {
            echo 'gagal';
            header('location:bayar.php');
        }
    }
}

//hapus barang masuk
if(isset($_POST['hapusbarangmasuk'])){
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idm = $_POST['idm'];

    $getdatastock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih = $stock-$qty;

    $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn, "delete from masuk where idmasuk='$idm'");

    if($update&&$hapusdata){
        header('location:masuk.php');
    } else {
        header('location:masuk.php');
    }

}

//edit barang keluar
if(isset($_POST['updatebarangkeluar'])){
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "select * from keluar where idkeluar='$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
        $selisih = $qty - $qtyskrg;
        $kurangi = $stockskrg - $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
        
        if($kurangistocknya&&$updatenya){
            header('location:keluar.php');
        } else {
            echo 'gagal';
            header('location:keluar.php');
        }
    } else {
        $selisih = $qtyskrg-$qty;
        $kurangi = $stockskrg - $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
        
        if($kurangistocknya&&$updatenya){
            header('location:keluar.php');
        } else {
            echo 'gagal';
            header('location:keluar.php');
        }
    }
}

//hapus barang keluar
if(isset($_POST['hapusbarangkeluar'])){
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idk = $_POST['idk'];

    $getdatastock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih = $stock+$qty;

    $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn, "delete from keluar where idkeluar='$idk'");

    if($update&&$hapusdata){
        header('location:keluar.php');
    } else {
        header('location:keluar.php');
    }

}


// edit data member
if(isset($_POST['editmember'])){
    $idmember = $_POST['idmember'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];

    $update = mysqli_query($conn,"update member set nama='$nama', email='$email', alamat='$alamat', nohp='$nohp' where idmember='$idmember'");
    if($update){
        header('location:member.php');
    } else {
        echo 'gagal';
        header('location:member.php');
    }
}

//hapus member
if(isset($_POST['hapusmember'])){
    $idmember = $_POST['idmember'];

    $hapus = mysqli_query($conn, "delete from member where idmember='$idmember'");
    if($hapus){
        header('location:member.php');
    } else {
        echo 'gagal';
        header('location:member.php');
    }
};


// edit data penilaian
if(isset($_POST['editpenilaian'])){
    $idpenilaian = $_POST['idpenilaian'];
    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];
    $komentar = $_POST['komentar'];

    $update = mysqli_query($conn,"update penilaian set nama='$nama', nilai='$nilai', komentar='$komentar' where idpenilaian='$idpenilaian'");
    if($update){
        header('location:penilaian.php');
    } else {
        echo 'gagal';
        header('location:penilain.php');
    }
}

//hapus member
if(isset($_POST['hapuspenilaian'])){
    $idpenilaian = $_POST['idpenilaian'];

    $hapus = mysqli_query($conn, "delete from penilaian where idpenilaian='$idpenilaian'");
    if($hapus){
        header('location:penilaian.php');
    } else {
        echo 'gagal';
        header('location:penilaian.php');
    }
};
?>