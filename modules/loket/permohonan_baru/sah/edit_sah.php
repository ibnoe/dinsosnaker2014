<script type="text/javascript" src="./libraries/jquery.validate.js"></script>
<script type="text/javascript" src="./libraries/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./libraries/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./libraries/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script language="javascript"> 
	function CekAll() {
		document.getElementById("btn").disabled=false;
		checkboxes = document.getElementsByName('berkas');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = true;
		}
	}
	function CekCentang() {
		checkboxes = document.getElementsByName('berkas');
		var flag=0;
		for(var i=0, n=checkboxes.length;i<n;i++) {
			if(checkboxes[i].checked != true)
			{
				alert("Data Berkas Tidak Lengkap");
				flag = 1;
						return false;
			}
		}
		if (flag == 0){
			return true;}
	}	
function goedit() {
		document.getElementById('no_surat').disabled = false;
		document.getElementById('tgl_surat').disabled = false;
		document.getElementById('no_jamsostek').disabled = false;
		document.getElementById('tenaga_lk').disabled = false;
		document.getElementById('tenaga_pr').disabled = false;
		document.getElementById('tenaga_lk_cabang').disabled = false;
		document.getElementById('tenaga_pr_cabang').disabled = false;
		document.getElementById('upah_bulanan_max').disabled = false;
		document.getElementById('upah_bulanan_min').disabled = false;
		document.getElementById('upah_harian_max').disabled = false;
		document.getElementById('upah_harian_min').disabled = false;
		document.getElementById('hub_tentu').disabled = false;
		document.getElementById('hub_tak_tentu').disabled = false;
		document.getElementById('konsep_pp').disabled = false;
		document.getElementById('tgl_pp').disabled = false;
}
	function calcAge(dateString) {
		var birthday = +new Date(dateString);
		var x;
		 x = ~~((Date.now() - birthday) / (31557600000));
		document.getElementById('umur').value = x;
	}
	
	function simpan(){
	document.location.href = './index.php?mod=loket&opt=proses_permohonan&opts=resi&id=<?php echo $no_resi; ?>';	
	}
	function kirim_kendali()
	{
		var no_resi ='<?php echo $_GET["no_resi"]; ?>';
		var id_user ='<?php echo $_SESSION["id_user"]; ?>';
		var s;
		s='./index.php?mod=loket&opt=lembar_disposisi';
		if(no_resi != '')
		s=s+'&link='+no_resi;
		if(id_user != '')
		s=s+'&id_user='+id_user;
		
		document.location.href=s;
	} 

</script>
<script type="text/javascript">
		$(document).ready(function(){
        $("#tgl_surat").datepicker({
					dateFormat  : "yy-mm-dd",changeMonth : true,changeYear  : true					
        });
		});
		$(document).ready(function(){
        $("#tgl_pp").datepicker({
					dateFormat  : "yy-mm-dd",changeMonth : true,changeYear  : true					
        });
		});
		$(document).ready(function(){
        $("#berlaku_sampai").datepicker({
					dateFormat  : "yy-mm-dd",changeMonth : true,changeYear  : true					
        });
		});
		$(document).ready(function(){
        $("#tgl_imta").datepicker({
					dateFormat  : "yy-mm-dd",changeMonth : true,changeYear  : true					
        });
		});
		$(document).ready(function(){
        $("#tgl_berakhir").datepicker({
					dateFormat  : "yy-mm-dd",changeMonth : true,changeYear  : true					
        });
		});
		$(document).ready(function(){
        $("#tgl_rptka").datepicker({
					dateFormat  : "yy-mm-dd",changeMonth : true,changeYear  : true					
        });
		});
		$(document).ready(function(){
        $("#tgl_setoran_dpkk").datepicker({
					dateFormat  : "yy-mm-dd",changeMonth : true,changeYear  : true					
        });
		});
</script>
<script type="text/javascript">
		$(document).ready(function() {
			$("#various1").fancybox({
				'width'				: '90%',
				'height'			: '105%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'overlayShow'	: false,
				'type'				: 'iframe'
			});
			
			$("#various2").fancybox({
				'width'				: '90%',
				'height'			: '105%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'overlayShow'	: false,
				'type'				: 'iframe'
			});	
			
			$("#various3").fancybox({
				'width'				: '90%',
				'height'			: '105%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'overlayShow'	: false,
				'type'				: 'iframe'
			});	
			$("#various4").fancybox({
				'width'				: '90%',
				'height'			: '105%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'overlayShow'	: false,
				'type'				: 'iframe'
			});									
		});
