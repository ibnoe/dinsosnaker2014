<?php
    session_start();
    include("koneksi.php");
    include("fungsi.php");
    $pesan = 0;
    selesaiDispSK($_POST["id_disposisi"]);
    if(isset($_POST["terima"])){
        $ds_sk=mysql_fetch_array(mysql_query("SELECT * FROM myapp_maintable_suratkeluar WHERE id='" . $_POST["id_surat_keluar"] . "'"));
        $peneken_nota = $_SESSION["id_level"];
        if($ds_sk["id_ttd"] == 1 || $ds_sk["id_ttd"] == 4){
            mysql_query("UPDATE myapp_maintable_suratkeluar SET no_nodin='" . nomor_nodin($peneken_nota, date("Y")) . "', tgl_nodin=CURDATE() WHERE id='" . $_POST["id_surat_keluar"] . "'");
        }
        if($ds_sk["id_ttd"] == 4){
            mysql_query("UPDATE myapp_maintable_suratkeluar SET status=2 WHERE id='" . $_POST["id_surat_keluar"] . "'");
        }else{
            pushDispSK(anti_injection($_POST["id_surat_keluar"]), $_SESSION["id_level"], 2, anti_injection($_POST["catatan"]), 1);
        }
        header("location:../?mod=inform&pesan=30&redir=posisi_surat_keluar_kabid");
		
    }else if(isset($_POST["tolak"])){
        $ds_id_dis = mysql_fetch_array(mysql_query("SELECT * FROM myapp_disptable_suratkeluar WHERE id='" . $_POST["id_disposisi"] . "'"));
        pushDispSK(anti_injection($_POST["id_surat_keluar"]), $_SESSION["id_level"], levelBawahan(anti_injection($_POST["id_surat_keluar"]), 3), 
			anti_injection($_POST["catatan"]), 2);
        header("location:../?mod=inform&pesan=31&redir=posisi_surat_keluar_kabid");
    }
?>