<?php
if($_GET["opts"] == '')
{
?>
<script type="text/javascript">
	function gocetak(a){
		var x ='./index.php?mod=loket&opt=print_resi';
		var c = x+"&opts=cetak&id="+a;
		window.open(c);
	}
	function tampil(c,uid)
	{
			var t=document.getElementById("div_cek_"+c);
			if(t.innerHTML != ''){
				t.innerHTML = '';
			}
			else
				t.innerHTML='<iframe src="./modules/kasubag_umum/cek_berkas/tampil.php?link='+c+'&id_user='+uid+'" width="100%" style="height:1400px" frameborder="0" scrolling="yes" id="iframe_detail"></iframe>';
			
	}
	function Kirim_Cari()
	{
	
		var y ='<?php echo $_GET["halaman"]; ?>';
		var s;
		s='./index.php?mod=kasubag_umum&opt=cek_berkas';
		//s='agenda_masuk.php?opts=view';
		if(y>1)
			s=s+'&halaman=1';
		if (document.fcari.cari.value!='')
		{
			s=s+'&cari='+document.fcari.cari.value;
		}
		document.location.href=s;
		
	}
	function Kirim_Cari1()
	{
		var cari ='<?php echo $_GET["cari"]; ?>';
		var s;
		s='./index.php?mod=kasubag_umum&opt=cek_berkas';
		//s='agenda_masuk.php?opts=view';
		if(cari != '')
			s=s+'&cari='+cari;
		s=s+'&halaman='+document.f2.halaman.value;
		document.location.href=s;
		
	}
</script>
<table width="1024" border="0" cellspacing="2" cellpadding="5">
<tr >
    <td colspan="2"><div id='header' style='background:url(./image/coba/header2.png) no-repeat; '> 
      <table border="0" id='atasan'>
        	<tr>
		         <td colspan='2' style="text-align:right; padding-right:10px; padding-bottom:50px;"><a style="color:#AA9F00;" href="#"><b>CEK BERKAS</b></a></td>
            </tr>
            <tr>
            	 <td style="text-align:left; padding-left:10px; border-left:0px solid black;">
				  <img src="./image/panah.gif"  /><a href="./index.php?mod=kasubag_umum&opt=main" id="linkutama"> BERANDA LOGIN KASUBBAG UMUM</a> 
                  <img src="./image/panah.gif"  /><a href="" id="linkutama"> CEK BERKAS </a>
                 </td>
                
            </tr>
        </table> 
    </div>
    </td>
</tr>
<tr>
<td style="float:right;">
					<img width="90" height="29" 
						onclick="document.location.href='./index.php?mod=kasubag_umum&opt=main'" 
						onmouseout="this.src='./image/button/KEMBALI.gif'" 
						onmouseover="this.src='./image/button/KEMBALI2.gif'" 
						src="./image/button/KEMBALI.gif">
					</img>
    			</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
	<td>
     <div id='content' style='margin-left:2%;margin-bottom:20px;width:98%;'>
        <fieldset>
            <legend>FILTER</legend>
            <form method="POST" name="fcari">
            <table width="100%" border="0" cellpadding="3">
                <tr>
                    <td width="120">Nama Perusahaan</td>
                    <td><input class ='filter' type='text' name='cari' id='cari' placeholder='Cari Perusahaan'></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><input type='button' value='CARI' onclick="Kirim_Cari();"></br></td>
                    </tr></table>
            </form>
        </fieldset>
		<fieldset>
		<legend>CEK BERKAS</legend>
	<?php
			if(!empty($_GET["cari"]))
				{
					$d = mysql_query("select count(*) as jumlah from tbl_info_berkas where nama like '%".$_GET["cari"]."%' AND id_proses_skrg = '21' and isDisposisi='0'");
				}
				else
					$d = mysql_query("select count(*) as jumlah from tbl_info_berkas where id_proses_skrg = '21' and isDisposisi='0'");
					
				$batas = 20;
				$halaman = $_GET["halaman"];
				
				if(empty($halaman))
				{
					$posisi = 0;
					$halaman = 1;
				}
				else
					$posisi = ($halaman - 1) * $batas;
				
				$d1 = mysql_fetch_array($d);			
				$jmldata = $d1["jumlah"];
				$jmlhal  = ceil($jmldata/$batas);
				if(isset($_GET["cari"]))
					{
						$str = "SELECT 
									a.* , b.nama , b.alamat as alamat_usaha , c.jenis 
								FROM
									tbl_info_berkas a 
								LEFT JOIN vw_dinsos b ON a.id_perusahaan = b.id_perusahaan 
								LEFT JOIN tbl_jenis_pengurusan c ON a.jenis_pengurusan = c.kode 
                                WHERE 
									a.nama LIKE '%".$_GET['cari']."%' AND 
									a.id_proses_skrg IN ('21','24') AND 
									a.isDisposisi = '0' 
								LIMIT 
									 ".$posisi." , ".$batas." 				
						";
					
						$query = mysql_query($str) or die(mysql_error());
						
					}
					else
						{
							$str = "SELECT 
									a.* , b.nama , b.alamat as alamat_usaha , c.jenis 
								FROM
									tbl_info_berkas a 
								LEFT JOIN vw_dinsos b ON a.id_perusahaan = b.id_perusahaan 
								LEFT JOIN tbl_jenis_pengurusan c ON a.jenis_pengurusan = c.kode 
                                WHERE 
									a.id_proses_skrg IN ('21','24') AND 
									a.isDisposisi = '0' 
								LIMIT 
									 ".$posisi." , ".$batas." 				
							";
						
							$query = mysql_query($str) or die(mysql_error());
						}
						
				echo '<form name=f2><span id="text">';
				echo '<span style=font-family:verdana;font-size:12px> Halaman: <select name=halaman onchange="javascript:Kirim_Cari1();">';
				echo '<option value="'.$halaman.'" selected="selected">'.$halaman.'</option>';
					for($i = 1; $i <= $jmlhal; $i++)
						if($i != $halaman)
						{
							echo '<option value='.$i.'>'.$i;		
						}
				echo '</option>';
				echo '</select>';
				echo ' dari '.$jmlhal.' Halaman</span>';
				echo "</span></form><br>";
						
			?>
			<table border='1' class='tblisi' cellspacing="0" style='width:100%; margin-bottom:10px;'>
					<tr>
						<th height="25px">NO</th>
						<th>NO RESI</th>
						<th>TANGGAL MASUK</th>
						<th>JENIS PENGURUSAN</th>
						<th>PERUSAHAAN</th>
						<th>PEMOHON</th>
						<th>ALAMAT PERUSAHAAN</th>
						<th>ALAMAT PEMOHON</th>
						<th>AKTIFITAS</th>
					</tr>
				<?php 
						if(mysql_num_rows($query) == '')
						{
					echo "<tr>
							<td  colspan='9'>DATA TIDAK DITEMUKAN</td>
						 </tr>";
					}					
						$i=1;
						
						while($set = mysql_fetch_array($query))
						{
							$onc = "tampil('".$set['no_resi']."','".$_SESSION["id_user"]."')";
							$no=0;
							if($halaman>1)
							{
								$no = ($halaman - 1) * 20;
							}
							echo "
							<tr>
								<td>",$no+$i,"</td>
								<td> ".$set['no_resi']."</td>";
							echo "<td>".tglindonesia($set['tgl_masuk'])."</td>";
							echo "<td>".$set['jenis']."</td>"; 
							echo "<td>".$set['nama']."</td>";
							echo "<td>".$set['pemohon']."</td>";
							echo "<td>".$set['alamat_usaha']."</td>";
							echo "<td>".$set['alamat_pemohon']."</td>"; 
							echo "
								<td> <input type='button' value='PROSES' onClick=$onc></td>
								</tr>";
							$i++;
					echo "
					<tr id='div_if'>
						<td colspan='10'> <div id='div_cek_".$set['no_resi']."'></div>
					</tr>
					";
						}
					?>
				</table> 
</fieldset>
</td>
	</tr>

 <tr>
  	<td colspan="2"><div id='footer'  style='background:url(./image/coba/footer.png) no-repeat; height:80px; margin-left:8px;'></div>
    </td>
  </tr>
</table>			
<?php
	}else	
		if($_GET["opts"] == 'tolak')
			include('./modules/kasubag_umum/cek_berkas/tolak.php');
		else if($_GET["opts"] == 'terima')
			include('./modules/kasubag_umum/cek_berkas/terima.php');
		else if($_GET["opts"] == 'terima2')
			include('./modules/kasubag_umum/cek_berkas/terima2.php');
		else
			die ("restricted access");
?>