<footer class="footer">
        <div class="container-fluid">
            <div class="copyright ml-auto">
                Copyright &copy; 2022
            </div>				
        </div>
    </footer>
</div>
<!-- End Custom template -->
</div>
	<!--   Core JS Files   -->
	<script src="<?=asset('assets/js/core/jquery.3.2.1.min.js')?>"></script>
	<script src="<?=asset('assets/js/core/popper.min.js')?>"></script>
	<script src="<?=asset('assets/js/core/bootstrap.min.js')?>"></script>

	<!-- jQuery UI -->
	<script src="<?=asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>"></script>
	<script src="<?=asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')?>"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?=asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')?>"></script>


	<!-- Chart JS -->
	<script src="<?=asset('assets/js/plugin/chart.js/chart.min.js')?>"></script>

	<!-- jQuery Sparkline -->
	<script src="<?=asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')?>"></script>

	<!-- Chart Circle -->
	<script src="<?=asset('assets/js/plugin/chart-circle/circles.min.js')?>"></script>

	<!-- Datatables -->
	<script src="<?=asset('assets/js/plugin/datatables/datatables.min.js')?>"></script>
	<script src="<?=asset('assets/js/plugin/datatables/datatables.button.min.js')?>"></script>

	<!-- Bootstrap Notify -->
	<script src="<?=asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')?>"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?=asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')?>"></script>

	<!-- Sweet Alert -->
	<script src="<?=asset('assets/js/plugin/sweetalert/sweetalert.min.js')?>"></script>

	<!-- Atlantis JS -->
	<script src="<?=asset('assets/js/atlantis.min.js')?>"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?=asset('assets/js/setting-demo.js')?>"></script>
	<!-- <script src="<?=asset('assets/js/demo.js')?>"></script> -->
	<?php foreach([
'https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js',
'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
'https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js',
'https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js'
] as $js): ?>
	<script src="<?=$js?>"></script>
	<?php endforeach ?>
	<script>
		$('.datatable').dataTable({
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'print',
					exportOptions: {
						columns: [ ':visible :not(:last-child)' ]
					}
				},
				'colvis'
			]
		});
	</script>
</body>
</html>