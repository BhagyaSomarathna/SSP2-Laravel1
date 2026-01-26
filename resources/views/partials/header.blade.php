<!-- resources/views/partials/header.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeArts</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
<!-- Navigation bar -->
<nav class="shadow-md flex justify-between items-center p-4" 
     style="background: linear-gradient(to right, #b6f2d1, #b9c9f5);">
  
  <!-- Logo -->
  <div class="text-2xl font-bold text-gray-800">LuxeArts</div>

  <!-- Navigation links -->
  <ul class="flex space-x-6">
      <li><a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600">Home</a></li>
      <li><a href="{{ url('/about') }}" class="text-gray-700 hover:text-blue-600">About Us</a></li>
      <li><a href="{{ url('/category') }}" class="text-gray-700 hover:text-blue-600">Categories</a></li>
      <li><a href="{{ url('/contact') }}" class="text-gray-700 hover:text-blue-600">Contact</a></li>
  </ul>

  <!-- Search & icons -->
  <div class="flex items-center space-x-4">
      <input type="text" placeholder="Search..." class="border rounded px-2 py-1">
      <a href="{{ url('/profile') }}">
          <img src="{{ asset('images/login6.png') }}" alt="Profile" class="w-8 h-8 rounded-full">
      </a>
      <a href="{{ url('/cart') }}">
          <img src="{{ asset('images/cart 4.png') }}" alt="Cart" class="w-8 h-8">
      </a>
  </div>
</nav>


