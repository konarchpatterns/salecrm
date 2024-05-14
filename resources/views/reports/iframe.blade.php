
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body>
        <livewire:reports.cards :user_id="$id"/>
        <div class="flex gap-5">
            <livewire:reports.user-dispositons :user_id="$id"/>
        </div>
        
        {{-- <livewire:reports.bar-graph /> --}}
   
@livewireScripts

</body>
</html>
