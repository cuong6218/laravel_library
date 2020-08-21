<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
@extends('admin.dashboard.base')
<body>
<div class = "container">
    <div class="wrapper">
        <form action="{{Route('auth.login')}}" method="post" name="Login_Form" class="form-signin">
            @csrf
            <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
            <hr class="colorgraph"><br>
            <input type="text" class="form-control" name="name" placeholder="Username" />
            <input type="password" class="form-control" name="password" placeholder="Password" />
            <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>
        </form>
    </div>
</div>
</body>
<style>
    body {
        background-image: url({{asset('/storage/images/color.jpeg')}});
    }
</style>
