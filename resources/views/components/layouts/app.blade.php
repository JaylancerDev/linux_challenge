<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linux Challenge | LAMP Server</title>
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @livewireStyles

</head>
<body>
    {{ $slot }}
    @livewireScripts
    <script>
    // document.addEventListener('livewire:load', function () {
    //     Livewire.on('toast', (message, type) => {
    //         if (['success', 'info', 'warning', 'error'].includes(type)) {
    //             toastr.options = {
    //                 "closeButton": true,
    //                 "progressBar": true,
    //                 "positionClass": "toast-top-right", // Adjust position as needed
    //                 "timeOut": "5000", // Adjust display time
    //             };
    //             toastr[type](message);
    //         } else {
    //             console.error('Invalid Toastr type:', type);
    //         }
    //     });
    // });
</script>
</body>
</html>
