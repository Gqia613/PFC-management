@extends('layouts.index')

@section('content')
  <nav class="navbar navbar-light bg-success shadow-sm">
    <div class="container-fluid">
      <!-- <router-link :to="{ name: 'Top'}" class="navbar-brand mr-4">
        <span class="navbar-brand mb-0 h1 text-white">PFC-manage</span>
      </router-link>
      <div class="d-flex flex-row-reverse"> 
        <router-link :to="{ name: 'Register'}" class="navbar-brand m-1">
          <button type="button" class="btn btn-light btn-sm ml-1 mr-1">
            新規登録
          </button>
        </router-link>
        <router-link :to="{ name: 'Login'}" class="navbar-brand m-1">
          <button type="button" class="btn btn-warning btn-sm ml-1 mr-1">
            ログイン
          </button>
        </router-link>
      </div> -->
      <a class="navbar-brand" href="/">
        <span class="navbar-brand mb-0 h1 text-white">PFC-manage</span>
      </a>
      <div class="d-flex flex-row-reverse"> 
        <a class="btn btn-light btn-sm m-2" href="/register" role="button"
            ><span class="text-success">新規登録</span></a
        >
        <a class="btn btn-warning btn-sm m-2" href="/login" role="button"
            ><span class="text-success">ログイン</span></a
        >
      </div>
    </div>
  </nav>

  <router-view></router-view>
@endsection