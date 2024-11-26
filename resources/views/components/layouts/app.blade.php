<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linux Challenge | LAMP Server</title>
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <style>
        /* Styles for Modal */
        .modal{
            display: block;
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999; /* Ensures the backdrop is on top of the page */
        }

        /* Center the modal vertically and horizontally */
        .modal-dialog {
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000; /* Ensures the modal content is above the backdrop */
        }

        .modal-content {
            max-width: 500px; /* Adjust size based on your preference */
            width: 100%;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            border-bottom: 1px solid #ccc;
        }

        .close-button {
            font-size: 24px;
            color: #aaa;
            border: none;
            background: none;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-button:hover {
            color: #333;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            padding: 16px;
            border-top: 1px solid #ccc;
            display: flex;
            justify-content: flex-end;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

    </style>
    
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    {{ $slot }}
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
