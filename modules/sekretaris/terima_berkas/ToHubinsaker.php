<?php
if(!isset($_GET["value"]))
{
	echo "akses di tolak";
}
else
{
	$no_resi = $_GET["value"];
	$ca = mysql_query("UPDATE tbl_info_berkas 
							SET id_proses_skrg = '31', id_proses_sblm = '31', isDisposisi =  '1' 
							WHERE no_resi = '".$no_resi."'");	
	if ($ca)
	{
		?>
		<script type="text/javascript">
			parent.document.location = "./index.php?mod=kadis&opt=lembar_kendali";
		</script>
		<?php
	}
}
?>