</script>
<table width="1024" border="0" cellspacing="2" cellpadding="5">
<tr >
    <td colspan="2"><div id='header' style='background:url(./image/coba/header2.png) no-repeat;'> 
      <table border="0" id='atasan'>
        	<tr>
		         <td colspan='2' style="text-align:right; padding-right:10px; padding-bottom:50px;"><a style="color:#AA9F00;" href="#">PERMOHONAN BARU - IMTA</a></td>
            </tr>
            <tr>
            	 <td style="text-align:left; padding-left:10px; border-left:0px solid black;">
				  <img src="./image/panah.gif"  /><a href="./index.php?mod=loket&opt=main" id="linkutama"> BERANDA LOGIN LOKET</a> 
				  <img src="./image/panah.gif"  /> <a href="./index.php?mod=loket&opt=proses_permohonan" id="linkutama"> PROSES PERMOHONAN DAN PRINT RESI </a>
                  <img src="./image/panah.gif"  /><a href="./index.php?mod=loket&opt=proses_permohonan&opts=baru" id="linkutama"> PROSES BARU </a>
				  <img src="./image/panah.gif"  /><span id="linkutama"> PROSES PENGURUSAN PENGESAHAN PERATURAN PERUSAHAAN</span>
                 </td>
                
            </tr>
        </table> 
    </div>
    </td>
</tr>
<tr>
<td style="float:right;">
					<img width="90" height="29" 
						onclick="document.location.href='./index.php?mod=loket&opt=proses_permohonan&opts=baru'" 
						onmouseout="this.src='./image/button/KEMBALI.gif'" 
						onmouseover="this.src='./image/button/KEMBALI2.gif'" 
						src="./image/button/KEMBALI.gif">
					</img>
    			</td>
</tr>
<tr>
	<td>
		<h3> &nbsp; PROSES PENGURUSAN PENGESAHAN PP-VERIFIKASI DATA</h3>
		<fieldset>
		<legend>DATA KHUSUS PENGESAHAN PERATURAN PERUSAHAAN</legend>
