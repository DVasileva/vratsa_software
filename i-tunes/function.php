<?php
function create_pages(){

?>	
<p>
		<a class="btn btn-sm btn-primary  <?= ($page == 1) ? 'disabled' : '' ?>"href="index.php?page=<?= ($page > 1 ) ? $page-1 : $page ?>">Previous</a>
		<?php
		for ($i=1; $i <= $max_pages ; $i++) { 
			echo "<a href='index.php?page=$i'>$i</a>";
		}
		?>
		<a class="btn btn-sm btn-primary  <?= ($page >= $max_pages) ? 'disabled' : '' ?>"href="index.php?page=<?= ($page < $max_pages) ? $page+1 : $page ?>">Next</a>
</p>

} 

<?php
echo create_pages();
?>