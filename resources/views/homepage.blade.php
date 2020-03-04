@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="jumbotron">
                <h1 class="display-4">Daftar Buku</h1>
                <p>Data Buku</p>
                <router-link to="/foo">Go to Foo</router-link>
                <router-link to="/bar">Go to Bar</router-link>

                <router-view></router-view>
              </div>
        </div>
    </div>
</div>
@endsection