<?php 
$no_resi = $_GET["no_resi"];
$query=mysql_query("SELECT * FROM tbl_berkas_sah WHERE no_resi='$no_resi'");
$result=mysql_fetch_array($query);
$id_per=$_GET['id'];
if($result)
{

echo'	<form method="post" action="./index.php?mod=loket&opt=proses_permohonan&opts=validate_sah&mode=2">
		<table name="biodata" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td>NAMA PEMOHON</td>
						<td width="20">:</td>
						<td><input name="nama_pemohon" type="text" value="'.$result["nama_pemohon"].'">
						</td>
					  </tr>		
					  <tr>
						<td>ALAMAT PEMOHON</td>
						<td width="20">:</td>
						<td><input name="alamat_pemohon" type="text" value="'.$result["alamat_pemohon"].'">
						</td>
					  </tr>						  	
					  <tr>
						<td>NO SURAT KEP. IZIN USAHA</td>
						<td width="20">:</td>
						<td><input name="no_surat" type="text" size="40"  value="'.$result["no_surat"].'">
						<input type="hidden" value="'.$result["id_perusahaan"].'" name="id_per"><input type="hidden" value="'.$result["no_resi"].'" name="no_resi">
					  </tr>
					  <tr>
						<td>TANGGAL SURAT KEP. IZIN USAHA</td>
						<td width="20">:</td>
						<td><input name="tgl_surat" type="date" size="40" id="tgl_surat"  value="'.$result["tgl_surat"].'"></td>
					  </tr>
					<tr>
						<td>DATA SERIKAT PEKERJA DI PERUSAHAAN</td>
						<td width="20">:</td>
						<td><a href="./modules/rincian/serikat/?mode=1&id_per='.$result["id_perusahaan"].'" id="various1"><b>ISI DATA</b></a><br/></td>
					  </tr>
					  <tr>
						<td>NOMOR KEPESERTAAN JAMSOSTEK</td>
						<td width="20">:</td>
						<td><input name="no_jamsostek" type="text"  value="'.$result["no_jamsostek"].'">
						</td>
					  </tr>
					  <tr>
						<td>JUMLAH PEKERJA PUSAT LAKI-LAKI</td>
						<td width="20">:</td>
						<td><input name="tenaga_lk" type="text" size="40"  value="'.$result["tenaga_lk"].'"></td>
					  </tr>
					  <tr>
						<td>JUMLAH PEKERJA PUSAT PEREMPUAN</td>
						<td width="20">:</td>
						<td><input name="tenaga_pr" type="text"  value="'.$result["tenaga_pr"].'" size="40"></td>
					  </tr>
					  <tr>
						<td>JUMLAH PEKERJA DI CABANG LAKI-LAKI</td>
						<td width="20">:</td>
						<td><input name="tenaga_lk_cabang" type="text" size="40"  value="'.$result["tenaga_lk_cabang"].'"></td>
					  </tr>
					  <tr>
						<td>JUMLAH PEKERJA DI CABANG PEREMPUAN</td>
						<td width="20">:</td>
						<td><input name="tenaga_pr_cabang" type="text" size="40"   value="'.$result["tenaga_pr_cabang"].'"></td>
					  </tr>
					  <tr>
						<td>KONSEP PERATURAN PERUSAHAAN</td>
						<td width="20">:</td>
						<td><input name="konsep_pp" type="text" size="40"  value="'.$result["konsep_pp"].'"></td>
					  </tr>
					  <tr>
						<td>TANGGAL BERLAKU PERATURAN PERUSAHAAN YANG BARU</td>
						<td width="20">:</td>
						<td><input name="tgl_pp" type="date" size="40"  id="tgl_pp" value="'.$result["tgl_pp"].'"></td>
					  </tr>					  
					  <tr>
						<td>UPAH MAKSIMUM PEKERJA BULANAN</td>
						<td width="20">:</td>
						<td><input name="upah_bulanan_max" type="text" size="40"   value="'.$result["upah_bulanan_max"].'"></td>
					  </tr>
					  <tr>
						<td>UPAH MINIMUM PEKERJA BULANAN</td>
						<td width="20">:</td>
						<td><input name="upah_bulanan_min" type="text" size="40"  value="'.$result["upah_bulanan_min"].'"></td>
					  </tr>
					  <tr>
						<td>UPAH MAKSIMUM PEKERJA HARIAN</td>
						<td width="20">:</td>
						<td><input name="upah_harian_max" type="text" size="40"   value="'.$result["upah_harian_max"].'"></td>
					  </tr>
					  <tr>
						<td>UPAH MINIMUM PEKERJA HARIAN</td>
						<td width="20">:</td>
						<td><input name="upah_harian_min" type="text" size="40"  value="'.$result["upah_harian_min"].'"></td>
					  </tr>                      
					  <tr>
						<td>SISTEM HUB. KERJA WAKTU TERTENTU</td>
						<td width="20">:</td>
						<td><input name="hub_tentu" type="text" size="40"  value="'.$result["hub_tentu"].'"></td>
					  </tr>
					  <tr>
						<td>SISTEM HUB. KERJA WAKTU TIDAK TERTENTU</td>
						<td width="20">:</td>
						<td><input name="hub_tak_tentu" type="text" size="40"  value="'.$result["hub_tak_tentu"].'"></td>
					  </tr>
					</table>';
}
else{
	echo "<script type='text/javascript'>
				alert('DATA TIDAK DITEMUKAN');
				document.location.href='index.php?mod=loket&opt=proses_permohonan&opts=baru';
		</script>";		
}?>
	</fieldset>
	<fieldset>
		<legend>CHECKLIST PERSYARATAN DAN KELENGKAPAN BERKAS</legend>
		
			  <p>
				<label>
				  <input type="checkbox" name="berkas" value="1" id="berkas_0">
				  SURAT PERMOHONAN</label>
				<br>
				<label>
				  <input type="checkbox" name="berkas" value="2" id="berkas_1">
				  COPY AKTE PENDIRIAN</label>
				<br>
				<label>
				  <input type="checkbox" name="berkas" value="3" id="berkas_2">
				  BERKAS PERJANJIAN KERJA BERSAMA/PERUBAHAN PKB</label>
				<br>
				<label>
				  <input type="checkbox" name="berkas" value="4" id="berkas_3">
				  COPY SIUP</label>
				<br>
				<label>
				  <input type="checkbox" name="berkas" value="5" id="berkas_4">
				  COPY TDP</label>
				<br>
				<label>
				  <input type="checkbox" name="berkas" value="6" id="berkas_5">
				  COPY WAJIB LAPOR YANG BERLAKU</label>
				<br>
				<label>
				  <input type="checkbox" name="berkas" value="7" id="berkas_6">
				  FOTOCOPY TANDA KEANGGOTAAN DAN FOTOCOPY PEMBAYARAN TERAKHIR JAMSOSTEK</label>
				<br>
                			  </p>
				<center>		
				<input type="button" onClick="CekAll()" value="CENTANG SEMUA"> <input type="submit" onClick="return CekCentang()" value="PROSES" disabled id="btn">
				</center>
			  </form>
		</fieldset>

  <tr>
  	<td colspan="2"><div id='footer'  style='background:url(./image/coba/footer.png) no-repeat; height:80px; margin-left:8px;'></div>
    </td>
  </tr>
</table>
