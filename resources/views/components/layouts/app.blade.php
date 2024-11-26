<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linux Challenge | LAMP Server</title>
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <!-- <link rel="stylesheet" href="{{ asset('css/main.css') }}"> -->
    <style>
        /* Custom CSS for the table */
.table-container {
    margin-top: 20px;
    padding: 20px;
    background-color: #f4f7fc;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Arial', sans-serif;
}

thead {
    background-color: #4CAF50;
    color: white;
}

th, td {
    padding: 12px 20px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    font-size: 16px;
    font-weight: 600;
}

tr:hover {
    background-color: #f1f1f1;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:nth-child(odd) {
    background-color: #fff;
}

button {
    padding: 8px 15px;
    border-radius: 5px;
    border: none;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

button:hover {
    opacity: 0.8;
}

.bg-yellow {
    background-color: #FFC107;
    color: #fff;
}

.bg-red {
    background-color: #f44336;
    color: #fff;
}

.bg-green {
    background-color: #4CAF50;
    color: #fff;
}

button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

/* Modal styles */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    width: 400px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.modal-content h2 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
}

.modal-content input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.modal-content .error {
    color: red;
    font-size: 12px;
    margin-top: -8px;
    margin-bottom: 10px;
}

.modal-content .btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.modal-content .btn:hover {
    background-color: #45a049;
}

    </style>
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
