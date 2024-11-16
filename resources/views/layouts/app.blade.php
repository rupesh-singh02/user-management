<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-slate-950 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4">
        @livewire('user-management')
    </div>
    @livewireScripts

</body>
</html>
