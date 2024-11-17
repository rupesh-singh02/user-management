<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    @vite('resources/css/app.css')  
    @livewireStyles  

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/da2c8b88da.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-600 leading-normal tracking-normal font-roboto-slab">


    @livewire('user-management')

    @livewireScripts 
</body>

</html>
