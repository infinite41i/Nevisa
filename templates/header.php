<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nevisa</title>
    <link rel="stylesheet" href="<?php echo "$ROOT"; ?>dist/output.css">
</head>
<header>
    <div class="flex flex-nowrap px-4 py-2 bg-slate-200 border-b-2 border-slate-300 fixed top-0 w-full">
        <a href="<?php echo "$ROOT"; ?>" class="px-4 py-2 mx-1 rounded-md bg-blue-600 text-slate-100">Home</a>
        <a href="<?php echo "$ROOT"; ?>about" class="px-4 py-2 mx-1 rounded-md bg-blue-600 text-slate-100">About</a>
        <div class="flex grow justify-end">
            <a href="<?php echo "$ROOT"; ?>admin"
            class="bg-gradient-to-tr from-orange-600 to-orange-400
                    text-slate-100
                    hover:bg-gradient-to-t
                    transition shadow-md hover:shadow-lg
                    px-4 py-2 rounded-md">
            Admin Panel</a>
        </div>
    </div>
    <div class="flex flex-col items-center py-5 mt-8">
        <div class="text-7xl"><?php echo $conf['website']['name'] ?></div>
        <div>website description</div>
    </div>
</header>
<body class="">
