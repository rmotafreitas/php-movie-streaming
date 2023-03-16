<?php
include '../../../inc/config.inc.php';
$erroAuth = 0;

if (!isset($_SESSION['isLoggedIn'])) {
    $erroAuth = 1;
} elseif ($_SESSION['isLoggedIn'] != $cfg['loginKey']) {
    $erroAuth = 2;
}

if (!$erroAuth) {
    header('Location: ' . $cfg['urls']['admin'] . '/pages/dashboard/index.php');
    exit();
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Pacote TV Admin</title>
    <link href="<?= $cfg['urls']['site'] ?>/img/favicon.ico" rel="shortcut icon" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="flex items-center min-h-screen bg-gray-50">
        <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
            <div class="flex flex-col md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img class="object-cover w-full h-full" src="https://i.pinimg.com/originals/81/a8/f8/81a8f83c90d95b010316674fcf25edc4.jpg" alt="img" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <form action="<?= $cfg['urls']['admin'] ?>/inc/db/handlers/verifyLogin.php" method="post" class="w-full">
                        <div class="flex justify-center">
                            <svg style="fill: #6927D1;" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-purple-600" viewBox="0 0 512 512" stroke="currentColor">
                                <path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM104 432c0 13.3-10.7 24-24 24s-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24z" />
                            </svg>
                        </div>
                        <h1 class="mb-4 text-2xl font-bold text-center text-gray-700">
                            Login to the dashboard
                        </h1>
                        <div>
                            <label class="block text-sm">
                                Username
                            </label>
                            <input type="text" name="usr" class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" placeholder="" />
                        </div>
                        <div>
                            <label class="block mt-4 text-sm">
                                Password
                            </label>
                            <input name="pwd" class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" placeholder="" type="password" />
                        </div>

                        <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg--600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="#">
                            Log in
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>