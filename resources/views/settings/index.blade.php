@extends('layouts.main')

@section('content')

<h3>Settings</h3>

<div class="mt-5" >
    <h4>Account settings</h4>
    <form action="">
    <div class="block">
            @csrf
            <label for="Name">Name</label>
            <input type="text" name="name" value="{{ $auth->name }}" class="m-2 p-2 bg-gray-200 hover:bg-gray-100 hover:border-gray-900 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-303" placeholder="Name"> 
        </div>
        <div class="block">
            @csrf
            <label for="Email">Email</label>
            <input type="text" name="email" value="{{ $auth->email }}" class="m-2 p-2 bg-gray-200 hover:bg-gray-100 hover:border-gray-900 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-303" placeholder="Email"> 
        </div>
        <div class="block">
            <input type="submit" value="Save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center" >
        </div>
    </form>
</div>

<div class="mt-5" >
    <h4>AWS Credentials</h4>
    <form action="{{ route('settings.update.aws') }}" method="POST" >
    <div class="block">
            @csrf
            <label for="aws_id">AWS Access Key ID</label>
            <input type="text" name="aws_id" value="{{ $service->key }}" class="m-2 p-2 bg-gray-200 hover:bg-gray-100 hover:border-gray-900 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-303" placeholder="AWS Access Key ID"> 
        </div>
        <div class="block">
            @csrf
            <label for="aws_key">AWS Secret Access Key</label>
            <input type="text" name="aws_key" value="{{ $service->secret }}" class="m-2 p-2 bg-gray-200 hover:bg-gray-100 hover:border-gray-900 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-303" placeholder="AWS Secret Access Key"> 
        </div>
        <div class="block">
            <input type="submit" value="Save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center" >
        </div>
    </form>
</div>

<div class="mt-5" >
    <h4>Password</h4>
    <form action="">
    <div class="block">
            @csrf
            <label for="current_password">Current password</label>
            <input type="password" name="current_password" value="" class="m-2 p-2 bg-gray-200 hover:bg-gray-100 hover:border-gray-900 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-303"> 
        </div>
        <div class="block">
            @csrf
            <label for="password">Password</label>
            <input type="password" name="password" class="m-2 p-2 bg-gray-200 hover:bg-gray-100 hover:border-gray-900 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-303"> 
        </div>
        <div class="block">
            <input type="submit" value="Save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center" >
        </div>
    </form>
</div>

@endsection