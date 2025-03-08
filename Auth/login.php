<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Login</h1>
            <p class="text-gray-600">Welcome back! Please log in to your account.</p>
        </div>
        <form>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <div class="relative">
                    <input type="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email">
                    <i class="fas fa-envelope absolute right-3 top-3 text-gray-400"></i>
                </div>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password">
                    <i class="fas fa-lock absolute right-3 top-3 text-gray-400"></i>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Login
                </button>
                <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>

</body>
</html>
