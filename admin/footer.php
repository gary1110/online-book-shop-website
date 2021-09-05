<div class="clear"></div>
			</div>
		</div>
		<div class="cm-footer-bg">
			<div class="cm-footer">
				<div class="col-1"><a href="#">copyright@Book Shop</a><a href="javascript:;"></a></div>
			</div>
		</div>

		<script>
	// Define page deletion method
	function bookDelete(id){
		if(confirm("Are you sure to delete this book?")){
			window.location.href="./bookDelete.php?type=book&id="+id;
		}
	}
	function orderDelete(id){
		if(confirm("Are you sure to delete this book?")){
			window.location.href="./orderDelete.php?type=order&id="+id;
		}
	}

</script> 