<script type="text/javascript">

	// Enable pusher logging - don't include this in production
	Pusher.logToConsole = true;

	var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
		cluster: 'eu'
	});

	var channel = pusher.subscribe('fuar-mobilya');

	var uId = '{{ Auth::id() }}';

	channel.bind('laminoks-complete', function(data) {
		if(data.userId != uId) {
			$("#laminoks-notification").prepend('<a href="#" class="navi-item"><div class="navi-link rounded"><div class="navi-text"><div class="font-weight-bold font-size-sm">' + data.data.message + '</div><div class="text-muted">nuh</div></div></div></a>');
		}
	});

	channel.bind('laminant-complete', function(data) {
		if(data.userId != uId) {
			toastr.options = {
			  "closeButton": false,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": false,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "0",
			  "hideDuration": "1000",
			  "timeOut": "0",
			  "extendedTimeOut": "0",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			};

			toastr.info(data.data.message);
		}
	});
</script>