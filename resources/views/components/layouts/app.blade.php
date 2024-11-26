<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linux Challenge | LAMP Server</title>    
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
