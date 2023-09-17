<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo "$ROOT";?>dist/output.css">
    <title>Set-up Nevisa...</title>
</head>
<body class="md:bg-gray-50">
    <div class="mx-auto md:my-4 px-4 py-2 md:w-10/12 md:shadow-lg md:rounded-lg bg-white">
        <h1 class="font-bold text-3xl py-2">Welcome To Nevisa!</h1>
        <h2 class="font-semibold text-xl py-2">Let's setup your blog!</h2>
        <hr><br>
        <form action="<?php echo "$ROOT"; ?>setup" method="post">
            <div class="flex flex-wrap items-center space-y-2">
                <label for="sitename" class="text-lg basis-full md:basis-1/5">
                    Site Title:
                </label>
                <div class="basis-full md:basis-4/5">
                    <input type="text" name="sitename" id="sitename" placeholder="My Blog" required class="border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 border-1 rounded-lg text-lg px-2 py-1 border">
                </div>

                <label for="username" class="text-lg basis-full md:basis-1/5">
                    Username:
                </label>
                <div class="basis-full md:basis-4/5">
                    <input type="text" name="username" id="username" required class="border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 border-1 rounded-lg text-lg px-2 py-1 border">
                </div>

                <label for="password" class="text-lg basis-full md:basis-1/5">
                    Password:
                </label>
                <div class="basis-full md:basis-4/5">
                    <input type="password" name="password" id="password" required class="border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 border-1 rounded-lg text-lg px-2 py-1 border">
                </div>

                <label for="email" class="text-lg basis-full md:basis-1/5">
                    Email:
                </label>
                <div class="basis-full md:basis-4/5">
                    <input type="email" name="email" id="email" required class="border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 border-1 rounded-lg text-lg px-2 py-1 border">
                </div>

                <label for="dbname" class="text-lg basis-full md:basis-1/5">
                    Database Name:
                </label>
                <div class="basis-full md:basis-4/5">
                    <input type="text" name="dbname" id="dbname" placeholder="nv_my_blog" required class="border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 border-1 rounded-lg text-lg px-2 py-1 border">
                </div>

                <label for="dbhostname" class="text-lg basis-full md:basis-1/5">
                    Database Hostname:
                </label>
                <div class="basis-full md:basis-4/5">
                    <input type="text" name="dbhostname" id="dbhostname" placeholder="localhost" required class="border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 border-1 rounded-lg text-lg px-2 py-1 border">
                </div>

                <label for="dbusername" class="text-lg basis-full md:basis-1/5">
                    Database Username:
                </label>
                <div class="basis-full md:basis-4/5">
                    <input type="text" name="dbusername" id="dbusername" placeholder="root" required class="border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 border-1 rounded-lg text-lg px-2 py-1 border">
                </div>

                <label for="dbpassword" class="text-lg basis-full md:basis-1/5">
                    Database Password:
                </label>
                <div class="basis-full md:basis-4/5">
                    <input type="password" name="dbpassword" id="dbpassword" class="border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 border-1 rounded-lg text-lg px-2 py-1 border">
                </div>
            </div>
            <br>
            <button class="btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>